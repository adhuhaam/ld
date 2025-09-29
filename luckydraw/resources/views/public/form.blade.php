<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="mx-auto mb-6">
                    <img src="{{ asset('site_logo.png') }}" 
                         alt="BluRay Maldives" 
                         class="mx-auto h-16 w-auto object-contain">
                </div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 mb-2">
                    Lucky Draw Entry
                </h2>
                <p class="text-lg text-gray-600 mb-4">
                    Lucky ID: <span class="font-bold text-blue-600 bg-blue-100 px-3 py-1 rounded-lg">{{ $qrCode->lucky_id }}</span>
                </p>
                <p class="text-sm text-gray-500">
                    Fill in your details below to enter the lucky draw
                </p>
            </div>

            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-gray-200/50">
                <form method="POST" action="{{ route('entry.store', $qrCode->code) }}" class="space-y-6">
                    @csrf
                    
                    <!-- Honeypot field (hidden) -->
                    <input type="text" name="honeypot" style="display: none;" tabindex="-1" autocomplete="off">

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                            Full Name *
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                               placeholder="Enter your full name">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-900 mb-2">
                            Phone Number *
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}"
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('phone') border-red-500 @enderror"
                               placeholder="+960 123-4567">
                        <p class="mt-2 text-xs text-gray-500">We'll use this to contact you if you win</p>
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" 
                                   id="consent" 
                                   name="consent" 
                                   value="1"
                                   required
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 @error('consent') border-red-500 @enderror">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="consent" class="text-gray-700">
                                I agree to the Lucky Draw Terms and allow BluRay Maldives to contact me about my entry. *
                            </label>
                            @error('consent')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Enter Lucky Draw
                    </button>
                </form>
            </div>

            <!-- Viber Community CTA -->
            @if(config('app.viber_community_url'))
                <div class="text-center">
                    <p class="text-sm text-gray-600 mb-3">
                        Join our Viber community to stay updated with winners and exclusive offers
                    </p>
                    <a href="{{ config('app.viber_community_url') }}" 
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors">
                        <span class="mr-2">📱</span>
                        Join Viber Community
                    </a>
                </div>
            @endif

            <!-- Footer Links -->
            <div class="text-center">
                <div class="flex justify-center space-x-4 text-xs text-gray-500">
                    <a href="{{ route('privacy') }}" class="hover:text-gray-700">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-gray-700">Terms</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
