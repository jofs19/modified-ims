@extends('frontend.main_master')
@section('content')
{{-- @php
    $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp --}}

<div class="body-content">
    <div class="container">

        <div class="row">

            @include('frontend.common.user_sidebar')

            <div class="col-md-2">


                
            </div> <!-- end col-md-2 -->

            <div class="col-md-6">

                <div class="card">

                    <h3 class="text-center font-extrabold">Change Password</h3> <br>

                    <div class="card-body">

                        <form method="post" action="{{ route('user.password.update') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password </label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password </label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password </label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>

                

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> Update </button>
                            </div><br>



                           


                        </form>

                    </div>


                </div>
                
            </div> <!-- end col-md-2 -->

        </div> <!-- end row -->

    </div>


</div>




@endsection