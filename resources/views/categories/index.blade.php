@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck">
                @forelse ($categories as $category_name => $category_documents)
                    <div class="card">
                        <h3 class="card-header">{{ $category_name }}</h3>

                        <div class="card-body">
                            <p>
                                {{ $category_documents->count() }} {{ __('Documents') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p>{{ __('Sorry, you don`t have categories') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
