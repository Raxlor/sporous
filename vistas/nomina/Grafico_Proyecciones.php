
<?php
include '../../componentes/conexion/conexion.php';

  $sentence="SELECT
              CONCAT(`Fecha_char`) AS labaels,
              SUM(`Comision_deposito_isr`) AS deposito_isr,
              SUM(`Retencion_de_ley`) AS Retencion_de_ley,
              COUNT(`id_nomina`) AS cantidad_de_pagos,
              MONTH(`Fecha`) AS mes
          FROM
              `nomina_Historial`
          WHERE
              `Tipo_de_cliente` NOT LIKE 'Capital compuesto'
          GROUP BY
              mes,
              labaels";
  $mysli=mysqli_query($conexion,$sentence);

 ?>

<script type="text/javascript">
var comision_traferencia_10 =[];
var impuesto_isr =[];
var Retencion_de_ley =[];
var meses=[];
<?php
  while ($datos=mysqli_fetch_array($mysli)) {
    ?>
    comision_traferencia_10.push(<?php echo $datos['cantidad_de_pagos']*10 ?>);
    impuesto_isr.push(<?php echo $datos['deposito_isr'] ?>);
    Retencion_de_ley.push(<?php echo $datos['Retencion_de_ley'] ?>);
    meses.push("<?php echo $datos['labaels'] ?>");
    <?php
  }

 ?>

var densityCanvas=document.getElementById("Grafico_Proyecciones");

var comision_traferencia = {
  label: 'Comision de tranferencia',
  data: comision_traferencia_10,
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  yAxisID: "y-axis-comision_traferencia"
};

var isr = {
  label: 'ISR',
  data: impuesto_isr,
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  yAxisID: "y-axis-ISR"
};
var ley = {
  label: 'Retencion de ley',
  data: Retencion_de_ley,
  backgroundColor: '#02c58d',
  yAxisID: "y-axis-ley"
};

var planetData = {
  labels: meses,
  datasets: [comision_traferencia, isr,ley]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 0.5,
      categoryPercentage: 0.6
    }],
    yAxes: [
      // depostio por traferencia
      {
      id: "y-axis-comision_traferencia",
      ticks: {
        maxTicksLimit: 5,
        padding: 1,
        // Include a dollar sign in the ticks
        callback: function(value, index, values) {
          return '$' + number_format(value);
        }
      }
    },
    // tranferencia isr
    {
      id: "y-axis-ISR",
      ticks: {
        maxTicksLimit: 5,
        padding: 1,
        // Include a dollar sign in the ticks
        callback: function(value, index, values) {
          return '$' + number_format(value);
        }
      }
    },
    // Retencion_de_ley
    {
     id: "y-axis-ley",
     ticks: {
       maxTicksLimit: 5,
       padding: 1,
       // Include a dollar sign in the ticks
       callback: function(value, index, values) {
         return '$' + number_format(value);
       }
     }
   }]
  },     tooltips: {
         backgroundColor: "rgb(260,255,255)",
         bodyFontColor: "#858796",
         titleMarginBottom: 10,
         titleFontColor: '#6e707e',
         titleFontSize: 14,
         borderColor: '#dddfeb',
         borderWidth: 1,
         xPadding: 1,
         yPadding: 1,
         displayColors: false,
         intersect: false,
         mode: 'index',
         caretPadding: 10,
         callbacks: {
           label: function(tooltipItem, chart) {
             var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
             return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
           }
         }
       }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});
</script>
