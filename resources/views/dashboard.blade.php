<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <x-slot name="title">DASHBOARD</x-slot>

    <link rel="stylesheet" href="{{ asset('css/materialaid.css') }}">

    <div class="p-6 max-w-7xl mx-auto">
         <h2 class="font-bold text-2xl text-white leading-tight">
            {{ __('DASHBOARD') }}
        </h2>
    </div>
    <div id="dashboardPage" class="p-6 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl shadow-lg bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 hover:shadow-xl transition col-span-1">
                @php
                    $name = explode(' ', $user->name);

                    if ($user->lesson_progress > 1) {

                        $tpv =  (($user->lesson_progress - 1) / $highest_cycle) * $user->points ;
                    }
                    else {
                        $tpv = 0;
                    }
                @endphp

                <h2 class="text-2xl font-bold mb-4 capitalize"> <span class="text-gray-200"> Welcome, {{ $name[1] ?? $name[0] ?? '' }}! </span></h2>

                <div class="space-y-4 text-gray-800 dark:text-gray-200">
                    <div class="flex items-center justify-between p-3 bg-slate-800 rounded-lg border border-slate-200 border-slate-700">
                        <span class="text-gray-200 font-medium">Email:</span>
                        <span class="text-gray-200 font-semibold">{{ $user->email }}</span>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-1 p-3 bg-slate-800 rounded-lg border border-slate-700">
                            <p class="text-xs text-slate-400 font-medium mb-1">Points</p>
                            <p class="text-2xl font-bold text-emerald-600">{{ $user->points }}</p>
                        </div>
                        <div class="flex-1 p-3 bg-slate-800 rounded-lg border border-slate-700">
                            <p class="text-xs text-slate-400 font-medium mb-1">Total PV</p>
                            <p class="text-2xl font-bold text-slate-100">{{ number_format($tpv, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-2xl shadow-lg bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 hover:shadow-xl transition col-span-1 md:col-span-2">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-white">LESSON PROGRESS</h2>
                    <span class="inline-block bg-emerald-600 text-gray-200 px-3 py-1 rounded-full text-sm font-semibold">Lesson {{ $user->lesson_progress }}</span>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center justify-between p-4 bg-slate-800 rounded-lg border-l-4 border-slate-400">
                        <span class="font-semibold text-slate-300">Previous:</span>
                        @if ($prev_material)
                            <a href="/viewmaterial/{{ $prev_material->learning_cycle }}" class="text-emerald-600 hover:text-emerald-700 font-medium hover:underline">{{ $prev_material->material_title }}</a>
                        @else
                            <span class="text-slate-500 font-medium">None</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-800 rounded-lg border-l-4 border-emerald-500">
                        <span class="font-semibold text-slate-300">Current:</span>
                        <a href="#full_material" class="text-emerald-600 hover:text-emerald-700 font-medium hover:underline">{{ is_null($material) ? 'Review' : $material->material_title }}</a>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-800 rounded-lg border-l-4 border-slate-300">
                        <span class="font-semibold text-slate-300">Next:</span>
                        <span class="text-slate-500 font-medium">{{ $next_material->material_title ?? 'Completed' }}</span>
                    </div>
                </div>

                <button onclick="document.getElementById('material_list').classList.remove('hidden')" class="mt-6 w-full px-4 py-3 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-lg transition transform hover:scale-105">
                    View All Lessons
                </button>

                <x-materiallist :titles="$material_titles" :user="$user" />
            </div>
        </div>

        @if ($user->lesson_progress == 0)
            <div class="p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 shadow-lg mt-6 text-white border border-emerald-500/30">
                <div class="mb-4">
                    <div class="inline-block bg-emerald-500/20 border border-emerald-400/40 rounded-full px-4 py-2 mb-6">
                        <span class="text-emerald-300 text-sm font-semibold">Welcome to Web3 Learning</span>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Welcome to Web3 for <span class="text-emerald-400">Crypto Class</span></h2>
                </div>

                <x-introandrules /> 
            </div>
        @else
            <div id="material-reading-theme"> 
            <div class="p-8 rounded-2xl shadow-lg mt-6 bg-slate-800 border border-slate-700     dark:bg-white">
                <div >
                    <div class="reader-focused  bg-gray-800  dark:bg-white   dark:text-gray-900 p-6 rounded-lg">
                        <h2 class="text-2xl font-bold text-white border-b-2 border-b-gray-400 dark:text-gray-800 dark:border-b-2 mb-2 dark:border-b-gray-600" id="next_lesson" >NEXT LESSON</h2>
                        <div class="flex justify-end">

                            {{-- button to toggle reading background --}}
                            <x-togglebutton />

                        </div>


                        @if ($material)
                            <h1 id="full_material" class="text-3xl font-bold text-emerald-400 mb-6">{{ $material->material_title }}</h1>

                            <div id="materialviewbox" class=" max-w-none mb-8 text-slate-300 dark:text-gray-800 leading-relaxed">
                                {{-- {!! $material->material !!} --}}
                                @php
                                    $component = 'lessonmaterials.' . $lessondir;
                                @endphp

                                <x-dynamic-component :component="$component" />

                                {{-- <x-materialview/> --}}
                            </div>

                            @if ($material->lesson_video)
                                <div class="w-full max-w-2xl mx-auto mt-8">
                                    <p class="text-slate-400 font-semibold mb-4">Watch this for more understanding...</p>
                                    <iframe
                                        width="100%"
                                        height="360"
                                        src="https://www.youtube.com/embed/YOUTUBE_VIDEO_ID"
                                        title="YouTube video"
                                        frameborder="0"
                                        allowfullscreen
                                        class="rounded-lg shadow-md">
                                    </iframe>
                                </div>
                            @endif
                        @endif
                    </div>
                

                <div class="border-t border-slate-200 dark:border-slate-800 dark:bg-gray-300 my-8 "></div>

                <h2 class="text-2xl font-bold text-gray-200 dark:text-red-500  mb-4">PRACTICE QUESTIONS</h2>
                <p class="text-slate-400 dark:text-slate-700 font-medium mb-4">Answer all questions correctly to progress to the next lesson.</p>

                <ul class="space-y-2 mb-6 text-slate-400 dark:text-slate-800">
                    <li class="flex items-center gap-2"><span class="text-emerald-400 font-bold">&check;</span> Answer all questions correctly.</li>
                    <li class="flex items-center gap-2"><span class="text-emerald-400 font-bold">&check;</span> For each wrong answer, watch an ad to continue.</li>
                </ul>

                <div class="border-t border-slate-200 dark:border-slate-800 my-8"></div>

                <form action="/question" id="ajaxForm" method="POST" class="p-4 rounded shadow grid grid-cols-1 md:grid-cols-3 gap-4 dark:bg-gray-900 dark:text-gray-400">
                    @csrf

                    @foreach ($questions as $item)
                        @php
                            $q_count = $loop->iteration;
                            $lesson_answer = [$item->option_1, $item->option_2, $item->option_3, $item->answer];
                            shuffle($lesson_answer);
                        @endphp

                        <div class="p-5 border-2 border-slate-700 rounded-lg bg-slate-800 dark:bg-white hover:border-gray-600 transition q_box" id="question_{{ $item->id }}">
                            <h3 class="font-bold text-gray-300 dark:text-gray-800 mb-4 text-lg">{{ $q_count }}. {{ $item->question }}</h3>

                            <div class="space-y-3">
                                @foreach ($lesson_answer as $options)
                                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-600 dark:hover:bg-green-500/50 cursor-pointer transition">
                                        <input type="radio" class="w-5 h-5 text-emerald-600 accent-emerald-600" name="question_{{ $item->id }}" value="{{ $options }}" required>
                                        <span class="text-slate-300 dark:text-gray-700 font-medium">{{ $options }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="col-span-1 md:col-span-3 flex gap-4">
                        @if ($user->ads_to_play == 0)
                            <button type="submit" id="testsubmitbutton" class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-lg font-bold transition transform hover:scale-105 duration-300 shadow-lg shadow-emerald-500/30">
                                Submit &check;
                            </button>
                        @else
                            <div class="flex-1">
                                <p class="text-slate-700 dark:text-slate-300 font-semibold mb-4">You got <span class="text-red-600 font-bold">{{ $user->ads_to_play }}</span> question(s) wrong. Watch <span class="text-red-600 font-bold">{{ $user->ads_to_play }}</span> ad(s) to continue.</p>
                                <button type="button" id="testsubmitbutton" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-lg font-bold transition transform hover:scale-105 duration-300 shadow-lg shadow-emerald-500/30">
                                    Watch Ads &rarr;
                                </button>
                            </div>
                        @endif
                    </div>
                </form>

                <div id="responsediv">
                    <x-popup
                        id="welcomePopup"
                        title="Welcome!"
                    />
                </div>

                        </div>
                 </div>
             </div>
        @endif
    </div>

    <script>



            const readerThemeStorageKey = 'readerTheme';

            function getStoredReaderTheme() {
                const storedTheme = localStorage.getItem(readerThemeStorageKey);

                return ['light', 'dark'].includes(storedTheme) ? storedTheme : 'light';
            }

            function applyReaderTheme(theme) {
                const readerTheme = document.getElementById('material-reading-theme');
                const themeToggle = document.querySelector('[data-reader-theme-toggle]');
                // const themeLabel = document.getElementById('theme-label');

                if (!readerTheme) {
                    return;
                }

                const isDark = theme === 'dark';
                readerTheme.classList.toggle('dark', isDark);
                themeToggle?.setAttribute('aria-pressed', isDark ? 'true' : 'false');

                // if (themeLabel) {
                //     themeLabel.textContent = isDark ? 'Reader Dark' : 'Reader Light';
                // }

            }

            applyReaderTheme(getStoredReaderTheme());

            function toggleDark() {
                const readerTheme = document.getElementById('material-reading-theme');

                if (!readerTheme) {
                    return;
                }

                const nextTheme = readerTheme.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem(readerThemeStorageKey, nextTheme);
                applyReaderTheme(nextTheme);
            }



        const ajaxForm = document.getElementById('ajaxForm');

        if (ajaxForm) {
            ajaxForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', form.action, true);

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState !== 4) {
                        return;
                    }

                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        const btn = document.getElementById('testsubmitbutton');
                        btn.type = 'button';

                        document.querySelectorAll('input[type="radio"]').forEach(radio => {
                            radio.style.accentColor = '#9ca3af';
                            radio.parentElement.style.color = '#9ca3af';
                        });

                        const checkedRadios = form.querySelectorAll('input[type="radio"]:checked');
                        checkedRadios.forEach(radio => {
                            radio.style.accentColor = 'red';
                            radio.parentElement.style.color = 'red';
                            radio.disabled = true;
                        });

                        Object.entries(data.id_and_answers).forEach(([id, the_answer]) => {
                            const divId = 'question_' + id;
                            const answers = document.querySelector(`#${divId} input[value="${the_answer}"]`);

                            if (!answers) {
                                return;
                            }

                            answers.style.accentColor = '#10b981';
                            answers.parentElement.style.color = '#059669';
                            answers.parentElement.style.fontWeight = 'bold';
                            answers.parentElement.style.backgroundColor = '#d1fae5';

                            if (data.ads_to_play == 0) {
                                answers.parentElement.innerHTML += ' &check;';
                            }
                        });

                        if (data.score == 6) {
                            showPopup('welcomePopup', `You answered ${data.score} out of 6 questions correctly!`);
                            btn.innerHTML = 'Continue to next lesson';
                            btn.onclick = function () {
                                localStorage.setItem('scrollTo', 'material-reading-theme');
                                location.reload();
                                };       
                           } else {
                            showPopup('welcomePopup', `You answered ${data.score} out of 6 questions correctly! <br> <br> Watch ${6 - data.score} ads to continue!`);
                            btn.innerHTML = 'Watch Ads';
                        }
                    } else {
                        console.error('Server response:', xhr.responseText);
                    }
                };

                xhr.send(formData);
            });
        }


        function scrollToTopElement() {
                const id = localStorage.getItem('scrollTo');
                if (id) {
                    const el = document.getElementById(id);
                    console.log('Found scrollTo id in localStorage:', id);

                    if (el) {
                        el.scrollIntoView({ behavior: 'smooth' });
                        console.log('Scrolled to element with id:', id);
                    }
                     localStorage.removeItem('scrollTo');
                     console.log('Removed scrollTo from localStorage');
                }

                else
                {
                    console.log('No scrollTo id found in localStorage');
                }
            }

        document.addEventListener('DOMContentLoaded', function () {
    
            scrollToTopElement();
});


       
    </script>
</x-app-layout>
