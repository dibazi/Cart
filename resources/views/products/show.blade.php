<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shows product') }}
        </h2>
    </x-slot>


    <div class="py-12 bg-white" enctype="multipart/form-data">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            
                <p>Product name: {{ $product->product_name }}</p> <br>
                <p>Product description: {{ $product->description }}</p>

                <form action="/items" method="post" class="w-full max-w-sm">
                    @csrf

                        <input class=" appearance-none border-none border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $product->id }}" id="product_id" name="product_id" type="hidden" placeholder="">

                        <input class=" appearance-none border-none border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $product->product_name }}" id="product_name" name="product_name" type="hidden" placeholder="">

                        <input class="appearance-none border-none border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $product->description }}" id="description" name="description"  type="hidden" placeholder="">

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                        <button class="shadow bg-gray-200 hover:bg-purple-400 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit" >
                            Add to cart
                        </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

</x-app-layout>
