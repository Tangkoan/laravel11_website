@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Home Slide Page</h4>

                {{-- <form method="post" action="{{ route('store.profile' ) }}" enctype="multipart/form-data">enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                    <form method="post" action="{{ route('update.slide' ) }}" enctype="multipart/form-data">{{-- enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                    @csrf
                    {{-- ប្រើសម្រាប់ use grid--}}

                   {{-- <input type="hidden" name="id" value=" {{ $homeslide->id }}"> --}}
                   <input type="hidden" name="id" value="{{ $homeslide->id }}">

                    {{-- Title --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input id="title" name="title" class="form-control" type="text" placeholder="Title" value="{{ $homeslide->title}}">
                        </div>
                    </div>

                    {{-- Short Tiltle --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Tiltle</label>
                        <div class="col-sm-10">
                            <input id="short_title" name="short_title" class="form-control" type="text" placeholder="Short Tilte" value="{{ $homeslide->short_title}}">
                        </div>
                    </div>

                    {{-- Video Url --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                        <div class="col-sm-10">
                            <input id="video_url" name="video_url" class="form-control" type="text" placeholder="Video Url" value="{{ $homeslide->video_url}}">
                        </div>
                    </div>

                    {{-- Slider Image --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="home_slide" id="home_slide">
                            {{-- <input type="file" class="form-control" name="home_slide" id="home_slide"> --}}
                        </div>
                    </div>
                    {{-- when click image that image to show --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">

                            {{-- <img id="showImage" class="rounded avatar-lg" src="{{asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap"> --}}
                            {{-- <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide) ? url('upload/home_slide/'.$homeslide->home_slide):url('upload/no_image.webp')) }}" alt="..."> --}}
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide)? url($homeslide->home_slide):url('upload/no_image.webp')) }}" alt="...">

                        </div>
                    </div>
                    {{-- <a href="{{route('admin.profile')}}">
                        <button type="none" class="btn btn-danger waves-effect waves-light">Cancel</button>
                    </a> --}}
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                    {{-- <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile"> --}}

            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
    $('#home_slide').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })

</script>
@endsection
