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
      {{Form::label('name', 'Enter Name')}}
      {{Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Enter name','id'=>'name','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {{Form::label('price', 'Enter Price')}}
      {{Form::number('price', '', ['class' => 'form-control', 'placeholder'=>'Enter Price','required'=>'required'])}}
    </div>
  </div>
  <div class="col-lg-12">
    <div class="form-group">
      {{Form::label('short_description', 'Enter Short Description')}}
      {{Form::textarea('short_description', '', ['class' => 'form-control', 'placeholder'=>'Enter Short Description','required'=>'required','style'=>'height: 100px'])}}
    </div>
  </div>
  <div class="col-lg-12">
    <div class="form-group">
      {{Form::label('description', 'Enter Description')}}
      {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder'=>'Enter Description','required'=>'required','style'=>'height: 200px'])}}
    </div>
  </div>
</div>