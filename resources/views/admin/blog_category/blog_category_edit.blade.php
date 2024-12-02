@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Blog Category Page</h4><br>

                        <form method="post" action="{{ route('update.blog.category') }}">
                            @csrf
                            {{-- ចាប់ID តាមកូដមួយបន្ទាត់ខាងក្រោម --}}
                            <input type="hidden" name="id" value="{{ $blogcategory->id }}">

                            {{-- Blog Category --}}
                            <div class="row mb-3">
                                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category</label> 
                                <div class="col-sm-10">
                                    <input id="blog_category" name="blog_category" class="form-control" type="text" placeholder="Blog Category" value="{{ $blogcategory->blog_category}}">
                                    @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Category">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>


@endsection
