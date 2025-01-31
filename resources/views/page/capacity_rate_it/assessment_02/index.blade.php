@extends('layouts.user02')

@section('title')
    head index
@endsection

@section('content')
    <div class="mx-auto">
        <h1 class="text-center mt-[2rem] mb-[2rem]">หัวหน้าประเมินส่วนที่ 2</h1>
        <table class="w-full border">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>รายชื่อบุคลากรในองค์กร</th>
                    <th>เเผนก</th>
                    <th>ตำเเหน่ง</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personals as $item)
                    <tr class="text-center">
                        <td class=" p-2">{{ $loop->iteration }}</td>
                        <td class="text-left p-2">{{ $item->name }}</td>
                        <td class=" p-2">{{ $item->group->group_name }}</td>
                            <td class=" p-2">{{ $item->Tier->tier_name }}</td>
                        <td class="flex justify-center p-2"><a class="bg-black text-white p-1 rounded-lg hover:bg-red-300"
                                href="{{ route('page.capacity_rate_it.assessment_02.create', $item->id) }}">ให้คะเเนน</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
