<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <link rel="stylesheet" href="{{ asset('css/materialaid.css') }}">

    
<div class="p-6 max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 dark:bg-gray-900 text-white">
        <!-- Profile Card -->
        <div class="bg-white text-black p-4 rounded-2xl shadow col-span-1 dark:bg-gray-900 text-white ">
            @php
                $name = explode(" ", $user->name);
            @endphp
            <h2 class="text-xl font-semibold mb-2 capitalize">Welcome, {{ $name[1] ?? $name[0] ?? '' }}</h2>
            <br><br>
            <p>Email: {{ $user->email }}</p>
            <br><br>
            <p class="mt-2 font-bold">Total Points: <span class="text-green-600">{{ $user->points }}</span></p>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white text-black p-4 rounded-2xl shadow col-span-2 dark:bg-gray-900 text-white">
            <h2 class="text-xl font-semibold mb-4"> LESSON PROGRESS ({{$user->lesson_progress}})</h2>

            <ul>
                    <li class="flex justify-between border-b py-2">
                        <span> <b>Prev:</b>  </span>
                        <span class="dark:text-blue-500"> <a href="/viewmaterial/{{$prev_material->learning_cycle}}">    {{ $prev_material->material_title }}  </a>    </span>
                    </li>

                    <li>
                        <span class="flex justify-between border-b py-2">
                            <span> <b>Current:</b>  </span>
                            <span class="text-green-500"> <b> <a href="#full_material"> {{ is_null($material) ? 'Review' :  $material->material_title  }}   </a></b>  </span>
                        </span>
                    </li>

                    <li class="flex justify-between border-b py-2">
                        <span> <b>Next:</b>  </span>
                        <span class="text-gray-500"> &#128274;  {{ $next_material->material_title }}</span>
                    </li>
            </ul> 

            <br>
            <h1 class ="text-center "> 
                <button onclick="document.getElementById('material_list').classList.remove('hidden')" class="px-4 py-2 dark:text-blue-20 rounded">
                    View all
                </button>
            </h1>

            <div id="material_list" class="hidden fixed inset-0 bg-white bg-opacity-50 flex items-center justify-center z-50 dark:bg-gray-900 text-gray-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full dark:bg-gray-900 text-white">
                    <h3 class="text-lg font-semibold mb-4">Table of contents</h3>
                    <ul class="list-disc ml-6">
                        @foreach ($material_titles as $learning_cycle => $material_title)
                            @if ($learning_cycle <= $user->lesson_progress)
                                <li class="text-black-500"><a href="viewmaterial/{{$learning_cycle}}" >{{ $material_title }}</a></li>
                                
                            @else
                                <li class="text-black-500 dark:bg-gray-900 text-white">  &#128274;   {{ $material_title }} </li>
                            @endif
                        @endforeach
                    </ul>
                    <button onclick="document.getElementById('material_list').classList.add('hidden')"  class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Close</button>
                </div>

            </div>

        </div>
    </div>

    <!-- Available Courses -->
    @if ($user->lesson_progress == 0)
        <div class="bg-white text-black p-4 rounded-2xl shadow mt-6 dark:bg-gray-900 dark:text-white">

                <h2 class="text-xl font-semibold mb-4">Welcome to web3 for crypto class</h2>

             <x-introandrules />
            
        </div>
        

       
    @else    
    <div class="bg-white text-black p-6 rounded-2xl dark:bg-gray-900 text-gray-100 shadow mt-6">
        <h2 class="text-xl text-red font-semibold mb-4">NEXT LESSON</h2>
        <div>
           
             <h4 id="full_material"  class="text-xl dark:bg-gray-900 dark:text-green-500 font-semibold mb-4"> {{$material->material_title}} <hr> </h4>
                <br>
                <div id="materialviewbox" class=" bg-white text-black dark:bg-gray-900 text-gray-400" >
                    
                    {{-- {!! $material->material !!} --}}

                    <x-materialview/>
                </div>
              
        </div>
        @if($material->lesson_video)
            <div class="w-full max-w-2xl mx-auto mt-6">
                <h3 class=" bg-white text-black     dark:bg-gray-900 text-gray-400"><b> &rarrhk; Watch this for more understanding... </b></h3>
                <iframe
                    width="100%"
                    height="360"
                     src="https://www.youtube.com/embed/YOUTUBE_VIDEO_ID" 
                    title="YouTube video"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
             </div>
        @endif

