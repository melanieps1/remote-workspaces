<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $string = $request->input('location-search-bar');

        $address = urlencode($string);

        $url = "https://maps.google.com/maps/api/geocode/json?address={$address}&key=AIzaSyBkHa5kHr_JkqqHCf4Yz44SyYuMFDUX8Uw";

        // get the json response
        $resp_json = file_get_contents($url);
         
        // decode the json
        $response = json_decode($resp_json, true);

        // Error state (if Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST)
        if ($response['status'] != 'OK') {
            return 'Invalid request' . \n . $response['status'];
        }

        $geoloc = $response['results'][0]['geometry'];

        $formattedAddress = $response['results'][0]['formatted_address'];
        $lat = $geoloc['location']['lat'];
        $lng = $geoloc['location']['lng'];
        $neLatViewport = $geoloc['viewport']['northeast']['lat'];
        $neLngViewport = $geoloc['viewport']['northeast']['lng'];
        $swLatViewport = $geoloc['viewport']['southwest']['lat'];
        $swLngViewport = $geoloc['viewport']['southwest']['lng'];

        // uses model to get workspaces within viewport coordinates
        $workspaces = \App\Workspace::where([
                                        ['latitude', '>', $swLatViewport],
                                        ['latitude', '<', $neLatViewport],
                                        ['longitude', '>', $swLngViewport],
                                        ['longitude', '<', $neLngViewport],
                                        ])
                                        ->get();

        foreach ($workspaces as $workspace) {
            $workspace->overallRating = $this->overallRating($workspace->id);
            $workspace->ratingsCount = $this->ratingsCount($workspace->id);
        }

        return view('/results', compact('workspaces', 'formattedAddress', 'lat', 'lng', 'neLatViewport', 'neLngViewport', 'swLatViewport', 'swLngViewport'));
    }

    public function overallRating($id)
    {
        $ratings = \App\Rating::where('workspace_id', '=', $id)->get();

        // calculation for user review ratings

        foreach ($ratings as $rating) {
            $sum = 0;

            $sum += $rating->wifi_rating
                + $rating->location_rating
                + $rating->noise_rating
                + $rating->outlets_rating
                + $rating->seating_rating
                + $rating->hours_rating;
        
            $rating->average = number_format($sum/6, 1);
        }

        // calculation for workspace rating

        $ratingSum = 0;

        foreach ($ratings as $rating) {
            $ratingSum += $rating->average;
        }

        if (count($ratings) > 0) {
            $overallRating = number_format($ratingSum / count($ratings), 1);
        } else {
            $overallRating = 0;
        }

        return $overallRating;

        $ratingsCount = count($ratings);

        return $ratingsCount;
    }

    public function ratingsCount($id)
    {
        $ratings = \App\Rating::where('workspace_id', '=', $id)->get();

        $ratingsCount = count($ratings);

        return $ratingsCount;
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workspaces = \App\Workspace::all();
        $categories = \App\Category::all();

        return view('create', compact('workspaces', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workspace = new \App\Workspace;

        $workspace->name = $request->input('name');
        $workspace->category_id = $request->get('category_id');

        // dd($workspace->category_id);

        $workspace->submitted_by_id = \Auth::user()->id;
        $workspace->description = $request->input('description');

        $workspace->website = $request->input('website');

        // This code geocodes the search bar input and passes it to the results page

        $string = $request->input('address');

        $address = urlencode($string);

        $url = "https://maps.google.com/maps/api/geocode/json?address={$address}&key=AIzaSyBkHa5kHr_JkqqHCf4Yz44SyYuMFDUX8Uw";

        // get the json response
        $resp_json = file_get_contents($url);
         
        // decode the json
        $response = json_decode($resp_json, true);

        // print_r($response);
        $geoloc = $response['results'][0]['geometry'];

        $formattedAddress = $response['results'][0]['formatted_address'];
        $lat = $geoloc['location']['lat'];
        $lng = $geoloc['location']['lng'];

        $workspace->address = $formattedAddress;
        $workspace->latitude = $lat;
        $workspace->longitude = $lng;
        
        if ($request->input('button') === 'addWorkspace') {
            $workspace->save();
        }

        $id = $workspace->id;
        // return redirect('/home');
        return redirect('/workspaces/' . $workspace->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = \App\Workspace::find($id);

        $ratings = \App\Rating::where('workspace_id', '=', $id)->get();

        $overallRating = $this->overallRating($id);

        // calculation for user review ratings

        foreach ($ratings as $rating) {
            $sum = 0;

            $sum += $rating->wifi_rating
                + $rating->location_rating
                + $rating->noise_rating
                + $rating->outlets_rating
                + $rating->seating_rating
                + $rating->hours_rating;
        
            $rating->average = number_format($sum/6, 1);
        }


        // number of reviews on workspace

        // $ratingsCount = count($ratings);
        $workspace->ratingsCount = $this->ratingsCount($workspace->id);

        // calculation for ratings of each amenity

        $wifiRatingSum = 0;
        foreach ($ratings as $rating) {
            $wifiRatingSum += $rating->wifi_rating;
        }
        if (count($ratings) > 0) {
            $wifiRating = number_format($wifiRatingSum / count($ratings), 1);
        } else {
            $wifiRating = 0;
        }

        $locationRatingSum = 0;
        foreach ($ratings as $rating) {
            $locationRatingSum += $rating->location_rating;
        }
        if (count($ratings) > 0) {
            $locationRating = number_format($locationRatingSum / count($ratings), 1);
        } else {
            $locationRating = 0;
        }

        $noiseRatingSum = 0;
        foreach ($ratings as $rating) {
            $noiseRatingSum += $rating->noise_rating;
        }
        if (count($ratings) > 0) {
            $noiseRating = number_format($noiseRatingSum / count($ratings), 1);
        } else {
            $noiseRating = 0;
        }

        $outletRatingSum = 0;
        foreach ($ratings as $rating) {
            $outletRatingSum += $rating->outlets_rating;
        }
        if (count($ratings) > 0) {
            $outletRating = number_format($outletRatingSum / count($ratings), 1);
        } else {
            $outletRating = 0;
        }

        $seatRatingSum = 0;
        foreach ($ratings as $rating) {
            $seatRatingSum += $rating->seating_rating;
        }
        if (count($ratings) > 0) {
            $seatRating = number_format($seatRatingSum / count($ratings), 1);
        } else {
            $seatRating = 0;
        }

        $hoursRatingSum = 0;
        foreach ($ratings as $rating) {
            $hoursRatingSum += $rating->hours_rating;
        }
        if (count($ratings) > 0) {
            $hoursRating = number_format($hoursRatingSum / count($ratings), 1);
        } else {
            $hoursRating = 0;
        }
        

        return view('workspace', compact('workspace', 'ratings', 'overallRating', 'ratingsCount', 'wifiRating', 'locationRating', 'noiseRating', 'outletRating', 'seatRating', 'hoursRating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
