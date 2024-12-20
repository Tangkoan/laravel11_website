@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Blog Category Page</h4><br>

                        <!-- បន្ថែមកូដ id="myForm"   ដើម្បីដំណើរការជាមួយJS -->
                        <form method="post"  id="myForm" action="{{ route('store.boge.category') }}">
                            @csrf

                            {{-- Blog Category --}}
                            <div class="row mb-3">
                                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category</label> 
                                
                                <!-- class="col-sm-10" change class="form-group col-sm-10"  -->
                                <div class="form-group col-sm-10">
                                    <input id="blog_category" name="blog_category" class="form-control" type="text" placeholder="Blog Category">
                                    <!-- @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror -->
                                </div>
                            </div>

                            

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Blog Categorys">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>



<!-- public/public/backend/assets/js/validate.min.js -->
    <script type="text/javascript">
         $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    blog_category: {
                        required : true,
                    }, 
                },
                messages :{
                    blog_category: {
                        required : 'Please Enter Blog Category',
                    },
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
<!-- End    public/public/backend/assets/js/validate.min.js -->
@endsection
