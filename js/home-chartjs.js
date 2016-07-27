var Script = function () {
    
    $(document).ready(function(){
        var url = 'stationhome';
        var data = {
            'inventory':'true',
            'userid':'1'
        };
        
    });
    
    
    var doughnutData = [
        {
            value: 30,
            color:"#F7464A"
        },
        {
            value : 50,
            color : "#46BFBD"
        },
        {
            value : 100,
            color : "#FDB45C"
        }
        ,{
            value : 40,
            color : "#949FB1"
        }

    ];
    var lineChartData = {
        labels : ["Week One","Week Two","Week Three","Week Four"],
        datasets : [
            {
                fillColor : "rgba(255,255,255,0)",
                strokeColor : "#F7464A",
                pointColor : "#F7464A",
                pointStrokeColor : "#fff",
                data : [65,59,90,81],
                 fill: false
            },
            {
                fillColor : "rgba(255,255,255,0)",
                strokeColor : "#46BFBD",
                pointColor : "#46BFBD",
                pointStrokeColor : "#fff",
                data : [85,69,70,95],
                 fill: false
            },
            {
                fillColor : "rgba(255,255,255,0)",
                strokeColor : "#FDB45C",
                pointColor : "#FDB45C",
                pointStrokeColor : "#fff",
                data : [28,48,40,19],
                 fill: false
            }
            ,
            {
                fillColor : "rgba(255,255,255,0)",
                strokeColor : "#949FB1",
                pointColor : "#949FB1",
                pointStrokeColor : "#fff",
                data : [58,78,50,49],
                fill: false
            }
        ]

    };

    new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
    new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);

}();