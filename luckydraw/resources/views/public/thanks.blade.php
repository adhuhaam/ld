<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl">✅</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Thank You!
                </h2>
                <p class="text-lg text-gray-600 mb-4">
                    Lucky ID: <span class="font-semibold text-green-600">{{ $luckyId }}</span>
                </p>
                <p class="text-gray-600">
                    Your entry has been successfully submitted to our lucky draw.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                            🎉 What's Next?
                        </h3>
                        <div class="space-y-4 text-left">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                    <span class="text-sm">1</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Join Our Viber Community</p>
                                    <p class="text-sm text-gray-600">Get notified when winners are announced</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                    <span class="text-sm">2</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Keep Your Phone Handy</p>
                                    <p class="text-sm text-gray-600">We'll contact you if your Lucky ID wins</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                    <span class="text-sm">3</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Look for More Stickers</p>
                                    <p class="text-sm text-gray-600">Each sticker gives you another chance to win</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(config('app.viber_community_url'))
                        <div class="pt-6 border-t border-gray-200">
                            <a href="{{ config('app.viber_community_url') }}" 
                               target="_blank"
                               class="w-full inline-flex items-center justify-center px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors">
                                <span class="mr-2">📱</span>
                                Join Viber Community Now
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Additional Info -->
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 mb-3">
                        💡 Pro Tip
                    </h4>
                    <p class="text-sm text-gray-600 mb-4">
                        The more stickers you scan, the more chances you have to win! Each QR code has a unique Lucky ID.
                    </p>
                    <a href="{{ route('landing') }}" 
                       class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        <span class="mr-1">←</span>
                        Back to Home
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <div class="flex justify-center space-x-4 text-xs text-gray-500">
                    <a href="{{ route('privacy') }}" class="hover:text-gray-700">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-gray-700">Terms</a>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    © {{ date('Y') }} BluRay Maldives. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
