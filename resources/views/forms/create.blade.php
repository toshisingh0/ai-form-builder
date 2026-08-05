<!DOCTYPE html>
<html>
<head>
    <title>Create Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        Create New Form
                    </h4>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('forms.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Form Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                placeholder="Enter Form Title"
                                required>

                            @error('title')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary">
                                Create Form
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>