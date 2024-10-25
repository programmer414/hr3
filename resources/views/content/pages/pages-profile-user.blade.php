@extends('layouts/layoutMaster')

@section('title', 'User Profile - Profile')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/page-profile.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/pages-profile.js'])
@endsection

@section('content')

<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="guidance_db"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");

 ?>

<!-- Header -->
<div class="row">
  <div class="container-xxl flex-grow-1 container-p-y">

        <div id="content">


          <section>
            <div class="container py-5">
              <div class="row">
              </div>
              <?php           
              $sql="select  * from  user_account where dor_id='18' ";
              $mysql=mysqli_query($conn,$sql);
              $row=mysqli_fetch_assoc($mysql);
              ?>
              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <img src="img/<?php echo $row['image_file'] ?> " alt="avatar"
                      class="rounded-circle img-fluid" style="width: 150px;height:150px;">
                      <h5 class="my-3"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></h5>
                      <p class="text-muted mb-1"><?php echo $row['role'] ?></p>
                      <p class="text-muted mb-4"><?php echo $row['address'] ?></p>
                      <div class="d-flex justify-content-center mb-2">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init id="open" class="btn btn-primary" style="width:100%;">UPDATE PROFILE</button>
                      </div>
                      <div class="d-flex justify-content-center mb-2">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="edits">UPDATE INFO</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$name}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$email}}</p>
                        </div>
                      </div>
                      <hr>
              
                    </div>
                  </div>




                </div>
              </div>
            </div>
          </section>
        </div>


</div>
<!--/ User Profile Content -->
@endsection
