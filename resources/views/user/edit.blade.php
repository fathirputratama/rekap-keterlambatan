@extends('layouts.template')

@section('content')
    <form action="{{ route('user.update', $users['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif


        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $users['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="{{ $users['email'] }}">
            </div>
        </div>
        <div class="col-sm-10">
            <select class="form-select" name="role" id="role">
                <option selected disabled hidden>{{ $users['role'] }}</option>
                <option value="Admin">Admin</option>
                <option value="PS">PS</option>
            </select>
        </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection