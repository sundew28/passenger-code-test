<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;

/*
| The purpose of this class PostCodesController is to return postcodes with partial string matches as a JSON API response and
|  also return postcodes near a location (latitude,longitude) as a JSON API response.
*/
class PostCodesController extends Controller
{
    protected $postcodes;

    public function __construct(PostcodeService $service)
    {
        $this->postcodes = $service;
        $this->middleware('auth:api');
    }

    /**
     * Get postcodes for a given partial input of postcode
     *
     * @param $request
     *
     * @return Json|Mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function partialPostCode(Request $request): mixed
    {
        // Validate the given input
        $validate = $this->postcodes->query($request->partial_postcode);
        
        if (count($validate) > 0) {
            $autoCompletePostcodes = $this->postcodes->autocomplete($request->partial_postcode);
            return response()->json(["PostCodes" => $autoCompletePostcodes]);
        } else {
            return response()->json(["Error" => "Given input is wrong. Please enter correct input."]);
        }       
        
    }

    /**
     * Get nearest postcodes for a given longitude & latitude
     *
     * @param $request
     *
     * @return Json|Mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postcodesForGivenLngAndLat(Request $request): mixed
    {
        $longitude = floatval($request->longitude);
        $latitude = floatval($request->latitude);

        if (is_float($longitude) && is_float($latitude)) {
            
            $nearestPostCodes = $this->postcodes->nearestPostcodesForGivenLngAndLat($longitude, $latitude);
            
            if ($nearestPostCodes->isNotEmpty()) {
                 return response()->json($nearestPostCodes);
            } else {
                return response()->json(["Error" => "Given input for longitude or latitude is wrong. Please enter correct input."]);
            }

        } else {
            return response()->json(["Error" => "Given input for longitude or latitude is wrong. Please enter correct input."]);
        }
    }
}
