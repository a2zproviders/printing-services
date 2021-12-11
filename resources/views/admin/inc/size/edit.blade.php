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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Size</h1>
            <a href="{{ url('admin/size') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> View Size</a>
          </div>

          <!-- Content Row -->

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Size Description</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                  {!! Form::open(['method' => 'PUT', 'route'=>array('size.update', $edit['id']), 'class' => 'user']) !!}
                  @include('admin.template._size_form')
                  <div class="text-right">
                    <input type="submit" class="btn btn-primary" name="edit_size" value="Edit Size" />
                  </div>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->