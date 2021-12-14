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
          <!-- Content Row -->
          @if (\Session::has('success'))
          <div class="alert alert-success toast-msg" style="color: green">
            {!! \Session::get('success') !!}</li>
          </div>
          @endif

          @if (\Session::has('danger'))
          <div class="alert alert-danger toast-msg" style="color: red;">
            {!! \Session::get('danger') !!}</li>
          </div>
          @endif
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Size</h6>
                  <button class="btn btn-primary" data-toggle="collapse" data-target="#size_box">+ Add</button>
                </div>

                <!-- Card Body -->
                <div class="card-body collapse" id="size_box">
                  {!! Form::open(['method' => 'POST', 'action' => 'admin\SizeController@store', 'class' => 'user']) !!}
                  @include('admin.template._size_form')
                  <div class="text-right">
                    <input type="submit" class="btn btn-primary" name="login" value="Add Size" />
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-12">
              {{ Form::open(['url' => url(env('ADMIN_DIR').'/size/')]) }}
              <div class="card">
                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
                  <h6 class="m-0 font-weight-bold text-primary">Size List</h6>
                  <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-url="{{ url(env('ADMIN_DIR').'/size/delete') }}" id="delete_all">Delete</button>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>S No.</th>
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>Category</th>
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
                        <td><a href="{{route('size.edit', $list->id) }}">
                            <i class="far fa-edit" aria-hidden="true"></i> {{$list->name}}</a></td>
                        <td>{{ $list->code ?? 'N/A' }}</td>
                        <td>{{$list->category->name}}</td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {{ $lists->links() }}
                </div>

              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>