```php
@extends('layout.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h4 class="mb-0">Edit Visitor</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('visitors.update', $visitor->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name', $visitor->name) }}">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address"
                       class="form-control"
                       value="{{ old('address', $visitor->address) }}">

                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" name="position"
                       class="form-control"
                       value="{{ old('position', $visitor->position) }}">

                @error('position')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">
                Update Visitor
            </button>

            <a href="{{ route('visitors.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@endsection
```