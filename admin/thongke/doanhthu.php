<h1>Biểu đồ thống kê doanh thu theo tháng</h1>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["tháng 1","tháng 2","tháng 3","tháng 4","tháng 5","tháng 6","tháng 7","tháng 8","tháng 9","tháng 10","tháng 11","tháng 12"];
var yValues = [

<?php

 foreach ($listtongdon1 as $td) {
     extract($td);
     echo "'".$td['tongtiendonhang']."',";
    
 }  
 foreach ($listtongdon2 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}    
foreach ($listtongdon3 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}  
foreach ($listtongdon4 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}  
foreach ($listtongdon5 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}  
foreach ($listtongdon6 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}  
foreach ($listtongdon7 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";

}  
foreach ($listtongdon8 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}  
foreach ($listtongdon9 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
  
}  
foreach ($listtongdon10 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
 
}  
foreach ($listtongdon11 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."',";
  
}  
foreach ($listtongdon12 as $td) {
  extract($td);
  echo "'".$td['tongtiendonhang']."'";
  
}  
    
?>

];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 10000000, max:90000000}}],
    }
  }
});
</script>