<div class="relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-6 space-y-5">

    <div class="sprinkle-container">
    <span class="sprinkle" style="left:10%; background:#22c55e; animation-delay:0s;"></span>
    <span class="sprinkle" style="left:25%; background:#eab308; animation-delay:0.2s;"></span>
    <span class="sprinkle" style="left:40%; background:#3b82f6; animation-delay:0.4s;"></span>
    <span class="sprinkle" style="left:60%; background:#ec4899; animation-delay:0.1s;"></span>
    <span class="sprinkle" style="left:33%; background:#f97316; animation-delay:0.3s;"></span>
    <span class="sprinkle" style="left:37%; background:#eab308; animation-delay:0.2s;"></span>
    <span class="sprinkle" style="left:45%; background:#ff00b7; animation-delay:0.4s;"></span>
    <span class="sprinkle" style="left:70%; background:#ec4899; animation-delay:0.1s;"></span>
    <span class="sprinkle" style="left:90%; background:#f97316; animation-delay:0.3s;"></span>
</div>

    <style>
        .sprinkle-container {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }


        .sprinkle {
    position: absolute;
    top: -15px;
    width: 10px;
    height: 10px;
    background: radial-gradient(circle, #22c55e, #eab308);
    border-radius: 50%;
    opacity: 0.95;
    animation: fall 3s linear infinite;
    z-index: 0;
}

        @keyframes fall {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(300px);
                opacity: 0;
            }
        }
    </style>

    <div class="relative z-10 text-center space-y-3">

        <div class="text-4xl text-yellow-600">
            <i class="fa-solid fa-trophy bg-gradient-to-r from-green-500 to-orange-400 bg-clip-text text-transparent"></i>
            <i class="fa-solid text-gray-800 fa-graduation-cap"></i>
            <i class="fa-solid fa-star"></i>
        </div>

        <h2 class="text-2xl font-bold text-gray-900">
            Congratulations on Completing the Web3, Blockchain, and Crypto Learning Series.
        </h2>

        <p class="text-gray-600">
            You’ve officially completed your learning journey and earned your achievement points.
        </p>
    </div>

    <div class="relative z-10 space-y-4 text-gray-700 leading-relaxed">

        <p>
            You’ve successfully gone through the core concepts of blockchain, trading, wallets, tokens, and market behavior,
            and earned points that reflect your progress within the system.
        </p>

        <p>
            These points are not just numbers, they represent your learning journey, and will be used within our ecosystem to unlock access to the utility of our digital products.
        </p>

        <p>
            As you move forward, remember that the crypto market is highly volatile. Prices can change rapidly due to speculation, sentiment, and external events rather than fundamentals alone.
        </p>

        <p class="font-medium text-gray-900">
            Never treat what you’ve learned as a guarantee of profit, but as a foundation for making more informed decisions.
        </p>

    </div>

    <div class="relative z-10 text-center pt-5 border-t border-gray-100 space-y-2">

        <p class="text-gray-900 font-semibold text-lg">
            <i class="fa-solid fa-flag-checkered text-green-600 mr-2"></i>
            This is not the end, it’s your graduation into real-world crypto awareness, where learning never ends.
        </p>

        <div class="text-yellow-500 text-xl space-x-2">
            <i class="fa-solid fa-trophy"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-trophy"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-trophy"></i>
        </div>

    </div>

</div>