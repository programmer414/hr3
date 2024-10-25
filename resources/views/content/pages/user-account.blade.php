

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


@extends('layouts/layoutMaster')

@section('title', 'USER ACCOUNT')

@section('vendor-style')
  @vite([
    'resources/assets/vendor/libs/fullcalendar/fullcalendar.scss',
    'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
    'resources/assets/vendor/libs/select2/select2.scss',
    'resources/assets/vendor/libs/quill/editor.scss',
    'resources/assets/vendor/libs/@form-validation/form-validation.scss',
  ])
@endsection

@section('page-style')
  @vite(['resources/assets/vendor/scss/pages/app-calendar.scss'])
@endsection

@section('vendor-script')
  @vite([
    'resources/assets/vendor/libs/fullcalendar/fullcalendar.js',
    'resources/assets/vendor/libs/@form-validation/popular.js',
    'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
    'resources/assets/vendor/libs/@form-validation/auto-focus.js',
    'resources/assets/vendor/libs/select2/select2.js',
    'resources/assets/vendor/libs/flatpickr/flatpickr.js',
    'resources/assets/vendor/libs/moment/moment.js',
  ])
@endsection

@section('page-script')
  @vite([
    'resources/assets/js/app-calendar-events.js',
    'resources/assets/js/app-calendar.js',
  ])
@endsection

@section('content')
  


  <div class="">
    <div class="card">
<div style="display:flex;">
           <button class="btn  btn-primary btn-sm btn-flat m-3 " style="font-size:15px;width:13%;height:38px;"  data-bs-toggle="modal" data-bs-target="#smallModal"><i class="fas fa-plus-square"></i>Insert Info</button>

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
           <th>User Id</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Date Created</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
        
                <tbody>
              @foreach($user_account as $claim)
                <tr class="contents">
                    <td>{{ $claim->id }}</td>
                    <td class="titles">{{ $claim->name }}</td>
                    <td>{{ $claim->email }}</td>
                    <td>Admin</td>
                      <td>{{ $claim->created_at }}</td>
<td>Active</td>

                </tr>
              @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
  </div>


<div class="modal" tabindex="-1" role="dialog" id="smallModal">
  <div class="modal-dialog" role="document">
    <form  action="{{url('/user_account')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ADD ACCOUNT</h5>
 
      </div>
      <div class="modal-body">
        <label>FULL NAME</label>
   <div class="form-group">
     <input type="text" name="name" class="form-control">
   </div>
          <label>EMAIL</label>
   <div class="form-group">
     <input type="email" name="email" class="form-control">
   </div>
          <label>PASSWORD</label>
   <div class="form-group">
     <input type="text" name="password" class="form-control">
   </div>
   <div class="form-group" style="display:none;">
     <input type="text" name="role" value="admin" class="form-control">
   </div>

      </div>
      <div class="modal-footer">
        <button type="SUBMIT" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </div>

    <!-- @END -->
  </form>
  </div>
</div>
  

@endsection

<script type="text/javascript">


  $(document).ready(function(){

   $('#closemodal').on('hidden.bs.modal', function (e) {
 $('#smallModal').hide();
});

    

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




