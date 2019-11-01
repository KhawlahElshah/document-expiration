@extends('layouts.app')

@section('content')
<div class="text-red-600 text-4xl px-3">{{ __('Expired') }} ({{ $expired_documents->count() }})</div>

<div class="flex flex-wrap">
    @foreach ($expired_documents as $expired_document)
    <div class="w-1/5 rounded overflow-hidden shadow-md bg-red-500 mx-4 my-3">
        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}" alt="personal documents">
        <div class="px-6 py-4 bg-white h-100">
            <div class="font-bold text-xl mb-2 py-3 border-bottom border-gray-200">{{ $expired_document->name }}</div>
            <div class="font-bold text-xl mb-2 py-3 flex border-bottom border-gray-200">{{ __('Expires on') }} <span
                    class="text-gray-500 mx-auto">{{ $expired_document->expiry_date }}</span>
            </div>
            <p class="text-gray-700 text-base">
                {{ $expired_document->notes }}
            </p>
        </div>
    </div>
    @endforeach
</div>

<div class="text-yellow-500 text-4xl px-3">{{ __('Expiring Soon') }} ({{ $warned_documents->count() }})</div>

<div class="flex flex-wrap">
    @foreach ($warned_documents as $warned_document)
    <div class="w-1/5 rounded overflow-hidden shadow-md bg-yellow-500 mx-4 my-3">
        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}" alt="personal documents">
        <div class="px-6 py-4 bg-white h-100">
            <div class="font-bold text-xl mb-2 py-3 border-bottom border-gray-200">{{ $warned_document->name }}</div>
            <div class="font-bold text-xl mb-2 py-3 flex border-bottom border-gray-200">{{ __('Expires on') }}<span
                    class="text-gray-500 mx-auto">{{ $warned_document->expiry_date }}</span>
            </div>
            <p class="text-gray-700 text-base">
                {{ $warned_document->notes }}
            </p>
        </div>
    </div>
    @endforeach
</div>

<div class="text-green-500 text-4xl px-3">{{ __('Still Valid') }} ({{ $active_documents->count() }})</div>

<div class="flex flex-wrap">
    @foreach ($active_documents as $active_document)
    <div class="w-1/5 rounded overflow-hidden shadow-md bg-green-500 mx-4 my-3">
        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}" alt="personal documents">
        <div class="px-6 py-4 bg-white h-100">
            <div class="font-bold text-xl mb-2 py-3 border-bottom border-gray-200">{{ $active_document->name }}</div>
            <div class="font-bold text-xl mb-2 py-3 flex border-bottom border-gray-200">{{ __('Expires on') }}<span
                    class="text-gray-500 mx-auto">{{ $active_document->expiry_date }}</span>
            </div>
            <p class="text-gray-700 text-base">
                {{ $active_document->notes }}
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection