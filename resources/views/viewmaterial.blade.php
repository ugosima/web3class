 


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Material') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ $material->material_title }}</h1>
                </div>   



                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- {{$material->material}} --}}

                     {!! $material->material !!}
                </div>

            </div>

        </div>

    </div>


</x-app-layout>