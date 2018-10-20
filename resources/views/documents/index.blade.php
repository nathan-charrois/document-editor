@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-left">
                <a href="{{ route('home') }}" class="btn btn-link mb-3">
                  Back to Index
                </a>
                <a href="documents/create" class="btn btn-link mb-3">
                  Create Document
                </a>
            </div>
            <div class="card">
                <div class="card-header">Documents</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h4>My Documents</h4>

                    @if ($documents)
                      <ol>
                          @foreach ($documents as $document)
                              <li>
                                  <a href="/documents/{{ $document->id }}">
                                    {{ $document->title }}
                                  </a>

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
                              </li>
                          @endforeach
                      </ol>
                    @else
                      <p>No documents</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="example" class="mt-3"></div>
@endsection
