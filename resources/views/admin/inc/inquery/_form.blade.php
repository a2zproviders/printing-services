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
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Title','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('category_id', 'Select Category')}}
      <!-- {{Form::select('category_id', $categoryArr,'0', ['class' => 'form-control', 'id'=>'inquery_category_id','required'=>'required','data-url'=>""])}} -->
      <select name="category_id" class="form-control" id="inquery_category_id" data-url="{{ route('get_color_size') }}" required>
        @foreach($categoryArr as $i => $cat))
        <option value="{{ $i }}">{{ $cat }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('size_id', 'Select Size')}}
      <!-- {{Form::select('size_id', $sizeArr,'0', ['class' => 'form-control', 'id'=>'inquery_size_id'])}} -->
      <select name="size_id" class="form-control" id="inquery_size_id" data-url="{{ route('get_price') }}" required>
        @include('admin.template.size', compact('sizeArr'))
      </select>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('color_id', 'Select Color')}}
      <!-- {{Form::select('color_id', $colorArr,'0', ['class' => 'form-control', 'id'=>'inquery_color_id'])}} -->
      <select name="color_id" class="form-control" id="inquery_color_id" data-url="{{ route('get_price') }}" required>
        @include('admin.template.color', compact('colorArr'))
      </select>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('file', 'Select File')}}
      {{ Form::file('file',['class' => 'form-control','required'=>'required','accept'=>'.cdr']) }}
    </div>
  </div>
  <div class="col-lg-12">
    <div class="form-group">
      {{Form::label('notes', 'Notes')}}
      {{Form::textarea('notes', '', ['class' => 'form-control', 'placeholder'=>'notes','style'=>'height: 100px'])}}
    </div>
  </div>

  <div class="col-lg-12" id="price_div" style="display: none;">
    <div style="font-weight: bold;">Payment detail :-</div>
    <div>Price : ₹ <span id="inquery_price"></span></div>
    <div>GST Price (18%) : ₹ <span id="inquery_gst"></span></div>
    <div>Total Price : ₹ <span id="inquery_total_price"></span></div>
  </div>
  <input type="hidden" name="txn_id" id="paymentID">
  <input type="hidden" name="price" id="order_price">
  <input type="hidden" name="gst_price" id="order_gst_price">
  <input type="hidden" name="total_price" id="order_total_price">
  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
  <div style="opacity: 0;" data-url="{{ url('/') }}" id="base_url"></div>

  </div>