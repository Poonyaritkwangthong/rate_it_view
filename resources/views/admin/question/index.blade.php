@extends('layouts.admin')

@section('title')
    question index
@endsection

@section('content')
    <div class="container">
        <a href="#" class="btn btn-success m-3 mx-auto">เพิ่มคำถาม</a>
        <div class="card shadow-sm border-0" style="width: 96rem">
            <div class="card-header bg-dark text-white text-center">
                <h5 class="mb-0">📋 ตารางคำถาม</h5>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col" style="width: 5%;">ลำดับ</th>
                                <th scope="col" style="width: 35%;">คำถาม</th>
                                <th scope="col" style="width: 5%;">สถานะ</th>
                                <th scope="col" style="width: 10%;">คูณคะเเนนพิเศษ</th>
                                <th scope="col" style="width: 20%;">การดำเนินการ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($questions as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-start">{{ $item->question_name }}</td>
                                    <td class="">{{ $item->question_status }}</td>
                                    @if ($item->question_multiply === null)
                                        <td class="text-center">null</td>
                                    @else
                                        <td class="text-start">{{ $item->question_multiply }}</td>
                                    @endif
                                    <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm shadow-sm">
                                            <i class="bi bi-pencil-square"></i> แก้ไข
                                        </a>
                                        <a href="#" class="btn btn-outline-danger btn-sm shadow-sm">
                                            <i class="bi bi-trash"></i> ลบ
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
