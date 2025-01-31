@extends('layouts.user')

@section('title')
    index page
@endsection

@section('content')
<div class="bg-dark py-5">
    <div class="container my-5">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-light">ข้อมูลผู้ใช้</h1>
            <p class="text-secondary">ดูข้อมูลส่วนตัวและคะแนนของคุณได้ที่นี่</p>
        </div>

        <!-- User Information Section -->
        <div class="row justify-content-center mb-5">
            <!-- Profile Section -->
            <div class="col-md-4 text-center">
                <!-- Profile Image -->
                <div class="bg-light rounded-circle overflow-hidden border border-3 border-light shadow mb-3 mx-auto"
                    style="width: 150px; height: 150px;">
                    <img class="w-100 h-100"
                        src="https://www.zbrushcentral.com/uploads/default/original/4X/e/8/b/e8bd9bcbc48e44a34ba8d3366090f7064050a37b.jpeg"
                        alt="Profile Image">
                </div>
                <!-- User Name -->
                <h2 class="text-light">
                    <span class="fw-bold">ชื่อผู้ใช้:</span> <span class="text-primary">{{ Auth::user()->name }}</span>
                </h2>
            </div>
        </div>

        <!-- Scores and Chart Section -->
        <div class="bg-light p-3 rounded  ">
            <div class="row justify-content-center align-items-center">
                <!-- Chart Section -->
                <div class="col-lg-8 mb-4">
                    <div class="card text-bg-light shadow">
                        <div class="card-header text-center">
                            <h2 class="fw-bold">คะแนนประเมิน</h2>
                        </div>
                        <div class="card-body">
                            @include('layouts.donut_chart')
                        </div>
                    </div>
                </div>

                <!-- Scores Section -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    @foreach($results as $round => $data)
                    <div class="card text-bg-light shadow mb-3" style="width: 18rem; height: 15.5rem;">
                        <div class="card-header text-center bg-light">
                            <h6 class="text-dark fw-bold">{{ ucfirst($round) }}</h6>
                            <p class="text-secondary small">({{ $data['startDate'] }} - {{ $data['endDate'] }})</p>
                        </div>
                        <div class="card-body text-center">
                            <!-- Average Score -->
                            <div class="mb-2 p-2 border rounded bg-success bg-opacity-10" style="width: 100%; height: 4rem;">
                                <h6 class="text-success fw-bold">คะแนนเฉลี่ย</h6>
                                <p class="fs-6 text-dark">
                                    <span class="fw-bold">{{ $data['AverageTotalScoreGroupByUser'] }}</span> /
                                    <span class="text-dark">{{ $data['FullScore'] }}</span>
                                    <span class="text-dark">{{ $data['totalScoreSum'] }}</span>
                                    <span class="text-dark">{{ $data['TotalUser'] }}</span>
                                </p>
                            </div>
                            <!-- Percentage Score -->
                            <div class="p-2 border rounded bg-info bg-opacity-10" style="width: 100%; height: 4rem;">
                                <h6 class="text-info fw-bold">คิดเป็นเปอร์เซ็นต์</h6>
                                <p class="fs-6 text-dark">
                                    <span class="fw-bold">{{ $data['PercentageScore'] }}</span> /
                                    <span class="text-dark">{{ $data['Percentage'] }}%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
