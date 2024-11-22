@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Multi Image</h4><br><br>

                {{-- <form method="post" action="{{ route('store.profile' ) }}" enctype="multipart/form-data">enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                    <form method="post" action="{{ route('store.multi.image' ) }}" enctype="multipart/form-data">{{-- enctype="multipart/form-data" ប្រើដើម្បីអាចUpload Images បានច្រើន --}}
                    @csrf
                    {{-- ប្រើសម្រាប់ use grid--}}

                   {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}



                    {{-- About Image --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="multi_image[]" multiple="" id="image">
                            {{-- <input type="file" class="form-control" name="home_slide" id="home_slide"> --}}
                        </div>
                    </div>

                    {{-- when click image that image to show --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.webp') }}" alt="...">

                             {{-- <img id="showImage" class="rounded avatar-lg" src="{{ asset($aboutpage->about_page ?? 'upload/no_image.webp') }}" alt="..."> --}}
                             {{-- <img id="showImage" class="rounded avatar-lg" src="{{ asset($aboutpage->about_image ?? 'upload/no_image.webp') }}" alt="..."> --}}


                        </div>
                    </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Multi Image">

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
