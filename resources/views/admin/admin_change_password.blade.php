@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Chnage Password</h4><br>

                @if(count($errors))
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dimissiable fade show">{{ $error}}</p>
                    @endforeach
                @endif

                <form method="post" action="{{ route('update.password') }}">{{-- enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                   @csrf {{-- ប្រើសម្រាប់ use grid--}}

                    {{-- Old Password --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input id="password" name="oldpassword" class="form-control" type="password" placeholder="Old Password" >
                        </div>
                    </div>

                    {{-- New Password --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input id="newpassword" name="newpassword" class="form-control" type="password" placeholder="New Password" >
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input id="confirm_password" name="confirm_password" class="form-control" type="password" placeholder="Confirm Password" >
                        </div>
                    </div>




                    {{-- <a href="{{route('admin.profile')}}">
                        <button type="none" class="btn btn-danger waves-effect waves-light">Cancel</button>
                    </a> --}}
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">

            </div>
        </div>
    </div> <!-- end col -->
</div>


</script>
@endsection
