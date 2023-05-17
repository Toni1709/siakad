@if ($judul)
    <div class="card radius-10">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-6 row-group g-0">
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Proposal</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        @if ($judul->status_ta == 'ACC')
                            <p class="mb-0">Disetujui</p>
                            <h4 class="mb-0 ms-auto"><i class='bx bx-check'></i></h4>
                        @else
                            <p class="mb-0">Belum Disetujui</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Bimbingan</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Progres</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Daftar Sidang</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Verifikasi Sidang</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Jadwal Sidang</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Revisi</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
@else
    <div class="card radius-10">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-6 row-group g-0">
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Proposal</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Belum Disetujui</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Bimbingan</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Progres</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Daftar Sidang</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Verifikasi Sidang</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Jadwal Sidang</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex text-white align-items-center">
                        <p class="mb-0">Revisi</p>
                        {{-- <h5 class="mb-0">9526</h5> --}}
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                    <div class="d-flex my-2 align-items-center text-white">
                        <p class="mb-0">Disetujui</p>
                        <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
@endif
