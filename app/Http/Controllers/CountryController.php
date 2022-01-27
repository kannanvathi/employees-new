<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request){
        $countries = Country::all();

        if($request->has('search')){
            $countries = Country::where('country_code', 'like', "%{$request->search}%")->orWhere('name', 'like', "%{$request->search}%")->get();
        }
        return view('country.index', compact('countries'));
    }

    public function create(){
        return view('country.create');
    }

    public function store(CountryStoreRequest $request){
        Country::create($request->validated());
        return redirect()->route('countries.index')->with('message', 'Country created sucessfully');
    }

    public function edit(Country $country){
        return view('country.edit', compact('country'));
    }

    public function update(CountryUpdateRequest $request, Country $country){

        $country->update($request->validated());
        return redirect()->route('countries.index')->with('message', 'country updated successfully');
    }

    public function destroy(Country $country){
        $country->delete();
        return redirect()->route('countries.index')->with('message', 'Country deleted successfully');
    }

}

