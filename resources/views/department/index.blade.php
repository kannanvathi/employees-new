@extends('layouts.main')
@section('title', 'Departments')
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
                        <p>Departments Table</p>
                        <form method="GET" action="{{route('departments.index')}}" class="d-inline-flex align-items-center justify-content-start">
                            <input type="search" name="search" placeholder="Search here.." class="form-control mr-2">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                        <a href="{{route('departments.create')}}" class="btn btn-sm btn-success mr-2">Create</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Department Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->id}}</td>
                                    <td>{{$department->name}}</td>
                                    <td class="d-inline-flex align-items-center justify-content-start">
                                        <a href="{{route('departments.edit', $department->id)}}" class="btn btn-sm btn-success mr-2">Edit</a>
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
