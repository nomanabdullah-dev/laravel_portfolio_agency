@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Create Services</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
        </ol>

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="mb-2">
                    <label for="icon"><h5>Font Awesome Icon</h5></label>
                    <input type="text" id="icon" name="icon" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="title"><h5>Title</h5></label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div>
                    <label for="description"><h5>Description</h5></label>
                    <textarea type="file" id="description" name="description" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-5">Save</button>
        </form>
    </div>
</main>
@endsection

