
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


@extends('layouts/layoutMaster')

@section('title', 'SHIFT AND SCHEDULINg')

@section('vendor-style')
@vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection


@section('vendor-script')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/cleavejs/cleave.js',
'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'
])
@endsection


@section('content')


<div class="">
  <div class="card">
    <div style="display:flex;">
      <button class="btn  btn-primary btn-sm btn-flat mt-3 " style="margin-left:7px;font-size:15px;width:13%;height:38px;"  data-bs-toggle="modal" data-bs-target="#smallModal"><i class="fas fa-plus-square"></i>Insert Info</button>

      <form class=" mt-3 ml-3 mw-100 navbar-search"  style="margin-left:7px" autocomplete="off">
        <div class="input-group">
          <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" >
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" style="height:40px;">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="card-datatable table-responsive">
      <table class="datatables-projects table border-top">
        <thead>
          <tr>
           <th>Date</th>
           <th>Employee Id</th>
            <th>Employee Name</th>
           <th>Shift Start</th>
           <th>Shift end</th>
           <th>Shift type</th>
           <th>Action</th>

         </tr>
       </thead>
       <tbody>
         @foreach($Shift_and_schedule as $claim)
         <tr class="contents">
           <td class="titles">{{ $claim->shift_date }}</td>
           <td class="titles">{{ $claim->employee_id }}</td>
           <td class="titles">{{ $claim->firstname}} {{ $claim->lastname}}</td>
           <td>{{ $claim->shift_start }}</td>
           <td>{{ $claim->shift_end }}</td>
           <td>{{ $claim->shift_type }}</td>
           <td style="display:flex;">
            <button class="btn btn-primary" style="height:38px;" id="updatebutton">Update</button>

            <form method="POST" action="{{ route('Shift_and_schedule.delete', ['id' => $claim->id]) }}"  style="margin-left:2%;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>


          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
</div>




<div class="modal" tabindex="-1" role="dialog" id="smallModal">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
           <h5 class="modal-title" style="margin-top:5%;text-align:center;">SHIFT AND SCHEDULING</h5>

        <div class="modal-body">



          <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="database_01"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>

<div class="form-group">
  <p>EMPLOYEE ID</p>
  <input type="text" name="" id="#myInputs" placeholder="EMPLOYEE ID  OR EMPLOYEE NAME" class="form-control">
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Employee ID</th>
      <th>Employee Fullname</th>
      <th>POSITION</th>
      <th>DEPARTMENT</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <?php 
  $selet ="SELECT *,hr4_recruitment.department as  dep FROM `hr1_applicant_apply` INNER JOIN  hr1_applicant on  hr1_applicant.applicant_id=hr1_applicant_apply.applicant_id  INNER  JOIN  hr4_recruitment  on  hr4_recruitment.recruitment_id=hr1_applicant_apply.recruitment_id  where  hr1_applicant_apply.status='deploy'";
  $query=mysqli_query($conn,$selet);
  ?> 
  <tbody>
    <?php while($row=mysqli_fetch_assoc($query)){?>
      <tr class="contentss">
        <td class="titless"><?php echo  $row['applicant_id']?></td>
        <td class="titless"><?php echo  $row['firstname']?> <?php echo  $row['lastname']?></td>
        <td><?php echo $row['jobrole']?></td>
        <td> <?php echo $row['dep']?></td>
        <td><button class="btn btn-primary btn-sm  btn-flat" id="add">ADD</button></td>
      </tr>
    <?php }?>
  </tbody>
</table>


    <form  action="{{url('/Shift_and_schedule')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf

<div class="row" style="margin-top:10%">

  <div class="form-group col-md-6">
    <label>EMPLOYEE ID</label>
    <input type="text" name="employee_ids" id="employee_ids" disabled class="form-control">
    <input type="hidden" name="employee_id" id="employee_id" class="form-control">
  </div>

    <div class="form-group col-md-6">
    <label>EMPLOYEE NAME</label>
    <input type="text" name="employee_name" id="employee_name" class="form-control">
  </div>


  <div class="form-group col-md-6">
   <label>DATE SHIFT</label>
   <input type="date" name="date_shift" class="form-control">
 </div>

 <div class="form-group col-md-6">
   <label>SHIFT START</label>
   <input type="time" name="shift_start" class="form-control">
 </div>

 <div class="form-group col-md-6">
   <label>SHIFT END </label>
   <input type="time" name="shift_end" class="form-control">
 </div>

 <div class="form-group col-md-6">
   <label>SHIFT TYPE</label>
   <select class="form-select" name="shift_type">
     <option>Day Shift</option>
     <option>Morning Shift</option>
     <option>Afternoon Shift</option>
     <option>Night Shift</option>
     <option>Graveyard Shift</option>
   </select>
 </div> 

</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-primary">Save</button>
  <a class="btn btn-danger" data-toggle="modal"  id="closemodal" style="color:white;">close</a>
</div>

</form>

</div>




</div>

</div>
</div>






<div class="modal" tabindex="-1" role="dialog" id="updateshift">
  <div class="modal-dialog" role="document">
    <form  action="{{url('/Shift_and_schedules')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">UPDATE SHIFT AND SCHEDULING</h5>

        </div>
        <div class="modal-body">
          <label>EMPLOYEE ID</label>
          <div class="form-group">
           <input type="text" id="employee_id_update" name="employee_id_update" class="form-control">
         </div>


         <label>SHIFT START</label>
         <div class="form-group">
           <input type="time" id="shift_start_update" name="shift_start_update" class="form-control">
         </div>

         <label>SHIFT END </label>
         <div class="form-group">
           <input type="time" id="shift_end_update" name="shift_end_update" class="form-control">
         </div>


         <label>SHIFT TYPE</label>
         <div class="form-group">
          <select class="form-select"  id="shift_type_update" name="shift_type_update">
           <option>Day Shift</option>
           <option>Morning Shift</option>
           <option>Afternoon Shift</option>
           <option>Night Shift</option>
           <option>Graveyard Shift</option>
         </select>
       </div>
     </div>
     <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <a class="btn btn-danger" data-toggle="modal"  id="closemodalupdate" style="color:white;">close</a>
    </div>
  </div>
</form>
</div>
</div>




<script type="text/javascript">


  $(document).on('click', '#add', function () {
       $('form')[0].reset();
       var tr = $(this).closest("tr").find('td');
       $('#employee_id').val(tr.eq(1).text());
        $('#employee_ids').val(tr.eq(1).text());
       $('#employee_name').val(tr.eq(2).text());
   });


  $(document).on('click', '#closemodal', function () {
    $('#smallModal').modal('hide');

  });

  $(document).on('click', '#updatebutton', function () {
    $('#updateshift').modal('show');
    $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    $('#employee_id_update').val(tr.eq(1).text());
    $('#shift_start_update').val(tr.eq(3).text());
    $('#shift_end_update').val(tr.eq(4).text());
    $('#shift_type_update').val(tr.eq(5).text());
  });

  $(document).on('click', '#closemodalupdate', function () {
    $('#updateshift').modal('hide');

  });

  $(document).on('click', '#smallModal', function () {

  });


  $(document).on('click', '#closemodal_update', function () {
    $('#update_date').modal('hide');

  });


  $('#myInput').keyup(function(){
// Search text
    var text = $(this).val();
// Hide all content class element
    $('.contents').hide();

// Search 
    $('.contents .titles:contains("'+text+'")').closest('.contents').show();
  });

</script>



@endsection
