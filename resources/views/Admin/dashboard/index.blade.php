@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">The Flavor Hub Dashboard</h2>
        <div id="clock" class="fw-semibold text-muted"></div>
    </div>

    {{-- ====== TOP CARDS ====== --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-gradient-primary text-white">
                <div class="card-body">
                    <h6>Total Orders</h6>
                    <h3 id="totalOrders">0</h3>
                    <i class="fa-solid fa-receipt fs-2 position-absolute end-0 me-3 opacity-25"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-gradient-success text-white">
                <div class="card-body">
                    <h6>Revenue (Rs.)</h6>
                    <h3 id="totalRevenue">0</h3>
                    <i class="fa-solid fa-coins fs-2 position-absolute end-0 me-3 opacity-25"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-gradient-warning text-white">
                <div class="card-body">
                    <h6>Menu Items</h6>
                    <h3 id="menuCount">0</h3>
                    <i class="fa-solid fa-utensils fs-2 position-absolute end-0 me-3 opacity-25"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-gradient-info text-white">
                <div class="card-body">
                    <h6>Active Categories</h6>
                    <h3 id="categoryCount">0</h3>
                    <i class="fa-solid fa-layer-group fs-2 position-absolute end-0 me-3 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- ====== CHARTS & CALENDAR ====== --}}
    <div class="row g-4 mb-4">
        {{-- Revenue Chart --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Revenue Overview</div>
                <div class="card-body">
                    <canvas id="revenueChart" height="150"></canvas>
                </div>
            </div>
        </div>

        {{-- Calendar --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Calendar</div>
                <div class="card-body">
                    <div id="calendar" class="text-center"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====== RECENT ORDERS ====== --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white fw-bold">Recent Orders</div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Total (Rs.)</th>
                        <th>Payment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="recentOrders">
                    <tr><td colspan="5" class="text-center text-muted">Loading...</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- STYLES --}}
<style>
.bg-gradient-primary { background: linear-gradient(45deg, #007bff, #00a6ff); }
.bg-gradient-success { background: linear-gradient(45deg, #28a745, #5cd65c); }
.bg-gradient-warning { background: linear-gradient(45deg, #ffc107, #ffdd57); color:#000 !important; }
.bg-gradient-info { background: linear-gradient(45deg, #17a2b8, #6ed4e3); }

#calendar {
    font-family: 'Poppins', sans-serif;
}
#calendar table {
    width: 100%;
    border-collapse: collapse;
}
#calendar th, #calendar td {
    text-align: center;
    padding: 6px;
}
#calendar .today {
    background: #ffc107;
    color: #000;
    border-radius: 50%;
}
</style>

{{-- SCRIPTS --}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
    const ordersRes = await axios.get('/api/pos/orders');
    const menusRes = await axios.get('/api/pos/menu');

    const orders = ordersRes.data.data || [];
    const menus = menusRes.data.data || [];

    // ===== Dashboard Stats =====
    document.getElementById('totalOrders').textContent = orders.length;
    document.getElementById('menuCount').textContent = menus.length;
    document.getElementById('categoryCount').textContent = new Set(menus.map(m => m.category_id)).size;
    document.getElementById('totalRevenue').textContent = orders.reduce((t, o) => t + parseFloat(o.total), 0).toFixed(2);

    // ===== Recent Orders =====
    const tbody = document.getElementById('recentOrders');
    tbody.innerHTML = orders.slice(0, 6).map(o => `
        <tr>
            <td>${o.id}</td>
            <td>${new Date(o.created_at).toLocaleString()}</td>
            <td>${o.total}</td>
            <td>${o.payment_method}</td>
            <td><span class="badge bg-success">${o.status}</span></td>
        </tr>
    `).join('');

    // ===== Revenue Chart =====
    const ctx = document.getElementById('revenueChart');
    const months = [...Array(12).keys()].map(i => new Date(0, i).toLocaleString('en', { month: 'short' }));
    const monthlyTotals = Array(12).fill(0);

    orders.forEach(o => {
        const m = new Date(o.created_at).getMonth();
        monthlyTotals[m] += parseFloat(o.total);
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Monthly Revenue (Rs.)',
                data: monthlyTotals,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // ===== Mini Calendar =====
    renderCalendar();
    updateClock();
    setInterval(updateClock, 1000);
});

// Simple Calendar
function renderCalendar() {
    const now = new Date();
    const month = now.toLocaleString('en', { month: 'long' });
    const year = now.getFullYear();
    const firstDay = new Date(year, now.getMonth(), 1).getDay();
    const daysInMonth = new Date(year, now.getMonth() + 1, 0).getDate();

    let html = `<h5>${month} ${year}</h5><table><tr>
        <th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th>
    </tr><tr>`;

    for (let i = 0; i < firstDay; i++) html += "<td></td>";
    for (let day = 1; day <= daysInMonth; day++) {
        const todayClass = (day === now.getDate()) ? 'today' : '';
        html += `<td class="${todayClass}">${day}</td>`;
        if ((day + firstDay) % 7 === 0) html += "</tr><tr>";
    }
    html += "</tr></table>";

    document.getElementById('calendar').innerHTML = html;
}

// Live Clock
function updateClock() {
    const now = new Date();
    document.getElementById('clock').textContent = now.toLocaleString();
}
</script>
@endsection

