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
                  <div class="">
                    <!-- <a href="{{ url(env('ADMIN_DIR').'/plan/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">+ Add Plan</a> -->
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-url="{{ url(env('ADMIN_DIR').'/inquery/delete') }}" id="delete_all">Delete</button>

                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>S No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Booking Date</th>
                        <th>Purpose</th>
                        <th>Member</th>
                        <th>Price</th>
                        <th>Txn_id</th>
                        <th>Verify</th>
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
                          <!-- <a href="{{route('plan.edit', $list->id) }}"> -->
                          <!-- <i class="far fa-edit" aria-hidden="true"></i>  -->
                          {{$list->name}}
                          <!-- </a> -->
                        </td>
                        <td>{{ $list->email }}</td>
                        <td>{{ $list->mobile }}</td>
                        <td>{{ $list->city_name->name }}, {{ $list->state_name->name }}</td>
                        <td>{{ date('d M Y',strtotime($list->date)) }}</td>
                        <td>{{ $list->plan->name }}</td>
                        <td>{{ $list->member }}</td>
                        <td>{{ $list->price }} ₹</td>
                        <td>{{ $list->txn_id }}</td>
                        <td>
                          @if($list->status == 'true')
                          <a href="{{ url('admin/inquery/status/'.$list->id) }}" class="btn btn-success">True</a>
                          @else
                          <a href="{{ url('admin/inquery/status/'.$list->id) }}" class="btn btn-danger">False</a>
                          @endif
                          |
                          <a href="{{ url('admin/inquery/pdf/'.$list->id) }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
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
          {{ Form::close() }}
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>