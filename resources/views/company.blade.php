<x-app-layout>
    <x-slot name="title">COMPANY</x-slot>

    @php
        $pageTitles = [
            'about' => 'About Us',
            'terms' => 'Terms of Service',
            'disclaimer' => 'Disclaimer',
            'support' => 'Support',
            'contact' => 'Contact Support',
            'developers' => 'Developers',
            'engagement_rules' => 'Rules of Engagement',
            'glossary' => 'Glossary',
        ];

        $pageTitle = $pageTitles[$slug] ?? 'Company';
    @endphp

    <main class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 px-4 py-10 text-slate-300">
        <div class="mx-auto max-w-4xl">
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-emerald-300/30 bg-emerald-400/10 py-2 text-sm font-bold uppercase text-emerald-300 transition hover:bg-emerald-400 hover:text-slate-950">
                        <i class="fa-solid fa-arrow-left"></i>
                        Dashboard
                    </a>
                @endauth
            </div>

            <section class="overflow-hidden rounded-2xl border border-emerald-300/20 bg-slate-900/80 shadow-2xl shadow-emerald-500/10">
                <div class="border-b border-white/10 bg-slate-950/50 px-6 py-6 sm:px-8">
                    <p class="text-xs font-bold uppercase tracking-wider text-emerald-300">Company</p>
                    <h1 class="mt-2 text-3xl font-black text-white sm:text-4xl">{{ $pageTitle }}</h1>
                </div>

                <div class="space-y-5 py-8 leading-7 sm:px-8">
                    @if($slug === 'about')
                        <p>
                            Tokendemy is a hybrid educational and practical platform designed to simplify blockchain and cryptocurrency learning, integration, trading, and use for everyone.
                        </p>
                        <p>
                            Our mission is to bridge the knowledge gap in the fast-growing world of digital assets by offering structured lessons, practical guides, and real-world insights for onchain activity.
                        </p>
                        <p>
                            Whether you are a beginner taking your first steps or an advanced trader refining your skills, Tokendemy provides clear, trustworthy, and easy-to-follow learning resources.
                        </p>
                    @endif

                    @if($slug === 'terms')
                        <ul class="space-y-3">
                            <li class="rounded-lg border border-white/10 bg-slate-950/40 p-4"><strong class="text-white">Educational Purpose Only</strong> - All materials provided are for learning purposes and do not constitute financial advice.</li>
                            <li class="rounded-lg border border-white/10 bg-slate-950/40 p-4"><strong class="text-white">User Responsibility</strong> - You are solely responsible for how you use the knowledge and tools provided.</li>
                            <li class="rounded-lg border border-white/10 bg-slate-950/40 p-4"><strong class="text-white">No Liability</strong> - TokenDemy is not liable for any gains or losses incurred from applying the information presented.</li>
                            <li class="rounded-lg border border-white/10 bg-slate-950/40 p-4"><strong class="text-white">Content Ownership</strong> - All materials, courses, and resources are the property of TokenDemy unless stated otherwise.</li>
                            <li class="rounded-lg border border-white/10 bg-slate-950/40 p-4"><strong class="text-white">Account Use</strong> - You agree not to misuse your account or attempt unauthorized access.</li>
                        </ul>
                    @endif

                    @if($slug === 'disclaimer')
                        <p>
                            Cryptocurrency investments carry risks, including the possible loss of principal. Tokendemy does not provide investment, trading, or financial advice. All content is strictly educational.
                        </p>
                        <p>
                            Before making any financial decision, you should consult with a qualified financial advisor and conduct independent research. Tokendemy shall not be held liable for financial losses, trading mistakes, or reliance on third-party platforms or tools.
                        </p>
                    @endif

                    @if($slug === 'support')
                        <p>
                            We are here to ensure your learning journey is smooth and effective. Our support team can assist you with:
                        </p>
                        <ul class="list-disc space-y-2 pl-6 marker:text-emerald-400">
                            <li>Accessing your account and courses</li>
                            <li>Reporting technical issues or bugs</li>
                            <li>Guiding you to the right learning resources</li>
                            <li>Answering general platform-related questions</li>
                        </ul>
                    @endif

                    @if($slug === 'contact')
                        <p>
                            We are here to ensure your learning journey is smooth and effective. Our support team can assist you with account access, course questions, bug reports, and platform guidance.
                        </p>
                        <div class="rounded-xl border border-emerald-300/20 bg-emerald-400/10 p-5">
                            <p class="font-bold text-white">If you need assistance, reach us through:</p>
                            <p class="mt-2 text-emerald-200"><strong>Email:</strong> support@tokendemy.io</p>
                            <p class="mt-3 text-sm text-slate-400">Our typical response time is <strong class="text-slate-200">24 - 48 hours</strong> during working days.</p>
                        </div>
                    @endif

                    @if($slug === 'developers')
                        <p>
                            Tokendemy is built by a dedicated team of developers passionate about blockchain, education, and open-source technologies.
                        </p>
                        <ul class="list-disc space-y-2 pl-6 marker:text-emerald-400">
                            <li><strong class="text-white">Tech stack:</strong> Laravel, Tailwind CSS, Alpine.js, MySQL, API integrations</li>
                            <li><strong class="text-white">Roadmap:</strong> mobile apps, on-chain learning modules, and practical Web3 tools</li>
                        </ul>
                        <p>Developers interested in contributing can reach us at <strong class="text-emerald-300">support@tokendemy.io</strong>.</p>
                    @endif

                    @if($slug === 'engagement_rules')
                            <x-introandrules />
                    @endif

                    @if($slug === 'glossary')
                        <dl class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-lg border border-white/10 bg-slate-950/40 p-4">
                                <dt class="font-bold text-white">Blockchain</dt>
                                <dd class="mt-1 text-sm text-slate-400">A decentralized digital ledger that records transactions across multiple computers.</dd>
                            </div>
                            <div class="rounded-lg border border-white/10 bg-slate-950/40 p-4">
                                <dt class="font-bold text-white">Token</dt>
                                <dd class="mt-1 text-sm text-slate-400">A digital asset created on an existing blockchain, often representing value, utility, or rights.</dd>
                            </div>
                            <div class="rounded-lg border border-white/10 bg-slate-950/40 p-4">
                                <dt class="font-bold text-white">Wallet</dt>
                                <dd class="mt-1 text-sm text-slate-400">A tool that allows users to store and manage cryptocurrencies securely.</dd>
                            </div>
                            <div class="rounded-lg border border-white/10 bg-slate-950/40 p-4">
                                <dt class="font-bold text-white">Exchange</dt>
                                <dd class="mt-1 text-sm text-slate-400">A platform where cryptocurrencies can be bought, sold, or traded.</dd>
                            </div>
                            <div class="rounded-lg border border-white/10 bg-slate-950/40 p-4">
                                <dt class="font-bold text-white">DeFi</dt>
                                <dd class="mt-1 text-sm text-slate-400">Financial applications built on blockchain that operate without intermediaries.</dd>
                            </div>
                            <div class="rounded-lg border border-white/10 bg-slate-950/40 p-4">
                                <dt class="font-bold text-white">NFT</dt>
                                <dd class="mt-1 text-sm text-slate-400">A unique digital asset representing ownership of content such as art, music, or collectibles.</dd>
                            </div>
                        </dl>
                    @endif
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
