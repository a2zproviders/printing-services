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
        <div class="container-fluid" style="min-height: 81vh;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          @if(auth()->user()->role_id == 1)
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('category.index') }}" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total No. of Category</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('user.index') }}" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total no. of User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('size.index') }}" style="text-decoration: none;">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total no. of Size</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$size}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('color.index') }}" style="text-decoration: none;">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total No. Of Color</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $color }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('inquery.index') }}" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total no. of Order</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $inquery }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="#" style="text-decoration: none;">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total no. of XYZ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">44</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="#" style="text-decoration: none;">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total No. Of XYZ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">233</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          @else
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="card">
                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
                  <h6 class="m-0 font-weight-bold text-primary">Inquery List</h6>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>S No.</th>
                        <th>Title</th>
                        <th>Invoice No.</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price (with gst)</th>
                        <th>Txn_id</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Attechment</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $sn = $lists->firstItem();
                      @endphp
                      @if($lists->count() != 0)
                      @foreach($lists as $list)
                      <tr class="bg-light">
                        <td>{{ $sn++ }}.</td>
                        <td>{{$list->title}}</td>
                        <td>{{ sprintf("%s/%04d", $setting->invoice_pre, $list->invoice_no) }}</td>
                        <td>{{ $list->category->name }}</td>
                        <td>{{ $list->size->name }}</td>
                        <td>{{ $list->color->name }}</td>
                        <td>{{ $list->total_price }} ₹</td>
                        <td>{{ $list->txn_id }}</td>
                        <td>{{ date('d M Y h:i A',strtotime($list->created_at)) }}</td>
                        <td>{{ $list->status }}</td>
                        <td>
                          @if($list->file)
                          <a href="{{ url('attechment/inquery/'.$list->file) }}" target="_blank" class="btn btn-primary"><i class="fa fa-paperclip"></i></a>
                          @else
                          N/A
                          @endif
                        </td>
                        <td>
                          <a href="{{ url('admin/inquery/pdf/'.$list->id) }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tr class="bg-light">
                        <td colspan="11">
                          <div style="text-align: center;">No record found.</div>
                        </td>
                      </tr>
                      @endif
                    </tbody>
                  </table>

                  {{ $lists->links() }}
                </div>

              </div>
            </div>
          </div>
          @endif
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @php
        $setting = App\Model\Setting::find(1);
        @endphp
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; {{ $setting->title }} 2021</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <script>
      $(document).ready(function() {
        $('#remove-swiper').on('click', function(e) {


        })
      })
    </script>
    <!-- End of Page Wrapper -->