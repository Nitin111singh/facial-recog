<?php include "db.php";?>
<html>
  <head>
  <style type="text/css">
#barchart_material {
    display: block;
    margin: 0 auto;
    width: 100vw;
    height: 100vh;
    justify-content: center;
    align-items: center;
}

</style>

</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['date','Total Students...........'],
      <?php
        $query="SELECT date, COUNT(id) as count_id FROM users GROUP BY date";
        $res=mysqli_query($conn,$query);
        while($data=mysqli_fetch_array($res)){
            $date=$data['date'];
            $count_id=$data['count_id'];
    
       ?>
       ['<?php echo $date;?>', <?php echo $count_id;?>],   
       <?php   
        }
       ?> 
    ]);

    var options = {
      chart: {
        title: 'Attendance',
        subtitle: 'Count of Students Attended class everyday',
      },
      bars: 'horizontal' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
<style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Patrick+Hand|Volkhov|Handlee|PT+Serif|Numans|Bitter|Odibee+Sans|Simonetta|Trade+Winds&display=swap');

    
    </style>
</head>
  <body>
    <!-- <div id="header">
      <h1>Fasttrack Register - Bar Chart Report</h1>
    </div> -->
    <div id="barchart_material" style="width: 100%; height: 600px;"></div>
  </body>
</html>