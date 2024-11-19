@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">About Page</h4>

                {{-- <form method="post" action="{{ route('store.profile' ) }}" enctype="multipart/form-data">enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                    <form method="post" action="{{ route('update.about' ) }}" enctype="multipart/form-data">{{-- enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                    @csrf
                    {{-- ប្រើសម្រាប់ use grid--}}

                   <input type="hidden" name="id" value="{{ $aboutpage->id }}">

                    {{-- Title --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input id="title" name="title" class="form-control" type="text" placeholder="Title" value="{{ $aboutpage->title}}">
                        </div>
                    </div>

                    {{-- Short Tiltle --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Tiltle</label>
                        <div class="col-sm-10">
                            <input id="short_title" name="short_title" class="form-control" type="text" placeholder="Short Tilte" value="{{ $aboutpage->short_title}}">
                        </div>
                    </div>

                    {{-- Short Description --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            {{-- <textarea required="" class="form-control" name="short_description" id="short_description" rows="5" placeholder="Short Description" value="{{ $aboutpage->short_description}}"></textarea> --}}
                            <textarea required="" class="form-control" name="short_description" id="short_description" rows="5" placeholder="Short Description">{{ $aboutpage->short_description }}</textarea>

                        </div>

                    </div>

                    {{-- Long Description --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                            {{-- <input id="long_description" name="long_description" class="form-control" type="text" placeholder="Long description" value="{{ $aboutpage->long_description}}"> --}}
                            <textarea name="long_description" id="elm1">{{ $aboutpage->long_description}}</textarea>
                        </div>
                    </div>

                    {{-- About Image --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="about_image" id="image">
                            {{-- <input type="file" class="form-control" name="home_slide" id="home_slide"> --}}
                        </div>
                    </div>

                    {{-- when click image that image to show --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($aboutpage->about_image)? url($aboutpage->about_image):url('upload/no_image.webp')) }}" alt="...">

                             {{-- <img id="showImage" class="rounded avatar-lg" src="{{ asset($aboutpage->about_page ?? 'upload/no_image.webp') }}" alt="..."> --}}
                             {{-- <img id="showImage" class="rounded avatar-lg" src="{{ asset($aboutpage->about_image ?? 'upload/no_image.webp') }}" alt="..."> --}}


                        </div>
                    </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page">

            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    // $(document).ready(function(){
    // $('#image').change(function(e){
    //         var reader = new FileReader();
    //         reader.onload = function(e){
    //             $('#showImage').attr('src',e.target.result);
    //         }
    //         reader.readAsDataURL(e.target.files['0']);
    //     })
    // })
    $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);  // Update image preview
        }
        reader.readAsDataURL(e.target.files['0']);  // Load the selected image
    })
})


</script>
@endsection
