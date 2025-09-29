<x-guest-layout>
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">
                        Terms & Conditions
                    </h1>
                    <p class="text-gray-600">
                        Last updated: {{ date('F d, Y') }}
                    </p>
                </div>

                <div class="prose prose-lg max-w-none">
                    <h2>Eligibility</h2>
                    <p>To participate in the BluRay Maldives Lucky Draw:</p>
                    <ul>
                        <li>You must be 18 years of age or older</li>
                        <li>You must be a legal resident of Maldives</li>
                        <li>You must provide accurate and complete information</li>
                        <li>Employees of BluRay Maldives and their immediate family members are not eligible</li>
                    </ul>

                    <h2>How to Participate</h2>
                    <p>To enter the lucky draw:</p>
                    <ul>
                        <li>Scan a valid Lucky Draw QR code sticker</li>
                        <li>Fill in your name and phone number</li>
                        <li>Agree to these terms and conditions</li>
                        <li>Submit your entry</li>
                    </ul>

                    <h2>Entry Limits</h2>
                    <ul>
                        <li>One entry per unique QR code per phone number</li>
                        <li>Multiple entries using different QR codes are allowed</li>
                        <li>Duplicate entries will be disqualified</li>
                        <li>We reserve the right to limit entries if abuse is detected</li>
                    </ul>

                    <h2>Prizes</h2>
                    <p>Prize details include but are not limited to:</p>
                    <ul>
                        <li>Dining experiences at BluRay Maldives restaurants</li>
                        <li>Hotel accommodation packages</li>
                        <li>Activity and excursion vouchers</li>
                        <li>Other promotional items and services</li>
                    </ul>
                    <p><strong>Note:</strong> Prize values and availability are subject to change. No cash alternatives are available unless specifically stated.</p>

                    <h2>Winner Selection and Notification</h2>
                    <ul>
                        <li>Winners are selected at random from valid entries</li>
                        <li>Winners will be announced in our Viber community</li>
                        <li>Winners will be contacted via phone within 7 days of selection</li>
                        <li>If a winner cannot be contacted within 48 hours, an alternate winner may be selected</li>
                        <li>Winners must provide valid identification to claim prizes</li>
                    </ul>

                    <h2>Prize Claiming</h2>
                    <ul>
                        <li>Prizes must be claimed within 30 days of notification</li>
                        <li>Winners are responsible for any taxes or fees associated with prizes</li>
                        <li>Prizes are non-transferable and cannot be exchanged for cash</li>
                        <li>BluRay Maldives reserves the right to substitute prizes of equal value</li>
                    </ul>

                    <h2>Prohibited Activities</h2>
                    <p>The following activities are prohibited and will result in disqualification:</p>
                    <ul>
                        <li>Creating multiple accounts or using false information</li>
                        <li>Attempting to manipulate or hack the system</li>
                        <li>Using automated tools or bots to enter</li>
                        <li>Sharing QR codes inappropriately</li>
                        <li>Any fraudulent or deceptive behavior</li>
                    </ul>

                    <h2>Liability and Disclaimers</h2>
                    <ul>
                        <li>Participation is at your own risk</li>
                        <li>BluRay Maldives is not responsible for lost, stolen, or damaged entries</li>
                        <li>We reserve the right to cancel or modify the promotion at any time</li>
                        <li>Decisions regarding winners and prizes are final and binding</li>
                        <li>By participating, you release BluRay Maldives from any liability</li>
                    </ul>

                    <h2>Privacy</h2>
                    <p>Your personal information is collected and used in accordance with our Privacy Policy. By participating, you consent to the collection and use of your information as described therein.</p>

                    <h2>Modifications</h2>
                    <p>BluRay Maldives reserves the right to modify these terms at any time. Continued participation after changes constitutes acceptance of the modified terms.</p>

                    <h2>Governing Law</h2>
                    <p>These terms are governed by the laws of the Republic of Maldives. Any disputes will be resolved in the courts of Maldives.</p>

                    <h2>Contact Information</h2>
                    <p>For questions about these terms or the lucky draw, contact us:</p>
                    <ul>
                        <li><strong>Email:</strong> info@blueraymaldives.com</li>
                        <li><strong>Phone:</strong> +960 [contact number]</li>
                        <li><strong>Address:</strong> BluRay Maldives, [address]</li>
                    </ul>
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
