<h2>{{ $form->title }} - Submissions</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Submitted At</th>
            <th>View</th>
        </tr>
    </thead>

    <tbody>

    @foreach($submissions as $submission)

        <tr>

            <td>{{ $submission->id }}</td>

            <td>{{ $submission->created_at }}</td>

            <td>
                View
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

{{ $submissions->links() }}

 <a href="{{ route('forms.export', $form->id) }}"
           class="btn btn-success">
            Export CSV
        </a>