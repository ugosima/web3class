
<x-app-layout>
    <x-slot name="title">COMPANY</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('COMPANY') }}
        </h2>
    </x-slot>
    <br>
    <br>
    <br>

<div class="max-w-4xl mx-auto px-6 py-12 flex-1 bg-gray-900 border-2 border-gray-600 rounded-2xl shadow-md">
        
        @auth
        <div class="max-w-7xl mx-auto ">
                    <h2 class="font-semibold text-xl">
                        <a href="{{ route('dashboard') }}" class="text-gray-200"> <span class="text-red-500 font-bold ">&#8592;</span> DASHBOARD </a>
                    </h2>
                    <br>
                    <br>
                </div>
        @endauth


            <div class="max-w-4xl flex bg-gray-700 justify-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-600" />
                </a>
            </div>

            <br>
            <br>
            <br>




    {{-- About Us --}}
    @if($slug === 'about')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">About Us</h1>
        <p class="text-gray-300 leading-relaxed mb-4">
            Tokendemy is a hybrid (Educational/Practical) platform designed to simplify blockchain and cryptocurrency learning, integration, trading, and use for everyone. 
            Our mission is to bridge the knowledge gap in the fast-growing world of digital assets by offering structured lessons, 
            practical guides, and real-world insights for onchain activity.
        </p>
        <p class="text-gray-300 leading-relaxed">
            We believe in empowering learners with the right tools, strategies, and understanding to make informed decisions in the crypto space. 
            Whether you’re a beginner taking your first steps or an advanced trader refining your skills, Tokendemy provides clear, trustworthy, 
            and easy-to-follow learning resources.
        </p>
    @endif

    {{-- Terms --}}
    @if($slug === 'terms')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">Terms</h1>
        <ul class="list-disc pl-6 text-gray-300 space-y-2">
            <li><strong>Educational Purpose Only</strong> – All materials provided are for learning purposes and do not constitute financial advice.</li>
            <li><strong>User Responsibility</strong> – You are solely responsible for how you use the knowledge and tools provided.</li>
            <li><strong>No Liability</strong> – TokenDemy is not liable for any gains or losses incurred from applying the information presented.</li>
            <li><strong>Content Ownership</strong> – All materials, courses, and resources are the property of TokenDemy unless stated otherwise.</li>
            <li><strong>Account Use</strong> – You agree not to misuse your account or attempt unauthorized access.</li>
        </ul>
    @endif

    {{-- Disclaimer --}}
    @if($slug === 'disclaimer')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">Disclaimer</h1>
        <p class="text-gray-300 leading-relaxed">
            Cryptocurrency investments carry risks, including the possible loss of principal. Tokendemy does not provide investment, 
            trading, or financial advice. All content is strictly educational.
        </p>
        <p class="text-gray-300 leading-relaxed mt-4">
            Before making any financial decision, you should consult with a qualified financial advisor and conduct independent research. 
            Tokendemy shall not be held liable for financial losses, trading mistakes, or reliance on third-party platforms/tools.
        </p>
    @endif

    {{-- Support --}}
    @if($slug === 'support')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">Support</h1>
        <p class="text-gray-300 leading-relaxed mb-2">
            We are here to ensure your learning journey is smooth and effective. Our support team can assist you with:
        </p>
        <ul class="list-disc pl-6 text-gray-300 space-y-2">
            <li>Accessing your account and courses</li>
            <li>Reporting technical issues or bugs</li>
            <li>Guiding you to the right learning resources</li>
            <li>Answering general platform-related questions</li>
        </ul>
    @endif

    {{-- Contact Support --}}
    @if($slug === 'contact')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">Contact Support</h1>

          <p class="text-gray-300 leading-relaxed mb-2">
            We are here to ensure your learning journey is smooth and effective. Our support team can assist you with:
        </p>
        <ul class="list-disc pl-6 text-gray-300 space-y-3">
            <li>Accessing your account and courses</li>
            <li>Reporting technical issues or bugs</li>
            <li>Guiding you to the right learning resources</li>
            <li>Answering general platform-related questions</li>
        </ul>
        <br>

        <p class="text-gray-300 mb-2"><b> If you need assistance, reach us through: </b></p>
        <ul class="text-gray-300 space-y-3">
            <li><b>📧 Email:</b> support@tokendemy.com</li>    
        </ul>
        <p class="text-gray-300 mt-4">Our typical response time is <strong>24 – 48 hours</strong> during working days.</p>

       
    @endif

    {{-- Developers --}}
    @if($slug === 'developers')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">Developers</h1>
        <p class="text-gray-300 mb-4">
            Tokendemy is built by a dedicated team of developers passionate about blockchain, education, and open-source technologies.
        </p>
        <ul class="list-disc pl-6 text-gray-300 space-y-2">
            <li><strong>Tech stack:</strong> Laravel, Tailwind CSS, Alpine.js, MySQL, API Integrations</li>
            <li><strong>Roadmap:</strong> expanding into mobile apps and integrating on-chain learning modules</li>
        </ul>
        <p class="text-gray-300 mt-4">Developers interested in contributing can reach us at <strong>dev@tokendemy.com</strong>.</p>
    @endif

    @if($slug === 'engagement_rules')
        <x-introandrules />
    @endif

    {{-- Glossary --}}
    @if($slug === 'glossary')
        <h1 class="text-3xl font-bold text-gray-200 mb-6">Glossary</h1>
        <dl class="space-y-4">
            <div>
                <dt class="font-semibold text-gray-300">Blockchain</dt>
                <dd class="text-gray-300">A decentralized digital ledger that records transactions across multiple computers.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-300">Token</dt>
                <dd class="text-gray-300">A digital asset created on an existing blockchain, often representing value, utility, or rights.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-300">Wallet</dt>
                <dd class="text-gray-300">A tool (software or hardware) that allows users to store and manage cryptocurrencies securely.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-300">Exchange</dt>
                <dd class="text-gray-300">A platform where cryptocurrencies can be bought, sold, or traded.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-300">DeFi (Decentralized Finance)</dt>
                <dd class="text-gray-300">Financial applications built on blockchain that operate without intermediaries.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-300">NFT (Non-Fungible Token)</dt>
                <dd class="text-gray-300">A unique digital asset representing ownership of content such as art, music, or collectibles.</dd>
            </div>
        </dl>
    @endif

</div>
<br>
<br>
<br>

</x-app-layout>


