@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Profile Page</h4>

                <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">{{-- enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                   @csrf {{-- ប្រើសម្រាប់ use grid--}}

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input id="name" name="name" class="form-control" type="text" placeholder="Name" value="{{ $adminData->name}}">
                        </div>
                    </div>

                    {{-- Username --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input id="username" name="username" class="form-control" type="text" placeholder="User Name" value="{{ $adminData->username}}">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                        <div class="col-sm-10">
                            <input id="email" name="email" class="form-control" type="text" placeholder="Email" value="{{ $adminData->email}}">
                        </div>
                    </div>

                    {{-- Profile Image --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="profile_image" id="image">
                        </div>
                    </div>
                    {{-- when click image that image to show --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">

                            {{-- <img id="showImage" class="rounded avatar-lg" src="{{asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap"> --}}
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($adminData->profile_image) ? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.webp')) }}" alt="...">

                        </div>
                    </div>
                    {{-- <a href="{{route('admin.profile')}}">
                        <button type="none" class="btn btn-danger waves-effect waves-light">Cancel</button>
                    </a> --}}
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection
