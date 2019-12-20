@extends('layouts.admin')
@section('title')
User List
@endsection

@section('pagelevel_css')
<style type="text/css">
.pagination li {
  color: black !important;
  float: left !important;
  padding: 8px 16px !important;
  text-decoration: none !important;
  transition: background-color .3s !important;
}

.pagination li.active {
  background-color: #1e1e2d !important;
  color: white !important;
}
.pagination a{
  color: black !important;
}

.pagination li:hover:not(.active) {background-color: #ddd !important; }
tr td a i {
  color:#1e1e2d !important;
}
</style>
@endsection
@section('content')
 <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
          <div class="kt-subheader__main">
              <h3 class="kt-subheader__title">Users</h3>
              <span class="kt-subheader__separator kt-subheader__separator--v"></span>
              <h4 class="kt-subheader__title">Lists</h4>
          </div>
          <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
              <a href="{{URL::to('admin/users/create')}}" class="btn kt-subheader__btn-primary">
                New User &nbsp;
              </a>
            </div>
          </div>
      </div>
  </div>

  <!-- end:: Content Head -->

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
          <div class="kt-portlet">
            <div class="kt-portlet__body">
            <div class="col-md-12">
                <div id="msg">
                  
                  @if ($message = Session::get('message'))
                   <div id="remove_msg"> {!! $message !!}</div> 
                    <!-- <span id="html-message"></span>  -->
                  @endif   
                </div>

                   @if ($errors->any())
                      <div class="m-alert alert alert-danger " role="alert" id="m_form_1_msg">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
            </div>

              <!--begin::Section-->
              <div class="kt-section">
                <div class="kt-section__content">
                  <div class="table-responsive">
                    <div id="users-list"></div>
                  </div>
                </div>
              </div>

              <!--end::Section-->
            </div>

            <!--end::Form-->
          </div>
        <!--end::Portlet-->
  </div>

  <!-- end:: Content -->

  <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
           Are you sure you want to delete this User?
        </div>
        {{Form::hidden('userId','',array('class'=>'user-id'))}}
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="button" id="delete_user_record" class="btn btn-primary" id="OK">Ok</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('pagelevel_script')
<script type="text/javascript">
    $(document).ready(function() 
    {
        var page = '';
        var qstring = '' ;
        var basePath = '{{URL::to('/admin')}}';
        var searchtext = '';
        getUser(qstring);

        $(document).on('click', '.pagination li a', function (e) {
              e.preventDefault();
              page = $(this).attr('href').split('page=')[1];
              var qstring = '&searchtext=' + searchtext + '&page=' + page +'&userstatus=' ;              
              getUser(qstring);
           });

            $(document).on('keyup','#search-box',function(e){
              e.preventDefault();
              searchtext = $(this).val();
              var qstring = '&searchtext=' + searchtext; 
              getUser(qstring);
            });

       function getUser(qstring)
       {   
         $.ajax({
             type: 'GET',
             url : basePath+'/users?' + qstring,
             dataType: 'json',
         }).done(function (data) 
         {
            $('#users-list').html(data);     
         }).fail(function () {
             alert('Posts could not be loaded.');
         });
       }

       $(document).on('click','.delete_user',function(e){                  
         e.preventDefault();    
         $('#delete_modal').modal('show');
         var id =$(this).data('id');                  
         $('.id').val(id);
         var form_data = $('#delete_modal');
       });

      $(document).on('click','#delete_user_record',function(e){
               e.preventDefault();
               var id = $('.id').val(); 
               var page ='';
               var _token = "{{ csrf_token() }}";
               
                 $.ajax({
                       url: basePath +'/users/'+id ,
                       type: 'DELETE',  
                       data:{_token:_token},
                   }).done(function(result){
                        $('#form-errors').html("");               
                        $('#msg').html(result.message);
                        setTimeout(function()
                        {
                         $('#msg').html("");
                        // location.reload();
                        }, 3000);
                      $('#delete_modal').modal('hide');
                      // getUser("",page,basePath);
                      getUser(qstring);
                  });
          });
    });

 </script>  
@endsection
