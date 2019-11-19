@extends('layouts.app')

@section('content')

<document-index inline-template>
    <div>
        @if(! auth()->user()->documents()->count())
        <div class="bg-orange-100 border-l-4 border-pink-500 text-pink-700 p-4 flex" role="alert">

            <div class="py-1"><svg class="fill-current h-6 w-6 text-pink-7 00 mr-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                </svg></div>

            <span>{{ __('seems you do not have documents to track yet!') }}</span>
            <span class="font-bold "><a href="{{ route('categories.index') }}"
                    class="text-pink-700 hover:text-pink-800">{{ __('messages.Create your first document') }}</a>
            </span>
        </div>
        @else
        <div class="w-10/12 mx-auto">
            <ul class="flex mb-0">
                <li class="flex-1 mr-2">
                    <a class="inline-block w-100 py-2 px-4 bg-red-500 hover:bg-red-700 text-white text-center text-xl"
                        :class="(selectedTab == 'expired')? 'border-4 border-l border-t border-r rounded-t border-white': ''"
                        @click="selectedTab = 'expired'">
                        <i class="far fa-times-circle text-4xl"></i>
                        <p>{{ __('messages.Expired') }} ({{ $expired_documents->count() }})</p>
                    </a>
                </li>
                <li class="flex-1 mr-2">
                    <a class="inline-block w-100 py-2 px-4 bg-yellow-500 hover:bg-yellow-600 text-white text-center text-xl"
                        :class="(selectedTab == 'warned')? 'border-4 border-l border-t border-r rounded-t border-white': ''"
                        @click="selectedTab = 'warned'">
                        <i class="fas fa-exclamation-triangle text-4xl"></i>
                        <p>{{ __('messages.Expiring Soon') }} ({{ $warned_documents->count() }})</p>
                    </a>
                </li>
                <li class="flex-1">
                    <a class="inline-block w-100 py-2 px-4 bg-green-500 hover:bg-green-600 text-white text-center text-xl"
                        :class="(selectedTab == 'valid')? 'border-4 border-l border-t border-r rounded-t border-white': ''"
                        @click="selectedTab = 'valid'">
                        <i class="fas fa-check-circle text-4xl"></i>
                        <p>{{ __('messages.Still Valid') }} ({{ $active_documents->count() }})</p>
                    </a>
                </li>
            </ul>

            <div class="rounded shadow-lg">
                <div class="flex flex-wrap" v-if="selectedTab == 'expired'">
                    @foreach ($expired_documents as $expired_document)
                    <div class="w-1/5 rounded overflow-hidden shadow-md bg-red-500 mx-4 my-3">
                        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}"
                            alt="personal documents">
                        <div class="px-6 py-4 bg-white h-100">
                            <div class="font-bold text-l mb-2 border-bottom border-gray-200">
                                {{ $expired_document->title }}
                            </div>
                            <div class="font-bold text-l mb-2 flex border-bottom border-gray-200">
                                {{ __('messages.Expires on') }}
                                <span class="text-gray-500 mx-auto">{{ $expired_document->expiry_date }}</span>
                            </div>
                            <p class="text-gray-700 text-base">
                                {{ $expired_document->notes }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap" v-if="selectedTab == 'warned'">
                    @foreach ($warned_documents as $warned_document)
                    <div class="w-1/5 rounded overflow-hidden shadow-md bg-yellow-500 mx-4 my-3">
                        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}"
                            alt="personal documents">
                        <div class="px-6 py-4 bg-white h-100">
                            <div class="font-bold text-l mb-2 border-bottom border-gray-200">
                                {{ $warned_document->title }}
                            </div>
                            <div class="font-bold text-l mb-2 flex border-bottom border-gray-200">
                                {{ __('Expires on') }}<span
                                    class="text-gray-500 mx-auto">{{ $warned_document->expiry_date }}</span>
                            </div>
                            <p class="text-gray-700 text-base">
                                {{ $warned_document->notes }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>


                <div class="flex flex-wrap" v-if="selectedTab == 'valid'">
                    @foreach ($active_documents as $active_document)
                    <div class="w-1/5 rounded overflow-hidden shadow-md bg-green-500 mx-4 my-3">
                        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}"
                            alt="personal documents">
                        <div class="px-6 py-4 bg-white h-100">
                            <div class="font-bold text-l mb-2 border-bottom border-gray-200">
                                {{ $active_document->title }}
                            </div>
                            <div class="font-bold text-l mb-2 flex border-bottom border-gray-200">
                                {{ __('Expires on') }}<span
                                    class="text-gray-500 mx-auto">{{ $active_document->expiry_date }}</span>
                            </div>
                            <p class="text-gray-700 text-base">
                                {{ $active_document->notes }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</document-index>
@endsection