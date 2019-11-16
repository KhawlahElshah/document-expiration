@extends('layouts.app')

@section('content')

<div class="w-full max-w-2xl mx-auto">
    <form method="POST" action="{{ route('documents.store', request()->route('category')) }}"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="flex mb-4">
            <div class="flex-1 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    {{ __('Document Title') }}
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="title" name="title" type="text" placeholder="{{ __('Ex:your jhon driving licence') }}">
                @error('title')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mt-1 rounded relative" role="alert">
                    <span class="block sm:inline text-xs">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="flex-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                    {{ __('Document Category') }}
                </label>

                <div class="relative">
                    <select name="category_id" id="category"
                        class="block appearance-none text-gray-700 w-full bg-white border py-2 px-3 rounded leading-tight focus:outline-none">
                        <option value="">{{ __('Select A Category') }}</option>
                        @foreach (request()->route('category')->subCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>

                @error('category_id')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mt-1 rounded relative" role="alert">
                    <span class="block sm:inline text-xs">{{ $message }}</span>
                </div>
                @enderror
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

                @error('expiry_date')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mt-1 rounded relative" role="alert">
                    <span class="block sm:inline text-xs">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="flex-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="notifyBeforeNumberDays">
                    {{ __('Notify me before') }}
                    <span>({{ __('days') }})</span>
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    id="notifyBeforeNumberDays" name="notify_before_number_days" type="number">

                @error('notify_before_number_days')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mt-1 rounded relative" role="alert">
                    <span class="block sm:inline text-xs">{{ $message }}</span>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                {{ __('Description') }}
            </label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"></textarea>

            @error('description')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mt-1 rounded relative" role="alert">
                <span class="block sm:inline text-xs">{{ $message }}</span>
            </div>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-pink-900 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                {{ __('Add') }}
            </button>
        </div>
    </form>
</div>
@endsection