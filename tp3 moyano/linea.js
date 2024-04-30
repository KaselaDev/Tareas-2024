const data = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
    datasets: [{
        label: 'Ganancias',
        data: [10000, 12500, 8000, 7501, 18500],
        fill: true,
        borderColor: 'green',
        tension: 0.1
    }]
};

// Configuración del gráfico
const config = {
    type: 'line',
    data: data,
    options: {}
};

// Crear el gráfico
var myChart = new Chart(
    document.getElementById('myChart'),
    config
);