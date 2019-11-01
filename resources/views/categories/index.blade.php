@extends('layouts.app')

@section('content')
<div class="flex">
  <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3">
    <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}" alt="personal documents">
    <div class="px-6 py-2">
      <div class="font-bold text-xl text-pink-900">{{ __('Personal Documents') }}</div>
    </div>
  </div>

  <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3">
    <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/insurance.svg') }}" alt="insurance">
    <div class="px-6 py-4">
      <div class="font-bold text-xl text-pink-900">{{ __('Insurance') }}</div>
    </div>
  </div>

  <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3">
    <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/company-papers.svg') }}" alt="company papers">
    <div class="px-6 py-4">
      <div class="font-bold text-xl text-pink-900">{{ __('Company Papers') }}</div>
    </div>
  </div>
</div>

<div class="flex">
  <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3">
    <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/health.svg') }}" alt="health">
    <div class="px-6 py-4">
      <div class="font-bold text-xl text-pink-900">{{ __('Health') }}</div>
    </div>
  </div>

  <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3">
    <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/subscriptions.svg') }}" alt="subscription">
    <div class="px-6 py-4">
      <div class="font-bold text-xl text-pink-900">{{ __('Subscriptions') }}</div>
    </div>
  </div>

  <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3">
    <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/energy-plan.svg') }}" alt="energy plan">
    <div class="px-6 py-4">
      <div class="font-bold text-xl text-pink-900">{{ __('Energy Plan') }}</div>
    </div>
  </div>
</div>
@endsection