@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck">
                @foreach ($documents as $document)
                    <div class="card">
                        <h3 class="card-header">{{ $document->name }}</h3>

                        <div class="card-body">
                            <p>
                                {{ $document->expiry_date }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
