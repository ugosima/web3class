<div id="material_list" class="hidden inset-0 z-50 flex items-center justify-center bg-slate-950/90 p-4 backdrop-blur-sm">
    <div class="w-full max-w-2xl overflow-hidden rounded-2xl border border-emerald-300/20 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-200 shadow-2xl shadow-emerald-500/20">
        <div class="flex items-start justify-between  border-b border-white/10 px-6 py-5">
            <div>
                {{-- <p class="text-2xl font-bold uppercase tracking-wider text-emerald-300">TABLE OF CONTENT</p> --}}
                <h3 class="mt-1 text-2xl font-black tracking-wider uppercase text-emerald-300">TABLE OF CONTENT</h3>
            </div>
            <button
                type="button"
                onclick="document.getElementById('material_list').classList.add('hidden')"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-white/10 bg-slate-900/80 text-slate-300 transition hover:border-emerald-300/40 hover:bg-emerald-400 hover:text-slate-950"
                aria-label="Close lesson list"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <ol class="max-h-[70vh] space-y-3 overflow-y-auto px-6 py-5">
            @foreach ($titles as $learning_cycle => $material_title)
                @if ($learning_cycle <= $user->lesson_progress)
                    <li class="group rounded-xl border border-emerald-300/20 bg-slate-900/80 transition hover:border-emerald-300/50 hover:bg-emerald-400/10">
                        <a href="/viewmaterial/{{$learning_cycle}}" class="flex items-center gap-4 px-4 py-3">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-400/15 text-sm font-black text-emerald-300 ring-1 ring-emerald-300/25">
                                {{ $learning_cycle }}
                            </span>
                            <span class="flex-1 font-bold text-slate-100 group-hover:text-emerald-200">{{ $material_title }}</span>
                            <i class="fa-solid fa-circle-check text-emerald-400"></i>
                        </a>
                    </li>
                @else
                    <li class="flex items-center gap-4 rounded-xl border border-white/10 bg-slate-900/50 px-4 py-3 text-slate-500">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-800 text-sm font-black text-slate-400 ring-1 ring-white/10">
                            {{ $learning_cycle }}
                        </span>
                        <span class="flex-1 font-semibold">{{ $material_title }}</span>
                        <i class="fa-solid fa-lock text-slate-500"></i>
                    </li>
                @endif
            @endforeach

            <li class="rounded-xl border border-amber-300/30 bg-amber-300/10 transition hover:bg-amber-300/15">
                <a href="{{ route('company', 'engagement_rules') }}" class="flex items-center justify-center gap-3 px-4 py-3 font-black uppercase text-amber-200">
                    <i class="fa-solid fa-scale-balanced"></i>
                    Rules of Engagement
                </a>
            </li>

            <li>
                <button onclick="document.getElementById('material_list').classList.add('hidden')" class="w-full rounded-lg bg-emerald-400 px-4 py-3 font-black uppercase text-slate-950 transition hover:bg-emerald-300">
                    Close
                </button>
            </li>
        </ol>
    </div>
</div>
