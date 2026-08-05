<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Form Submissions</h4>

            <input
                type="text"
                class="form-control w-25"
                wire:model.live="search"
                placeholder="🔍 Search...">
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="80">#</th>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($submissions as $submission)

                    @foreach($submission->values as $value)

                        <tr>

                            <td>{{ $submission->id }}</td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ ucfirst(str_replace('_',' ', $value->field_key)) }}
                                </span>
                            </td>

                            <td>{{ $value->value }}</td>

                        </tr>

                    @endforeach

                @empty

                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            No submissions found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-3">
                {{ $submissions->links() }}
            </div>

        </div>
    </div>

</div>