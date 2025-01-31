<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4 w-100" style="max-width: 500px;">
            <h2 class="text-center text-dark mb-4">หน้าลงทะเบียน</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="user_name" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="group_num" class="form-label">กลุ่มงาน</label>
                    <select name="group_num" id="group_num" class="form-select" required>
                        @foreach ($group as $item)
                            <option value="{{ $item->id }}">{{ $item->group_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="job_position_num" class="form-label">กลุ่มงาน</label>
                    <select name="job_position_num" id="job_position_num" class="form-select" required>
                        @foreach ($job_position as $item)
                            <option value="{{ $item->id }}">{{ $item->job_position_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="job_type_num" class="form-label">กลุ่มงาน</label>
                    <select name="job_type_num" id="job_type_num" class="form-select" required>
                        @foreach ($job_type as $item)
                            <option value="{{ $item->id }}">{{ $item->job_type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tier_num" class="form-label">กลุ่มงาน</label>
                    <select name="tier_num" id="tier_num" class="form-select" required>
                        @foreach ($tier as $item)
                            <option value="{{ $item->id }}">{{ $item->tier_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="work_affiliation_num" class="form-label">กลุ่มงาน</label>
                    <select name="work_affiliation_num" id="work_affiliation_num" class="form-select" required>
                        @foreach ($work_affiliation as $item)
                            <option value="{{ $item->id }}">{{ $item->work_affiliation_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-dark w-100">ลงทะเบียน</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
