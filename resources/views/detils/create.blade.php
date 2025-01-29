@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create New Detil</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('detils.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="detil" class="form-label">Detil</label>
                    <input type="text" name="detil" id="detil" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" name="kode" id="kode" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('detils.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
