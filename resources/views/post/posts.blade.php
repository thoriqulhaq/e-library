<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
      </h2>
    </x-slot>
    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          @foreach ($posts as $post)

          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-2xl">{{ $post->title }}</h1>
            <p>by {{ $post->user->name }}</p>
          </div>

          @endforeach
        </div>
      </div>
    </div>
  </x-app-layout>

