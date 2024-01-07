@extends('layouts.template')

@section('content')
    <form action="{{  route('keterlambatan.store') }}" method="POST" class="card p-5" enctype="multipart/form-data">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Siswa :</label>
                <div class="col-sm-10">
                    <select class="form-select" name="student_id" id="name">
                        <option selected disabled hidden>Pilih</option>
                        @foreach ($students as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal :</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="information" class="form-label">Keterangan Keterlambatan :</label>
            <textarea class="form-control" id="information" rows="3" name="information"></textarea>
        </div>
        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Bukti :</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection
