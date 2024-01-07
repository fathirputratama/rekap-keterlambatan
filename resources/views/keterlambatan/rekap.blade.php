@extends('layouts.template')

@section('content')
@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex flex-row-reverse">
    <div class="p-2" style="margin-right: 925px">
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
            <th>Nis</th>
            <th>Nama</th>
            <th>Jumlah Keterlambatan</th>
            <th>Bukti</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        $uniqueNames = [];
        $countNames = collect($lates)
            ->groupBy('student.name')
            ->map->count();
    @endphp
    @foreach ($lates as $item)
        @if (!in_array($item['student']['name'], $uniqueNames))
            @php $uniqueNames[] = $item['student']['name']; @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['student']['nis'] }}</td>
                <td>{{ $item['student']['name'] }}</td>
                <td>{{ $countNames[$item['student']['name']] }}</td>
                <td class="breadcrumb-item"><a href="{{ route('keterlambatan.bukti') }}">Lihat</a></td>
                <td><a href="#" class="btn btn-primary me-3">Cek Surat Pernyataan</a></td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
@endsection