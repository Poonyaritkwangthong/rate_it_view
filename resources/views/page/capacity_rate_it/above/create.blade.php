<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
</head>

<body>
    <div class="w-[80rem] border mx-auto">
        <form action="{{ route('page.capacity_rate_it.above.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="pt-[2rem] text-center">หน้าที่ 1</h1>
            <div class="pl-[4rem]">
                <h1>เเบบสรุปการประเมินการปฏิบัติราชการ</h1>
                <h1>ส่วนที่ ๑ ข้อมูลของผู้รับการประเมิน</h1>
                <div class="flex gap-[9rem]">
                    <p>รอบการประเมิน</p>
                    <div>
                        <div>
                            <input type="radio" name="round" value="1"
                                {{ $summarize_01->first()->round == '1' ? 'checked' : '' }}>
                            <span class="ml-[2rem]">รอบที่ ๑</span>
                            <span class="ml-[4rem]">๑ ตุลาคม ๒๕๖๖ ถึง ๓๑ มีนาคม ๒๕๖๗</span>
                        </div>
                        <div>
                            <input type="radio" name="round" value="2"
                                {{ $summarize_01->first()->round == '2' ? 'checked' : '' }}>
                            <span class="ml-[2rem]">รอบที่ ๒</span>
                            <span class="ml-[4rem]">๑ เมษายน ๒๕๖๗ ถึง ๓๐ มีนาคม ๒๕๖๗</span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="personal_num" value="{{ $personal->id }}">
                <div class="mb-2 flex gap-4">
                    <h1 class="font-bold">ชื่อผู้รับการประเมิน</h1>
                    <span>{{ $personal->name }}</span>
                </div>
                <div class="flex gap-[9rem]">
                    <div class="mb-2">
                        <div class="flex gap-4 mb-2">
                            <h1 class="font-bold">ตำเเหน่ง </h1>
                            <span>{{ $personal->JobPosition->job_position_name }}</span>
                        </div>
                        <div class="flex gap-4">
                            <h1 class="font-bold">ระดับตำเเหน่ง </h1>
                            <span>{{ $personal->Tier->tier_name }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex gap-4 mb-2">
                            <h1 class="font-bold">ประเภทตำเเหน่ง </h1>
                            <span>{{ $personal->JobType->job_type_name }}</span>
                        </div>
                        <div class="flex gap-4">
                            <h1 class="font-bold">สังกัด/งาน </h1>
                            <span>{{ $personal->WorkAffiliation->work_affiliation_name }}</span>
                        </div>
                    </div>
                </div>

                <div class="mb-2 flex gap-4">
                    <h1 class="font-bold">ฝ่าย/กลุ่มงาน </h1>
                    <span>{{ $personal->Group->group_name }}</span>
                </div>
                <div class="mb-2 flex gap-[10rem]">
                    <h1 class="font-bold">โรงพยาบาลพระปกเกล้า</h1>
                    <h1 class="font-bold">สำนักงานสาธารณสุขจังหวัดจันทบุรี</h1>
                </div>
                <div class="mb-2 flex gap-4">
                    <h1 class="font-bold" for="">ผู้งบังคับบัญชา/ผู้ประเมิน </h1>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <div class="flex gap-4 mb-2">
                    <h1 class="font-bold">ตำเเหน่ง </h1>
                    <span>{{ Auth::user()->JobPosition->job_position_name }}{{ Auth::user()->Tier->tier_name }}</span>
                </div>
            </div>

            <div class="pl-[4rem] pr-[2rem]">
                <h1>ส่วนที่ ๒ การสรุปผลการประเมิน</h1>
                <table class="border w-full">
                    <thead>
                        <tr>
                            <th class="border-r">
                                องค์ประกอบการประเมิน
                            </th>
                            <th class="border-r">
                                คะเเนน
                                (ก)
                            </th>
                            <th class="border-r">
                                น้ำหนัก
                                (ข)
                            </th>
                            <th>
                                รวมคะเเนน
                                (ก)x(ข)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_points = []; // สร้างอาร์เรย์เก็บค่าคูณทั้งหมด
                        @endphp

                        @foreach ($evaluation_component as $index => $component)
                            <tr class="border-t">
                                <td class="border-r pl-2 p-1">
                                    {{ $component->component_name }}
                                </td>
                                <td class="border-r pl-2 text-center">
                                    @php
                                        $score = null;
                                        if ($index == 0) {
                                            $score = $assessment_01->first(); // แถวแรกใช้ assessment_01
                                        } elseif ($index == 1) {
                                            $score = $assessment_02->first(); // แถวที่สองใช้ assessment_02
                                        }
                                        $points_multiply = $score ? $score->points * $component->weight_score : 0;
                                        $total_points[] = $points_multiply; // เก็บค่าคำนวณแต่ละแถว
                                    @endphp
                                    {{ $score ? $score->points : '-' }}
                                </td>
                                <td class="border-r pl-2 text-center p-1">
                                    {{ $component->weight_score }}
                                </td>
                                <td class="border-r pl-2 text-center p-1">
                                    {{ $points_multiply }}
                                </td>
                            </tr>
                        @endforeach

                        <tr class="border-t">
                            <td></td>
                            <td class="border-r pl-2 text-center p-1">
                                <p>รวม</p>
                            </td>
                            <td class="border-r pl-2 text-center p-1">
                                ๑๐๐%
                            </td>
                            <td class="border-r pl-2 text-center p-1">
                                @php
                                    $total_point = array_sum($total_points); // หาผลรวมของค่าที่เก็บไว้
                                @endphp
                                {{ $total_point }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h1>ระดับผลการประเมิน</h1>

                <div class="flex gap-[8rem] pl-[4rem]">
                    <h1><span>อยู่ในเกณฑ์</span> {{ $summarize_01->first()->criterion->criterion_name }}</h1>
                </div>
            </div>

            <div class="pl-[4rem] pr-[2rem]">
                <h1>ส่วนที่ ๓ การสรุปผลการประเมิน</h1>
                <table class="border w-full">
                    <thead>
                        <tr>
                            <th class="border-r w-[16rem] p-2 text-left pr-[4.5rem]">
                                ความรู้/ทักษะ/สมรรถนะที่ต้องได้รับการพัฒนา</th>
                            <th class="border-r w-[44rem]">วิธีการพัฒนา</th>
                            <th>ช่วงเวลาที่ต้องการการพัฒนา</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($summarize_02 as $value_table_02)
                            @php
                                $skill_to_dev = json_decode($value_table_02->skill_to_dev, true) ?? [];
                                $dev_method = json_decode($value_table_02->dev_method, true) ?? [];
                                $dev_time = json_decode($value_table_02->dev_time, true) ?? [];

                                // หา max count ของ array เพื่อป้องกัน index error
                                $maxCount = max(count($skill_to_dev), count($dev_method), count($dev_time));
                            @endphp

                            @for ($i = 0; $i < $maxCount; $i++)
                                <tr class="border-t">
                                    <td class="border-r p-1">
                                        {{ $skill_to_dev[$i] ?? '-' }} {{-- ถ้าไม่มีข้อมูลให้แสดง "-" --}}
                                    </td>
                                    <td class="border-r p-1">
                                        {{ $dev_method[$i] ?? '-' }}
                                    </td>
                                    <td class=" p-1">
                                        {{ $dev_time[$i] ?? '-' }}
                                    </td>
                                </tr>
                            @endfor
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="pl-[4rem] pr-[2rem]">
                <h1>ส่วนที่ ๔ : ความเห็นของผู้บังคับบัญชาเหนือขึ้นไป</h1>
                <div class="border p-2">
                    <h1>ผูู้รับการประเมิน</h1>
                    <div class="flex justify-between">
                        <h1>ได้รับทราบผลการประเมินเเละเเผนพัฒนา</h1>
                        <div>
                            <div class="flex gap-4 items-center">
                                <span>ลงชื่อ</span>
                                <img class="w-[8rem] h-[3rem]"
                                    src="/storage/{{ $summarize_03->first()->personal_signature }}" alt="">
                            </div>
                            <h1 class="text-center">({{ $personal->name }})</h1>
                            <div class="flex gap-2">
                                <h1>ตำเเหน่ง</h1>
                                <span>{{ $personal->JobPosition->job_position_name }}{{ $personal->Tier->tier_name }}</span>
                            </div>
                            <label>วันที่</label>
                            @php
                                $date01 = \Carbon\Carbon::parse($summarize_03->first()->personal_date);
                                $date02 = \Carbon\Carbon::parse($summarize_03->first()->personal_date);
                                $date03 = \Carbon\Carbon::parse($summarize_03->first()->evaluator_date);
                                $thaiYear01 = $date01->year + 543; // แปลง ค.ศ. เป็น พ.ศ.
                                $thaiMonthShort01 = $date01->translatedFormat('M'); // ชื่อเดือนแบบย่อภาษาไทย
                                $thaiYear02 = $date02->year + 543; // แปลง ค.ศ. เป็น พ.ศ.
                                $thaiMonthShort02 = $date02->translatedFormat('M'); // ชื่อเดือนแบบย่อภาษาไทย
                                $thaiYear03 = $date03->year + 543; // แปลง ค.ศ. เป็น พ.ศ.
                                $thaiMonthShort03 = $date03->translatedFormat('M'); // ชื่อเดือนแบบย่อภาษาไทย
                                $dayThai01 = $date01->format('j'); // วันที่ (ไม่ใช่เลขไทย)
                                $dayThai02 = $date02->format('j'); // วันที่ (ไม่ใช่เลขไทย)
                                $dayThai03 = $date03->format('j'); // วันที่ (ไม่ใช่เลขไทย)

                                // แปลงวันที่ให้เป็นเลขไทย
                                $thaiNumbers = [
                                    '0' => '๐',
                                    '1' => '๑',
                                    '2' => '๒',
                                    '3' => '๓',
                                    '4' => '๔',
                                    '5' => '๕',
                                    '6' => '๖',
                                    '7' => '๗',
                                    '8' => '๘',
                                    '9' => '๙',
                                ];
                                $dayThai01 = strtr($dayThai01, $thaiNumbers); // แปลงวันที่เป็นเลขไทย
                                $dayThai02 = strtr($dayThai02, $thaiNumbers); // แปลงวันที่เป็นเลขไทย
                                $dayThai03 = strtr($dayThai03, $thaiNumbers); // แปลงวันที่เป็นเลขไทย
                                $thaiYear01 = strtr($thaiYear01, $thaiNumbers); // แปลงวันที่เป็นเลขไทย
                                $thaiYear02 = strtr($thaiYear02, $thaiNumbers); // แปลงวันที่เป็นเลขไทย
                                $thaiYear03 = strtr($thaiYear03, $thaiNumbers); // แปลงวันที่เป็นเลขไทย
                            @endphp
                            {{ $dayThai01 }} {{ $thaiMonthShort01 }} {{ $thaiYear01 }}
                        </div>
                    </div>
                </div>
                <div class="border-r border-l border-b p-2">
                    <h1>ผู้ประเมิน</h1>
                    @foreach ($assessment_acknowledgement_choice as $assessment_acknowledgement)
                        @php
                            $selected = in_array(
                                $assessment_acknowledgement->id,
                                json_decode($summarize_03->first()->assessment_acknowledgement_num ?? '[]', true),
                            );
                        @endphp
                        <div>
                            <input type="checkbox" value="{{ $assessment_acknowledgement->id }}"
                                {{ $selected ? 'checked' : '' }}>
                            <label>{{ $assessment_acknowledgement->assessment_acknowledgement_name }}</label>
                        </div>
                    @endforeach

                    <div class="flex gap-2 ">
                        <div>
                            <label>เมื่่อวันที่</label>

                            {{ $dayThai02 }} {{ $thaiMonthShort02 }} {{ $thaiYear02 }}
                        </div>

                        <div>
                            <div class="flex gap-2">
                                <div class="flex gap-4 items-center">
                                    <span>ลงชื่อ</span>
                                    <img class="w-[8rem] h-[3rem]"
                                        src="/storage/{{ $summarize_03->first()->evaluator_signature }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="">
                                <h1 class="text-center">({{ $summarize_03->first()->evaluator->name }})</h1
                                    class="text-center">
                                <div class="flex gap-2">
                                    <h1>ตำเเหน่ง</h1>
                                    <span>{{ $summarize_03->first()->evaluator->JobPosition->job_position_name }}{{ $summarize_03->first()->evaluator->Tier->tier_name }}</span>
                                </div>
                                <label>วันที่</label>
                                {{ $dayThai03 }} {{ $thaiMonthShort03 }} {{ $thaiYear03 }}
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <div class="">
                            <span>เเต่ผู้รับการประเมินไม่ลงนามรับทราบ</span><br>
                            <label>โดยมี</label>
                            <input type="text" class="bg-blue-100 rounded pl-2 p-1">
                            <label>เป็นพยาน</label>
                        </div>
                    </div>
                    <div class="ml-[10rem]">
                        <label>ลงชื่อ</label><br>
                        <input type="text" name="" class="bg-blue-100 rounded pl-2 p-1 mb-2">
                        <label>พยาน</label><br>
                        <label>ตำเเหน่ง</label>
                        <input type="text" name="" class="bg-blue-100 rounded pl-2 p-1 mb-2"><br>
                        <label>วันที่</label>
                        <input type="date" name="" class="bg-blue-100 rounded pl-2 p-1 mb-2">
                    </div>
                </div>
            </div>

            <div>
                <h1 class="pt-[2rem] text-center">หน้าที่ ๒</h1>
                <h1 class="pl-[4rem]">ส่วนที่ ๕ ความเห็นผู้บังคับบัญชาเหนือขึ้นไป</h1>
                <div class="pl-[4rem] pr-[2rem]">
                    <div class="border p-2">
                        <h1>ผู้บังคับบัญชาเหนือขึ้นไป</h1>
                        @foreach ($comment_choice as $comment)
                            <div class="pl-[4rem]">
                                <input type="radio" name="above_comment_num" value="{{ $comment->id }}"
                                    id="comment_{{ $comment->id }}">
                                <span>{{ $comment->comment_name }}</span>
                            </div>
                        @endforeach
                        <div class="flex justify-between pl-[4rem]">
                            <div id="textarea-container" style="display: none;">
                                <span>ดังนี้</span><br>
                                <textarea name="above_comment_detail" class="bg-blue-100 rounded pl-2 p-1 mb-2 w-[25rem] h-[6rem]" id="comment-textarea"></textarea>
                            </div>
                            <script>
                                // เมื่อเลือก radio
                                document.querySelectorAll('input[name="above_comment_num"]').forEach(function(radio) {
                                    radio.addEventListener('change', function() {
                                        var textareaContainer = document.getElementById('textarea-container');
                                        var textarea = document.getElementById('comment-textarea');

                                        // ถ้าค่า radio เป็น 2 ให้แสดง textarea
                                        if (this.value == 2) {
                                            textareaContainer.style.display = 'block';
                                        } else {
                                            // ซ่อน textarea และล้างค่าใน textarea
                                            textareaContainer.style.display = 'none';
                                            textarea.value = ''; // ล้างค่าใน textarea
                                        }
                                    });
                                });
                            </script>
                            <div>
                                <div x-data="{
                                    showSignaturePad: false,
                                    signatureUrl: '',
                                    saveSignature() {
                                        let canvas = document.getElementById('signatureCanvas');
                                        let signatureUrl = canvas.toDataURL('image/png'); // แปลงเป็น Base64
                                        this.signatureUrl = signatureUrl;
                                        this.showSignaturePad = false; // ปิด popup
                                    }
                                }" class="mb-2">



                                    <!-- แสดงลายเซ็นที่บันทึก -->
                                    <div class="flex gap-2 items-center mt-2">
                                        <span>ลงชื่อ</span>
                                        <template x-if="signatureUrl">
                                            <img :src="signatureUrl" alt="ลายเซ็น" class="w-32 h-10 border p-1">
                                        </template>
                                        <button type="button" @click="showSignaturePad = true" id="add_signature"
                                            class="p-1 bg-blue-500 text-white text-sm rounded">
                                            เพิ่มลายเซ็น
                                        </button>
                                    </div>

                                    <input type="hidden" name="above_signature" x-model="signatureUrl">
                                    <!-- Modal สำหรับ Signature Pad -->
                                    <div x-show="showSignaturePad" x-transition.opacity x-cloak
                                        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                                        <div class="bg-white p-5 rounded-lg shadow-lg w-96">
                                            <h2 class="text-lg font-bold mb-2">ลงลายเซ็น</h2>

                                            <!-- Signature Pad -->
                                            <canvas id="signatureCanvas" class="border w-full h-40"></canvas>

                                            <!-- ปุ่มล้าง / บันทึก -->
                                            <div class="flex justify-between mt-3">
                                                <button type="button" id="clear"
                                                    class="px-3 py-1 bg-gray-300 rounded">ล้างลายเซ็น</button>
                                                <button type="button" @click="saveSignature()"
                                                    class="px-3 py-1 bg-green-500 text-white rounded">บันทึก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Script สำหรับ Signature Pad -->
                                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        let canvas = document.getElementById("signatureCanvas");
                                        let ctx = canvas.getContext("2d");
                                        let isDrawing = false;

                                        // ปรับขนาด Canvas
                                        function resizeCanvas() {
                                            canvas.width = canvas.offsetWidth;
                                            canvas.height = 160;
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(0, 0, canvas.width, canvas.height);
                                        }

                                        resizeCanvas(); // เรียกใช้ตอนโหลด

                                        canvas.addEventListener("mousedown", (e) => {
                                            isDrawing = true;
                                            ctx.beginPath();
                                            ctx.moveTo(e.offsetX, e.offsetY);
                                        });

                                        canvas.addEventListener("mousemove", (e) => {
                                            if (isDrawing) {
                                                ctx.lineTo(e.offsetX, e.offsetY);
                                                ctx.stroke();
                                            }
                                        });

                                        canvas.addEventListener("mouseup", () => {
                                            isDrawing = false;
                                        });

                                        document.getElementById("clear").addEventListener("click", () => {
                                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                                            resizeCanvas(); // รีเซ็ต Canvas
                                        });

                                        // ✅ บันทึกลายเซ็น
                                        window.saveSignature = function() {
                                            let signatureUrl = canvas.toDataURL("image/png"); // แปลงเป็น Base64
                                            let alpineData = document.querySelector("[x-data]").__x.$data;
                                            alpineData.signatureUrl = signatureUrl;
                                            alpineData.showSignaturePad = false; // ปิด popup
                                        }
                                    });
                                </script>


                                <h1 class="text-center">({{ Auth::user()->name }})</h1>
                                <div class="flex gap-2">
                                    <h1>ตำเเหน่ง</h1>
                                    <span>{{ Auth::user()->JobPosition->job_position_name }}{{ Auth::user()->Tier->tier_name }}</span>
                                </div>
                                <label>วันที่</label>
                                <input type="date" name="above_date" class="bg-blue-100 rounded pl-2 p-1">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pr-16 pt-4">
                    <button type="submit" class="p-1 border bg-green-500 text-white">บันทึก</button>
                </div>
                <div class="pl-[4rem] pr-[2rem] mb-[2rem] mt-[2rem]">
                    <h1>คำชี้เเจง</h1>
                    <h1>เเบบสรุปผลการประเมินผลการปฏิบัติราชการ ประกอบด้วย</h1>
                    <h1><span>ส่วนที่ ๑</span> ข้อมูลของผู้รับการประเมิน
                        เพื่อระบุรายละเอียดที่เกี่ยวข้องกับตัวผู้รับการประเมิน</h1>
                    <h1><span>ส่วนที่ ๒</span> สรุปผลการประเมิน ใช้กรอกค่าคะเเนนการประเมินในองค์ประกอบด้านสัมฤทธิ์ของงาน
                        องค์ประกอบด้านพฟติกรรมการปฏิบัติราชการเเละน้ำหนักของทั้งสององค์ประกอบ ในเเบบสรุปส่วนที่ ๒ นี้
                        ยังใช้สำหรับคำนวณคะเเนนผลการปฏิบัติราชการรวมด้วย</h1>
                    <h1>-สำหรับคะเเนนองค์ประกอบด้านผลสัมฤทธิ์ของงานให้นำมาจากเเบบประเมินสัมฤทธิ์ของงาน
                        โดยให้เเนบท้ายเเบบสรุปฉบับนี้</h1>
                    <h1>-สำหรับคะแนนองค์กรประกอบด้านพฤติกรรมการปฏิบัติราชการให้นำมาจากเเบบประเมินสมรรถนะ
                        โดยให้เเนบท้ายเเบบสรุปฉบับนี้</h1>
                    <h1><span>ส่วนที่ ๓</span> เเผนพัฒนาการปฏิบัติการรายบุคคล
                        ผู้ประเมินเเละผู้รับการประเมินร่วมกันจัดทำเเบบเเผนพัฒนาผลการปฏิบัติราชการ</h1>
                    <h1><span>ส่วนที่ ๔</span> การรับทราบผลการประเมิน ผู้รับการประเมินลงนามรับทราบผลการประเมิน</h1>
                    <h1><span>ส่วนที่ ๓</span> ความเห็นของผู้บังคับบัญชาเหนือขึ้นไป
                        ความเห็นของผู้บังคับบัญชาเหนือขึ้นไปกลั่นกรองผลการประเมิน เเผนพัฒนาผลการปฏิบัติราชการ
                        เเละให้ความเห็น คำว่า "ผู้บังคับบัญชาเหนือขึ้นไป" สำหรับผู้ประเมินตามข้อ ๒ (๙) หมายถึง
                        หัวหน้าส่วนราชการประจำจังหวัดผู้บังคับบัญชาของผู้รับการประเมิน
                    </h1>
                </div>

            </div>
        </form>
    </div>

</body>

</html>
