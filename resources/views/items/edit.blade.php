<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit cart') }}
        </h2>
    </x-slot>


    <div class="py-12 bg-white" enctype="multipart/form-data">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            
                <form action="{{ route('carts.update',$cart->id) }}" method="post" class="w-full max-w-sm">
                    @csrf
                    @method('PUT')

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="price">
                            User name
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class=" appearance-none border-none border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $cart->user_name }}" id="user_name" name="user_name" type="text" placeholder="">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                          items quantity
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class="appearance-none border-none border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $cart->items_quantity }}" id="items_quantity" name="items_quantity"  type="text" placeholder="">
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                        <button class="shadow bg-gray-200 hover:bg-purple-400 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit" >
                            Update
                        </button>
                        </div>
                    </div>
                </form>
            
        </div>
    </div>

</x-app-layout>
