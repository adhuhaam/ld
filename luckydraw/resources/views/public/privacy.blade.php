<x-guest-layout>
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">
                        Privacy Policy
                    </h1>
                    <p class="text-gray-600">
                        Last updated: {{ date('F d, Y') }}
                    </p>
                </div>

                <div class="prose prose-lg max-w-none">
                    <h2>Information We Collect</h2>
                    <p>When you participate in our Lucky Draw, we collect the following information:</p>
                    <ul>
                        <li><strong>Name:</strong> Your full name as provided during registration</li>
                        <li><strong>Phone Number:</strong> Your contact number for winner notifications</li>
                        <li><strong>Lucky ID:</strong> The unique identifier associated with your entry</li>
                        <li><strong>Technical Data:</strong> IP address, browser type, and device information for security purposes</li>
                    </ul>

                    <h2>How We Use Your Information</h2>
                    <p>We use your information to:</p>
                    <ul>
                        <li>Process your lucky draw entry</li>
                        <li>Contact you if you are a winner</li>
                        <li>Prevent fraud and ensure fair play</li>
                        <li>Improve our services and user experience</li>
                        <li>Comply with legal obligations</li>
                    </ul>

                    <h2>Information Sharing</h2>
                    <p>We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:</p>
                    <ul>
                        <li>With your explicit consent</li>
                        <li>To comply with legal requirements</li>
                        <li>To protect our rights and prevent fraud</li>
                        <li>With service providers who assist in our operations (under strict confidentiality agreements)</li>
                    </ul>

                    <h2>Data Security</h2>
                    <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure.</p>

                    <h2>Data Retention</h2>
                    <p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this privacy policy, unless a longer retention period is required by law.</p>

                    <h2>Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul>
                        <li>Access your personal information</li>
                        <li>Correct inaccurate information</li>
                        <li>Request deletion of your information</li>
                        <li>Withdraw consent at any time</li>
                        <li>Lodge a complaint with relevant authorities</li>
                    </ul>

                    <h2>Contact Us</h2>
                    <p>If you have any questions about this privacy policy or our data practices, please contact us:</p>
                    <ul>
                        <li><strong>Email:</strong> privacy@blueraymaldives.com</li>
                        <li><strong>Phone:</strong> +960 [contact number]</li>
                        <li><strong>Address:</strong> BluRay Maldives, [address]</li>
                    </ul>

                    <h2>Changes to This Policy</h2>
                    <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.</p>
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('landing') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                        <span class="mr-2">←</span>
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
