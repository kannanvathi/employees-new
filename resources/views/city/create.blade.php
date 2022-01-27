@extends('layouts.main')
@section('title', 'City')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Create City</p>
                        <a href="{{route('cities.index')}}" class="btn btn-sm btn-success mr-2">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cities.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State Id') }}</label>


                                <div class="col-md-6">
                                    <select class="form-control @error('state_id') is-invalid @enderror" name="state_id" required >
                                        <option>select</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->id}}</option>
                                        @endforeach
                                    </select>

                                    @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
