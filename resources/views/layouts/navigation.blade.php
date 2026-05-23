<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-emerald-300/10 bg-slate-950/95 text-slate-200 shadow-lg shadow-slate-950/30 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex h-20 items-center justify-between">
            <x-header />

            @auth
                <div class="hidden items-center gap-3 sm:flex">
                        <a href="{{ route('dashboard') }}" class="rounded-lg px-4 py-2 text-sm font-bold uppercase text-slate-300 transition hover:bg-white/5 hover:text-emerald-300">
                            Dashboard
                        </a>

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center gap-3 rounded-lg border border-emerald-300/25 bg-emerald-400/10 px-4 py-2 text-sm font-bold uppercase text-emerald-300 transition hover:bg-emerald-400 hover:text-slate-950 focus:outline-none">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                </div>

                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-emerald-300/20 bg-slate-900 text-emerald-300 transition hover:bg-emerald-400 hover:text-slate-950 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endauth
        </div>
    </div>

    @auth
        <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-white/10 bg-slate-950 sm:hidden">
            <div class="space-y-2 px-4 py-4">
                <a href="{{ route('dashboard') }}" class="block rounded-lg px-4 py-3 font-bold uppercase text-slate-300 hover:bg-white/5 hover:text-emerald-300">Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="block rounded-lg px-4 py-3 font-bold uppercase text-slate-300 hover:bg-white/5 hover:text-emerald-300">Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full rounded-lg px-4 py-3 text-left font-bold uppercase text-slate-300 hover:bg-white/5 hover:text-emerald-300">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    @endauth
</nav>
