@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-left">
                <a href="{{ route('home') }}" class="btn btn-link mb-3">
                  Back to Index
                </a>
            </div>
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile') }}" aria-label="{{ __('Update Profile') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input 
                                  id="email"
                                  type="text"
                                  class="form-control-plaintext{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                  name="email" 
                                  value="{{ $profile->user->email }}" 
                                  readonly
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4 mb-1">
                                <a href="{{ route('profile/password') }}" class="">Update Password</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input 
                                  id="name"
                                  type="text"
                                  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                  name="name" 
                                  value="{{ old('name') ?: $profile->name }}" 
                                  placeholder="{{ $profile->user->email }}"
                                  autofocus
                                >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
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
