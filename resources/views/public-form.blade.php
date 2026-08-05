<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h3 class="mb-0">{{ $form->title }}</h3>
                </div>

                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('public.forms.submit',$form) }}">
                        @csrf

                        @foreach($form->fields as $field)

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    {{ $field->label }}

                                    @if($field->required)
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>

                                @switch($field->type)

                                    @case('textarea')

                                        <textarea
                                            class="form-control"
                                            name="{{ $field->key }}"
                                            placeholder="{{ $field->placeholder }}"
                                        ></textarea>

                                        @break

                                    @case('checkbox')

                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="{{ $field->key }}"
                                                value="1"
                                            >
                                        </div>

                                        @break

                                    @default

                                        <input
                                            type="{{ $field->type }}"
                                            class="form-control"
                                            name="{{ $field->key }}"
                                            placeholder="{{ $field->placeholder }}"
                                        >

                                @endswitch

                            </div>

                        @endforeach

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg">
                                Submit Form
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