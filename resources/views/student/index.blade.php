@extends('layouts.template')

@section('content')

@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex flex-row-reverse">
    <form action="{{ route('student.search') }}" method="GET" class="form-inline my-2 my-lg-0">
        <div style="display: flex;">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width: 150px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
    </form>
    <div class="p-2" style="margin-right: 825px">
        <a href="{{ route('student.create')}}" class="btn btn-secondary">Tambah</a>
</div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($students as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['nis'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['rombel_id'] }}</td>
            <td>{{ $item['rayon_id'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('student.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                <form action="{{ route('student.delete', $item['id']) }}" method="POST">
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