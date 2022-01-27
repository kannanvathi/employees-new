<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\State;

class EmployeeDataController extends Controller
{
    public function country(){
        $countries = Country::all();
        return response()->json($countries);
    }

    public function state(Country $country){

        return response()->json($country->state);
    }

    public function city(State $state){
        return response()->json($state->city);
    }

    public function department(){
        $departments = Department::all();
        return response()->json($departments);
    }
}
