<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-end mt-4 p-6 space-x-10">
            <!-- {{ __('TweetShow') }} -->
        <a href="{{ route('tweets.index') }}">{{ __('Tweet') }}</a>
        <a href="{{ route('tweets.create') }}">{{ __('TweetCreate') }}</a>
        </h2> 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('tweets.edit', ['id' => $tweet->id]) }}">
                      @csrf

                      <!-- title -->
                      <div>
                          <x-label for="title" :value="__('Title')" />

                          <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title') ?? $tweet->title }}" required autofocus />
                      </div>

                      <!-- content-->
                      <div class="mt-4">
                          <x-label for="content" :value="__('Content')" />
                          <textarea id="content" rows="3" cols="10" class="block mt-1 w-full" type="text" name="content">
                            {{ old('content') ?? $tweet->content }} 
                          </textarea>
                      </div>
                      <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                          {{ __('Edit') }}
                        </x-button>
                      </div>
                  </form>
                {{$tweet->id}}
                title
                {{$tweet->title}} <br>
                content
                {{$tweet->content}} <br><br>
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
