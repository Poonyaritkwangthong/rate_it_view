<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body>
    <div class="w-[80rem] h-[120rem] border mx-auto">
        <h1 class="pt-[2rem] text-center">หน้าที่ 1</h1>
        <div class="pl-[4rem]">
            <h1>เเบบสรุปการประเมินการปฏิบัติราชการ</h1>
            <h1>ส่วนที่ ๑ ข้อมูลของผู้รับการประเมิน</h1>
            <div class="flex gap-[9rem]">
                <p>รอบการประเมิน</p>
                <div>
                    @if ($personal->round === 1)
                        <div>
                            <span class="ml-[2rem]">รอบที่ ๑</span>
                            <span class="ml-[4rem]">๑ ตุลาคม ๒๕๖๖ ถึง ๓๑ มีนาคม ๒๕๖๗</span>
                        </div>
                    @elseif($personal->round === 2)
                        <div>
                            <span class="ml-[2rem]">รอบที่ ๒</span>
                            <span class="ml-[4rem]">๑ เมษายน ๒๕๖๗ ถึง ๓๐ มีนาคม ๒๕๖๗</span>
                        </div>
                    @endif


                </div>
            </div>
            <h1><span class="font-bold">ชื่อผู้รับการประเมิน</span> {{ $personal->personal->name }}</h1>
            @if ($personal->personal->user_rank === 'employee')
                <h1><span class="font-bold">ตำเเหน่ง</span> พนักงานทั่วไป</h1>
            @endif

            <h1><span class="font-bold">ประเภทตำเเหน่ง</span> </h1>
            <h1><span class="font-bold">ระดับตำเเหน่ง</span> </h1>
            <h1><span class="font-bold">สังกัด/งาน</span> </h1>
            <h1><span class="font-bold">ฝ่าย/กลุ่มงาน</span> {{ $personal->personal->group->group_name }}</h1>
            <h1 class="font-bold">โรงพยาบาลพระปกเกล้า</h1>
            <h1 class="font-bold">สำนักงานสาธารณสุขจังหวัดจันทบุรี</h1>
            <h1><span class="font-bold">ผู้งบังคับบัญชา/ผู้ประเมิน </span> {{ $personal->user->name }}</h1>
            @if ($personal->user->user_rank === 'head_ship')
                <h1><span class="font-bold">ตำเเหน่ง </span> {{ $personal->user->group->group_name }}เชี่ยวชาญ</h1>
            @endif

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
                    <tr class="border-t">
                        <td class="border-r">
                            องค์ประกอบ ๑ ผลสัมฤทธิ์ของงาน
                        </td>
                        <td class="border-r">

                        </td>
                        <td class="border-r">

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="border-r">
                            องค์ประกอบ ๒ พฤติกรรมการปฏิบัติราชการ(สมรรถนะ)
                        </td>
                        <td class="border-r">

                        </td>
                        <td class="border-r">

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="border-r">
                            องค์ประกอบอื่น ๆ (ถ้ามี)
                        </td>
                        <td class="border-r">

                        </td>
                        <td class="border-r">

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr class="border-t">
                        <td>

                        </td>
                        <td class="border-r">
                            <p class="text-center">รวม</p>
                        </td>
                        <td class="border-r">

                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
            <h1>ระดับผลการประเมิน</h1>
            <div class="flex gap-[8rem] pl-[4rem]">
                <div>
                    <input type="radio" name="criterion">
                    <span>ดีเด่น</span>
                </div>
                <div> <input type="radio" name="criterion">
                    <span>ดีมาก</span>
                </div>
                <div>
                    <input type="radio" name="criterion">
                    <span>ดี</span>
                </div>
                <div> <input type="radio" name="criterion">
                    <span>พอใช้</span>
                </div>
                <div> <input type="radio" name="criterion">
                    <span>ต้องปรับปรุง</span>
                </div>
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
                    <tr class="border-t">
                        <td class="border-r">------</td>
                        <td class="border-r">------</td>
                        <td class="">------</td>
                    </tr>
                    <tr class="border-t">
                        <td class="border-r">------</td>
                        <td class="border-r">------</td>
                        <td class="">------</td>
                    </tr>
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
                        <h1>ลงชื่อ {{ $personal->user->name }}</h1>
                        <span pl-[]>({{ $personal->user->name }})</span><br>
                        @if ($personal->user->user_rank === 'head_ship')
                            <span>ตำเเหน่ง {{ $personal->user->group->group_name }}เชี่ยวชาญ</span>
                        @endif
                        <h1>วันที่.................................</h1>
                    </div>
                </div>
            </div>
            <div class="border-r border-l border-b p-2">
                <h1>ผู้รับการประเมิน</h1>
                <div> <input type="checkbox" name="checkbox" id="">
                    <span>ได้เเจ้งผลการประเมินเเละผู้รับผลการประเมินรับทราบ</span>
                </div>
                <div> <input type="checkbox" name="checkbox" id="">
                    <span>ได้เเจ้งผลการประเมินเมื่่อวันที่...........................ลงชื่อ...............................</span>
                </div>
                <div class="flex">
                    <div class="pt-[1.5rem]">
                        <span>เเต่ผู้รับการประเมินไม่ลงนามรับทราบ</span><br>
                        <span>โดยมี................................................เป็นพยาน</span>
                    </div>
                    <div class="ml-[20rem]">
                        <span>({{ $personal->user->name }})</span><br>
                        @if ($personal->user->user_rank === 'head_ship')
                            <span>ตำเเหน่ง {{ $personal->user->group->group_name }}เชี่ยวชาญ</span><br>
                        @endif
                        <span>วันที่................................................</span>
                    </div>
                </div>
                <div class="ml-[10rem]">
                    <span>ลงชื่อ..........................................................พยาน</span><br>
                    <span>ตำเเหน่ง..........................................................</span><br>
                    <span>วันที่..........................................................</span>
                </div>
            </div>
        </div>

        <div>
            <h1 class="pt-[2rem] text-center">หน้าที่ ๒</h1>
            <h1 class="pl-[4rem]">ส่วนที่ ๕ ความเห็นผู้บังคับบัญชาเหนือขึ้นไป</h1>
            <div class="pl-[4rem] pr-[2rem]">
                <div class="border p-2">
                    <h1>ผู้บังคับบัญชาเหนือขึ้นไป</h1>
                    <div class="pl-[4rem]">
                        <input type="checkbox" name="checkbox" id="">
                        <span>เห็นด้วย กับผลการประเมิน</span>
                    </div>
                    <div class="flex justify-between pl-[4rem]">
                        <div>
                            <input type="checkbox" name="checkbox" id="">
                            <span>มีความเห็นต่าง ดังนี้..................</span>
                        </div>
                        <div>
                            <span>ชื่อ..............................</span><br>
                            <span>ตำเเหน่ง..........................</span><br>
                            <span>วันที่.............................</span>
                        </div>
                    </div>
                </div>
                <div class="border-r border-l border-b p-2">
                    <h1>ผู้บังคับบัญชาเหนือขึ้นไปอีกชั้นหนึ่ง (ถ้ามี)</h1>
                    <div class="pl-[4rem]">
                        <input type="checkbox" name="checkbox" id="">
                        <span>เห็นด้วย กับผลการประเมิน</span>
                    </div>
                    <div class="flex justify-between pl-[4rem]">
                        <div>
                            <input type="checkbox" name="checkbox" id="">
                            <span>มีความเห็นต่าง ดังนี้..................</span>
                        </div>
                        <div>
                            <span>ชื่อ..............................</span><br>
                            <span>ตำเเหน่ง..........................</span><br>
                            <span>วันที่.............................</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pl-[4rem] pr-[2rem]">
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
    </div>
    @if ($personal->other_question_num)
    @foreach (json_decode($personal->other_question_num, true) as $other_question_num)
        <p>{{ $other_question_num }}</p>
        <p>{{ $other_question[$other_question_num] ?? 'ไม่มีข้อมูล' }}</p>
    @endforeach
@else
    <p>ไม่มีคำถามอื่น</p>
@endif
</body>

</html>
