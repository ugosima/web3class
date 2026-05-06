
@props([
    // Light mode defaults
    'bgColor' => null,
    'textColor' => null,
    'accentColor' => null,
])

@php
    // Default colors if not overridden
    $resolvedBg = $bgColor ?? 'bg-blue-50 dark:bg-gray-900';
    $resolvedText = $textColor ?? 'text-black dark:text-gray-300';
    $resolvedAccent = $accentColor ?? 'text-red-600 dark:text-red-400';
@endphp

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 border-t border-slate-700">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <!-- Footer Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Brand Column -->
                <div>
                    <div class="text-2xl font-bold text-white mb-4">
                        TOKEN<span class="text-emerald-400">DEMY</span>
                    </div>
                    <p class="text-slate-400 text-sm">Empowering the next generation of Web3 learners with accessible, practical education.</p>
                </div>

                <!-- Company Column -->
                <div>
                    <h4 class="text-white font-bold mb-6">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('company', 'about') }}" class="text-slate-400 hover:text-emerald-400 transition">About Us</a></li>
                        <li><a href="{{ route('company', 'terms') }}" class="text-slate-400 hover:text-emerald-400 transition">Terms of Service</a></li>
                        <li><a href="{{ route('company', 'disclaimer') }}" class="text-slate-400 hover:text-emerald-400 transition">Disclaimer</a></li>
                    </ul>
                </div>

                <!-- Support Column -->
                <div>
                    <h4 class="text-white font-bold mb-6">Support</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('company', 'contact') }}" class="text-slate-400 hover:text-emerald-400 transition">Contact Us</a></li>
                        <li><a href="{{ route('company', 'developers') }}" class="text-slate-400 hover:text-emerald-400 transition">Developers</a></li>
                        <li><a href="{{ route('company', 'glossary') }}" class="text-slate-400 hover:text-emerald-400 transition">Glossary</a></li>
                    </ul>
                </div>

                <!-- Socials Column -->
                <div>
                    <h4 class="text-white font-bold mb-6">Follow Us</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 transition flex items-center gap-2"><i class="fa-brands fa-facebook text-lg"></i> Facebook</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 transition flex items-center gap-2"><i class="fa-brands fa-linkedin text-lg"></i> LinkedIn</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 transition flex items-center gap-2"><i class="fa-brands fa-twitter text-lg"></i> Twitter</a></li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-slate-700 pt-8">
                <p class="text-center text-slate-500 text-sm">
                    © Copyright 2025 <a rel="stylesheet" href="https://ugosima.github.io/dev"><span class="text-emerald-400 font-semibold">Codebridge Developers</span></a>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
