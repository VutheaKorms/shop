<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Location;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;

class AddressesController extends Controller
{
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getAllCountryActive($status) {
        $brands = Country::where('status', $status)
            ->orderBy('name', 'desc')
            ->get();
        return response($brands);
    }

    public function getStateByCountry($status, $country_id) {
        $state = State::with('country')->where('status', $status)
            ->where('country_id', $country_id)
            ->orderBy('name', 'desc')
            ->get();
        return response($state);
    }

    public function getAllStateActive($status) {
        $brands = State::where('status', $status)
            ->orderBy('name', 'desc')
            ->get();
        return response($brands);
    }

    public function getAllLocationActive($status) {
        $brands = Location::where('status', $status)
            ->orderBy('name', 'desc')
            ->get();
        return response($brands);
    }
}
