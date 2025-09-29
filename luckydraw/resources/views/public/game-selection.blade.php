<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-12">
                    <div class="mx-auto mb-6">
                        <img src="{{ asset('site_logo.png') }}" 
                             alt="BluRay Maldives" 
                             class="mx-auto h-20 w-auto object-contain">
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 mb-4">
                        Choose Your Game
                    </h1>
                    <p class="text-xl text-gray-600 mb-4">
                        Lucky ID: <span class="font-bold text-blue-600 bg-blue-100 px-3 py-1 rounded-lg">{{ $qrCode->lucky_id }}</span>
                    </p>
                    <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                        Select a game to play and win amazing prizes from BluRay Maldives!
                    </p>
                </div>

                <!-- Game Selection -->
                @if($games->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                        @foreach($games as $game)
                            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 border border-gray-200/50 hover:shadow-2xl transition-all duration-300 group cursor-pointer"
                                 onclick="selectGame('{{ $game->slug }}')">
                                <div class="text-center">
                                    <!-- Game Icon -->
                                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <span class="text-3xl">{{ $game->icon }}</span>
                                    </div>
                                    
                                    <!-- Game Info -->
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $game->name }}</h3>
                                    <p class="text-gray-600 mb-4 text-sm">{{ $game->description }}</p>
                                    
                                    <!-- Game Stats -->
                                    <div class="flex justify-center space-x-4 text-xs text-gray-500 mb-4">
                                        <div class="flex items-center">
                                            <span class="mr-1">⚡</span>
                                            {{ $game->difficulty_text }}
                                        </div>
                                        <div class="flex items-center">
                                            <span class="mr-1">🎯</span>
                                            {{ $game->max_attempts }} attempts
                                        </div>
                                        @if($game->time_limit)
                                            <div class="flex items-center">
                                                <span class="mr-1">⏱️</span>
                                                {{ $game->time_limit_minutes }}min
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Play Button -->
                                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold group-hover:from-blue-600 group-hover:to-purple-700 transition-all">
                                        Play Now
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- No Games Available -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-gray-200/50 text-center mb-12">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center">
                            <span class="text-3xl">🎮</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Games Coming Soon!</h3>
                        <p class="text-gray-600 mb-4">We're working on exciting games for you. For now, you can enter our lucky draw directly.</p>
                    </div>
                @endif

                <!-- Alternative Entry -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-gray-200/50 text-center">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Quick Entry</h3>
                    <p class="text-gray-600 mb-6">
                        Don't want to play a game? Enter the lucky draw directly with your details.
                    </p>
                    <a href="{{ route('scan.show', $qrCode->code) }}" 
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-xl hover:from-green-600 hover:to-green-700 transition-all shadow-lg">
                        <span class="mr-2">📝</span>
                        Enter Lucky Draw
                    </a>
                </div>

                <!-- Viber Community -->
                @if(config('app.viber_community_url'))
                    <div class="mt-12 text-center">
                        <a href="{{ config('app.viber_community_url') }}" 
                           target="_blank"
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-blue-700 transition-all shadow-lg">
                            <span class="mr-2">📱</span>
                            Join Our Viber Community
                        </a>
                        <p class="text-sm text-gray-500 mt-3">Stay updated with winners and exclusive offers</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function selectGame(gameSlug) {
            window.location.href = "{{ route('game.show', ['code' => $qrCode->code, 'game' => '']) }}" + gameSlug;
        }
    </script>
</x-guest-layout>
