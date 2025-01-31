<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 bg-dark text-white" style="width: 250px; height: 100vh; position: fixed;">
    <h4 class="text-center py-3 border-bottom">My Sidebar</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-white active">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/personal/index') }}" class="nav-link text-white">
                <i class="bi bi-person-circle me-2"></i> เปิดการประเมิน
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/question/index') }}" class="nav-link text-white">
                <i class="bi bi-envelope-fill me-2"></i> หมวดคำถาม
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-gear-fill me-2"></i> Settings
            </a>
        </li>
    </ul>
    <div class="mt-auto p-3 border-top">
        <button class="btn btn-danger w-100 mb-2"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>


<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
