@extends('layout.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Add New Visitor</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('visitors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name') }}">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address"
                       class="form-control"
                       value="{{ old('address') }}">

                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" name="position"
                       class="form-control"
                       value="{{ old('position') }}">

                @error('position')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                Save Visitor
            </button>

            <a href="{{ route('visitors.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>
    </div>
</div>

@endsection