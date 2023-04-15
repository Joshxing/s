<div class="sales-chart">
    <canvas id="sales-chart"></canvas>
</div>
<script>
    var salesChart = new Chart(document.getElementById("sales-chart"), {
        type: 'line',
        data: {
            labels: [
                <?php foreach ($sales_data as $data_point): ?>
                    "<?php echo $data_point['month']; ?>",
                <?php endforeach; ?>
            ],
            datasets: [{
                label: 'Sales',
                data: [
                    <?php foreach ($sales_data as $data_point): ?>
                        <?php echo $data_point['sales']; ?>,
                    <?php endforeach; ?>
                ],
                backgroundColor: 'rgba(0, 0, 0, 0)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 2,
                pointBackgroundColor: 'rgb(54, 162, 235)',
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
</script>
