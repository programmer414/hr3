

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src=
"https://d3js.org/d3.v4.min.js"></script>
<script src=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
<link rel="stylesheet"
      href=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
<link rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
      type="text/css" />
 
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


@extends('layouts/layoutMaster')

@section('title', 'DASHBOARD')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'
])
@endsection

@section('page-style')
<!-- Page -->
@vite(['resources/assets/vendor/scss/pages/cards-advance.scss'])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/apex-charts/apexcharts.js',
  'resources/assets/vendor/libs/swiper/swiper.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
  ])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/dashboards-analytics.js'
])
@endsection

@section('content')






<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="database_01"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>



<div class="container-xxl flex-grow-1 container-p-y ">


 <div class="card-body">
   <div class="container" style="margin-top:3%;">

     <div class="row">


       <div class="col-md-2  mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">

       </div>
       <div class="col-md-2 bg-warning mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
        <div class="row">
          <div class="col-md-6">

           <p style="font-size:30px;color:white;margin-top:15%;"><?php
           $applicants="select count(*) as total from users where status='admin' ";
           $applicantquerys=mysqli_query($conn,$applicants);
           $applicantrows=mysqli_fetch_assoc($applicantquerys);
           echo $applicantrows['total'];
         ?></p>
         <p style="font-size:15px;color:white;margin-top:15%;">USER</p>
       </div>

       <div class="col-md-6">
         <i class="fas fa-user-tie" style="font-size:40px;color:white;margin-top:30%;"></i>
       </div>
     </div>
   </div>


   <div class="col-md-2 bg-success mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
    <div class="row">
      <div class="col-md-6">

       <p style="font-size:30px;color:white;margin-top:15%;"><?php

       $date = new DateTime('now', new DateTimeZone('Asia/Manila'));

       $timeIn =$date->format('Y-m-d');
       $timein="select count(*) as total from hr3_attendance  where date_time_in='$timeIn' ";
       $timequery=mysqli_query($conn,$timein);
       $timerow=mysqli_fetch_assoc($timequery);
       echo $timerow['total'];
     ?></p>
     <p style="font-size:15px;color:white;margin-top:15%;">Employee Due In</p>
   </div>

   <div class="col-md-6">
     <i class="fas fa-clock" style="font-size:40px;color:white;margin-top:30%;"></i>
   </div>
 </div>
</div>



<div class="col-md-2 bg-danger mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
  <div class="row">
    <div class="col-md-6">

     <p style="font-size:30px;color:white;margin-top:15%;"></p>
     <p style="font-size:15px;color:white;margin-top:15%;">Absent</p>
   </div>

   <div class="col-md-6">
     <i class="fas fa-user-tie" style="font-size:40px;color:white;margin-top:30%;"></i>
   </div>
 </div>
</div>



<div class="col-md-2 bg-primary mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
  <div class="row">
    <div class="col-md-6">

     <p style="font-size:30px;color:white;margin-top:15%;"><?php

     $leave="select count(*) as total from hr3_leave_management  where status='Approved' ";
     $leavequery=mysqli_query($conn,$leave);
     $leaverow=mysqli_fetch_assoc($leavequery);
     echo $leaverow['total'];
   ?></p>
   <p style="font-size:15px;color:white;margin-top:15%;">Employee Leave</p>
 </div>
 <div class="col-md-6">
   <i class="fas fa-user-clock" style="font-size:40px;color:white;margin-top:30%;"></i>
 </div>
</div>
</div>



</div>

</div>
</div>











</div>


@endsection



 

 <canvas  id="myChart" style="width:100%;max-width:600px;position:absolute;left:500px;top:350px">
 
 </canvas>



 <canvas  id="myCharts" style="width:100%;max-width:600px;position:absolute;left:500px;top:350px">
 
 </canvas>

<script>


    const months = {!! json_encode(array_column($formattedData, 'month')) !!};
    const applicantCounts = {!! json_encode(array_column($formattedData, 'total_claims')) !!};

    console.log(months, applicantCounts);

 const barColors = Array(12).fill("#007bff"); // Bootstrap blue color
    var ctx = document.getElementById("myChart").getContext('2d');
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: months, // Full month names
            datasets: [{
                backgroundColor: barColors,
                data: applicantCounts
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Claim Trend"
            },
            scales: {
                yAxes: [{
                    ticks: { beginAtZero: true }
                }]
            }
        }
    });
</script>





