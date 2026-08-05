<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AI Form Builder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @livewireStyles
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="mb-0">
                        📝 AI Form Builder
                    </h3>

                    <small>Create Dynamic Forms</small>

                </div>

                <a href="{{ route('dashboard') }}" class="btn btn-light">
                    Dashboard
                </a>

            </div>

        </div>

        <div class="card-body">

            <livewire:form-builder :form="$form"/>

        </div>

       
    </div>

</div>

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>