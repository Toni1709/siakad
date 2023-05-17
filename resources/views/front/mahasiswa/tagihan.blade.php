@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pengajuan Pembayaran</div>
    {{-- <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
            </ol>
        </nav>
    </div> --}}
</div>
<hr>

<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                        </div>
                        <h5 class="mb-0 text-white">Pengajuan Pembayaran</h5>
                    </div>
                    <hr/>
                    <div class="row">
                        <p>yang harus dibayar bulan {{ date('m Y') }} dan sebelumnya adalah {{ $tagihan->tagihan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
