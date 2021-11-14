$(function () {
    function dynamic(datas = {
        kategori: null,
        kelas: null,
    }) {
        let filter = null;
        if (datas.kategori != null && datas.kelas != null) {
            filter = {
                kategori: datas.kategori,
                kelas: datas.kelas,
            }
        }
        const table_html = $('#dt_basic');
        table_html.dataTable().fnDestroy()
        const new_table = table_html.DataTable({
            "ajax": {
                "url": "<?= base_url()?>admin/count/ajax_data/",
                "data": datas,
                "type": 'POST'
            },
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "columns": [
                // { "data": null },
                { "data": "no_urut" },
                { "data": "nama", className: "nowrap" },
                { "data": "jumlah_suara", className: "text-right" },
            ],
            order: [
                [2, 'desc']
            ]
            // columnDefs: [{
            //     orderable: false,
            //     targets: [0]
            // }],
        });
        // new_table.on('draw.dt', function () {
        //     var PageInfo = table_html.DataTable().page.info();
        //     new_table.column(0, {
        //         page: 'current'
        //     }).nodes().each(function (cell, i) {
        //         cell.innerHTML = i + 1 + PageInfo.start;
        //     });
        // });
    }
    dynamic();

    // get data untuk chart

    $.ajax({
        method: 'post',
        url: '<?= base_url()?>admin/count/plot',
        data: null
    }).done((data) => {
        render_pie_data(data);
        render_bar_data(data);
    }).fail(($xhr) => {
        console.log($xhr);
    })

    function render_bar_data(data) {
        const datas = new Array();
        const ticks = new Array();

        let counter = 1;
        data.forEach(e => {
            datas.push([counter, e.jumlah_suara]);
            ticks.push([counter, e.nama]);
            counter++;
        });
        var bar_data = {
            data: datas,
            bars: { show: true }
        }
        $.plot('#bar-chart', [bar_data], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true, barWidth: 0.5, align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: ticks
            }
        })
    }

    function render_pie_data(data) {
        // pie
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);
        let counter = 1;
        const datas = new Array();
        datas.push(['Calon Ketua', 'Suara']);
        data.forEach(e => {
            datas.push([e.nama, Number(e.jumlah_suara_persen)]);
            counter++;
        });
        function drawChart() {
            var data = google.visualization.arrayToDataTable(datas);

            var options = {
                pieHole: 1,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    }
})

function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + series.percent + '%</div>'
}