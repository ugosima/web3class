<x-app-layout>
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/materialaid.css') }}">
        

    @endpush
    
    <x-slot name="title">DASHBOARD</x-slot>

    @php
        $name = explode(' ', $user->name);
        $displayName = $name[1] ?? $name[0] ?? '';
        $safeHighestCycle = max((int) $highest_cycle, 1);
        $completedLessons = max((int) $user->lesson_progress - 1, 0);
        $lessonProgressPercent = min(100, round(($completedLessons / $safeHighestCycle) * 100));

        if ($user->lesson_progress > 1) {
            $tpv =  (($user->lesson_progress - 1) / $safeHighestCycle) * $user->points ;
        }
        else {
            $tpv = 0;
        }

        // $referrals = $referrals ?? collect();
        $referrals = $user->referrals()->get();
        $referralLink = $referralLink ?? null;
    @endphp

    <div id="dashboardPage" class="max-w-7xl mx-auto px-4 py-6 sm:px-6">
        <section class="relative overflow-hidden rounded-2xl border border-emerald-400/20 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 shadow-2xl shadow-emerald-500/20">
            <div class="absolute inset-0 opacity-[0.08]" style="background-image: radial-gradient(circle at 18% 22%, #34d399 0 2px, transparent 3px), radial-gradient(circle at 78% 25%, #34d399 0 2px, transparent 3px), radial-gradient(circle at 65% 72%, #34d399 0 2px, transparent 3px); background-size: 120px 120px;"></div>
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-emerald-500/10 blur-3xl"></div>
            <div class="absolute -bottom-28 left-16 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>

            <div class="relative">
                <div class="p-5 sm:p-8">
                    <div class="mb-8 flex flex-col gap-4 border-b border-white/10 pb-6 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-3xl font-black uppercase tracking-wide text-white md:text-4xl">
                                Welcome back, {{ $displayName }}!
                            </h2>
                            <p class="mt-2 text-sm font-semibold uppercase text-slate-400">
                                Level: Learner <span class="text-slate-600">|</span> Progress:
                                <span class="text-emerald-300">{{ $lessonProgressPercent }}%</span>
                            </p>
                        </div>

                        <div class="flex items-center gap-4 rounded-xl bg-slate-950/50 px-4 py-3 ring-1 ring-white/10">
                            <div class="text-right">
                                <p class="text-sm font-black uppercase text-white">{{ $user->name }}</p>
                                <p class="text-xs text-slate-400">{{ $user->email }}</p>
                            </div>
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-400 text-lg font-black uppercase text-slate-950 ring-2 ring-white/20">
                                {{ strtoupper(substr($displayName, 0, 1)) }}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                        <div>
                            <p class="mb-3 text-sm font-semibold uppercase tracking-wide text-white">User Stats</p>
                            <div class="rounded-xl border border-emerald-300/20 bg-slate-900/70 p-5 shadow-xl shadow-slate-950/30">
                                <div class="mb-5 flex items-center gap-3">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-400/15 text-lg font-black uppercase text-emerald-300 ring-1 ring-emerald-300/30">
                                        {{ strtoupper(substr($displayName, 0, 1)) }}
                                    </div>
                                    <p class="text-xl font-black uppercase text-white">{{ $user->name }}</p>
                                </div>

                                <p class="text-xs font-semibold uppercase text-slate-300">TOTAL PV :</p>
                                <p class="mb-4 text-4xl font-black text-emerald-400">{{ number_format($tpv, 2) }} <span class="text-xs">+ {{ number_format($user->referral_points) }}</span>  </p>

                                <div class="mb-2 flex items-center justify-between text-xs font-semibold text-white">
                                    <span>Points available :</span>
                                    <span>{{ number_format($user->points) }}</span>
                                </div>
                                <div class="h-2 overflow-hidden rounded-full bg-slate-700">
                                    <div class="h-full rounded-full bg-emerald-400" style="width: {{ $lessonProgressPercent }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="h-full rounded-xl border border-emerald-300/20 bg-slate-900/70 p-5 shadow-xl shadow-slate-950/30">
                                <div class="mb-4 flex items-center justify-between gap-3">
                                    <div>
                                        <p class="text-xs font-semibold uppercase text-slate-300">Referral Code</p>
                                        <p class="mt-1 break-all text-lg font-black text-emerald-300">{{ $user->referral_code ?? 'Not generated' }}</p>
                                    </div>
                                    <div class="rounded-lg bg-emerald-400/15 px-3 py-2 text-center ring-1 ring-emerald-300/25">
                                        <p class="text-2xl font-black text-white">{{ $referrals->count() }}</p>
                                        <p class="text-[10px] font-bold uppercase text-emerald-300">Referrals</p>
                                    </div>
                                </div>

                                @if ($referralLink)
                                    <div class="mb-4 rounded-lg border border-white/10 bg-slate-950/70 p-3">
                                        <p class="break-all text-xs font-semibold text-slate-300" id="referralLinkText">{{ $referralLink }}</p>
                                        <button
                                            type="button"
                                            onclick="copyReferralLink()"
                                            class="mt-3 inline-flex w-full items-center justify-center rounded-lg bg-emerald-400 px-3 py-2 text-xs font-black uppercase text-slate-950 transition hover:bg-emerald-300"
                                        >
                                            Copy Link
                                        </button>
                                    </div>
                                @endif

                                <button
                                    type="button"
                                    onclick="openReferralModal()"
                                    class="inline-flex w-full items-center justify-center rounded-lg border border-emerald-300/30 bg-slate-950/80 px-3 py-2 text-xs font-black uppercase text-white transition hover:bg-emerald-400 hover:text-slate-950"
                                >
                                    View Referrals
                                </button>
                            </div>
                        </div>

                        <div>
                                
                    <p class="text-sm  uppercase font-bold text-white">Unlocked Demos</p>

                    <div class="mt-3 rounded-xl border border-emerald-300/20 bg-slate-900/70 p-5 shadow-xl shadow-slate-950/30">

                    <ol class="list-none space-y-2 p-0 m-0">

    {{-- metamask demo --}}
    @if ($user->lesson_progress >= 12)

        <li class="py-2">
            <a href="{{ route('demo','metamask-demo') }}"
               class="inline-flex items-center gap-2 rounded-lg border-2 border-emerald-400 px-2 py-2 text-xs text-emerald-400 hover:bg-emerald-500/10">
                Metamask expo Demo
                <i class="fa-solid fa-lock-open text-yellow-500"></i>
            </a>
        </li>

    @else

        <li class="relative w-fit py-2">

            <span tabindex="0"
                  class="peer inline-flex items-center gap-2 rounded-lg border-2 border-slate-400 px-2 py-2 text-xs text-slate-400 focus:outline-none">
                Metamask expo Demo
                <i class="fa-solid fa-lock text-yellow-500"></i>
            </span>

            <p class="pointer-events-none absolute left-1/2 top-0 z-50 w-max -translate-x-1/2 -translate-y-full rounded-lg bg-white px-4 py-2 text-sm text-black opacity-0 transition duration-200
                      peer-hover:opacity-100 peer-focus:opacity-100">
                Reach lesson <b class="text-red-500">12</b> to unlock this demo
            </p>

        </li>

    @endif


    {{-- placing orders demo --}}
    @if ($user->lesson_progress >= 18)

        <li class="py-2">
            <a href="{{ route('demo','placing-orders') }}"
               class="inline-flex items-center gap-2 rounded-lg border-2 border-emerald-400 px-2 py-2 text-xs text-emerald-400 hover:bg-emerald-500/10">
                Placing orders on CEX
                <i class="fa-solid fa-lock-open text-yellow-500"></i>
            </a>
        </li>

    @else

        <li class="relative w-fit py-2">

            <span tabindex="0"
                  class="peer inline-flex items-center gap-2 rounded-lg border-2 border-slate-400 px-2 py-2 text-xs text-slate-400 focus:outline-none">
                Placing orders on CEX
                <i class="fa-solid fa-lock text-yellow-500"></i>
            </span>

            <p class="pointer-events-none absolute left-1/2 top-0 z-50 w-max -translate-x-1/2 -translate-y-full rounded-lg bg-white px-4 py-2 text-sm text-black opacity-0 transition duration-200
                      peer-hover:opacity-100 peer-focus:opacity-100">
                Reach lesson <b class="text-red-500">18</b> to unlock this demo
            </p>

        </li>

    @endif

