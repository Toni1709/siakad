@extends('front.master')
@section('content')
    <div style="margin-top: 58px;">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="https://siakad.plb.ac.id/images/banner%20siakad.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://siakad.plb.ac.id/images/banner_.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://siakad.plb.ac.id/images/student_vdi.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
        </div>

        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4" style="height: 100%;">
            <div class="container">
                <h3>Info terbaru</h3>
                <hr>
                @foreach ($pengumuman as $p)
                    <div class="row row-cols-1 row-cols-lg-9 row-cols-xl-9">
                        <div class="col mx-auto">
                            <div class="card mt-5 mt-lg-0">
                                <div class="card-header bg-info">
                                    <h6 class="page-title">{{ $p->judul_pengumuman }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <p>{!! $p->isi_pengumuman !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
