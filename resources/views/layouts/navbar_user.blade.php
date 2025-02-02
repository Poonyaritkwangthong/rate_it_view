<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#">PPK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('page/rate_it/index')  }}">ประเมินบุคลากร</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('page/user/index') }}">สรุปผลตามชื่อบุคลากร</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        เมนู
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/page/capacity_rate_it/assessment_01/index') }}">หัวหน้าประเมินส่วนที่1</a></li>
                        <li><a class="dropdown-item" href="{{ url('/page/capacity_rate_it/assessment_02/index') }}">หัวหน้าประเมินส่วนที่2</a></li>
                        <li><a class="dropdown-item" href="{{ url('/page/capacity_rate_it/self_rate_it/index') }}">ประเมินตนเอง</a></li>
                        <li><a class="dropdown-item" href="{{ url('/page/result/index') }}">เเบบสรุปการประเมินการราชกาล</a></li>
                        <li><a class="dropdown-item" href="{{ url('/page/capacity_rate_it/summarize/index') }}">สรุปการประเมินการราชกาล</a></li>
                        <li><a class="dropdown-item" href="{{ url('/page/capacity_rate_it/above/index') }}">ความคิดเห็นรองผอ.</a></li>
                        <li><a class="dropdown-item" href="{{ url('/page/capacity_rate_it/further/index') }}">ความคิดเห็นผอ.</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"><span>ผู้ใช้ :</span> {{ Auth::user()->name }}</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
