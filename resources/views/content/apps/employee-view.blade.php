<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Data Table -->


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


<style>



    .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }



</style>
</head>



<div class="">
  <div class="card">
  <h4 class="m-3">QRCODE ATTENDANCE FOR EMPLOYEE</h4>


        <div class="card-datatable table-responsive">
           <button class="btn btn-primary m-3" data-toggle="modal" data-target="#addStudentModal">Add Employee </button>


    <div class="card-datatable table-responsive">
      <table class="datatables-projects table border-top">
       <thead class="thead-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>EMPLOYEE Name</th>
                     <th>JOB ROLE</th>
                      <th>DEPARTMENT</th>
                      <th>QR CODE</th>
                </tr>
            </thead>
       <tbody>
 @foreach($qrcode as  $qr)
<tr>
  <td>{{$qr->employee_id}}</td>  
   <td>{{$qr->firstname}} {{$qr->lastname}}</td>  
    <td>{{$qr->jobrole}}</td>  
    <td>{{$qr->department}}</td>  
    <td>    
                                        <div class="action-button">
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#qrCodeModal<?= $qr->employee_id ?>"><img src="https://cdn-icons-png.flaticon.com/512/1341/1341632.png" alt="" width="16"></button>

                                            <!-- QR Modal -->
                                            <div class="modal fade" id="qrCodeModal<?= $qr->employee_id ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><?= $qr->employee_id; ?>'s QR Code</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $qr->generate_code ?>" alt="" width="300">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
        </td>  


</tr>

 @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

   
<!-- Add Modal -->
<div class="modal fade" id="addStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close btn  btn-danger float-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
            </div>
            <div class="modal-body">
             <h5 style="text-align:center;" id="addStudent">
                EMPLOYEE GENERATE QRCODE FOR ATTENDANCE
             </h5>

<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="database_01"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");

?>

<div class="col-md-12" style="margin-bottom:5%;">
    <div class="form-group">
      <p>EMPLOYEE ID</p>
      <input type="text" name="" placeholder="EMPLOYEE ID  OR EMPLOYEE NAME" class="form-control">
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
        <tr>
            <td><?php echo  $row['applicant_id']?></td>
            <td><?php echo  $row['firstname']?> <?php echo  $row['lastname']?></td>
            <td><?php echo $row['jobrole']?></td>
            <td> <?php echo $row['dep']?></td>
            <td style="display:none;"><?php  echo $row['recruitment_id'];?></td>
            <td><button class="btn btn-primary btn-sm  btn-flat" id="add">ADD</button></td>
        </tr>
    <?php }?>
</tbody>
</table>


<div class="row" style="margin-top:5%;margin-bottom:5%;">
    <div class=" col-md-6"><label>EMPLOYEE ID</label>

        <input type="text" class="form-control" id="empid"  name="empid" disabled>

    </div>
    <div class=" col-md-6"><label>EMPLOYEE NAME</label>

        <input type="text" class="form-control" id="fname" disabled></div> 

    </div>
    <div class="qr-con text-center" style="display: none;">
        <input type="hidden" class="form-control" id="generatedCode" name="generated_code">
        <p>Take a pic with your qr code.</p>
        <img class="mb-4" src="" id="qrImg" alt="">
    </div>
    <button type="button" class="btn btn-primary form-control qr-generator" onclick="generateQrCode()">Generate QR Code</button>

<form action="{{url('qrcodesave')}}"  method="post">
     @csrf
   <input type="hidden" name="rec_id" id="rec_id">
   <input type="hidden" class="form-control" id="empids"  name="empids">
   <input type="hidden" class="form-control" id="generatedCodes"  name="generatedCodes">

    <div class="modal-footer modal-close" style="display: none;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">save</button>
    </div>


</form>

</div>
</div>
</div>
</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<!-- Data Table -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>



@endsection


<script>


    function generateRandomCode(length) {
        const characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let randomString = '';

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            randomString += characters.charAt(randomIndex);
        }
        return randomString;
    }

    function generateQrCode() {
        const qrImg = document.getElementById('qrImg');

        let text = generateRandomCode(10);
      $("#generatedCode").val(text);

        if (text === "") {
            alert("Please enter text to generate a QR code.");
            return;
        } else {
            const apiUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(text)}`;

            qrImg.src = apiUrl;
            document.getElementById('empids').style.pointerEvents = 'none';
            document.querySelector('.modal-close').style.display = '';
            document.querySelector('.qr-con').style.display = '';
            document.querySelector('.qr-generator').style.display = 'none';
               $('#generatedCodes').val(text);
        }
    }

    $(document).on('click', '#add', function () {
     $('form')[0].reset();
     var tr = $(this).closest("tr").find('td');
     $('#empid').val(tr.eq(0).text());
     $('#empids').val(tr.eq(0).text());
     $('#fname').val(tr.eq(1).text());
     $('#rec_id').val(tr.eq(4).text());
 });
</script>




