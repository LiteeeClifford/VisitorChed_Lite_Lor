@extends('layout.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4>Visitor Details</h4>
    </div>

    <div class="card-body">
        <p><strong>Name:</strong> {{ $visitor->name }}</p>
        <p><strong>Address:</strong> {{ $visitor->address }}</p>
        <p><strong>Position:</strong> {{ $visitor->position }}</p>

        <a href="{{ route('visitors.index') }}" class="btn btn-secondary">
            Back to Visitor List
        </a>
    </div>
</div>

@endsection