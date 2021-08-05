<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-end mt-4 p-6 space-x-10">
            <!-- {{ __('TweetShow') }} -->
        <a href="{{ route('tweets.index') }}">{{ __('Tweet') }}</a>
        <a href="{{ route('tweets.create') }}">{{ __('TweetCreate') }}</a>
        <a href="{{ route('tweets.edit', ['id' => $tweet->id]) }}">{{ __('TweetEdit') }}</a>
        <a href="{{ route('tweets.delete', ['id' => $tweet->id]) }}">{{ __('TweetDelete') }}</a>
        </h2> 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-20 lg:px-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center text-4xl">
                
                  id:
                  {{$tweet->id}} <br>
                  title:
                  {{$tweet->title}} <br>
                  content:
                  {{$tweet->content}} <br>
                  user_name:
                  {{$tweet->user->name}}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-20 lg:px-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center text-4xl">
                
                <form method="POST" action="{{ route('comments.create', ['id' => $tweet->id ]) }}">
                      @csrf
                      <!-- comments-->
                      <div class="mt-4">
                          <x-label for="comment" :value="__('Comment')" />

                          <x-textarea id="comment" class="block mt-1 w-full" type="text" name="comment" required autofocus></x-textarea>
                      </div>
                      <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                          {{ __('Comment') }}
                        </x-button>
                      </div>
                  </form>
                  
                </div>
            </div>
        </div>
    </div>

  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-20 lg:px-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center text-4xl">
            
               @if((count($comments) === 0))
               <p class="text-sm">{{ __('no comment')}}</p>
               @else
                @foreach($comments as $comment)
                        <div class="text-center text-2xl" >
                            id: {{$comment->id}} <br>
                            Comment: {{$comment->comment}}<br>
                            created_at: {{$comment->created_at}}<br>
                            user_name: {{$comment->user->name}}<br><br>
                        </div>
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>
