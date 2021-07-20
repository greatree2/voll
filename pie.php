<html>
  <head>
    <script type="text/javascript" src="./js/pie.js"></script>
   
  </head>
  <body>
    <div id="piechart" style="width: 1200px; height: 800px;"></div>
  </body>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     <? echo 90; ?>],
          ['Eat',       0],
          
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</html>


 