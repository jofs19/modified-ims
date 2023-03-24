@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black">
                  <h3 class="widget-user-username"><b>Admin Name:</b> {{ $adminData->name }}</h3>

                    <a href="{{ route('admin.profile.edit') }}" style="float: right" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                    
{{-- src="http://127.0.0.1:8000/upload/admin_images/upload/admin_images/1742561658306068.png" --}}
                  <h6 class="widget-user-desc"><b> Email:</b> {{ $adminData->email }}</h6>
                  <h6 class="widget-user-desc"><b> Phone:</b> {{ $adminData->phone }}</h6>

                </div>
                <div class="widget-user-image">
                  <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path))? url($adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">12K</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 br-1 bl-1">
                      <div class="description-block">
                        <h5 class="description-header">550</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">158</h5>
                        <span class="description-text">TWEETS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>

              {{-- <img src="{{ $order->receipt }}" class="mb-2" style="width:400px;height:200px;"> --}}
        </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection