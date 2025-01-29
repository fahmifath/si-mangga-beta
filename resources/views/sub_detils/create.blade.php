@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create New Sub Detil</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('sub_detils.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="detil" class="form-label">Sub Detil</label>
                    <input type="text" name="sub_detil" id="detil" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Detil</label>
                    <select class="form-control" name="detil_id" id="detil_id">
                        <option>Pilih detil</option>
                        @foreach ($detils as $item)
                            <option value="{{ $item->id }}"> {{ $item->detil }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qy" class="form-label">Quantity</label>
                    <input type="text" name="quantity" id="qy" class="form-control" required> 
                </div>
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" name="satuan" id="keterangan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Harga satuan</label>
                    <input type="text" name="harga_satuan" id="keterangan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('sub_detils.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
