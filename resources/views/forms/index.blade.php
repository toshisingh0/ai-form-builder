<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Form Builder</h2>

        <a href="{{ route('forms.create') }}" class="btn btn-primary">
            + Create New Form
        </a>
    </div>

    @if($forms->count())

        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white">
                All Forms
            </div>

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Form Name</th>
                            <th width="250">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($forms as $form)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $form->title }}</strong>
                            </td>

                            <td>

                                <a href="{{ route('forms.show',$form->id) }}"
                                   class="btn btn-success btn-sm">
                                    Builder
                                </a>

                               <!--  <a href="{{ route('forms.builder',$form->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Builder
                                </a> -->

                                <a href="{{ route('public.forms.show',$form->id) }}"
                                   target="_blank"
                                   class="btn btn-info btn-sm text-white">
                                    Public Form
                                </a>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @else

        <div class="alert alert-info text-center">
            No Forms Found.
        </div>

    @endif

</div>

</body>
</html>