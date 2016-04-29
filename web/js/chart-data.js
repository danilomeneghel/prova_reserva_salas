var randomScalingFactor = function () {
    return Math.round(Math.random() * 1000);
};

var pieData1 = [
    {
        value: 70,
        color: "#1ebfae",
        label: "1M"
    },
    {
        value: 20,
        color: "#ffb53e",
        label: "2M"
    },
    {
        value: 10,
        color: "#f9243f",
        label: "1Y"
    }
];
var pieData2 = [
    {
        value: 40,
        color: "#1ebfae",
        label: "1M"
    },
    {
        value: 10,
        color: "#ffb53e",
        label: "2M"
    },
    {
        value: 50,
        color: "#f9243f",
        label: "1Y"
    }
];
var pieData3 = [
    {
        value: 20,
        color: "#1ebfae",
        label: "1M"
    },
    {
        value: 30,
        color: "#ffb53e",
        label: "2M"
    },
    {
        value: 50,
        color: "#f9243f",
        label: "1Y"
    }
];
var pieData4 = [
    {
        value: 30,
        color: "#1ebfae",
        label: "1M"
    },
    {
        value: 40,
        color: "#ffb53e",
        label: "2M"
    },
    {
        value: 30,
        color: "#f9243f",
        label: "1Y"
    }
];

window.onload = function () {

    var chart1 = document.getElementById("pie-chart1").getContext("2d");
    window.myPie = new Chart(chart1).Pie(pieData1, {responsive: true
    });
    var chart2 = document.getElementById("pie-chart2").getContext("2d");
    window.myPie = new Chart(chart2).Pie(pieData2, {responsive: true
    });
    var chart3 = document.getElementById("pie-chart3").getContext("2d");
    window.myPie = new Chart(chart3).Pie(pieData3, {responsive: true
    });
    var chart4 = document.getElementById("pie-chart4").getContext("2d");
    window.myPie = new Chart(chart4).Pie(pieData4, {responsive: true
    });

};