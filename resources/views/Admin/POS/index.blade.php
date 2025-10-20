@extends('layouts.admin')
@section('title', 'POS System')

@section('content')
<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4 text-center">Point of Sale (POS)</h3>

    <div class="row">
        {{-- Left: Menu Items Section --}}
        <div class="col-lg-8">
            <div class="menu-grid" id="menu-container">
                <div class="text-center my-4">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Loading menu...</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: Cart Section --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Cart</h5>
                <button id="btn-clear" class="btn btn-sm btn-light text-dark">Clear</button>
            </div>

            <div class="card-body" id="cart-items">
                <p class="text-muted text-center mb-0">No items in cart.</p>
            </div>

            <!-- Cart total summary -->
            <div class="card-footer">
                <div class="d-flex justify-content-between fw-semibold fs-6 mb-2">
                    <span>Total:</span>
                    <span id="cart-total">Rs. 0.00</span>
                </div>
                <button id="btn-checkout" class="btn btn-warning w-100 fw-semibold" disabled>Pay Bill</button>
            </div>
        </div>
        </div>
    </div>
</div>

{{-- Styling --}}
<style>
    /* Menu grid layout */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
    }

    .menu-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .menu-card:hover {
        transform: translateY(-5px);
    }

    .menu-card img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-bottom: 1px solid #eee;
    }

    .menu-card .menu-info {
        padding: 0.5rem;
        text-align: center;
    }

    .menu-card h6 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.3rem;
    }

    .menu-card p {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 0.3rem;
    }

    .menu-card .price {
        color: #000;
        font-weight: 600;
    }

    .menu-card button {
        background-color: #212529;
        color: #fff;
        border: none;
        width: 100%;
        padding: 6px;
        border-radius: 0 0 10px 10px;
        transition: background 0.3s;
    }

    .menu-card button:hover {
        background-color: #ffc107;
        color: #000;
    }
</style>

{{-- Axios Script --}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuContainer = document.getElementById('menu-container');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const btnCheckout = document.getElementById('btn-checkout');

    let cart = [];

    // Load menu items from API
    axios.get('/api/pos/menu')
        .then(response => {
            const items = response.data.data;
            renderMenu(items);
        })
        .catch(() => {
            menuContainer.innerHTML = `<p class="text-danger text-center">Failed to load menu items.</p>`;
        });

    // Render menu items
    function renderMenu(items) {
        menuContainer.innerHTML = '';

        items.forEach(item => {
            const card = document.createElement('div');
            card.classList.add('menu-card');

            // Build image path (based on your uploads folder)
            let imgSrc = item.image 
                ? `/uploads/menus/${encodeURIComponent(item.image)}`
                : '/images/no-image.png';

            // Create small card (image + name + price)
            card.innerHTML = `
                <img src="${imgSrc}" alt="${item.name}" 
                    onerror="this.onerror=null;this.src='/images/no-image.png';" />
                <div class="menu-info">
                    <h6>${item.name}</h6>
                    <div class="price">Rs. ${parseFloat(item.price).toFixed(2)}</div>
                </div>
                <button onclick="addToCart(${item.id}, '${item.name}', ${item.price})">Add</button>
            `;

            menuContainer.appendChild(card);
        });
    }

    // Add to cart
    window.addToCart = function(id, name, price) {
        const existing = cart.find(item => item.menu_id === id);
        if (existing) {
            existing.quantity += 1;
        } else {
            cart.push({ menu_id: id, name, price, quantity: 1 });
        }
        renderCart();
    };

    // Render cart
    function renderCart() {
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = `<p class="text-muted text-center mb-0">No items in cart.</p>`;
            cartTotal.innerText = "Rs. 0.00";
            btnCheckout.disabled = true;
            return;
        }

        btnCheckout.disabled = false;
        cartItemsContainer.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const subtotal = item.price * item.quantity;
            total += subtotal;

            const row = document.createElement('div');
            row.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'border-bottom', 'py-2');
            row.innerHTML = `
                <div>
                    <strong>${item.name}</strong> 
                    <small class="text-muted">(x${item.quantity})</small>
                </div>
                <div>
                    Rs. ${subtotal.toFixed(2)}
                    <button class="btn btn-sm btn-danger ms-2" onclick="removeFromCart(${index})">🗑️</button>
                </div>
            `;
            cartItemsContainer.appendChild(row);
        });

        // Update total below cart
        cartTotal.innerText = `Rs. ${total.toFixed(2)}`;
    }

    // Remove item from cart
    window.removeFromCart = function(index) {
        cart.splice(index, 1);
        renderCart();
    };

    // Checkout / Place Order
    btnCheckout.addEventListener('click', function() {
        if (cart.length === 0) return;

        const totalAmount = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0).toFixed(2);

        Swal.fire({
            title: 'Confirm Payment',
            html: `<p class="fs-5 fw-semibold text-dark">Total Amount: Rs. ${totalAmount}</p>
                <p class="text-muted mb-0">Do you want to complete this order?</p>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Pay Now',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const orderData = {
                    items: cart.map(item => ({
                        menu_id: item.menu_id,
                        quantity: item.quantity
                    })),
                    payment_method: 'Cash'
                };

                // Send order to API
                axios.post('/api/pos/order', orderData)
                    .then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Successful!',
                            html: `<p class="fs-6">Order placed successfully.</p>
                                <strong>Total: Rs. ${response.data.total}</strong>`,
                            confirmButtonColor: '#28a745'
                        });

                        cart = [];
                        renderCart();
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Payment Failed!',
                            text: 'There was an error placing your order. Please try again.',
                            confirmButtonColor: '#d33'
                        });
                        console.error(error);
                    });
            }
        });
    });

    document.getElementById('btn-clear').addEventListener('click', () => {
        if (cart.length === 0) return;

        Swal.fire({
            title: 'Clear Cart?',
            text: 'Are you sure you want to remove all items from the cart?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, clear it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                cart = [];
                renderCart();

                Swal.fire({
                    icon: 'success',
                    title: 'Cart Cleared!',
                    text: 'All items have been removed.',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    });
});
</script>
@endsection
