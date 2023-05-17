@extends('front.master_mahasiswa')
@section('content')
@include('front.mahasiswa.ta.widget')
<div class="row">
    <div class="col-xl-4 mx-auto">
        <form action="/ta/entribimbingan/input" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-8">
                            <label for="">Tanggal Bimbingan</label>
                            <input type="date" name="tgl" class="form-control">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Bab</label>
                            <select name="bab" id="" class="form-control">
                                <option value="Lainnya ">Lainnya</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="Bab {{ $i }}">Bab {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="">Catatan</label>
                            <textarea name="catatan" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            @if ($tagihan->tagihan <= 0)
                                @if ($judul)
                                    @if ($judul->status_ta == 'ACC')
                                        <button type="submit" class="btn btn-sm btn-light">Save</button>
                                    @endif
                                @else
                                    <button type="submit" class="btn disabled btn-sm btn-light">Save</button>
                                @endif
                            @else
                                <button type="submit" class="btn disabled btn-sm btn-light">Save</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table mb-0" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Bab</th>
                            <th>Catatan</th>
                            <th>Verifikasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bimbingan as $no => $b)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $b->tgl_bimbingan }}</td>
                                <td>{{ $b->bab }}</td>
                                <td>{{ $b->catatan }}</td>
                                <td>{{ $b->verifikasi }}</td>
                                <td>
                                    <a href="/bimbingan/kki/hapus/{{ $b->id_bimbingan_ta }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
