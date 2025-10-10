<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TOKENDEMY | HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite('resources/css/app.css')
            <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="font-[Inter] leading-relaxed ">
    <!-- Header -->
        <header class="bg-blue-50 sticky top-0 z-50 ">
        <div class="py-4 flex justify-between">
                  <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 " />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:-my-px sm:ms-10 sm:flex ">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="font-bold">
                       <div class="text-4xl font-bold text-gray-900 px-4  dark:rounded-lg">
                         {{ __('TOKEN') }}<span class="text-green-600">{{ __('DEMY') }}</span>
                       </div>
                    </x-nav-link>
                </div>
                    
         </div>
        </div>
    </header>
           


    <!-- Hero Section -->
    <section class="bg-blue-700 py-24 text-center dark:border-t-2 dark:border-t-gray-400  text-white">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4 text-white">WEB3: welcome to the all new world of digital finance.</h1>
            <p class="text-sm mb-8"> <i> Every lesson completed brings you closer to something valuable.</i> </p>
            <br>

            <a href="{{ route('register') }}" class="inline-block bg-white border-2 border-white text-blue-700 font-semibold px-6 py-3 min-w-[150px] rounded-full hover:bg-green-100  hover:text-gray-900 transition">
            Get Started</a>

             <a href="{{ route('login') }}" class="inline-block bg-[#0b2f5b] text-white font-semibold px-6 py-3 transition border-2 border-white min-w-[150px] rounded-full hover:bg-gray-200 hover:text-blue-600 ">Login</a>
        </div>

    </section>

    <!-- Features -->
    <section id="features" class="bg-gray-50 py-10 bt-2 text-center">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-8">
                <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4"> 
                        <b class=" text-red-500 text-3xl">🎯</b>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-blue-700 ">Goal-Based Learning</h3>
                    <p>Clearly defined learning objectives.</p>
                </div>





                <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition ">
                                <div class="text-4xl mb-4">
            <i class="fa-solid fa-credit-card text-green-600 text-3xl"></i>


        </div>
            <h3 class="text-xl font-semibold mb-2 text-pink-600 ">100% Free</h3>
                    <p>Learning is free with no hidden charges, just sign up and explore.</p>
    </div>


                 <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">
                        <i class="fa-solid fa-wrench text-gray-700 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-yellow-600 ">Practise based</h3>
                    <p>You get to practise through the lessons with demo versions of real DeFi tools.</p>
                </div>

                <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition ">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold mb-2 text-green-600">Quick Micro Lessons</h3>
                    <p>Short, powerful lessons designed for busy people like you.</p>
                </div>

               
                <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition ">
                    <div class="text-4xl mb-4"><i class="fa-solid fa-magnet text-red-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-indigo-600 ">Disciplined learning</h3>
                    <p>Learning conditions are persuasive, and will help you maintain focus.</p>
                </div>

                 <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">🏆</div>
                    <h3 class="text-xl font-semibold mb-2 text-orange-600">Earn Real Rewards</h3>
                    <p>Get points for your progress and achievements.</p>
                </div>


                
            </div>
        </div>
    </section>

      
          <section class=" mx-auto px-4 border-l-4 border-l-indigo-200 bg-gray-50">
            <hr>
            <h2 class="text-2xl font-bold opacity-80 mb-4 text-left text-gray-700 mt-6"> <i>COMING SOON...</i> </h2>
        <ol class="flex gap-2 [&>li]:border-2 [&>li]:border-gray-00 [&>li]:text-black [&>li]:px-4 [&>li]:py-2 
                       [&>li]:rounded-lg [&>li]:cursor-pointer [&>li:hover]:bg-blue-700 [&>li]:py-2 [&>li:hover]:text-white [&>li]:transition">
                         <li><i class="fa-solid fa-lock"></i>Dapp DEMOs</li>
                           <li><i class="fa-solid fa-lock"></i>Market analytics </li>
                             <li><i class="fa-solid fa-lock"></i>Onchain activity</li>
        </ol>
       <br>
    </section>
   
  

    <!-- Footer -->
    <footer class="bg-blue-50 text-black">
    <nav class="border-t border-gray-300 flex flex-row justify-around px-2 pt-4 text-black">
        <!-- Company -->
        <div class="flex flex-col space-y-4">
            <h4 class="text-red-600 font-bold"><a href="#">COMPANY</a></h4>
            <h4><a href="{{ route('company', 'about') }}">About us</a></h4>
            <h4><a href="{{ route('company', 'terms') }}">Terms</a></h4>
            <h4><a href="{{ route('company', 'disclaimer') }}">Disclaimer</a></h4>
        </div>

        <!-- Support -->
        <div class="flex flex-col space-y-4">
            <h4 class="text-red-600 font-bold"><a href="#">SUPPORT</a></h4>
            <h4><a href="{{ route('company', 'contact') }}">Contact support</a></h4>
            <h4><a href="{{ route('company', 'developers') }}">Developers</a></h4>
            <h4><a href="{{ route('company', 'glossary') }}">Glossary</a></h4>
        </div>

        <!-- Socials -->
        <div class="flex flex-col space-y-4">
            <h4 class="text-red-600 font-bold"><a href="#">SOCIALS</a></h4>
            <h4><a href="#">Facebook</a></h4>
            <h4><a href="#">LinkedIn</a></h4>
            <h4><a href="#">Twitter</a></h4>
        </div>
    </nav>

    <br><br>
    <div class="w-full text-center py-4 text-sm text-gray-700">
        © Copyright 2025 Codebridge-developers
    </div>
</footer>

</body>
</html>