<hr class="b-2 border-gray-400 my-6">

             

        <br><br>



                <h2 class="text-xl text-red-500 font-semibold mb-4">PRACTISE QUESTIONS ( Answer all)</h2>
                <ul class="list-disc  bg-white text-black ml-6 dark:bg-gray-900 text-gray-400">
                    {{-- <li>Complete the lesson to unlock the next one.</li> --}}
                    <li>Answer all questions correctly.</li>
                    <li>For all wrong answer, watch Ads to continue.</li>
                </ul>
                <hr class="b-2 border-gray-300 my-6">


        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                
            <form action="/question" id="ajaxForm" method="POST" class="bg-white text-black p-4 rounded shadow grid grid-cols-1 md:grid-cols-3 gap-4 dark:bg-gray-900 text-gray-400">
                      @csrf        
                @foreach ($questions as $item)  
                    <div class="p-4 border-b border-gray-300 md:border-b-0 md:border-l md:border-gray-300 ">
                        @php
                        $q_count = $loop->iteration;
                        @endphp

                    <span><b> {{$q_count}}. {{$item->question}} </b> </span>
                    <br><br>


                    <ol type="A" class="list-[upper-alpha] ml-6 space-y-4">
                             @php
                             $lesson_answer  = [$item->option_1, $item->option_2, $item->option_3, $item->answer];
                              static $i = 1;
                              shuffle($lesson_answer);
                             @endphp
                        @foreach ( $lesson_answer  as $options)
                       
                            <li>
                               <label for="{{$i}}"> <input type="radio" class="dark:bg-gray-300 text-green-400" name="question_{{$item->id}}" id="{{$i}}" value="{{$options}}" required> {{$options}}</label>
                            </li>  
                            @php
                              $i++;
                             @endphp
                            @endforeach
                    </ol>
                    <br><br>
                    </div>
                        
            @endforeach
             <br>
             @if($user->ads_to_play == 0)
                 
                    <button type="submit" id="testsubmitbutton" class="bg-blue-600 text-white px-10 py-2 rounded hover:bg-blue-700">
                        Submit &#8594;

                    </button>

            @else 
                    <div>
                        <p>  You failed  <b> {{$user->ads_to_play}} </b> test question(s), and must watch <b> {{$user->ads_to_play}} </b> ads to continue. </p>
                        <button type="button" id="testsubmitbutton" class="bg-blue-600 text-white px-10 py-2 rounded hover:bg-blue-700">
                        Watch Ads to continue&#8594;
                    </button>
                    </div>
            @endif

                    
             </form>

        </div>

        <div id="responsediv">
            <x-popup 
                id="welcomePopup"
                title="Welcome!"
                message="Take corrections if any...happy learning!"
            />
  </div>
    </div>
    @endif


{{-- js Ajax code incoming

--}}
 <script>
    document.getElementById('ajaxForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);

        // Set CSRF token header
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onreadystatechange = function () {

            if (xhr.readyState === 4) {
                const responseDiv = document.getElementById('responsediv');


                if (xhr.status === 200) 
            {
                        const data = JSON.parse(xhr.responseText);
                        const btn = document.getElementById('testsubmitbutton');
                        // Change the button type
                        btn.type = 'button';

                        /////returning all radios to normal colours before a response
                         document.querySelectorAll('input[type="radio"]').forEach(radio => {
                            radio.style.accentColor = 'black';
                            radio.parentElement.style.color = 'black'; // Reset the color of the parent element
                        });

                                 // making the checked input elements red.
                                const checkedRadios = form.querySelectorAll('input[type="radio"]:checked');
                                checkedRadios.forEach(radio => {
                                    radio.style.accentColor = 'red'; // Change the color of the radio button
                                    radio.parentElement.style.color = 'red'; // Change the color of the parent element
                                    radio.disabled = true; // Disable the radio button
                                });

                                 Object.entries(data.id_and_answers).forEach(([id, the_answer]) => {
                                        
                                   /////making the right answers color green
                                    const answers = form.querySelector(`input[value="${the_answer}"]`); 
                                    answers.style.color = 'green';     
                                    answers.style.accentColor = 'green'; 
                                    answers.style.backgroundColor = 'green'; 
                                    answers.parentElement.style.color = 'green'; 
                                    answers.parentElement.style.fontWeight = 'bold'; 
                                    if (data.ads_to_play == 0) 
                                    {   // appends ✔ to the label's text
                                        answers.parentElement.innerHTML += ' ✔'; 
                                    } 
                                    

                            });
                    if (data.score==6) {
                         showPopup('welcomePopup', `You answered ${data.score} out of 6 questions correctly and earned ${data.score * 5} points!`);
                         btn.innerHTML = 'Continue to next lesson';
                         btn.onclick = function () { location.reload();};

                    }
                    else
                    {
                        showPopup('welcomePopup', `You answered ${data.score} out of 6 questions correctly and earned ${data.score * 5} points! <br> <br> Watch ${6 - data.score} ads to continue!`);
                        btn.innerHTML = 'Watch Ads';
                    }

                   

                } else {
                    responseDiv.innerHTML = `<p style="color: red;">An error occurred.</p>`;
                    console.error('Server response:', xhr.responseText);
                }
            }
        };

        xhr.send(formData);
    });
    </script> 


</div>
{{-- @endsection --}}

</x-app-layout>
