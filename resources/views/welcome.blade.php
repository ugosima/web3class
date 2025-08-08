<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learn & Earn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-[Inter] bg-slate-50 text-gray-800 leading-relaxed dark:bg-gray-900 dark:text-gray-200">

    <!-- Header -->
    <header class="bg-green-50 shadow-md sticky top-0 z-50 dark:bg-green-900 dark:text-gray-200">
        <div class="max-w-7xl py-4 flex justify-between">
            <div class="text-4xl font-bold text-blue-700 dark:text-blue-300">
                LEARN<span class="text-green-600 dark:text-green-400">WEB3</span>
            </div>
            <nav class="flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route('register') }}" class="bg-red-600 text-white px-4 py-2 border-2 border-red-600 rounded-md hover:bg-white hover:text-red-600 transition dark:bg-red-500 dark:hover:bg-red-600">Register</a>
                <a href="{{ route('login') }}" class="bg-blue-500 border-2 border-blue-600 text-white px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition dark:border-blue-300 dark:text-blue-300 dark:hover:bg-blue-900">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-700 py-24 text-center text-white dark:bg-blue-800 dark:text-white">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4 text-white">WEB3: welcome to the all new world of digital finance.</h1>
            <p class="text-sm mb-8"> <i> Every lesson completed brings you closer to something valuable.</i> </p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-blue-700 font-semibold px-6 py-3 rounded-full hover:bg-blue-100 transition dark:bg-gray-100 dark:text-blue-800 dark:hover:bg-blue-200">
            Get Started</a>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="bg-white py-10 bt-2  text-center dark:bg-gray-900 dark:text-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-red-700 dark:text-red-400">Why Learn with us?</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="bg-green-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition dark:bg-green-800 dark:text-gray-100">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-semibold mb-2 text-blue-700 dark:text-blue-300">Goal-Based Learning</h3>
                    <p>Clearly defined learning objectives.</p>
                </div>
                <div class="bg-green-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition dark:bg-red-800 dark:text-gray-100">
                    <div class="text-4xl mb-4">🏆</div>
                    <h3 class="text-xl font-semibold mb-2 text-green-600 dark:text-red-300">Earn Real Rewards</h3>
                    <p>Get points for your progress and achievements.</p>
                </div>
                <div class="bg-yellow-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition dark:bg-blue-800 dark:text-gray-100">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold mb-2 text-yellow-600 dark:text-blue-300">Quick Micro Lessons</h3>
                    <p>Short, powerful lessons designed for busy people like you.</p>
                </div>
                <div class="bg-red-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition dark:bg-green-800 dark:text-gray-100">
                    <div class="text-4xl mb-4">⚒️</div>
                    <h3 class="text-xl font-semibold mb-2 text-red-600 dark:text-green-300">Practise based</h3>
                    <p>You get to practise through the lessons with demo versions of real DeFi tools.</p>
                </div>
                <div class="bg-indigo-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition dark:bg-red-800 dark:text-gray-100">
                    <div class="text-4xl mb-4">🧲</div>
                    <h3 class="text-xl font-semibold mb-2 text-indigo-600 dark:text-red-300">Disciplined learning</h3>
                    <p>Learning conditions are persuasive, and will help you maintain focus.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-xl w-72 hover:-translate-y-1 transition dark:bg-blue-800 dark:text-gray-100">
                    <div class="text-4xl mb-4">💸</div>
                    <h3 class="text-xl font-semibold mb-2 text-blue-600 dark:text-blue-300">100% Free</h3>
                    <p>Learning is free with no hidden charges, just sign up and explore.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="join" class="bg-green-50 py-20 text-center dark:bg-green-900 dark:text-white">
        <div>
            <h3 class="text-xl text-red-700 dark:text-red-300">Web3, Cryptocurrency and the world of digital finance should not be hard to understand.</h3>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center text-sm dark:bg-gray-950 dark:text-gray-500">
        <p>© 2025 Learnweb3. All rights reserved.</p>
    </footer>

</body>
</html>
