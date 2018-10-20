@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-left">
              <a href="{{ route('documents') }}" class="btn btn-link mb-3">
                Back to Documents
              </a>
          </div>
            <div class="card">
                <div class="card-header">{{ __('View Document') }}</div>
                <div class="card-body">
                    <form method="POST" action="/documents/{{ $document->id }}" aria-label="{{ __('View Document') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input 
                                  id="name"
                                  type="text"
                                  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                                  name="title" 
                                  value="{{ old('title') ?: $document->title }}" 
                                  placeholder="Untitled Draft"
                                  autofocus
                                >
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Document') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
              <div class="card-header">{{ __('Document Pages') }}</div>
              <div class="card-body">
                @if ($document->pages)
                    <ol>
                        @foreach ($document->pages as $page)
                            <li>
                                <a href="/pages/{{ $page->id }}">
                                  Page {{ $page->id }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
