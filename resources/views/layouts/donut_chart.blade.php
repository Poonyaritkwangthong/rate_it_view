<div id="chart"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const options = {
            chart: {
                type: 'bar',
                height: 400,
            },
            series: [
                {
                    name: 'คะแนนเฉลี่ยคิดเป็นเปอร์เซนต์',
                    data: [{{ $results['round1']['PercentageScore'] }}, {{ $results['round2']['PercentageScore'] }}]
                },
                {
                    name: 'คะแนนเฉลี่ย',
                    data: [{{ $results['round1']['AverageTotalScoreGroupByUser'] }}, {{ $results['round2']['AverageTotalScoreGroupByUser'] }}]
                }
            ],
            xaxis: {
                categories: ['รอบที่ 1', 'รอบที่ 2']
            },
            yaxis: {
                title: {
                    text: 'คะแนนเต็ม75/คิดเป็นเปอร์เซนต์'
                }
            },
            colors: ['#00E396', '#FEB019'],
            title: {
                text: 'เปรียบเทียบคะแนนแต่ละรอบ',
                align: 'center'
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
