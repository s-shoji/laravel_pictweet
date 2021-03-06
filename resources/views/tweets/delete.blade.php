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

                {{$tweet->id}}
                title
                {{$tweet->title}} <br>
                content
                {{$tweet->content}} <br><br>
                <form method="POST" action="{{ route('tweets.delete', ['id' => $tweet->id]) }}">
                      @csrf
                      <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                          {{ __('Delete') }}
                        </x-button>
                      </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
