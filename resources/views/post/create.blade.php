<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('store') }}">
            @csrf

            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>

            <!-- Body -->
            <div class="mt-4">
                <x-label for="body" :value="__('Body')" />
                <x-input id="body" class="block mt-1 w-full" type="text" name="body" :value="old('body')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    	{{ __('Cancel ?') }}
                </a>

                <x-button class="ml-4">
                    	{{ __('Submit') }}
                </x-button>
            	</div>
        	</form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
