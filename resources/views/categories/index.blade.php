@extends('layouts.app')

@section('content')
<category-index inline-template>
  <div class="flex flex-wrap justify-center">
    @foreach ($categories as $category)
    <div class="max-w-sm rounded overflow-hidden shadow-md bg-white mx-5 my-3 cursor-pointer"
      @click="RedirectToDocumentForm('{{ $category->slug }}')">
      <img class="w-1/2 h-40 mx-auto p-2" src="{{ asset('images/'. $category->image_path .'.svg') }}"
        alt="{{ $category->name }}">
      <div class="px-6 py-2">
        <div class="font-bold text-xl text-pink-900 text-right">{{ __("messages.$category->name") }}</div>
      </div>
    </div>
    @endforeach
  </div>
</category-index>

@endsection