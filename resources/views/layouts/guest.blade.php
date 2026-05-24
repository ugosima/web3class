
<x-app-layout>    
    
        <x-slot name="title">GUEST</x-slot>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">
            <br>
            <br>
            <br>
            <br>
            <div class="border-2 rounded-lg border-gray-700 px-2 py-2">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-400/15 text-emerald-300 ring-1 ring-emerald-300/30">
                        <a href="/">
                            <x-application-logo class="h-8 w-8 fill-current" />
                        </a>
                    </span>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 bg-slate-50 border-2 border-slate-200 text-gray-900 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <div class="w-full sm:max-w-md px-6">
                @php
                    $googleReferralCode = request()->route('slug') ?? ($referralCode ?? null);
                @endphp

                <a
                    href="{{ route('google.redirect', array_filter(['referral_code' => $googleReferralCode])) }}"
                    class="group mt-4 flex w-full items-center justify-center gap-3 rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:border-emerald-300 hover:bg-slate-50 hover:text-slate-950 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:ring-offset-2 focus:ring-offset-gray-800"
                >
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white ring-1 ring-slate-200 transition group-hover:ring-emerald-200">
                        <img
                            src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                            class="h-4 w-4"
                            alt=""
                            aria-hidden="true"
                        >
                    </span>
                    <span>Continue with Google</span>
                </a>
            </div>
            <br>
        <br>
        <br>
        </div>

        

</x-app-layout>

     
