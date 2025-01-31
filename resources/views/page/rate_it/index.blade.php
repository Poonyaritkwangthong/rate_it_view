@extends('layouts.user') {{-- ดึง layouts/app มาใช้  --}}

@section('title')
    {{-- ตั้งชื่อ section เพื่อดึงไปใช้ layouts ผ่านคำสั่ง @yield('title') ในlayouts --}}
    บุคลากร
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif


    @if ($evaluationRound == 1)
        <div class="container mt-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h5 class="mb-0">📋 รายการบุคลากรสำหรับการประเมิน รอบที่ 1 <strong>มีนาคม - กันยายน</strong></h5>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col" style="width: 10%;">ลำดับ</th>
                                    <th scope="col" style="width: 35%;">ชื่อ-นามสกุล</th>
                                    <th scope="col" style="width: 35%;">หมวด/แผนก</th>
                                    <th scope="col" style="width: 20%;">การดำเนินการ</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($personals->isEmpty() && !$hasCompletedEvaluation)
                                    <tr>
                                        <td colspan="4" class="text-center text-danger py-4">
                                            <i class="bi bi-exclamation-circle-fill fs-3"></i><br>
                                            ไม่มีข้อมูลบุคลากรในกลุ่มของคุณ
                                        </td>
                                    </tr>
                                @elseif ($hasCompletedEvaluation)
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <div class="alert alert-success shadow-sm" role="alert">
                                                <i class="bi bi-emoji-smile-fill fs-3 text-success"></i><br>
                                                ขอบคุณสำหรับการทำแบบประเมินใน รอบที่ 1 🎉<br>
                                                คุณประเมินครบทุกคนแล้วในรอบนี้!
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($personals as $item)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-start">{{ $item->name }}</td>
                                            <td class="text-start">{{ $item->group->group_name }}</td>
                                            <td>
                                                <a href="{{ route('page.rate_it.create', $item->id) }}"
                                                    class="btn btn-outline-dark btn-sm shadow-sm">
                                                    <i class="bi bi-pencil-square"></i> ให้คะแนน
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @elseif($evaluationRound == 2)
        <div class="container mt-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h5 class="mb-0">📋 รายการบุคลากรสำหรับการประเมิน รอบที่ 2 <strong>ตุลาคม - กุมภาพันธ์</strong></h5>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col" style="width: 10%;">ลำดับ</th>
                                    <th scope="col" style="width: 35%;">ชื่อ-นามสกุล</th>
                                    <th scope="col" style="width: 35%;">หมวด/แผนก</th>
                                    <th scope="col" style="width: 20%;">การดำเนินการ</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($personals->isEmpty() && !$hasCompletedEvaluation)
                                    <tr>
                                        <td colspan="4" class="text-center text-danger py-4">
                                            <i class="bi bi-exclamation-circle-fill fs-3"></i><br>
                                            ไม่มีข้อมูลบุคลากรในกลุ่มของคุณ
                                        </td>
                                    </tr>
                                @elseif ($hasCompletedEvaluation)
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <div class="alert alert-success shadow-sm" role="alert">
                                                <i class="bi bi-emoji-smile-fill fs-3 text-success"></i><br>
                                                ขอบคุณสำหรับการทำแบบประเมินใน รอบที่ 2 🎉<br>
                                                คุณประเมินครบทุกคนแล้วในรอบนี้!
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($personals as $item)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-start">{{ $item->name }}</td>
                                            <td class="text-start">{{ $item->group->group_name }}</td>
                                            <td>
                                                <a href="{{ route('page.rate_it.create', $item->id) }}"
                                                    class="btn btn-outline-dark btn-sm shadow-sm">
                                                    <i class="bi bi-pencil-square"></i> ให้คะแนน
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="clock-container mx-auto position-absolute bottom-0 end-0 border rounded bg-dark" style="width: 12rem; height: 4rem; p-2">
        <div class="date" id="current-date">01 January 2025</div>
        <div class="clock" id="current-time">00:00:00</div>
    </div>
    <style>
        .clock-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .date,
        .clock {
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
        }

        .clock {
            margin-top: 0.5rem;
        }
    </style>
    <script>
        function updateClock() {
            const now = new Date();

            // Get time
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            // Get date
            const day = String(now.getDate()).padStart(2, '0');
            const monthNames = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            const month = monthNames[now.getMonth()];
            const year = now.getFullYear();

            // Update date and time
            document.getElementById('current-date').textContent = `${day} ${month} ${year}`;
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000);
        updateClock(); // Initialize immediately
    </script>
@endsection
