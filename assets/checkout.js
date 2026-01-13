/**
 * Checkout functionality for NovaCommerce Landing Pages
 */

let stripe;
let elements;
let cardElement;
let selectedBundle = null;

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initStripe();
    initForm();
});

/**
 * Initialize Stripe Elements
 */
function initStripe() {
    if (!window.offerData || !window.offerData.stripe_publishable_key) {
        console.error('Stripe publishable key not found');
        return;
    }

    const stripeOptions = {};
    if (window.offerData.stripe_account_id) {
        stripeOptions.stripeAccount = window.offerData.stripe_account_id;
    }

    stripe = Stripe(window.offerData.stripe_publishable_key, stripeOptions);
    elements = stripe.elements();

    // Create card element
    cardElement = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#1F2937',
                '::placeholder': {
                    color: '#9CA3AF',
                },
            },
            invalid: {
                color: '#EF4444',
            },
        },
    });

    // Mount card element
    const cardContainer = document.getElementById('card-element');
    if (cardContainer) {
        cardElement.mount('#card-element');

        // Handle card errors
        cardElement.on('change', function(event) {
            const errorElement = document.getElementById('card-errors');
            if (event.error) {
                errorElement.textContent = event.error.message;
            } else {
                errorElement.textContent = '';
            }
        });
    }
}

/**
 * Initialize form submission
 */
function initForm() {
    const form = document.getElementById('checkout-form');
    if (form) {
        form.addEventListener('submit', handleSubmit);
    }
}

/**
 * Open checkout modal
 */
function openCheckout() {
    const modal = document.getElementById('checkout-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';

    // Select first bundle if none selected
    if (!selectedBundle && window.offerData.bundles && window.offerData.bundles.length > 0) {
        selectBundle(window.offerData.bundles[0].id);
    }

    // Reinitialize Lucide icons
    if (window.lucide) {
        lucide.createIcons();
    }
}

/**
 * Close checkout modal
 */
function closeCheckout() {
    const modal = document.getElementById('checkout-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

/**
 * Select a bundle
 */
function selectBundle(bundleId) {
    const bundle = window.offerData.bundles.find(b => b.id === bundleId);
    if (!bundle) return;

    selectedBundle = bundle;

    // Update UI
    document.getElementById('bundle-name').textContent = bundle.name;
    document.getElementById('bundle-subtitle').textContent = bundle.subtitle || '';
    document.getElementById('bundle-price').textContent = '$' + parseFloat(bundle.price).toFixed(2);

    if (bundle.image_url) {
        document.getElementById('bundle-image').src = bundle.image_url;
        document.getElementById('bundle-image').style.display = 'block';
    } else {
        document.getElementById('bundle-image').style.display = 'none';
    }

    if (bundle.compare_price && bundle.compare_price > bundle.price) {
        document.getElementById('bundle-compare-price').textContent = '$' + parseFloat(bundle.compare_price).toFixed(2);
        document.getElementById('bundle-compare-price').style.display = 'block';
    } else {
        document.getElementById('bundle-compare-price').style.display = 'none';
    }

    // Update summary
    document.getElementById('summary-subtotal').textContent = '$' + parseFloat(bundle.price).toFixed(2);
    document.getElementById('summary-total').textContent = '$' + parseFloat(bundle.price).toFixed(2);

    // Open modal
    openCheckout();
}

/**
 * Handle form submission
 */
async function handleSubmit(event) {
    event.preventDefault();

    const submitButton = document.getElementById('submit-button');
    const form = event.target;

    // Validate
    if (!selectedBundle) {
        alert('Please select a package');
        return;
    }

    // Disable button and show loading
    submitButton.disabled = true;
    submitButton.innerHTML = '<div class="spinner"></div><span>Processing...</span>';

    try {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        // Step 1: Save lead
        const leadResponse = await fetch(window.checkoutApiUrl + '/lead', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                offer_id: window.offerData.id,
                email: data.email,
                first_name: data.first_name,
                last_name: data.last_name,
                phone: data.phone,
            }),
        });

        if (!leadResponse.ok) {
            throw new Error('Failed to save contact information');
        }

        // Step 2: Create payment intent
        const paymentResponse = await fetch(window.checkoutApiUrl + '/create-payment-intent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                offer_id: window.offerData.id,
                bundle_id: selectedBundle.id,
                email: data.email,
                shipping_address: {
                    first_name: data.first_name,
                    last_name: data.last_name,
                    address: data.address,
                    address2: data.address2 || '',
                    city: data.city,
                    state: data.state,
                    zip: data.zip,
                    country: data.country,
                    phone: data.phone,
                },
            }),
        });

        if (!paymentResponse.ok) {
            const error = await paymentResponse.json();
            throw new Error(error.message || 'Failed to create payment');
        }

        const { client_secret, order_number } = await paymentResponse.json();

        // Step 3: Confirm payment with Stripe
        const { error, paymentIntent } = await stripe.confirmCardPayment(client_secret, {
            payment_method: {
                card: cardElement,
                billing_details: {
                    name: data.first_name + ' ' + data.last_name,
                    email: data.email,
                    phone: data.phone,
                    address: {
                        line1: data.address,
                        line2: data.address2 || '',
                        city: data.city,
                        state: data.state,
                        postal_code: data.zip,
                        country: data.country,
                    },
                },
            },
        });

        if (error) {
            throw new Error(error.message);
        }

        // Step 4: Confirm order
        const confirmResponse = await fetch(window.checkoutApiUrl + '/confirm-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                order_number: order_number,
                payment_intent_id: paymentIntent.id,
            }),
        });

        if (!confirmResponse.ok) {
            throw new Error('Payment succeeded but order confirmation failed. Please contact support.');
        }

        const { order } = await confirmResponse.json();

        // Success! Redirect to success page or show confirmation
        showSuccess(order);

    } catch (error) {
        console.error('Checkout error:', error);
        showError(error.message);
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = '<i data-lucide="lock" class="w-5 h-5"></i><span>Complete Purchase</span>';
        if (window.lucide) {
            lucide.createIcons();
        }
    }
}

/**
 * Show error message
 */
function showError(message) {
    const errorElement = document.getElementById('card-errors');
    errorElement.textContent = message;
    errorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

/**
 * Show success message
 */
function showSuccess(order) {
    const modal = document.getElementById('checkout-modal');
    const modalContent = modal.querySelector('.bg-white');

    modalContent.innerHTML = `
        <div class="p-8 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Order Confirmed!</h2>
            <p class="text-gray-600 mb-4">Thank you for your purchase.</p>
            <p class="text-sm text-gray-500 mb-6">Order #${order.order_number}</p>
            <p class="text-gray-600 mb-8">We've sent a confirmation email to <strong>${order.email}</strong></p>
            <button onclick="closeCheckout(); location.reload();" class="btn-primary text-white px-8 py-3 rounded-xl font-semibold">
                Continue Shopping
            </button>
        </div>
    `;
}
