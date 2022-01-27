@extends('layouts.main')
@section('title', 'Country')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="card-header d-inline-flex align-items-center justify-content-between w-100">
                        <p>Countries Table</p>
                        <form method="GET" action="{{route('countries.index')}}" class="d-inline-flex align-items-center justify-content-start">
                            <input type="search" name="search" placeholder="Search here.." class="form-control mr-2">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                        <a href="{{route('countries.create')}}" class="btn btn-sm btn-success mr-2">Create</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Country Code</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$country->id}}</td>
                                    <td>{{$country->country_code}}</td>
                                    <td>{{$country->name}}</td>
                                    <td class="d-inline-flex align-items-center justify-content-start">
                                        <a href="{{route('countries.edit', $country->id)}}" class="btn btn-sm btn-success mr-2">Edit</a>
                                        <form method="POST" action="{{route('countries.destroy', $country->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-secondary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