</ol>
                    </div>


                </div>
                           
                </div>

                        <div>
                            <div class="mb-3 flex items-center justify-between gap-3">
                                <p class="text-sm font-semibold uppercase tracking-wide text-white">Current Lesson</p>
                                <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs font-bold uppercase text-emerald-300 ring-1 ring-emerald-300/25">Lesson {{ $user->lesson_progress }}</span>
                            </div>

                            <div class="rounded-xl border border-emerald-300/20 bg-slate-900/70 p-5 shadow-xl shadow-slate-950/30">
                                <div class="grid gap-5 md:grid-cols-[166px_1fr] md:items-center">
                                    <div class="flex aspect-square items-center justify-center rounded-lg bg-gradient-to-br from-emerald-400/30 to-emerald-950 text-emerald-300 shadow-lg shadow-emerald-950/30">
                                        <i class="fa-solid fa-shield-halved text-6xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-black uppercase leading-tight text-white">
                                            {{ is_null($material) ? 'Getting Started' : $material->material_title }}
                                        </h3>
                                        <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-300">
                                            Continue your Web3 learning path and complete the practice questions to unlock the next lesson.
                                        </p>

                                        <div class="mt-6 grid gap-4 sm:grid-cols-[1fr_auto] sm:items-end">
                                            <div>
                                                <div class="mb-2 flex items-center justify-between text-xs font-semibold uppercase text-white">
                                                    <span>Progress</span>
                                                    <span>{{ $lessonProgressPercent }}%</span>
                                                </div>
                                                <div class="h-2 overflow-hidden rounded-full bg-slate-700">
                                                    <div class="h-full rounded-full bg-emerald-400" style="width: {{ $lessonProgressPercent }}%"></div>
                                                </div>
                                            </div>
                                            <a href="#full_material" class="inline-flex items-center justify-center rounded-lg bg-emerald-400 px-6 py-3 text-sm font-black uppercase text-slate-950 transition hover:bg-emerald-300">
                                                Continue Lesson
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div>
                                    <p class="mb-3 text-sm font-semibold uppercase tracking-wide text-white">Previous Lesson</p>
                                    <div class="rounded-xl border border-white/10 bg-slate-900/70 p-4">
                                        <div class="flex gap-4">
                                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-lg bg-emerald-400/15 text-emerald-300 ring-1 ring-emerald-300/20">
                                                <i class="fa-solid fa-circle-check text-2xl"></i>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                @if ($prev_material)
                                                    <a href="/viewmaterial/{{ $prev_material->learning_cycle }}" class="block text-lg font-black leading-snug text-white transition hover:text-emerald-300">{{ $prev_material->material_title }}</a>
                                                    <div class="mt-4 flex items-center gap-4">
                                                        <div class="h-2 flex-1 overflow-hidden rounded-full bg-slate-700">
                                                            <div class="h-full rounded-full bg-emerald-400" style="width: 100%"></div>
                                                        </div>
                                                        <span class="text-sm font-black text-white">100%</span>
                                                    </div>
                                                @else
                                                    <p class="text-lg font-black text-white">No previous lesson</p>
                                                    <p class="mt-2 text-sm text-slate-400">Start here and build momentum.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <p class="mb-3 text-sm font-semibold uppercase tracking-wide text-white">Next Lesson</p>
                                    <div class="rounded-xl border border-white/10 bg-slate-900/70 p-4">
                                        <div class="flex gap-4">
                                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-lg bg-emerald-400/15 text-emerald-300 ring-1 ring-emerald-300/20">
                                                <i class="fa-solid fa-lock text-xl text-slate-500"></i>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-lg font-black leading-snug text-white">{{ $next_material->material_title ?? 'Completed' }}</p>
                                                <div class="mt-4 flex items-center gap-4">
                                                    <div class="h-2 flex-1 overflow-hidden rounded-full bg-slate-700">
                                                        <div class="h-full rounded-full bg-emerald-400" style="width: 0%"></div>
                                                    </div>
                                                    <span class="text-sm font-black text-white">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button onclick="document.getElementById('material_list').classList.remove('hidden')" class="mt-6 w-full rounded-lg border border-emerald-300/30 bg-slate-950/80 px-4 py-3 font-bold text-white transition hover:bg-emerald-400 hover:text-slate-950">
                                View All Lessons
                            </button>

                            <x-materiallist :titles="$material_titles" :user="$user" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div
            id="referralModal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/80 px-4 py-6 backdrop-blur-sm"
            role="dialog"
            aria-modal="true"
            aria-labelledby="referralModalTitle"
        >
            <div class="w-full max-w-lg overflow-hidden rounded-xl border border-emerald-300/20 bg-slate-900 shadow-2xl shadow-slate-950/60">
                <div class="flex items-center justify-between gap-4 border-b border-white/10 px-5 py-4">
                    <div>
                        <h3 id="referralModalTitle" class="text-lg font-black uppercase text-white">Your Referrals</h3>
                        <p class="mt-1 text-xs font-semibold uppercase text-emerald-300">{{ $referrals->count() }} total</p>
                    </div>
                    <button
                        type="button"
                        onclick="closeReferralModal()"
                        class="flex h-9 w-9 items-center justify-center rounded-lg border border-white/10 text-slate-300 transition hover:border-emerald-300/40 hover:bg-emerald-400 hover:text-slate-950"
                        aria-label="Close referrals modal"
                    >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="max-h-[70vh] overflow-y-auto p-5">
                    <div class="space-y-3">
                        @forelse ($referrals as $referral)
                            <div class="rounded-lg border border-white/10 bg-slate-950/60 p-4">
                                <p class="font-black text-white">{{ $referral->name }} ({{$referral->lesson_progress}})</p>
                                <p class="mt-1 truncate text-xs text-slate-400">
                                    {{ substr($referral->email, 0, 4) . '***' . strstr($referral->email, '@') }}
                                </p>
                                <p class="mt-3 text-[11px] font-semibold uppercase text-emerald-300">
                                    Joined {{ optional($referral->created_at)->format('M j, Y') }}
                                </p>
                            </div>
                        @empty
                            <p class="rounded-lg border border-dashed border-slate-600 p-4 text-sm text-slate-400">
                                No referrals yet.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        @if ($user->lesson_progress == 0)
            <div class="p-2 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 shadow-lg mt-6 text-white border border-emerald-500/30">
                <div class="mb-4">
                    <h2 class="text-3xl font-bold mb-4">Welcome to Web3 for <span class="text-emerald-400">Crypto Class</span></h2>
                </div>

                <x-introandrules /> 
            </div>

        @elseif (!$material && ($user->lesson_progress + 1) > $safeHighestCycle)

            <div class="pl-2 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 shadow-lg mt-6 text-white border border-emerald-500/30">
                <x-lessonmaterials.lesson-completion />
            </div>

        @else 
             @if ($material)
            <div id="material-reading-theme" class="dark"> 
                <div class="pl-2 md:pl-6 pr-1 pt-4 py-2 rounded-2xl shadow-lg mt-6 bg-gray-900       dark:bg-white">
                <div >
                    <div class="reader-focused  bg-gray-900 dark:bg-white   dark:text-gray-900  rounded-lg">
                        <h2 class="text-2xl font-bold text-white border-b-2 border-b-gray-400 dark:text-gray-800 dark:border-b-2 mb-2 dark:border-b-gray-600" id="next_lesson" >NEXT LESSON</h2>
                        <div class="flex justify-end">

                            {{-- button to toggle reading background --}}
                            <x-togglebutton />

                        </div>


                            <h1 id="full_material" class="text-3xl font-bold text-emerald-400 mb-6">{{ $material->material_title }}</h1>

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
                

                <div class="border-t border-slate-200 dark:border-slate-800 dark:bg-gray-300 my-8 "></div>
                {{-- Ads player --}}
                
                 <div id="adsbox" class="rounded-lg border border-white/10 bg-slate-950/60 p-4 mb-8">

                 </div>
                 <script src="https://cdn.applixir.com/applixir.app.v6.1.0.js"></script>
        
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

                        <div class="p-5 border-2 border-slate-700 rounded-lg text-gray-400 dark:text-gray-700 bg-slate-800 dark:bg-white hover:border-gray-600 transition q_box" id="question_{{ $item->id }}">
                            <h3 class="font-bold text-gray-300 dark:text-gray-800 mb-4 text-lg">{{ $q_count }}. {{ $item->question }}</h3>

                            <div class="space-y-3">
                                @foreach ($lesson_answer as $options)
                                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-300 hover:text-black dark:hover:bg-green-500/50 cursor-pointer transition">
                                        <input type="radio" class="w-5 h-5 text-emerald-600 accent-emerald-600" name="question_{{ $item->id }}" value="{{ $options }}" required>
                                        <span class="" id="">{{ $options }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="col-span-1 md:col-span-3 flex gap-4">
                        @if ($user->ads_to_play == 0 )
                            <button type="submit" id="testsubmitbutton" class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-lg font-bold transition transform hover:scale-105 duration-300 shadow-lg shadow-emerald-500/30">
                                Submit &check;
                            </button>
                        @else
                            <div class="flex-1">
                                <p class="text-slate-300 font-semibold mb-4">You got <span class="text-red-600 font-bold">{{ $user->ads_to_play }}</span> question(s) wrong. Watch <span class="text-red-600 font-bold">{{ $user->ads_to_play }}</span> ad(s) to continue.</p>
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
        @endif
    </div>

    <script>


        function copyReferralLink() {
            const link = document.getElementById('referralLinkText')?.textContent?.trim();

            if (!link) {
                return;
            }

            if (navigator.clipboard) {
                navigator.clipboard.writeText(link);
                return;
            }

            const input = document.createElement('input');
            input.value = link;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            input.remove();
        }

        function openReferralModal() {
            const modal = document.getElementById('referralModal');

            if (!modal) {
                return;
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeReferralModal() {
            const modal = document.getElementById('referralModal');

            if (!modal) {
                return;
            }

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeReferralModal();
            }
        });

        document.getElementById('referralModal')?.addEventListener('click', function (event) {
            if (event.target === event.currentTarget) {
                closeReferralModal();
            }
        });




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
                           const questionBox = document.getElementById(divId);
                           if (!questionBox) {
                            return;
                        }
                        const answers = [...questionBox.querySelectorAll('input[type="radio"]')]
                        .find(input => input.value === the_answer);
                        
                        if (!answers) {
                             return;
                            }

                            //

                            



                                    const isDarkMode = document.getElementById('material-reading-theme')?.classList.contains('dark');

                                    answers.style.accentColor = '#10b981';
                                    answers.parentElement.style.color = isDarkMode ? '#111827' : '#111827';
                                    answers.parentElement.style.fontWeight = 'bold';
                                    answers.parentElement.style.backgroundColor = '#DCFCE7' ;


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
                            showPopup('welcomePopup', `You answered ${data.score} out of 6 questions correctly! Watch ${6 - data.score} ads to continue!`);
                            btn.innerHTML = 'Watch Ads';
                            btn.id = 'watchAdsButton';

                        }
                    } else if (xhr.status === 419) {
                        let message = 'Request expired: please reload and try again';

                        try {
                            message = JSON.parse(xhr.responseText || '{}').message || message;
                        } catch (error) {
                            console.error('Invalid CSRF error response:', xhr.responseText);
                        }

                        showPopup('welcomePopup', message);
                    } else {
                        console.error('Server response:', xhr.responseText);
                        showPopup('welcomePopup', 'Something went wrong. Please refresh the page and try again.');
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


////////Ads codeblock




                            const options = {
                            apiKey: "44e9c330-c5d0-4dae-8a76-dbe3982879a5", // Replace with your actual API key
                            injectionElementId: "adsbox", // This is the ID of the div from step 2.
                            adStatusCallbackFn: (status) => { // This is how you can listen for ad statuses (more in Step 4)
                            console.log("OUTSIDE Ad status: ", status);
                            },
                            adErrorCallbackFn: (error) => { // This is how you can listen for errors (more in Step 4)
                            console.log("Error: ", error.getError().data);
                            },
                        };
                         var application = new Application(options);
                        window.onload = () => { // Important: Initialize on window load!!! (or use timeout)
                            application.initialize();
                            
                        };
       
    </script>



    <script>
        

    </script>




        @vite('resources/js/toggledark.js')
</x-app-layout>
