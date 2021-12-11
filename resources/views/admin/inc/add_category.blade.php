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
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> View Category</a>
          </div>

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
                  <h6 class="m-0 font-weight-bold text-primary">Category Description</h6>
                  <button class="btn btn-primary" data-toggle="collapse" data-target="#category_box">+ Add Category</button>
                </div>

                <!-- Card Body -->
                <div class="card-body collapse" id="category_box">
                  {{ Form::open(['url' => url('restaurent-control/category/add'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}

                  @if($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{$message}}
                  </div>
                  @endif
                  @if(count($errors->all()))
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        {{Form::label('category_name', 'Enter category name')}}
                        {{Form::text('category_name', '', ['class' => 'form-control', 'placeholder'=>'Enter category name'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('category_name', 'Enter category description')}}
                        {{Form::textarea('category_description', '', ['class' => 'form-control', 'placeholder'=>'Enter category description'])}}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        {{Form::label('root_category', 'Select Parent category')}}
                        {{Form::select('root_category', $parentArr,'0', ['class' => 'form-control'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('category_slug', 'Enter slug')}}
                        {{Form::text('category_slug','', ['class'=>'form-control', 'placeholder'=>'Enter slug'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('image', 'Choose image')}}
                        {{Form::file('category_image',['class'=>'form-control'])}}
                      </div>
                    </div>
                  </div>
                  <div class="text-right">
                    <input type="submit" class="btn btn-primary" name="login" value="Add Category" />
                  </div>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-responsive">
                    <thead class="thead-dark">
                      <tr>
                        <th>S No.</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Sub Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($lists as $list)

                      <tr>
                        <td>S/No.</td>
                        <td><a href="#"><i class="fas fa-pencil" aria-hidden="true"></i>
                            {{$list->category_title}}</a></td>

                        <td>{{$list->category_description}}</td>
                        <td>{{$list->m_parent->category_title}}</td>
                        <td>
                          <a href="{{ url('myproducts',$product->id) }}" class="btn btn-danger btn-sm" data-tr="tr_{{$product->id}}" data-toggle="confirmation" data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove" data-btn-ok-class="btn btn-sm btn-danger" data-btn-cancel-label="Cancel" data-btn-cancel-icon="fa fa-chevron-circle-left" data-btn-cancel-class="btn btn-sm btn-default" data-title="Are you sure you want to delete ?" data-placement="left" data-singleton="true">
                            Delete

                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {{ $lists->links() }}
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