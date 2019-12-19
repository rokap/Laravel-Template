import Chart from "chart.js";
import {COLORS} from "../constants/colors";

export default function BuildChart(values, chartTitle) {

    const lineChartBox = document.getElementById('projects-chart');

    if (lineChartBox) {
        const lineCtx = lineChartBox.getContext('2d');
        lineChartBox.height = 50;

        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: values,
            },

            options: {
                legend: {
                    display: true,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }]
                }
            },

        });
    }

}