<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                AI Form Builder Dashboard
            </h2>

            <a href="{{ route('forms.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Create Form
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Total Forms</h3>
                    <p class="text-3xl font-bold">{{ $formCount }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Total Fields</h3>
                    <p class="text-3xl font-bold">{{ $fieldCount }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500">Total Submissions</h3>
                    <p class="text-3xl font-bold">{{ $submissionCount }}</p>
                </div>

            </div>

            {{-- Forms Table --}}
            <div class="bg-white rounded-lg shadow">

                <div class="p-6 border-b">
                    <h3 class="text-xl font-semibold">
                        My Forms
                    </h3>
                </div>

                <table class="min-w-full">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left">Title</th>
                            <th class="px-6 py-3 text-left">Created At</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($forms as $form)

                            <tr class="border-b">

                                <td class="px-6 py-4">
                                    {{ $form->title }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $form->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <a href="{{ route('forms.show',$form->id) }}"
                                        class="bg-indigo-600 text-white px-3 py-2 rounded">
                                        Builder
                                    </a>

                                    <a href="{{ route('public.forms.show',$form->id) }}"
                                        target="_blank"
                                        class="bg-green-600 text-white px-3 py-2 rounded">
                                        Preview
                                    </a>

                                    <a href="{{ route('forms.submissions', $form->id) }}"
                                       class="bg-gray-600 text-white px-3 py-2 rounded">
                                        Submissions
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="text-center py-8 text-gray-500">
                                    No Forms Found
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>