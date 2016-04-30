$(function() {
    /* reportrange */
    if ($("#reportrange").length > 0) {
        $("#reportrange").daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM.DD.YYYY',
            separator: ' to ',
            startDate: moment().subtract('days', 29),
            endDate: moment()
        }, function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

        $("#reportrange span").html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    }
    
	$.getJSON("../Controller/RequestScript.php?farmernum", function(json) {
// loop through the members here
        $.each(json.members, function(i, dat) {
            $("#FARMERSNUM").append(dat.totalnumber);
        });
    });

    $.getJSON("../Controller/RequestScript.php?FCANUM", function(json) {
// loop through the members here

        $.each(json.members, function(i, dat) {
            $("#FCANUM").append(dat.totalnumber);
        });
    });

    $.getJSON("../Controller/RequestScript.php?FUGNUM", function(json) {
// loop through the members here

        $.each(json.members, function(i, dat) {
            $("#FUGNUM").append(dat.totalnumber);
        });
    });
			
    ajax_data('GET', '../Controller/RequestScript.php?statefarmercount', function(data)
    {
        charts(data, "GeoChart");
        charts(data, "PieChart");
       	
    });
    

    var Donutchartdata;
    ajax_data('GET', "../Controller/RequestScript.php?piechart1", function(data)
    {

        Donutchartdata = data;

    });

    Morris.Donut({
        element: 'dashboard-donut-1',
        data: Donutchartdata,
        colors: ['#33414E', '#1caf9a'],
        resize: true
    });
    var Donutchartdata2;
    ajax_data('GET', "../Controller/RequestScript.php?piechart2", function(data)
    {

        Donutchartdata2 = data;

    });

    Morris.Donut({
        element: 'dashboard-donut-2',
        data: Donutchartdata2,
        colors: ['#33414E', '#1caf9a'],
        resize: true
    });
    /* END Donut dashboard chart */


    /* Bar dashboard chart */
    var barchartdata;

    ajax_data('GET', "../Controller/RequestScript.php?barchart", function(data)
    {

        barchartdata = data;

    });

    Morris.Bar({
        element: 'dashboard-bar-1',
        data: barchartdata,
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['Farmers', 'FPC', 'FPG'],
        barColors: ['#33414E', '#1caf9a', '#FEA223'],
        gridTextSize: '10px',
        hideHover: true,
        resize: true,
        gridLineColor: '#E5E5E5'
    });
    /* END Bar dashboard chart */

    /* Line dashboard chart */
    Morris.Line({
        element: 'dashboard-line-1',
        data: [
            {y: '2014-10-10', a: 2, b: 4},
            {y: '2014-10-11', a: 4, b: 6},
            {y: '2014-10-12', a: 7, b: 10},
            {y: '2014-10-13', a: 5, b: 7},
            {y: '2014-10-14', a: 6, b: 9},
            {y: '2014-10-15', a: 9, b: 12},
            {y: '2014-10-16', a: 18, b: 20}
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Sales', 'Event'],
        resize: true,
        hideHover: true,
        xLabels: 'day',
        gridTextSize: '10px',
        lineColors: ['#1caf9a', '#33414E'],
        gridLineColor: '#E5E5E5'
    });
    /* EMD Line dashboard chart */
    /* Moris Area Chart */
    Morris.Area({
        element: 'dashboard-area-1',
        data: [
            {y: '2014-10-10', a: 17, b: 19},
            {y: '2014-10-11', a: 19, b: 21},
            {y: '2014-10-12', a: 22, b: 25},
            {y: '2014-10-13', a: 20, b: 22},
            {y: '2014-10-14', a: 21, b: 24},
            {y: '2014-10-15', a: 34, b: 37},
            {y: '2014-10-16', a: 43, b: 45}
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Sales', 'Event'],
        resize: true,
        hideHover: true,
        xLabels: 'day',
        gridTextSize: '10px',
        lineColors: ['#1caf9a', '#33414E'],
        gridLineColor: '#E5E5E5'
    });
    /* End Moris Area Chart */
    /* Vector Map */
    var jvm_wm = new jvm.WorldMap({container: $('#dashboard-map-seles'),
        map: 'world_mill_en',
        backgroundColor: '#FFFFFF',
        regionsSelectable: true,
        regionStyle: {selected: {fill: '#B64645'},
            initial: {fill: '#33414E'}},
        markerStyle: {initial: {fill: '#1caf9a',
                stroke: '#1caf9a'}},
        markers: [{latLng: [50.27, 30.31], name: 'Kyiv - 1'},
            {latLng: [52.52, 13.40], name: 'Berlin - 2'},
            {latLng: [48.85, 2.35], name: 'Paris - 1'},
            {latLng: [51.51, -0.13], name: 'London - 3'},
            {latLng: [40.71, -74.00], name: 'New York - 5'},
            {latLng: [35.38, 139.69], name: 'Tokyo - 12'},
            {latLng: [37.78, -122.41], name: 'San Francisco - 8'},
            {latLng: [28.61, 77.20], name: 'New Delhi - 4'},
            {latLng: [39.91, 116.39], name: 'Beijing - 3'}]
    });
    /* END Vector Map */


    $(".x-navigation-minimize").on("click", function() {
        setTimeout(function() {
            rdc_resize();
        }, 200);
    });


});

function ajax_data(type, url, success)
{
    $.ajax({
        type: type,
        url: url,
        dataType: "json",
        restful: true,
        cache: false,
        timeout: 20000,
        async: false,
        beforeSend: function(data) {
        },
        success: function(data) {
            success.call(this, data);
        },
        error: function(data) {
            alert("Error In Connecting");
        }
    });
}
function charts(data, ChartType)
{
    var c = ChartType;
    var jsonData = data;
    google.load("visualization", "1", {packages: ["corechart"], callback: drawVisualization});
    function drawVisualization()
    {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Country');
        data.addColumn('number', 'Farmers');
        $.each(jsonData, function(i, jsonData)
        {
//var a =jsonData.count;
//var a1 =parseInt(a);
            var value = parseInt(jsonData.value);
            var name = jsonData.name;
            data.addRows([[name, value]]);
        });

        var options = {
            animation: {
                duration: 3000,
                easing: 'out',
                startup: true
            },
            region: 'NG',
            displayMode: 'regions',
            resolution: 'provinces',
            title: "Numbers of  Farmers by State",
            colorAxis: {colors: ['#54C492', '#cc0000']},
            datalessRegionColor: '#dedede',
            defaultColor: '#dedede'

        };

        var chart;
        if (c == "ColumnChart")
            chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        else if (c == "PieChart")
            chart = new google.visualization.PieChart(document.getElementById('piechart_div'));

        else if (c == "GeoChart")
            chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }
}