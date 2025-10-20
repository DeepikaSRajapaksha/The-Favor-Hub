@extends('layouts.admin')
@section('title', 'Order History')

@section('content')
<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4 text-center">Order History</h3>

    <div id="orders-container" class="row">
        <div class="text-center my-4">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading orders...</span>
            </div>
        </div>
    </div>
</div>

{{-- Axios + SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ordersContainer = document.getElementById('orders-container');

    // Fetch orders
    axios.get('/api/pos/orders')
        .then(response => {
            const orders = response.data.data; 
            if (!orders || orders.length === 0) {
                ordersContainer.innerHTML = `<p class="text-muted text-center mt-5">No orders found.</p>`;
                return;
            }
            renderOrders(orders);
        })
        .catch(error => {
            console.error(error);
            ordersContainer.innerHTML = `<p class="text-danger text-center mt-5">❌ Failed to load orders.</p>`;
        });

    // Render orders
    function renderOrders(orders) {
        ordersContainer.innerHTML = '';

        orders.forEach(order => {
            const card = document.createElement('div');
            card.classList.add('col-md-6', 'col-lg-4', 'mb-4');

            const date = new Date(order.created_at).toLocaleString();

            let itemsHTML = '';
            order.items.forEach(i => {
                itemsHTML += `
                    <div class="d-flex align-items-center border-bottom py-2">
                        <img src="/uploads/menus/${i.menu.image}" class="me-2 rounded" width="45" height="45" style="object-fit:cover;">
                        <div class="flex-grow-1">
                            <div class="fw-semibold">${i.menu.name}</div>
                            <small class="text-muted">x${i.quantity} @ Rs.${i.price}</small>
                        </div>
                        <div class="text-end fw-semibold">Rs.${(i.price * i.quantity).toFixed(2)}</div>
                    </div>
                `;
            });

            card.innerHTML = `
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span>Order #${order.id}</span>
                        <span class="badge bg-success">${order.status}</span>
                    </div>
                    <div class="card-body">
                        ${itemsHTML}
                        <div class="text-end mt-3 border-top pt-2 fw-bold">
                            Total: Rs.${parseFloat(order.total).toFixed(2)}
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted">${date}</small>
                        <button class="btn btn-sm btn-warning" onclick="viewOrder(${order.id})">View</button>
                    </div>
                </div>
            `;
            ordersContainer.appendChild(card);
        });
    }

    // SweetAlert - View full order
    window.viewOrder = function(orderId) {
        axios.get(`/api/pos/order/${orderId}`)
            .then(response => {
                const order = response.data.data;
                let html = `
                    <div class="text-start">
                        <p><strong>Payment Method:</strong> ${order.payment_method}</p>
                        <p><strong>Status:</strong> ${order.status}</p>
                        <p><strong>Date:</strong> ${new Date(order.created_at).toLocaleString()}</p>
                        <hr>
                `;

                order.items.forEach(i => {
                    html += `
                        <div class="d-flex align-items-center mb-2">
                            <img src="/uploads/menus/${i.menu.image}" class="me-2 rounded" width="40" height="40" style="object-fit:cover;">
                            <div class="flex-grow-1">
                                ${i.menu.name} <small class="text-muted">(x${i.quantity})</small>
                            </div>
                            <div class="fw-semibold">Rs.${(i.price * i.quantity).toFixed(2)}</div>
                        </div>
                    `;
                });

                html += `<hr><div class="text-end fw-bold fs-5">Total: Rs.${order.total}</div></div>`;

                Swal.fire({
                    title: `Order #${order.id}`,
                    html: html,
                    width: 600,
                    confirmButtonText: 'Close',
                    confirmButtonColor: '#ffc107',
                });
            })
            .catch(error => {
                console.error(error);
                Swal.fire('Error', 'Failed to load order details.', 'error');
            });
    }
});
</script>
@endsection
