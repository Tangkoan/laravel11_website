@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
                    <div class="card"><br><br>
                        {{-- <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true"> --}}
                        <center>
                            <img src="{{ asset('Backend/assets/images/small/img-5.jpg')}}" class="rounded-circle avatar-xl" alt="...">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Email : {{$adminData->email}}</h4>
                            <hr>
                            <h4 class="card-title">User Nmae : {{$adminData->username}}</h4>
                            <hr>
                            <a href="">
                                <button  type="button" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</button>
                            </a>
                        </div>
                    </div>
                </div>








        </div>
            <!-- end row -->
    </div>

@endsection
