 


<x-app-layout>
     <x-slot name="title">
        LESSON 
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

            <link rel="stylesheet" href="{{ asset('css/materialaid.css') }}">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-5">
            <h2>
                <a href="{{ route('dashboard') }}"> <span class="text-red-500 font-bold ">&#8592;</span> DASHBOARD </a>
            </h2>
        </div>
       

    <div class="py-12 pt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                @if($view_id > 0 )
                {{-- Assuming the learning cycle IDs are sequential and start from 1 --}}
                {{-- Adjust the logic if your IDs are not sequential or have gaps --}}
            
                     @php                   
                        $prev_material=  $view_id - 1 ;
                        if ($prev_material < 1) {
                            $prev_material = 1; // Ensure it doesn't go below 1
                        }
                        $next_material= $view_id + 1;
                     @endphp

                    @if (session('error'))

                        <x-popup 
                            id="statusPopup" 
                            title="Notice" 
                            :message="session('error')" 
			            />
                    @endif



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


                <div class="p-2 dark:bg-blue-300 dark:text-black">
                    <h3 class="text-xl font-semibold mb-2"> LESSON {{$view_id}} : &nbsp; <span class="uppercase"> {{ $material->material_title }} </span></h3>
                </div>   



                <div id="material-reading-theme" class="dark"> 
                    <div class="pl-2 md:pl-6 pr-1 pt-4 py-2 rounded-2xl shadow-lg mt-6 bg-gray-900       dark:bg-white">
                        <div class="flex justify-end">
                            {{-- button to toggle reading background --}}
                            <x-togglebutton />
                        </div>

                        <div id="materialviewbox" class=" max-w-none mb-8 text-slate-300 dark:text-gray-800 leading-relaxed">
                                {{-- {!! $material->material !!} --}}
                                @php
                                    $component = 'lessonmaterials.' . $lessondir;
                                @endphp
                                <x-dynamic-component :component="$component" />
                            </div>

                             @if ($material->lesson_video && $material->lesson_video != '')
                            <div class="w-full max-w-2xl mx-auto mt-8">
                                <x-youtube id="{{ $material->lesson_video }}" />
                            </div>
                            @endif

                    </div>

                </div>

                <div id="material-reading-theme" class="dark pl-2 bg-gray-900 text-gray-300"> 
                    
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

        @vite('resources/js/toggledark.js')


</x-app-layout>