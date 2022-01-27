@extends('layouts.main')
@section('title', 'Users')
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
                        <p>User Table</p>
                        <form method="GET" action="{{route('users.index')}}" class="d-inline-flex align-items-center justify-content-start">
                            <input type="search" name="search" placeholder="Search here.." class="form-control mr-2">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                        <a href="{{route('users.create')}}" class="btn btn-sm btn-success mr-2">Create</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                                    {{$user->getRoleNames()}}
                                </td>
                                <td class="d-inline-flex align-items-center justify-content-start">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-success mr-2">Edit</a>
                                    <form method="POST" action="{{route('users.destroy', $user->id)}}">
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

       {{-- <select class="states" name="states">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <option value="" selected> state</option>
            @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>--}}
        <div id="append_item"></div>
    </div>



@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
   /* $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
*/
   /* $(document).ready(function() {
        var csf =  $('meta[name="csrf-token"]').attr('content')
        $(document).on('change', '.states', function() {
            var val = $('.states').val();

            $.ajax({
                url: "/get-cities",
                type: "post",
                data: {"_token": "{{ csrf_token() }}", 'val' : val},
                success: function(res) {
                    console.log(res);
                    $('#append_item').empty();
                    var appendItem = '';
                    for(i=0; i<res.length; i++){
                        appendItem += '<div class="item">'+ res[0].name +'</div>'
                    }
                    $('#append_item').append(appendItem);

                }
            });
        })
    })*/
</script>
