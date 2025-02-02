@extends('layouts.user')

@section('title')
    หน้าประเเมินคะเเนน
@endsection

@section('content')
    <form action="{{ route('page.rate_it.store') }}" method="POST">
        @csrf
        <input type="hidden" name="personal_num" value="{{ $personal->id }}">

        <div class="container mt-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h4 class="mb-0">📝 แบบประเมินความพึงพอใจ</h4>
                </div>

                <div class="card-body">
                    <!-- ข้อมูลส่วนตัว -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded shadow-sm">
                                <h6 class="text-muted mb-1">ชื่อผู้ถูกประเมิน:</h6>
                                <h5 class="text-dark fw-bold">{{ $personal->name }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded shadow-sm">
                                <h6 class="text-muted mb-1">กลุ่ม:</h6>
                                <h5 class="text-dark fw-bold">{{ $personal->group->group_name }}</h5>
                            </div>
                        </div>
                    </div>

                    <!-- ตารางแบบประเมิน -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5%;">ข้อ</th>
                                    <th style="width: 40%;">คำถาม</th>
                                    <th>ดีมาก<br>(5)</th>
                                    <th>ดี<br>(4)</th>
                                    <th>ปานกลาง<br>(3)</th>
                                    <th>ต่ำ<br>(2)</th>
                                    <th>ต่ำมาก<br>(1)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($question as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <input type="hidden" name="question_num[]" value="{{ $item->id }}">
                                        <td class="text-start">{{ $item->question_name }}</td>
                                        @php
                                            $multiplyFactor = $item->question_multiply ?: 1; // ใช้ค่า default เป็น 1 หากไม่มีการตั้งค่า
                                        @endphp
                                        @for ($score = 5; $score >= 1; $score--)
                                            <td>
                                                <div class="form-check d-flex justify-content-center">
                                                    <input class="form-check-input border-dark" type="radio"
                                                        name="score[{{ $index }}]" value="{{ $score * $multiplyFactor }}"
                                                        required>
                                                </div>
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- ปุ่มส่งแบบประเมิน -->
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success btn-lg shadow-sm">
                            <i class="bi bi-send-check"></i> ส่งแบบประเมิน
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
