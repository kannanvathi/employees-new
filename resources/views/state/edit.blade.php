@extends('layouts.main')
@section('title', 'State')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Create State</p>
                        <a href="{{route('states.index')}}" class="btn btn-sm btn-success mr-2">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('states.store', $state->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>


                                <div class="col-md-6">
                                    <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" required >
                                        <option>select</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}"
                                                {{ $country->id == $state->country_id ? 'selected' : '' }}
                                            >{{$country->country_code}}</option>
                                        @endforeach
                                    </select>

                                    @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name) }}" required autocomplete="name" autofocus>

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
                                        {{ __('Update') }}
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
