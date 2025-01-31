@extends('layouts.admin')

@section('title')
 personal page
@endsection

@section('content')
<div class="container">
    <form action="{{ route('update.round') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Update Round</button>
    </form>
    <div class="card shadow-sm border-0" style="width: 96rem">
        <div class="card-header bg-dark text-white text-center">
            <h5 class="mb-0">📋 ตารางคำถาม</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col" style="width: 10%;">ลำดับ</th>
                            <th scope="col" style="width: 30%;">ชื่อบุคลากร</th>
                            <th scope="col" style="width: 5%;">คะเเนนรวม</th>
                            <th scope="col" style="width: 5%;">รอบที่</th>
                            <th scope="col" style="width: 10%;">การดำเนินการ</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($personals as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $item->user->name }}</td>
                                <td class="text-start">{{ $item->total_score }}</td>
                                <td class="text-start">{{ $item->round }}</td>
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
