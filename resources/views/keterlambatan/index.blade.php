@extends('layouts.template')

@section('content')
@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex flex-row-reverse">
    <form action="{{ route('keterlambatan.search') }}" method="GET" class="form-inline my-2 my-lg-0">
        <div style="display: flex;">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width: 150px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
    </form>
    <div class="p-2" style="margin-right: 525px">
        <a href="{{ route('keterlambatan.create')}}" class="btn btn-secondary">Tambah</a>
</div>
<div class="p-2">
    <a href="{{ route('keterlambatan.surat') }}" class="btn btn-secondary">Export Data Keterlambatan</a>
</div>
</div>
<a href="{{ route('keterlambatan.index') }}">Keseluruhan Data</a>
<a href="{{ route('keterlambatan.rekap') }}" style="margin-left: 50px">Rekapitulasi Data</a>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Informasi</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($lates as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['student']['name'] }}</td>
            <td>{{ $item['date_time_late'] }}</td>
            <td>{{ $item['information'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('keterlambatan.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                <form action="{{ route('keterlambatan.delete', $item['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>
@endsection