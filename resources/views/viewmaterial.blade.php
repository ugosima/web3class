 


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Material') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                      @if($view_id > 0 )
                     {{-- Assuming the learning cycle IDs are sequential and start from 1 --}}
                     {{-- Adjust the logic if your IDs are not sequential or have gaps --}}
                    
                     @php
                    
                     $prev_material=  $view_id - 1 ;
                     $next_material= $view_id + 1;
                    @endphp
                <div class="dark:bg-gray-900 dark:text-gray-400 p-5">
                     <div class="flex justify-between mt-4">
                        {{-- Previous and Next buttons --}}

                            <div>
                            <a href="/viewmaterial/{{$prev_material}}" > <button class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            Previous
                            </button>
                            </a>
                            </div>

                            <div>
                                <h1 class ="text-center "> 
                                    <button onclick="document.getElementById('material_list').classList.remove('hidden')" class="px-4 py-2 dark:text-blue-20 rounded">
                                        View all
                                    </button>
                                </h1>
                             <x-materiallist  :titles="$material_titles" :user="$user"/>

                            </div>


                           <div>
                            <a href="/viewmaterial/{{$next_material}}" > <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            Next
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            </button>
                            </a>
                            </div>



                     </div>
                </div>


                <div class="p-3 dark:bg-blue-500 dark:text-black">
                    <h1 class="text-2xl font-bold mb-4"> <u> <b> LESSON {{$view_id}} : </b> </u> &nbsp; {{ $material->material_title }}</h1>
                </div>   



                <div class="p-6 dark:bg-gray-900 dark:text-gray-400">
                    {{-- {{$material->material}} --}}

                     {!! $material->material !!}
                     <br>
                   

                     

                       

                    
                     <div class="flex justify-between mt-4">
                        {{-- Previous and Next buttons --}}

                            <div>
                            <a href="/viewmaterial/{{$prev_material}}" > <button class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            Previous
                            </button>
                            </a>
                            </div>


                           <div>
                            <a href="/viewmaterial/{{$next_material}}" > <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            Next
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            </button>
                            </a>
                            </div>



                     </div>

                     @else
                    <x-introandrules />

                @endif

                </div>

            </div>

        </div>

    </div>


</x-app-layout>