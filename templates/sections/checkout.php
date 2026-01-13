<div class="p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-900">Complete Your Order</h3>
        <button onclick="closeCheckoutModal()" class="text-gray-400 hover:text-gray-600">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
    </div>

    <!-- Selected Bundle -->
    <div id="selected-bundle" class="bg-gray-50 rounded-xl p-4 mb-6">
        <div class="flex items-center gap-4">
            <img id="bundle-image" src="" alt="" class="w-16 h-16 object-cover rounded-lg">
            <div class="flex-grow">
                <h4 id="bundle-name" class="font-semibold text-gray-900"></h4>
                <p id="bundle-subtitle" class="text-sm text-gray-600"></p>
            </div>
            <div class="text-right">
                <p id="bundle-price" class="text-xl font-bold text-gray-900"></p>
                <p id="bundle-compare-price" class="text-sm text-gray-400 line-through"></p>
            </div>
        </div>
    </div>

    <!-- Checkout Form -->
    <form id="checkout-form" class="space-y-4">
        <!-- Contact Information -->
        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Contact Information</h4>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <input type="tel" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <!-- Shipping Address -->
        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Shipping Address</h4>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc. (optional)</label>
                    <input type="text" name="address2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type="text" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">State / Province</label>
                        <input type="text" name="state" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ZIP / Postal Code</label>
                        <input type="text" name="zip" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <select name="country" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="GB">United Kingdom</option>
                            <option value="AU">Australia</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment -->
        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Payment</h4>
            <div id="card-element" class="p-4 border border-gray-300 rounded-lg">
                <!-- Stripe Card Element will be mounted here -->
            </div>
            <p id="card-errors" class="text-red-500 text-sm mt-2"></p>
        </div>

        <!-- Order Summary -->
        <div class="bg-gray-50 rounded-xl p-4">
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Subtotal</span>
                <span id="summary-subtotal" class="font-medium"></span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Shipping</span>
                <span id="summary-shipping" class="font-medium">FREE</span>
            </div>
            <div class="border-t border-gray-200 pt-2 mt-2">
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-900">Total</span>
                    <span id="summary-total" class="text-xl font-bold text-gray-900"></span>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" id="submit-button" class="w-full btn-primary text-white py-4 rounded-xl font-semibold text-lg flex items-center justify-center gap-2">
            <i data-lucide="lock" class="w-5 h-5"></i>
            <span>Complete Purchase</span>
        </button>

        <!-- Trust Badges -->
        <div class="flex justify-center gap-6 text-sm text-gray-500 pt-4">
            <div class="flex items-center gap-1">
                <i data-lucide="shield-check" class="w-4 h-4"></i>
                <span>Secure Payment</span>
            </div>
            <div class="flex items-center gap-1">
                <i data-lucide="lock" class="w-4 h-4"></i>
                <span>SSL Encrypted</span>
            </div>
        </div>
    </form>
</div>
