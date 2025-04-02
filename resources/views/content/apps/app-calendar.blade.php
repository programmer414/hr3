<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@extends('layouts/layoutMaster')

@section('title', 'ClAIM MANAGEMENT')

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/jkanban/jkanban.scss',
'resources/assets/vendor/libs/select2/select2.scss',
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/quill/typography.scss',
'resources/assets/vendor/libs/quill/katex.scss',
'resources/assets/vendor/libs/quill/editor.scss'
])
@endsection

@section('page-style')

@vite('resources/assets/vendor/scss/pages/app-kanban.scss')
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/moment/moment.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/jkanban/jkanban.js',
'resources/assets/vendor/libs/quill/katex.js',
'resources/assets/vendor/libs/quill/quill.js'
])
@endsection

@section('page-script')
@vite('resources/assets/js/app-kanban.js')
@endsection

@section('content')



<div class="">
  <div class="card">
    <div style="display:flex;">
     <button class="btn  btn-primary btn-sm btn-flat m-3 " style="font-size:15px;width:13%;height:38px;"   id="openmodels"><i class="fas fa-plus-square"></i>Insert Info</button>

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
         <th>Employee Id</th>
         <th>Employee Name</th>
         <th>Claim Date</th>
         <th>Claim Type</th>
         <th>Amount</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach($claims as $claim)
      <tr class="contents">
        <td>{{ $claim->employee_id }}</td>
        <td class="titles">{{ $claim->firstname}} {{ $claim->lastname}}</td>
        <td>{{ $claim->claim_date }}</td>
        <td>{{ $claim->claim_type }}</td>
        <td>{{ $claim->amount }}</td>
        <td style="display:none;">{{ $claim->id }}</td>
        <td style="display:flex;">
          <button class="btn btn-primary mr-2" style="height:38px;" id="updateclick"> Edit</button>

          <form method="POST" action="{{ route('claims.delete', ['id' => $claim->id]) }}"  style="margin-left:1%;">
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


<div class="modal" tabindex="-1" role="dialog" id="updatemodal">
  <div class="modal-dialog" role="document">
    <form  action="{{url('/update')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">CLAIMS AND REIMBURSEMENT INFO UPDATE</h5>
        </div>

        <div class="modal-body">
           <input type="hidden" name="claim_id_update"  id="claim_id_update" class="form-control">
          <label>EMPLOYEE ID</label>
          <div class="form-group">
           <input type="text" name="employee_id_update"  id="employee_id_update" class="form-control">
         </div>
         
         <label>EMPLOYEE NAME</label>
         <div class="form-group">
           <input type="text" name="employee_name_update" id="employee_name_update" class="form-control">
         </div>

         <label>CLAIM DATE</label>
         <div class="form-group">
           <input type="date" name="claim_date_update" id="claim_date_update" class="form-control">
         </div>

         <label>CLAIM TYPE</label>
         <div class="form-group">
           <select name="employee_type_update" id="employee_type_update" class="form-control">
             <option class="form-control">Travel Expenses</option>
             <option class="form-control">Transportation Allowance</option>
             <option class="form-control">Meal Allowance</option>
             <option class="form-control">Performance-based Bonus</option>
             <option class="form-control">Health Insurance</option>
             <option class="form-control">Leave Benefit</option>
             <option class="form-control">13 month pay</option>
           </select>
         </div>

         <label>AMOUNT</label>
         <div class="form-group">
           <input type="number" name="amount_update" id="amount_update" class="form-control">
         </div>


       </div>
       <div class="modal-footer">
        <button type="SUBMIT" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-danger" id="modal_close_update">Close</button>
      </div>
    </div>
  </form>
</div>
</div>





<div class="modal" tabindex="-1" role="dialog" id="smallModal">
  <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">
          <h5 style="text-align:center; margin-top:9%;">CLAIMS AND REIMBURSEMENT INFO</h5>

  
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


    <form  action="{{url('/claims')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf

          <div class="row" style="margin-top:5%;">
            

          <div class="form-group col-md-6">
            <label>EMPLOYEE ID</label>
           <input type="text" name="employee_ids"  id="employee_ids"  disabled class="form-control">
             <input type="hidden" name="employee_id"  id="employee_id" class="form-control">
         </div>
       
         <div class="form-group col-md-6">
            <label>EMPLOYEE NAME</label>
           <input type="text" name="employee_name"  id="employee_name" disabled class="form-control">
         </div>

      
         <div class="form-group col-md-6">
             <label>CLAIM DATE</label>
           <input type="date" name="claim_date" class="form-control">
         </div>


   
         <div class="form-group col-md-6">
                <label>CLAIM TYPE</label>
           <select name="employee_type" class="form-control">
             <option class="form-control">Travel Expenses</option>
             <option class="form-control">Transportation Allowance</option>
             <option class="form-control">Meal Allowance</option>
             <option class="form-control">Performance-based Bonus</option>
             <option class="form-control">Health Insurance</option>
             <option class="form-control">Leave Benefit</option>
             <option class="form-control">13 month pay</option>

           </select>

         </div>

       
         <div class="form-group col-md-6">
            <label>AMOUNT</label>
           <input type="number" name="amount" class="form-control">
         </div>

          </div>


       <div class="modal-footer">
        <button type="SUBMIT" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" id="modal_close">Close</button>
      </div>

</form>

    </div>

</div>
</div>




<script >
  $(document).on('click', '#modal_close', function () {
    $('#smallModal').modal('hide');

  });
</script>


<script >
  $(document).on('click', '#openmodels', function () {
    $('#smallModal').modal('show');
  });
</script>


<script >
  $(document).on('click', '#updateclick', function () {
    $('#updatemodal').modal('show');
          $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    $('#employee_id_update').val(tr.eq(0).text());
    $('#employee_name_update').val(tr.eq(1).text());
    $('#claim_date_update').val(tr.eq(2).text());
    $('#employee_type_update').val(tr.eq(3).text());
    $('#amount_update').val(tr.eq(4).text());
    $('#claim_id_update').val(tr.eq(5).text());
  });


  $(document).on('click', '#add', function () {
       $('form')[0].reset();
       var tr = $(this).closest("tr").find('td');
       $('#employee_id').val(tr.eq(0).text());
        $('#employee_ids').val(tr.eq(0).text());
       $('#employee_name').val(tr.eq(1).text());
   });
</script>





<script >
  $(document).on('click', '#modal_close_update', function () {
    $('#updatemodal').modal('hide');

  });
</script>
@endsection



<script type="text/javascript">
  $(document).ready(function(){
    $('#myInput').keyup(function(){
// Search text
      var text = $(this).val();
// Hide all content class element
      $('.contents').hide();
// Search 
      $('.contents .titles:contains("'+text+'")').closest('.contents').show();
    });
  });
</script>




<script type="text/javascript">
  $(document).ready(function(){
    $('#myInputs').keyup(function(){
// Search text
      var text = $(this).val();
// Hide all content class element
      $('.contentss').hide();
// Search 
      $('.contentss .titless:contains("'+text+'")').closest('.contentss').show();
  });
});


</script>