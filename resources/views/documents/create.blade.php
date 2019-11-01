@extends('layouts.app')

@section('content')

{{--  <div class="flex-col">  --}}

{{--  <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Document') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('documents.store') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

            <div class="col-md-6">
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" id="category_id">
                    <option value="">{{ __('Select A Category') }}</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('Expiration Date') }}</label>

            <div class="col-md-6">
                <input id="expiry_date" type="date" class="form-control @error('expiry_date') is-invalid @enderror"
                    name="expiry_date" value="{{ old('expiry_date') }}" required>

                @error('expiry_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="notify_before_number_days"
                class="col-md-4 col-form-label text-md-right">{{ __('Notify me before (days)') }}</label>

            <div class="col-md-6">
                <input id="notify_before_number_days" type="number"
                    class="form-control @error('notify_before_number_days') is-invalid @enderror"
                    name="notify_before_number_days" value="{{ old('notify_before_number_days') }}" required>

                @error('notify_before_number_days')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}</label>

            <div class="col-md-6">
                <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" cols="30"
                    rows="10"></textarea>

                @error('notes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div> --}}
{{--  </div>  --}}

<div class="w-full max-w-2xl mx-auto">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <div class="flex mb-4">
            <div class="flex-1 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    {{ __('Document Title') }}
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="title" name="title" type="text" placeholder="{{ __('Ex:your jhon driving licence') }}">
            </div>

            <div class="flex-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                    {{ __('Document Category') }}
                </label>

                <div class="relative">
                    <select name="category_id" id="category"
                        class="block appearance-none text-gray-700 w-full bg-white border py-2 px-3 rounded leading-tight focus:outline-none">
                        <option value="1">driving licence</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mb-4">
            <div class="flex-1 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="expiryDate">
                    {{ __('Document Expiration Date') }}
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="expiryDate" name="expiry_date" type="date">
            </div>

            <div class="flex-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="notifyBeforeNumberDays">
                    {{ __('Notify me before') }}
                    <span>({{ __('days') }})</span>
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="notifyBeforeNumberDays" name="notify_before_bumber_days" type="number">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                {{ __('Description') }}
            </label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-pink-900 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button">
                {{ __('Add') }}
            </button>
        </div>
    </form>
</div>
@endsection