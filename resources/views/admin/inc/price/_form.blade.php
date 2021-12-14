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
      {{Form::label('category_id', 'Select Category')}}
      <!-- {{Form::select('category_id', $categoryArr,'0', ['class' => 'form-control', 'id'=>'inquery_category_id','required'=>'required','data-url'=>""])}} -->
      <select name="category_id" class="form-control" id="inquery_category_id" data-url="{{ route('get_color_size') }}" required>
        @foreach($categoryArr as $i => $cat))
        @if(@$edit->category_id == $i)
        <option value="{{ $i }}" selected>{{ $cat }}</option>
        @else
        <option value="{{ $i }}">{{ $cat }}</option>
        @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('size_id', 'Select Size')}}
      <!-- {{Form::select('size_id', $sizeArr,'0', ['class' => 'form-control', 'id'=>'inquery_size_id'])}} -->
      <select name="size_id" class="form-control" id="inquery_size_id" data-url="{{ route('get_color_size') }}" required>
        @if(@$edit)
        @include('admin.template.size', compact('sizeArr','edit'))
        @else
        @include('admin.template.size', compact('sizeArr'))
        @endif
      </select>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('color_id', 'Select Color')}}
      <!-- {{Form::select('color_id', $colorArr,'0', ['class' => 'form-control', 'id'=>'inquery_color_id'])}} -->
      <select name="color_id" class="form-control" id="inquery_color_id" data-url="{{ route('get_color_size') }}" required>
        @if(@$edit)
        @include('admin.template.color', compact('colorArr','edit'))
        @else
        @include('admin.template.color', compact('colorArr'))
        @endif
      </select>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('price', 'Enter Price')}}
      {{Form::number('price', '', ['class' => 'form-control', 'placeholder'=>'Enter Price','required'=>'required'])}}
    </div>
  </div>
</div>