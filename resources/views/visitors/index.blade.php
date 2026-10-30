
@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Visitor Records</h3>

    <a href="{{ route('visitors.create') }}" class="btn btn-success">
        + Add Visitor
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('visitors.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search visitors..."
               value="{{ request('search') }}">

        <button class="btn btn-primary">Search</button>

        <a href="{{ route('visitors.index') }}"
           class="btn btn-secondary">Reset</a>
    </div>
</form>

<div class="card shadow-sm">
    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->id }}</td>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->address }}</td>
                        <td>{{ $visitor->position }}</td>

                        <td>
                            <a href="{{ route('visitors.edit', $visitor->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('visitors.destroy', $visitor->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this visitor?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No visitor records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
 <div class="d-flex justify-content-center">
    {{ $visitors->links('pagination::bootstrap-5') }}
</div>
    </div>
</div>

@endsection
