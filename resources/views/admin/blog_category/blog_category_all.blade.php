@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog All Category</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog All Category</h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;  text-align: center;vertical-align: middle;" >
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Portfolio Name</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($blogcategory as $item)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> {{ $item->blog_category }} </td>

                                            <td>
                                                <a  href=" {{route('edit.portfolio', $item->id)}} " class="btn btn-info sm" title="Edit Data"> <i
                                                        class="fas fa-edit"></i> </a>

                                                <a href=" {{ route('delete.portfolio', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i> </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
