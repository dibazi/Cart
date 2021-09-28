<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create cart') }}
        </h2>
    </x-slot>


    <div class="py-12 bg-white" enctype="multipart/form-data">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            
                <p>Cart username: {{ $cart->user_name }}</p> <br>
                <p>Cart items: {{ $cart->items_quantity }}</p>
        </div>
    </div>

</x-app-layout>
