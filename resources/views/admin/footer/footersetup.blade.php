@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Footer Setup Page</h4>

                    <form method="post" action="{{ route('update.footer' ) }}" >
                    @csrf
                    {{-- ប្រើសម្រាប់ use grid--}}
                   <input type="hidden" name="id" value="{{ $footer->id }}">

                    {{-- Number --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input id="number" name="number" class="form-control" type="text" placeholder="text" value="{{ $footer->number}}">
                            @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Short Description --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description </label>
                        <div class="col-sm-10">
                            <textarea required="" name="short_description"  class="form-control" rows="5">
                                {{ $footer->short_description }}
                            </textarea>
                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    {{-- adress --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Adress</label>
                        <div class="col-sm-10">
                            <input id="adress" name="adress" class="form-control" type="text" placeholder="adress" value="{{ $footer->adress}}">
                            @error('adress')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" name="email" class="form-control" type="email" placeholder="Email" value="{{ $footer->email}}">
                            @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- facebook --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">facebook</label>
                        <div class="col-sm-10">
                            <input id="facebook" name="facebook" class="form-control" type="text" placeholder="facebook" value="{{ $footer->facebook}}">
                            @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- twitter --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">twitter</label>
                        <div class="col-sm-10">
                        <input id="twitter" name="twitter" class="form-control" type="text" placeholder="twitter" value="{{ $footer->twitter}}">
                        @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>

                    {{-- copyright --}}
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">copyright</label>
                        <div class="col-sm-10">
                            <input id="copyright" name="copyright" class="form-control" type="text" placeholder="copyright" value="{{ $footer->copyright}}">
                            @error('copyright')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer">
            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection
