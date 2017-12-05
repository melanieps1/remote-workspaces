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

        // This code geocodes the search bar input and passes it to the results page

        $string = $request->input('location-search-bar');

        $string = str_replace (" ", "+", urlencode($string));
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $string . "&sensor=false";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        // Error state (if Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST)
        if ($response['status'] != 'OK') {
            // sleep(1);
            // $response = json_decode(curl_exec($ch), true);
            return 'Invalid request' . $response['status'];
            // Google is rejecting request (over query limit), stretch goal: retry x times after sleeping for a second
        }

        // print_r($response);
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
        
        curl_close($ch);

        foreach ($workspaces as $workspace) {
            $workspace->overallRating = $this->overallRating($workspace->id);
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
        
            $rating->average = round($sum/6, 1);
        }

        // calculation for workspace rating

        $ratingSum = 0;

        foreach ($ratings as $rating) {
            $ratingSum += $rating->average;
        }

        $overallRating = round($ratingSum / count($ratings), 1);

        return $overallRating;
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

        return view('create', compact('categories', 'workspaces'));
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
        $workspace->category_id = $request->input('category_id');  // $workspace->category->id
        $workspace->submitted_by_id = \Auth::user()->id;
        $workspace->description = $request->input('description');
        $workspace->website = $request->input('website');

        // This code geocodes the search bar input and passes it to the results page

        $string = $request->input('address');

        $string = str_replace (" ", "+", urlencode($string));
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $string . "&sensor=false";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        // Error state (if Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST)
        if ($response['status'] != 'OK') {
            // sleep(1);
            // $response = json_decode(curl_exec($ch), true);
            return 'Invalid request' . $response['status'];
            // Google is rejecting request (over query limit), stretch goal: retry x times after sleeping for a second
        }

        // print_r($response);
        $geoloc = $response['results'][0]['geometry'];

        $formattedAddress = $response['results'][0]['formatted_address'];
        $lat = $geoloc['location']['lat'];
        $lng = $geoloc['location']['lng'];

        $workspace->address = $formattedAddress;
        $workspace->latitude = $lat;
        $workspace->longitude = $lng;
        
        $workspace->save();

        return redirect('home');
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
        
            $rating->average = round($sum/6, 1);
        }


        // number of reviews on workspace

        $ratingsCount = count($ratings);


        // calculation for ratings of each amenity

        $wifiRatingSum = 0;
        foreach ($ratings as $rating) {
            $wifiRatingSum += $rating->wifi_rating;
        }
        $wifiRating = round($wifiRatingSum / count($ratings), 1);

        $locationRatingSum = 0;
        foreach ($ratings as $rating) {
            $locationRatingSum += $rating->location_rating;
        }
        $locationRating = round($locationRatingSum / count($ratings), 1);

        $noiseRatingSum = 0;
        foreach ($ratings as $rating) {
            $noiseRatingSum += $rating->noise_rating;
        }
        $noiseRating = round($noiseRatingSum / count($ratings), 1);

        $outletRatingSum = 0;
        foreach ($ratings as $rating) {
            $outletRatingSum += $rating->outlets_rating;
        }
        $outletRating = round($outletRatingSum / count($ratings), 1);

        $seatRatingSum = 0;
        foreach ($ratings as $rating) {
            $seatRatingSum += $rating->seating_rating;
        }
        $seatRating = round($seatRatingSum / count($ratings), 1);

        $hoursRatingSum = 0;
        foreach ($ratings as $rating) {
            $hoursRatingSum += $rating->hours_rating;
        }
        $hoursRating = round($hoursRatingSum / count($ratings), 1);
        

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
