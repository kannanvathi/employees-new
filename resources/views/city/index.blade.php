@extends('layouts.main')
@section('title', 'Cities')
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
                        <p>Cities Table</p>
                        <form method="GET" action="{{route('cities.index')}}" class="d-inline-flex align-items-center justify-content-start">
                            <input type="search" name="search" placeholder="Search here.." class="form-control mr-2">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                        <a href="{{route('cities.create')}}" class="btn btn-sm btn-success mr-2">Create</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">State Name</th>
                                <th scope="col">City Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{$city->id}}</td>
                                    <td>{{$city->state->name}}</td>
                                    <td>{{$city->name}}</td>
                                    <td class="d-inline-flex align-items-center justify-content-start">
                                        <a href="{{route('cities.edit', $city->id)}}" class="btn btn-sm btn-success mr-2">Edit</a>
                                        <form method="POST" action="{{route('cities.destroy', $city->id)}}">
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
