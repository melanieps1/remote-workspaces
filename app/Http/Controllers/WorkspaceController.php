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
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $string . "&sensor=false";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        // Error state (if Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST)
        if ($response['status'] != 'OK') {
            return 'Invalid request';
        }

        // print_r($response);
        $geoloc = $response['results'][0];

        $city = $geoloc['address_components'][0]['long_name'];
        $formattedAddress = $geoloc['formatted_address'];
        $lat = $geoloc['geometry']['location']['lat'];
        $lng = $geoloc['geometry']['location']['lng'];
        $neLatViewport = $geoloc['geometry']['viewport']['northeast']['lat'];
        $neLngViewport = $geoloc['geometry']['viewport']['northeast']['lng'];
        $swLatViewport = $geoloc['geometry']['viewport']['southwest']['lat'];
        $swLngViewport = $geoloc['geometry']['viewport']['southwest']['lng'];

        $workspaces = DB::table('workspaces')->where([
                                            ['latitude', '>', $swLatViewport],
                                            ['latitude', '<', $neLatViewport],
                                            ['longitude', '>', $swLngViewport],
                                            ['longitude', '<', $neLngViewport],
                                            ])->get();
        return view('/results', compact('workspaces', 'city', 'formattedAddress', 'lat', 'lng', 'neLatViewport', 'neLngViewport', 'swLatViewport', 'swLngViewport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
