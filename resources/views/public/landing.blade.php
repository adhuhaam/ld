@extends('layouts.landing')
@section('content')
    <!-- Navigation Header - Catalyst Style -->
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 py-4 bg-gray-900/80 backdrop-blur-md border-b border-gray-800">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('site_logo.png') }}" 
                 alt="BluRay Maldives" 
                 class="h-8 w-auto">
            <span class="text-lg font-semibold text-white">Lucky Draw</span>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#how-it-works" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">How it works</a>
            <a href="#community" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Community</a>
            @if(config('app.viber_community_url'))
                <a href="{{ config('app.viber_community_url') }}" 
                   target="_blank"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Join Viber
                </a>
            @endif
        </div>
    </nav>

    <!-- Hero Section - Catalyst Dark Theme -->
    <div class="relative min-h-screen bg-gray-900 overflow-hidden pt-20">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
        
        <!-- Hero Content -->
        <div class="relative max-w-7xl mx-auto px-6 py-24">
            <div class="text-center">
                <!-- Logo -->
                <div class="mb-12">
                    <img src="{{ asset('site_logo.png') }}" 
                         alt="BluRay Maldives" 
                         class="mx-auto h-20 w-auto object-contain">
                </div>
                
                <!-- Main Heading -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white mb-6">
                    Lucky Draw
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Scan QR codes around the city and win amazing prizes from <span class="text-blue-400 font-semibold">BluRay Maldives</span>
                </p>
                
                <!-- CTA Section -->
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 max-w-2xl mx-auto border border-gray-700/50">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl font-semibold text-white mb-3">Find Our Stickers</h2>
                    <p class="text-gray-300 leading-relaxed">
                        Look for QR code stickers around the city and scan them to enter our lucky draw
                    </p>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div id="how-it-works" class="max-w-7xl mx-auto px-6 py-24">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    How it works
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Three simple steps to win amazing prizes
                </p>
            </div>

            <!-- Steps Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/50 hover:border-gray-600/50 transition-colors">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-600 rounded-xl mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <div class="inline-block bg-blue-600/20 text-blue-400 text-sm font-medium px-3 py-1 rounded-full mb-4">
                            Step 1
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Scan the QR code</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Use your phone camera to scan any Lucky Draw QR code sticker you find around the city.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/50 hover:border-gray-600/50 transition-colors">
                    <div class="flex items-center justify-center w-16 h-16 bg-green-600 rounded-xl mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <div class="inline-block bg-green-600/20 text-green-400 text-sm font-medium px-3 py-1 rounded-full mb-4">
                            Step 2
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Enter your details</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Fill in your name and phone number to enter the lucky draw. We'll use this to contact you if you win.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/50 hover:border-gray-600/50 transition-colors">
                    <div class="flex items-center justify-center w-16 h-16 bg-purple-600 rounded-xl mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <div class="inline-block bg-purple-600/20 text-purple-400 text-sm font-medium px-3 py-1 rounded-full mb-4">
                            Step 3
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Win amazing prizes</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Join our Viber community to see winners announced. We have dining experiences, hotel stays, and more from BluRay Maldives.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Viber Community CTA -->
        @if(config('app.viber_community_url'))
            <div id="community" class="max-w-7xl mx-auto px-6 py-24">
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-12 border border-gray-700/50">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-8 bg-blue-600 rounded-2xl flex items-center justify-center">
                            <span class="text-3xl">📱</span>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6">
                            Join Our Viber Community
                        </h3>
                        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                            Stay updated with winners and exclusive offers from BluRay Maldives
                        </p>
                        <a href="{{ config('app.viber_community_url') }}" 
                           target="_blank"
                           class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors">
                            <span class="mr-3 text-xl">📱</span>
                            Join Viber Community
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Footer -->
        <footer class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="text-center">
                    <div class="flex justify-center space-x-8 text-sm mb-6">
                        <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                        <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition-colors">Terms & Conditions</a>
                    </div>
                    <p class="text-sm text-gray-400">
                        © {{ date('Y') }} BluRay Maldives. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
        </div>

        <!-- Smooth Scrolling JavaScript -->
        <script>
            // Add smooth scrolling for better UX
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
@endsection
