@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Sub Detil</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('sub_detils.update', $sub_detil->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="detil" class="form-label">Sub Detil</label>
                    <input type="text" name="sub_detil" id="detil" class="form-control"
                        value="{{ $sub_detil->sub_detil }}" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Detil</label>
                    <select class="form-control" name="detil_id" id="detil_id">
                        {{-- <option value="{{ $sub_detil->detil_id }}">{{ $sub_detil->detil_id }}</option> --}}
                        @foreach ($detils as $item)
                            <option value="{{ $item->id }}"
                                {{ $sub_detil->detil_id == $item->id ? 'selected' : '' }}>
                                {{ $item->detil }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qy" class="form-label">Quantity</label>
                    <input type="text" name="quantity" id="qy" class="form-control"
                        value="{{ $sub_detil->quantity }}" required>
                </div>
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" name="satuan" id="keterangan" value="{{ $sub_detil->satuan }}"
                        class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Harga satuan</label>
                    <input type="text" name="harga_satuan" id="keterangan" value="{{ $sub_detil->harga_satuan }}"
                        class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('sub_detils.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
