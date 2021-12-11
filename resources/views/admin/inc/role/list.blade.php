<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    @include('admin.common.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
       @include('admin.common.TopHeader')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          {{ Form::open(['url' => url(env('ADMIN_DIR').'/role')]) }}
          <!-- Page Heading -->
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="card">
                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
                  <h6 class="m-0 font-weight-bold text-primary">Role List</h6>
                  <div class="">
                    <a href="{{ url(env('ADMIN_DIR').'/role/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">+ Add Role</a>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-url="{{ url(env('ADMIN_DIR').'/role/delete') }}" id="delete_all">Delete</button>

                  </div>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-responsive">
                   <thead class="thead-dark">
                     <tr>
                       <th>S No.</th>
                       <th>Name</th>
                       <!-- <th>Action</th> -->
                     </tr>
                   </thead>
                   <tbody>
                    @php
                    $sn = $lists->firstItem();
                    @endphp
                    @foreach($lists as $list)
                       <tr class="bg-light">
                        <td>{{ $sn++ }}. | 
                            <input type="checkbox" name="sub_chk[]" value="{{ $list->id }}" class="sub_chk" data-id="{{$list->id}}">
                        </td>
                         <td>
                             <a href="{{route('role.edit', $list->id) }}">
                                 <i class="far fa-edit" aria-hidden="true"></i> {{$list->name}}
                             </a>
                         </td>
                         <!-- <td>
                           <a href="{{url(env('ADMIN_DIR').'/testimonial/delete', $list->id)}}"  class="btn btn-danger btn-sm"
                            data-tr="tr_{{$list->id}}"
                            data-toggle="confirmation"
                            data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                            data-btn-ok-class="btn btn-sm btn-danger"
                            data-btn-cancel-label="Cancel"
                            data-btn-cancel-icon="fa fa-chevron-circle-left"
                            data-btn-cancel-class="btn btn-sm btn-default"
                            data-title="Are you sure you want to delete ?"
                            data-placement="left" data-singleton="true"
                            onclick="return confirm('Are you sure you want to delete this item?');">
                             Delete</a>
                         </td> -->
                       </tr>

                     @endforeach
                   </tbody>
                 </table>

              {{  $lists->links() }}
                </div>

              </div>
            </div>
          </div>
          {{ Form::close() }}
         </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
