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
  <div class="col-lg-4">
    <div class="form-group">
      {{Form::label('name', 'Enter Color Name')}}
      {{Form::text('record[name]', '', ['class' => 'form-control', 'placeholder'=>'Enter color name','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group">
      {{Form::label('code', 'Enter Short Name')}}
      {{Form::text('record[code]', '', ['class' => 'form-control', 'placeholder'=>'Enter short name','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group">
      {{Form::label('category_id', 'Select Category')}}
      {{Form::select('record[category_id]', $parentArr,'0', ['class' => 'form-control', 'id'=>'category_id','required'=>'required'])}}
    </div>
  </div>

</div>