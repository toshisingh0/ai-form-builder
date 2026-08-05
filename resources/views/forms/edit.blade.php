<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>
</head>
<body>
<form action="{{ route('fields.update', $field->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input
        type="text"
        name="label"
        value="{{ $field->label }}"
    >

    <input
        type="text"
        name="placeholder"
        value="{{ $field->placeholder }}"
    >

    <label>
        <input
            type="checkbox"
            name="required"
            value="1"
            {{ $field->required ? 'checked' : '' }}
        >
        Required
    </label>

    <button type="submit">
        Update
    </button>
</form>
</body>
</html>