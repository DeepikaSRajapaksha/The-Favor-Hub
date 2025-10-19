<style>
.flash-container .alert {
    border-radius: 10px;
    padding: 1rem 1.25rem;
    font-weight: 500;
    animation: slideInRight 0.4s ease forwards;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>

<div class="flash-container position-fixed top-0 end-0 p-3" style="z-index: 1055; width: 30%;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3" role="alert">
            <strong>✅ Success:</strong> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3" role="alert">
            <strong>⚠️ Error:</strong> {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show shadow-sm mb-3" role="alert">
            <strong>⚠️ Validation Error:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
