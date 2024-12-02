@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Portfolio Page</h4>

                        {{-- Update create when we create route in web.php --}}
                        <form method="post" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- ចាប់ID តាមកូដមួយបន្ទាត់ខាងក្រោម --}}
                            <input type="hidden" name="id" value="{{ $portfolio->id }}">
                            {{-- Portfolio Name --}}
                            <div class="row mb-3">
                                <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name</label>
                                <div class="col-sm-10">
                                    <input id="portfolio_name" name="portfolio_name" class="form-control" type="text" placeholder="Portfolio Name" value="{{ $portfolio->portfolio_name}}">
                                    @error('portfolio_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Portfolio Title --}}
                            <div class="row mb-3">
                                <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="col-sm-10">
                                    <input id="portfolio_title" name="portfolio_title" class="form-control" type="text" placeholder="Portfolio Title" value="{{ $portfolio->portfolio_title}}">
                                    @error('portfolio_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Portfolio Description --}}
                            <div class="row mb-3">
                                <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="portfolio_description" id="elm1" rows="5" placeholder="Portfolio Description">{{$portfolio->portfolio_description}}</textarea>
                                </div>
                            </div>

                            {{-- Portfolio Image --}}
                            <div class="row mb-3">
                                <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="portfolio_image" id="image">
                                </div>
                            </div>

                            {{-- Preview Image --}}
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ asset($portfolio->portfolio_image)  }}" alt="Preview Image">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio Page">
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
