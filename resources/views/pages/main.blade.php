@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Main</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>

        <form action="{{ route('admin.main.update') }}" method="POST" enctype="multipart/form-data">
            @csrf {{ method_field('PUT') }}
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <h5>Backgroud Image: </h5>
                <img src="{{ url($main->bc_img) }}" class="img-thumbnail" style="height: 30vh">
                <label for="bc_img"><h6>Change Backgroud:</h6></label>
                <input type="file" id="bc_img" name="bc_img" class="form-control">
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="mb-2">
                    <label for="title"><h5>Title</h5></label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $main->title }}">
                </div>
                <div class="mb-4">
                    <label for="sub_title"><h5>Sub Title</h5></label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control" value="{{ $main->sub_title }}">
                </div>
                <div>
                    <label for="resume"><h5>Upload Resume</h5></label>
                    <input type="file" id="resume" name="resume" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-5">Save</button>
        </form>
    </div>
</main>
@endsection

