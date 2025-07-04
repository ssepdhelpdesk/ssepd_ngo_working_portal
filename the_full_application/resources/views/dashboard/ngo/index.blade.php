@section('title') 
NGO || List
@endsection 
@extends('dashboard.layouts.main')
@section('style')
@endsection 
@section('content')
<div class="container-fluid">
   <!-- ============================================================== -->
   <!-- Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <div class="row page-titles">
      <div class="col-md-7 align-self-center">
         <div class="d-flex align-items-center">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
               <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
         </div>
      </div>
      <div class="col-md-5 align-self-center text-end">
         <button onclick="history.back()" class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</button>
         @can('user-create')
         <a href="{{ route('admin.users.create') }}"><button class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-success"><i class="fas fa-plus-square"></i> Add New</button></a>
         @endcan
      </div>
   </div>
   <!-- ============================================================== -->
   <!-- End Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <!-- Start Page Content -->
   <!-- ============================================================== -->
   <!-- row -->
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"></h4>
               @include('dashboard.component.message')
               <div class="table-responsive m-t-40">
                  <table id="example23" class="display nowrap table table-hover table-striped border" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Sl No</th>
                           <th>NGO Name</th>
                           <th>ACT Name</th>
                           <th>NGO Pan No</th>
                           <th>NGO Email</th>
                           <th>NGO Phone No</th>
                           <th>View RC</th>
                           <th>NGO Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Sl No</th>
                           <th>NGO Name</th>
                           <th>ACT Name</th>
                           <th>NGO Pan No</th>
                           <th>NGO Email</th>
                           <th>NGO Phone No</th>
                           <th>View RC</th>
                           <th>NGO Status</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        @php($i=1)
                        @if ($data->isNotEmpty())
                        @foreach($data as $key => $ngo)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $ngo->ngo_org_name }}</td>
                           <td>
                              @if($ngo->ngo_category == 1)
                              RPwD Act
                              @elseif($ngo->ngo_category == 2)
                              Senior Citizen Act
                              @else
                              N/A
                              @endif
                           </td>
                           <td>{{ $ngo->ngo_org_pan }}</td>
                           <td>{{ $ngo->ngo_org_email }}</td>
                           <td>{{ $ngo->ngo_org_phone }}</td>
                           <td><label class="badge bg-warning"><a href="{{ url('storage/' . $ngo->ngo_org_pan_file) }}" target="_blank" style="cursor: pointer;" class=" text-white">View</a></label></td>
                           <td>{{ $ngo->applicationStage->stage_name }}</td>
                           <td>
                              <div class="btn-group">
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                 </button>
                                 <div class="dropdown-menu">
                                    @can('ngo-show')
                                    @if($ngo->no_of_form_completed != 6)
                                    <a class="dropdown-item" href="{{ route('admin.ngo.continue_application', ['id' => $ngo->id, 'no_of_form_completed' => $ngo->no_of_form_completed]) }}">Continue Application</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route('admin.ngo.view_ngo_application', $ngo->id)}}" target="_blank">View</a>
                                    @endcan
                                    @can('ngo-edit')
                                    <a class="dropdown-item" href="{{route('admin.roles.edit', $ngo->id)}}">Edit</a>
                                    @endcan
                                    @can('ngo-delete')
                                    <a class="dropdown-item" href="{{route('admin.roles.destroy', $ngo->id)}}" id="delete">Delete</a>
                                    @endcan
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- row -->
   <!-- ============================================================== -->
   <!-- End Page Content -->
   <!-- ============================================================== -->
</div>
@endsection 
@section('script')
<script>
   $(function () {
    $('#example23').DataTable({
     processing: true,
     responsive: true,
     ordering: true,
     lengthMenu: [[10, 500, 1000, -1], [10, 500, 1000, "All"]],
     dom: 'Blfrtip',
     buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
   ]
});
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
 });   
</script>
@endsection