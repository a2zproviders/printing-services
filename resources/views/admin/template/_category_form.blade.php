

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
        {{Form::label('name', 'Enter category name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Enter category name','required'=>'required'])}}
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        {{ Form::label('slug', 'Enter slug') }}
        {{ Form::text('slug','', ['class'=>'form-control', 'placeholder'=>'Enter slug']) }}
      </div>
    </div>
      <!-- <div class="col-lg-6">
        <div class="form-group">
          {{Form::label('image', 'Select Category Image')}}
          {{Form::file('image', ['class' => 'form-control', 'placeholder'=>'Enter Category Image','id'=>'title','required'=>'required'])}}
        </div>
      </div> -->
  </div>
