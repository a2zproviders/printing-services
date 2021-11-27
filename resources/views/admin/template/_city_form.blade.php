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
      {{Form::label('name', 'Enter city name')}}
      {{Form::text('record[name]', '', ['class' => 'form-control', 'placeholder'=>'Enter City name','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group">
      {{Form::label('pincode', 'Enter Pincode')}}
      {{Form::number('record[pincode]', '', ['class' => 'form-control', 'placeholder'=>'Enter Pincode','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group">
      {{Form::label('state_id', 'Select State')}}
      {{Form::select('record[state_id]', $parentArr,'0', ['class' => 'form-control', 'id'=>'state_id','required'=>'required'])}}
    </div>
  </div>

</div>