
<x-app-layout>    
    
        <x-slot name="title">GUEST</x-slot>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-emerald-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-slate-50 border-2 border-slate-200 text-gray-900 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <div>
                <a href="{{ route('google.redirect') }}"
				class="w-full flex items-center justify-center px-4 py-2 mt-3 bg-blue-600 hover:bg-blue-400 hover:font-bold text-white rounded-md transition">
		<img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
			class="w-5 h-5 mr-2" alt="Google">
		Continue with Google
	     </a>

            </div>
        </div>

</x-app-layout>

     
