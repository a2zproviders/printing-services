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
          {{ Form::open(['url' => url(env('ADMIN_DIR').'/inquery')]) }}
          <!-- Page Heading -->
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
                        <th>User</th>
                        <th>Title</th>
                        <th>Invoice No.</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>GST Price (18%)</th>
                        <th>Total Price</th>
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
                        <td>{{ $sn++ }}. |
                          <input type="checkbox" name="sub_chk[]" value="{{ $list->id }}" class="sub_chk" data-id="{{$list->id}}">
                        </td>
                        <td>{{ $list->user->name }} ({{ $list->user->mobile }})</td>
                        <td>{{$list->title}}</td>
                        <td>{{ sprintf("%s/%04d", $setting->invoice_pre, $list->invoice_no) }}</td>
                        <td>{{ $list->category->name }}</td>
                        <td>{{ $list->size->name }}</td>
                        <td>{{ $list->color->name }}</td>
                        <td>{{ $list->price }} ₹</td>
                        <td>{{ $list->gst_price }} ₹</td>
                        <td>{{ $list->total_price }} ₹</td>
                        <td>{{ $list->txn_id }}</td>
                        <td>{{ date('d M Y h:i A',strtotime($list->created_at)) }}</td>
                        <td>
                          @php
                          $statusArr = [
                          "pending" => "Pending",
                          "processing" => "Processing",
                          "completed" => "Completed",
                          "canceled" => "Canceled",
                          ];
                          @endphp
                          {{ Form::select("order_status", $statusArr, $list->status, ["onchange" => "statuschange(this)","class"=>"form-control", "data-url" => route('inquery_status', $list->id)]) }}
                          <!-- {{ $list->status }} -->
                        </td>
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
          {{ Form::close() }}
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>