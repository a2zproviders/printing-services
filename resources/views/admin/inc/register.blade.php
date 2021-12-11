<div class="bg-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="height: 100vh;">
            <div class="col-xl-5 col-lg-10 col-md-9 my-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form method="post" action="{{url('admin/register')}}" class="user">
                                        {{csrf_field()}}

                                        @if($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            {{$message}}
                                        </div>
                                        @endif
                                        @if($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
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
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" name="mobile" min="10" max="10" placeholder="Mobile" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" autocomplete="new-password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="termcondition" value="1" class="custom-control-input" id="customCheck" required>
                                                <label class="custom-control-label" for="customCheck">Term & condition</label>
                                                <div class="float-right pt-1">Already have an account ? <a href="{{ route('admin_login') }}">Sign in</a></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Submit" />
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>