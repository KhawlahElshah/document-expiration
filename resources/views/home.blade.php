@extends('layouts.app')

@section('content')

<document-index inline-template>
    <div>
        @if(! auth()->user()->documents()->count())
        <div class="text-pink-700 p-4 flex-col" role="alert">

            <img class="w-1/2 h-64 p-2 mx-auto" src="{{ asset('images/empty.svg') }}" alt="empty">

            <div class="text-center mt-5">
                <span>{{ __('messages.seems you do not have documents to track yet!') }}</span>
                <span class="font-bold underline">
                    <a href="{{ route('categories.index') }}"
                        class="text-pink-700 hover:text-pink-800">{{ __('messages.Create your first document') }}</a>
                </span>
            </div>
        </div>
        @else
        <div class="w-10/12 mx-auto">
            <ul class="flex mb-0">
                <li class="flex-1 ml-2">
                    <a class="inline-block w-100 py-2 px-4 bg-red-500 hover:bg-red-700 text-white text-center text-md lg:text-xl"
                        :class="(selectedTab == 'expired')? 'border-4 border-l border-t border-r rounded-t border-white': ''"
                        @click="selectedTab = 'expired'">
                        <i class="far fa-times-circle text-4xl"></i>
                        <p>{{ __('messages.Expired') }} ({{ $expired_documents->count() }})</p>
                    </a>
                </li>
                <li class="flex-1 ml-2">
                    <a class="inline-block w-100 py-2 px-4 bg-yellow-500 hover:bg-yellow-600 text-white text-center text-md lg:text-xl"
                        :class="(selectedTab == 'warned')? 'border-4 border-l border-t border-r rounded-t border-white': ''"
                        @click="selectedTab = 'warned'">
                        <i class="fas fa-exclamation-triangle text-4xl"></i>
                        <p>{{ __('messages.Expiring Soon') }} ({{ $warned_documents->count() }})</p>
                    </a>
                </li>
                <li class="flex-1">
                    <a class="inline-block w-100 py-2 px-4 bg-green-500 hover:bg-green-600 text-white text-center text-md lg:text-xl"
                        :class="(selectedTab == 'valid')? 'border-4 border-l border-t border-r rounded-t border-white': ''"
                        @click="selectedTab = 'valid'">
                        <i class="fas fa-check-circle text-4xl"></i>
                        <p>{{ __('messages.Still Valid') }} ({{ $active_documents->count() }})</p>
                    </a>
                </li>
            </ul>

            <div class="rounded shadow-lg">
                <div class="flex flex-wrap" v-if="selectedTab == 'expired'">
                    @forelse ($expired_documents as $expired_document)
                    <div
                        class="sm:w-1/2 md:w-1/3 lg:w-1/5 sm:mx-auto self-center rounded overflow-hidden shadow-md bg-red-500 mx-4 my-3">
                        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}"
                            alt="personal documents">
                        <div class="px-6 py-4 bg-white h-100">
                            <div class="font-bold text-l text-right mb-2 border-bottom border-gray-200">
                                {{ $expired_document->title }}
                            </div>
                            <div class="font-bold text-l text-right mb-2 flex border-bottom border-gray-200">
                                {{ __('messages.Expires on') }}:
                                <span class="text-gray-500 mx-auto">{{ $expired_document->expiry_date }}</span>
                            </div>
                            <p class="text-gray-700 text-base text-right">
                                {{ $expired_document->notes }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-gray-700 p-4 flex-col mx-auto" role="alert">

                        <img class="w-48 h-64 p-2 mx-auto" src="{{ asset('images/celebrate.svg') }}" alt="empty">

                        <div class="text-center mt-2">
                            {{ __('messages.you do not have expiring documents') }}
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="flex flex-wrap" v-if="selectedTab == 'warned'">
                    @forelse ($warned_documents as $warned_document)
                    <div
                        class="sm:w-1/2 md:w-1/3 lg:w-1/5 sm:mx-auto self-center rounded overflow-hidden shadow-md bg-yellow-500 mx-4 my-3">
                        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}"
                            alt="personal documents">
                        <div class="px-6 py-4 bg-white h-100">
                            <div class="font-bold text-l text-right mb-2 border-bottom border-gray-200">
                                {{ $warned_document->title }}
                            </div>
                            <div class="font-bold text-l text-right mb-2 flex border-bottom border-gray-200">
                                {{ __('messages.Expires on') }}:
                                <span class="text-gray-500 mx-auto">{{ $warned_document->expiry_date }}</span>
                            </div>
                            <p class="text-gray-700 text-base text-right">
                                {{ $warned_document->notes }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-gray-700 p-4 flex-col mx-auto" role="alert">

                        <img class="w-48 h-64 p-2 mx-auto" src="{{ asset('images/celebrate.svg') }}" alt="empty">

                        <div class="text-center mt-2">
                            {{ __('messages.you do not have nearly expiring documents') }}
                        </div>
                    </div>
                    @endforelse

                </div>


                <div class="flex flex-wrap" v-if="selectedTab == 'valid'">
                    @forelse ($active_documents as $active_document)
                    <div
                        class="sm:w-1/2 md:w-1/3 lg:w-1/5 sm:mx-auto self-center rounded overflow-hidden shadow-md bg-green-500 mx-4 my-3">
                        <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/personal-documents.svg') }}"
                            alt="personal documents">
                        <div class="px-6 py-4 bg-white h-100">
                            <div class="font-bold text-l text-right mb-2 border-bottom border-gray-200">
                                {{ $active_document->title }}
                            </div>
                            <div class="font-bold text-l text-right mb-2 flex border-bottom border-gray-200">
                                {{ __('messages.Expires on') }}:
                                <span class="text-gray-500 mx-auto">{{ $active_document->expiry_date }}</span>
                            </div>
                            <p class="text-gray-700 text-base text-right">
                                {{ $active_document->notes }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-gray-700 p-4 flex-col mx-auto" role="alert">

                        <img class="w-48 h-64 p-2 mx-auto" src="{{ asset('images/calendar.svg') }}" alt="empty">

                        <div class="text-center mt-2">
                            {{ __('messages.you do not have valid documents.') }}
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        @endif
    </div>
</document-index>
@endsection