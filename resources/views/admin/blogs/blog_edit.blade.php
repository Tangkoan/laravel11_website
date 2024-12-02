@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Add Css of Tags -->
 <style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>
<!-- Add Css of Tags -->

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Blog</h4>

                        <form method="post" action="{{ route('update.blog') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- ចាប់ID តាមកូដមួយបន្ទាត់ខាងក្រោម --}}
                            <input type="hidden" name="id" value="{{ $blogs->id }}">


                            {{-- Blog Category Name --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                        
                                        @foreach($categories as $cat)
                                        <option value=" {{ $cat->id }}"  {{ $cat->id == $blogs->blog_category_id ? 'selected' : ''}}> {{ $cat->blog_category }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Blog Title --}}
                            <div class="row mb-3">
                                <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input id="blog_title" value=" {{ $blogs->blog_title }} " name="blog_title" class="form-control" type="text" placeholder="Blog Title">
                                    @error('blog_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Blog Tags --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags </label>
                                <div class="col-sm-10">
                                    <input name="blog_tags" value=" {{ $blogs->blog_tags }} " class="form-control" type="text" data-role="tagsinput"> 
                                    @error('blog_tags')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Blog Description --}}
                            <div class="row mb-3">
                                <label for="blog_description" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="blog_description" id="elm1" rows="5" placeholder="Blog Description">{{ $blogs->blog_description }}</textarea>
                                    @error('blog_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Blog Image --}}
                            <div class="row mb-3">
                                <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="blog_image" id="image">
                                    @error('blog_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Preview Image --}}
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ asset($blogs->blog_image) }}" alt="Preview Image">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Page">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
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
