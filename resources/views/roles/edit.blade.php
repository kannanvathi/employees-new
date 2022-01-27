@extends('layouts.main')
@section('title', 'State')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Edit Role</p>
                        <a href="{{route('roles.index')}}" class="btn btn-sm btn-success mr-2">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $role->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Permission Name') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('permission') is-invalid @enderror" name="permission[]" required  multiple>
                                        <option>select</option>
                                        @foreach($permissions as $permission)
                                            <option value="{{$permission->id}}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'selected' : '' }}
                                            >{{$permission->name}}</option>

                                        @endforeach
                                    </select>
                                    {{--$rolePermissions--}}


                                    @error('permission')
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
