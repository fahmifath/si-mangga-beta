@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Detil List</h1>
        <a href="{{ route('detils.create') }}" class="btn btn-primary">Create New Detil</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Detil</th>
                <th>Kode</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detils as $detil)
                <tr>
                    <td>{{ $detil->id }}</td>
                    <td>{{ $detil->detil }}</td>
                    <td>{{ $detil->kode }}</td>
                    <td>
                        {{-- <a href="{{ route('detils.show', $detil->id) }}" class="btn btn-info btn-sm">Show</a> --}}
                        <a href="{{ route('detils.edit', $detil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('detils.destroy', $detil->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
