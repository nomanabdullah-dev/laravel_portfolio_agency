@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert"></button>
            <strong>Error!</strong>{{ $error }}
        </div>
    @endforeach
@endif

@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert"></button>
            <strong>Seccess!</strong>{{ session('success') }}
        </div>
@endif
