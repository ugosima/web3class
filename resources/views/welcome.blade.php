<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TOKENDEMY | HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-[Inter] text-gray-800 leading-relaxed ">

    <!-- Header -->
    {{-- <header class="bg-green-50 shadow-md sticky top-0 z-50 dark:bg-gray-100 dark:text-gray-200">
        <div class="py-4 flex justify-between">
         
        </div>
    </header> --}}
 <x-header/> 
           


    <!-- Hero Section -->
    <section class="bg-blue-700 py-24 text-center text-white">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4 text-white">WEB3: welcome to the all new world of digital finance.</h1>
            <p class="text-sm mb-8"> <i> Every lesson completed brings you closer to something valuable.</i> </p>
            <br>

            <a href="{{ route('register') }}" class="inline-block bg-white border-2 border-white text-blue-700 font-semibold px-6 py-3 min-w-[150px] rounded-full hover:bg-green-100  hover:text-gray-900 transition">
            Get Started</a>

             <a href="{{ route('login') }}" class="inline-block bg-gray-800 text-white border-2 border-white font-semibold px-6 py-3 min-w-[150px] rounded-full hover:bg-gray-200 hover:text-blue-600 ">Login</a>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="bg-white py-10 bt-2 text-center">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-8">
                <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4"> 
                        <b class=" text-red-500 text-3xl">🎯</b>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-blue-700 ">Goal-Based Learning</h3>
                    <p>Clearly defined learning objectives.</p>
                </div>





                <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition ">
                                <div class="text-4xl mb-4">
            <i class="fa-solid fa-credit-card text-green-600 text-3xl"></i>


        </div>
            <h3 class="text-xl font-semibold mb-2 text-pink-600 ">100% Free</h3>
                    <p>Learning is free with no hidden charges, just sign up and explore.</p>
    </div>


                 <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">
                        <i class="fa-solid fa-wrench text-gray-700 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-yellow-600 ">Practise based</h3>
                    <p>You get to practise through the lessons with demo versions of real DeFi tools.</p>
                </div>

                <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition ">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold mb-2 text-green-600">Quick Micro Lessons</h3>
                    <p>Short, powerful lessons designed for busy people like you.</p>
                </div>

               
                <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition ">
                    <div class="text-4xl mb-4"><i class="fa-solid fa-magnet text-red-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-indigo-600 ">Disciplined learning</h3>
                    <p>Learning conditions are persuasive, and will help you maintain focus.</p>
                </div>

                 <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">🏆</div>
                    <h3 class="text-xl font-semibold mb-2 text-orange-600">Earn Real Rewards</h3>
                    <p>Get points for your progress and achievements.</p>
                </div>


                
            </div>
        </div>
    </section>

      
          <section class=" mx-auto px-4 border-l-4 border-l-indigo-200">
            <hr>
            <br>
        <ol class="flex gap-2 [&>li]:bg-indigo-100 [&>li]:text-black [&>li]:px-4 [&>li]:py-2 
                       [&>li]:rounded-lg [&>li]:cursor-pointer [&>li:hover]:bg-blue-700">
                         <li><i class="fa-solid fa-lock"></i>Dapp DEMOs</li>
                           <li><i class="fa-solid fa-lock"></i>Market analytics </li>
                             <li><i class="fa-solid fa-lock"></i>Onchain activity</li>
        </ol>
        <br>
         <i class="text-gray-400">. . .coming soon</i>
        <br>
    </section>
   
  

    <!-- Footer -->
    <x-footer/>

</body>
</html>
