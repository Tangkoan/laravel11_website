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

                <form action="">
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
                            <input id="userneame" name="userneame" class="form-control" type="text" placeholder="User Name" value="{{ $adminData->username}}">
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
                            <img id="showImage" class="rounded avatar-lg" src="{{asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="sumbit" class="btn btn-info waves-effect waves-light" value="Update Profile" name="" id="">
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
