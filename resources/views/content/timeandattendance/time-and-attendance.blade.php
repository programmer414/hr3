@extends('layouts/layoutMaster')

@section('title', 'TIME AND ATTENDANCE')

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/quill/katex.scss',
'resources/assets/vendor/libs/quill/editor.scss',
'resources/assets/vendor/libs/select2/select2.scss'
])
@endsection

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/app-email.scss'
])
@endsection


@section('vendor-script')
@vite([
'resources/assets/vendor/libs/quill/katex.js',
'resources/assets/vendor/libs/quill/quill.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/block-ui/block-ui.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/app-email.js'
])
@endsection

@section('content')
<div class="">
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="datatables-projects table border-top">
        <thead>
          <tr>
           <th>Employee Id</th>
           <th>Employee name</th>
           <th>Time In</th>
           <th>Time out</th>
           <th>Total Hours Work</th>
           <th>Date</th>
         </tr>
       </thead>

       <tbody>
        @foreach($attendance as $claim)
        <tr class="contents">
          <td>{{$claim->employee_id}}</td>
          <td class="titles">{{ $claim->employee_name }}</td>
          <td>{{ $claim->time_in }}</td>
          <td>{{ $claim->time_out}}</td>
          <td>
            <?php
            $datetime1 = new DateTime($claim->time_in);
            $datetime2 = new DateTime($claim->time_out);
            $interval = $datetime1->diff($datetime2);
            echo $interval->format('%hh %im');
            ?>
          </td>
          <td>{{$get=$claim->date_time_in}}</td>
          <?php 
           $host="localhost"; // Host name 
           $username="root"; // Mysql username 
           $password=""; // Mysql password 
           $db_name="database_01"; // Database name 
           $tbl_name="information"; // Table name 
           $conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
           mysqli_select_db($conn,"$db_name")or die("cannot select DB");
           $date=date("Y-m-d");
          if($date!==$get){
            $totalhrs=$interval->format('%h');
            $over_time=$totalhrs-8;
            $update="update hr3_attendance set total_hrs='$totalhrs',over_time='$over_time' where attendance_id='$claim->attendance_id'";
            mysqli_query($conn,$update);

}?>
</tr>
@endforeach
</tbody>

</table>
</div>
</div>
</div>
@endsection


<script type="text/javascript">


  setInterval(function() {
    location.reload();
},9000); // refresh every 5 seconds



</script>