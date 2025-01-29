@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Sub Detil List</h1>
        <a href="{{ route('sub_detils.create') }}" class="btn btn-primary">Create New Sub Detil</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Uraian Suboutput/Komponen/Subkomponen/Detil	</th>
                {{-- <th>Sub Detil</th> --}}
                {{-- <th>Volume output</th> --}}
                <th>Quantity</th>
                <th>Satuan</th>
                <th>Harga satuan</th>
                <th>Jumlah</th>
                <th style="width: 140px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedSubDetils as $detil => $groupDetil)

            <tr class="role-header">

                <td>{{ $groupDetil->first()['kode'] }}</td>
                <td colspan="4">{{ $detil }}</td>
                <TD></TD>
                <TD></TD>
            </tr>
            @foreach ($groupDetil as $sub_detil)
                <tr>
                    <td></td>
                    <td>{{ $sub_detil['sub_detil']->sub_detil}}</td>
                    {{-- <td>{{ $sub_detil[''] }}</td> --}}
                    {{-- <td>{{ $sub_detil->sub_detil }}</td> --}}
                    {{-- <td>{{ $sub_detil->detil->kode }}</td> --}}
                    {{-- <td>{{ $sub_detil->volume_output }}</td> --}}
                    <td>{{ $sub_detil['sub_detil']->quantity }}</td>
                    <td>{{ $sub_detil['sub_detil']->satuan }}</td>
                    <td>{{ $sub_detil['sub_detil']->harga_satuan }}</td>
                    <td>{{ $sub_detil['sub_detil']->jumlah }}</td>
                    <td>
                        {{-- <a href="{{ route('detils.show', $detil->id) }}" class="btn btn-info btn-sm">Show</a> --}}
                        <a href="{{ route('sub_detils.edit', $sub_detil['sub_detil']->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sub_detils.destroy', $sub_detil['sub_detil']->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endforeach

        </tbody>
    </table>
@endsection
