<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="py-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('site_logo.png') }}" 
                                 alt="BluRay Maldives" 
                                 class="h-12 w-auto object-contain">
                            <div>
                                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
                                <p class="mt-2 text-gray-600">Lucky Draw Management System</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="h-10 w-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Codes</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_codes'] }}</p>
                            <p class="text-xs text-green-600 font-medium">{{ $stats['active_codes'] }} active</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Today's Scans</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['today_scans'] }}</p>
                            <p class="text-xs text-gray-500">{{ $stats['total_scans'] }} total</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Today's Entries</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['today_entries'] }}</p>
                            <p class="text-xs text-gray-500">{{ $stats['total_entries'] }} total</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Winners</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_winners'] }}</p>
                            <p class="text-xs text-blue-600 font-medium">{{ $stats['pending_winners'] }} pending</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.qr-codes.create') }}" 
                       class="group flex items-center justify-center px-6 py-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition-all">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Generate QR Codes</p>
                                <p class="text-sm text-gray-500">Create new QR codes</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.prizes.create') }}" 
                       class="group flex items-center justify-center px-6 py-4 border border-gray-200 rounded-xl hover:border-green-300 hover:bg-green-50 transition-all">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Add Prize</p>
                                <p class="text-sm text-gray-500">Create new prizes</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.winners.create') }}" 
                       class="group flex items-center justify-center px-6 py-4 border border-gray-200 rounded-xl hover:border-purple-300 hover:bg-purple-50 transition-all">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Assign Winner</p>
                                <p class="text-sm text-gray-500">Select lucky winners</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Scans -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Scans</h3>
                    </div>
                    <div class="p-6">
                        @if($recent_scans->count() > 0)
                            <div class="space-y-4">
                                @foreach($recent_scans as $scan)
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $scan->qrCode->lucky_id }}</p>
                                            <p class="text-xs text-gray-500">{{ $scan->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $scan->ip }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-4">No scans yet</p>
                        @endif
                    </div>
                </div>

                <!-- Recent Entries -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Entries</h3>
                    </div>
                    <div class="p-6">
                        @if($recent_entries->count() > 0)
                            <div class="space-y-4">
                                @foreach($recent_entries as $entry)
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $entry->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $entry->qrCode->lucky_id }} • {{ $entry->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $entry->phone }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-4">No entries yet</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('admin.qr-codes.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-900">QR Codes</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_codes'] }} total</p>
                    </div>
                </a>

                <a href="{{ route('admin.entries.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-green-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-900">Entries</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_entries'] }} total</p>
                    </div>
                </a>

                <a href="{{ route('admin.prizes.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-purple-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-900">Prizes</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_prizes'] }} active</p>
                    </div>
                </a>

                <a href="{{ route('admin.winners.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-yellow-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-900">Winners</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_winners'] }} total</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
