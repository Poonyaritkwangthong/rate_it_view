<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <a href="#" class="text-white text-lg font-bold">PPK</a>
            <button class="text-gray-400 lg:hidden focus:outline-none" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <div class="hidden lg:flex lg:items-center lg:space-x-6">
                <a href="{{ url('page/rate_it/index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">ประเมินบุคลากร</a>
                <a href="{{ url('page/user/index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">สรุปผลตามชื่อบุคลากร</a>
                <a href="{{ url('/page/capacity_rate_it/head_rate_it/index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">หัวหน้าประเมิน</a>
                <a href="{{ url('/page/capacity_rate_it/self_rate_it/index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">ประเมินตนเอง</a>
                <a href="{{ url('/page/result/index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">เเบบสรุปผลตามชื่อบุคลากร</a>
                <a href="{{ url('/page/capacity_rate_it/summarize/index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">สรุปผลตามชื่อบุคลากร</a>
                <div class="relative">
                    <button class="text-gray-300 hover:text-white flex items-center px-3 py-2 rounded-md focus:outline-none">
                        เมนู
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="absolute hidden bg-white text-gray-700 mt-2 w-40 rounded-md shadow-md">
                        <li><a href="{{ url('/page/capacity_rate_it/assessment_01/index') }}" class="block px-4 py-2 hover:bg-gray-100">หัวหน้าประเมินส่วนที่1</a></li>
                        <li><a href="{{ url('/page/capacity_rate_it/assessment_02/index') }}" class="block px-4 py-2 hover:bg-gray-100">หัวหน้าประเมินส่วนที่2</a></li>
                        <li><a href="{{ url('/page/capacity_rate_it/above/index') }}">ความคิดเห็นรองผอ.</a></li>
                        <li><a href="{{ url('/page/capacity_rate_it/further/index') }}">ความคิดเห็นผอ.</a></li>
                        <li><a href="{{ url('/page/capacity_rate_it/self_rate_it/index') }}" class="block px-4 py-2 hover:bg-gray-100">ประเมินตนเอง</a></li>
                        <li><hr class="border-t my-2"></li>
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <span class="text-gray-300 px-3 py-2"><span>ผู้ใช้ :</span> {{ Auth::user()->name }}</span>
            </div>
            <form class="hidden lg:flex items-center space-x-2">
                <input type="search" placeholder="Search" class="px-4 py-2 rounded-md bg-gray-700 text-white focus:outline-none">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Search</button>
            </form>
        </div>
    </div>
</nav>
