@extends('layouts.app')

@section('title', 'Training Classes')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Training Classes</h3></div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>#</th><th>Name</th><th>Category</th><th>Program</th><th>Trainers</th><th>Schedule</th>
            </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->category->value }}</td>
                    <td>{{ $class->program->title }}</td>
                    <td>{{ $class->trainers->pluck('name')->join(', ') ?: 'Not assigned' }}</td>
                    <td>{{ $class->starts_at?->format('d M Y') }} - {{ $class->ends_at?->format('d M Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
