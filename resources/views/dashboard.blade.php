@extends('layouts.admin')
@section('title')
Role
@endsection

@section('pagelevel_css')

@endsection
@section('content')
   <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
          <div class="kt-subheader__main">
              <h3 class="kt-subheader__title">Role</h3>
              <span class="kt-subheader__separator kt-subheader__separator--v"></span>
              <h4 class="kt-subheader__title">Lists</h4>
          </div>
      </div>
  </div>

  <!-- end:: Content Head -->

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
          <div class="kt-portlet">
            <div class="kt-portlet__body">

              <!--begin::Section-->
              <div class="kt-section">
                <div class="kt-section__content">
                  <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Discription</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($role as $row) 
                                    <tr>
                                        <td>{{$row->display_name}}</td>
                                        <td>{{$row->description}}</td>
                                    </tr>
                                @empty
                                    <tr> 
                                         <td class="text-center" colspan="9"> No data found.....</td>   
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
@endsection

@section('pagelevel_script')

@endsection
