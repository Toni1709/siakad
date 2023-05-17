@extends('front.master_mahasiswa')
@section('content')
@include('front.mahasiswa.ta.widget')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <form action="/ta/daftarsidang/daftar" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if ($judul)
                        @if ($judul->status_ta == 'ACC')
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="">NIM</label>
                                    <input type="text" value="{{ $data->nim }}" readonly class="form-control">
                                    <input type="hidden" name="ta" value="{{ $ta->id_ta }}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Nama</label>
                                    <input type="text" value="{{ $data->nama_mahasiswa }}" readonly class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Program Studi</label>
                                    <input type="text" value="{{ $data->nama_prodi }}" readonly class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Pembimbing</label>
                                    <input type="text" value="{{ $ta->nama_dosen }}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label for="">Judul Tugas Akhir</label>
                                    <textarea name="" rows="2" class="form-control" readonly>{{ $ta->judul }}</textarea>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="">NIM</label>
                                <input type="text" value="{{ $data->nim }}" readonly class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label for="">Nama</label>
                                <input type="text" value="{{ $data->nama_mahasiswa }}" readonly class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label for="">Program Studi</label>
                                <input type="text" value="{{ $data->nama_prodi }}" readonly class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label for="">Pembimbing</label>
                                <input type="text" value="" readonly class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label for="">Judul Tugas Akhir</label>
                                <textarea name="" rows="2" class="form-control" readonly></textarea>
                            </div>
                        </div>
                    @endif
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th colspan="3">Persyaratan Sidang Tugas Akhir</th>
                                        <th>Ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Upload Ijazah dan Daftar Nilai SMA/K/ MA</td>
                                        <td></td>
                                        <td><input type="file" name="ijazah" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Upload Akte Kelahiran</td>
                                        <td></td>
                                        <td><input type="file" name="akte" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kartu Keluarga</td>
                                        <td></td>
                                        <td><input type="file" name="kk" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Upload Sertifikat P2M untuk Kelas Reguler</td>
                                        <td></td>
                                        <td><input type="file" name="ser_ppm" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Upload Sertifikat Seminar Wajib sebanyak 2 kali</td>
                                        <td></td>
                                        <td><input type="file" name="ser_seminar" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Upload Sertifikat MOSMA, Company Visit, MABIT, Beauty and Handsome Class, Table Manner</td>
                                        <td></td>
                                        <td><input type="file" name="sertifikat" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>100% Pembayaran Ujikom</td>
                                        <td>Rp.</td>
                                        <td>800.000</td>
                                        <td>Belum Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Telah Melunasi Biaya Pendidikan D3</td>
                                        <td></td>
                                        <td>Cetak Dari Bagian Keuangan</td>
                                        <td>Belum Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Telah Melunasi Biaya Sidang Tugas Akhir</td>
                                        <td></td>
                                        <td>Cetak Dari Bagian Keuangan</td>
                                        <td>Belum Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>50% Membayar Biaya Wisuda</td>
                                        <td></td>
                                        <td>Cetak Dari Bagian Keuangan</td>
                                        <td>Belum Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Telah menyelesaikan semua mata kuliah</td>
                                        <td></td>
                                        <td>Cetak Dari Bagian Keuangan</td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Menyertakan Fotocopy TA yang telah ditandatangani oleh Pembimbing, Kaprodi dan Wakil Direktur I, sebanyak 3 eksemplar</td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Melampirkan Surat Pernyataan membuat sendiri Tugas Akhir (TA) yang ditandatangani di atas Materai Rp. 6000</td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Menyertakan Photo Dop berwarna latar Merah 4 X 6, menggunakan jas almamater</td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12" align="center">
                            @if ($tagihan->tagihan <= 0)
                                @if ($judul)
                                    @if ($judul->status_ta == 'ACC')
                                        @if ($daftar_sidang)
                                            <button type="submit" class="btn disabled btn-sm btn-light">Daftar</button>
                                            <button class="btn btn-sm disabled btn-light">Cetak</button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-light">Daftar</button>
                                            <button class="btn btn-sm btn-light">Cetak</button>
                                        @endif
                                    @endif
                                @else
                                    <button type="submit" class="btn disabled btn-sm btn-light">Daftar</button>
                                    <button class="btn btn-sm disabled btn-light">Cetak</button>
                                @endif
                            @else
                                <button type="submit" class="btn disabled btn-sm btn-light">Daftar</button>
                                <button class="btn btn-sm disabled btn-light">Cetak</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
