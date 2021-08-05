<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between mt-4 p-6 space-x-5">
            {{ __('User') }}
           
        </h2>  
   
        <h2> 今月の会員登録者数は{{$sumu}}です。</h2>   
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
           
                <div class="text-center text-2xl" >
                  
                
                </div>
             
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
