@extends('db-logger::layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-300">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Model</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Model Id</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Action</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Data</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Action At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $d)
                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $d->model }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $d->model_id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $d->action }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ json_encode($d->data) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $d->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection