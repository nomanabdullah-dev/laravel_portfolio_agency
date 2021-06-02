@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Create Services</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
        </ol>

        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{ method_field('PUT') }}
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <h6>Big Image: </h6>
                <img src="{{ asset('assets/img/big_image.jpg') }}" class="img-thumbnail" style="height: 30vh">
                <label for="big_image"><h6>Change Big Image: </h6></label>
                <input type="file" id="big_image" name="big_image" class="form-control">
            </div>
            <div class="form-group col-md-3 mt-3">
                <h6>Small Image: </h6>
                <img src="{{ asset('assets/img/small_image.jpg') }}" class="img-thumbnail" style="height: 30vh">
                <label for="small_image"><h6>Change Small Image:</h6></label>
                <input type="file" id="small_image" name="small_image" class="form-control">
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="mb-2">
                    <label for="title"><h5>Title</h5></label>
                    <input type="text" id="title" name="title" class="form-control" value="">
                </div>
                <div class="mb-4">
                    <label for="sub_title"><h5>Sub Title</h5></label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control" value="">
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <h5>Description</h5>
                <textarea class="form-control" name="description" rows="5"></textarea>
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="mb-2">
                    <label for="client"><h5>Client</h5></label>
                    <input type="text" id="client" name="client" class="form-control" value="">
                </div>
                <div class="mb-4">
                    <label for="category"><h5>Category</h5></label>
                    <input type="text" id="category" name="category" class="form-control" value="">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-5">Save</button>
        </form>
    </div>
</main>
@endsection

