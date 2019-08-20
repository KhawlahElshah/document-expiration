@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck">
                <div class="card bg-danger text-white">
                    <h3 class="card-header">{{ __('Expired') }}</h3>

                    <div class="card-body">
                        <p>
                            {{ $expired_documents_count }} {{ __('Documents') }}
                        </p>
                    </div>
                </div>

                <div class="card bg-warning text-white">
                    <h3 class="card-header">{{ __('Expiring Soon') }}</h3>
                   <div class="card-body">
                        <p>
                            {{ $warned_documents_count }} {{ __('Documents') }}
                        </p>
                   </div>
                </div>

                <div class="card bg-success text-white">
                    <h3 class="card-header">{{ __('Valid') }}</h3>
                    <div class="card-body">
                        <p>
                            {{ $active_documents_count }} {{ __('Documents') }}
                        </p>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
