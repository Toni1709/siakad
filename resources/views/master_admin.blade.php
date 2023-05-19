<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

	<!-- loader-->
	<link href="{{ asset('backend/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('backend/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">

	<title>Dashtreme - Multipurpose Bootstrap5 Admin Template</title>
</head>
{{-- @if (Auth::user()->level == 'admin') --}}
    <body class="bg-theme bg-theme1">
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="{{ asset('backend/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Dashtreme</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <!--navigation-->
                @if (Auth::user()->level == 'admin')
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                                </div>
                                <div class="menu-title">Data Master</div>
                            </a>
                            <ul>
                                <li> <a href="/absensi_kelas"><i class="bx bx-right-arrow-alt"></i>Identitas Kampus</a>
                                </li>
                                <li> <a href="/tahun_akademik"><i class="bx bx-right-arrow-alt"></i>Tahun Akademik</a>
                                </li>
                                <li> <a href="/gedung"><i class="bx bx-right-arrow-alt"></i>Gedung</a>
                                </li>
                                <li> <a href="/ruangan"><i class="bx bx-right-arrow-alt"></i>Ruangan</a>
                                </li>
                                <li> <a href="/jurusan"><i class="bx bx-right-arrow-alt"></i>Jurusan</a>
                                </li>
                                <li> <a href="/semester"><i class="bx bx-right-arrow-alt"></i>Semester</a>
                                </li>
                                <li> <a href="/kelas"><i class="bx bx-right-arrow-alt"></i>Kelas</a>
                                </li>
                                <li> <a href="/jam"><i class="bx bx-right-arrow-alt"></i>Jam Pelajaran</a>
                                </li>
                                <li> <a href="/mapel"><i class="bx bx-right-arrow-alt"></i>Mata Kuliah</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class="bx bx-category"></i>
                                </div>
                                <div class="menu-title">Data Pengguna</div>
                            </a>
                            <ul>
                                <li> <a href="/admin"><i class="bx bx-right-arrow-alt"></i>Data Admin</a>
                                </li>
                                <li> <a href="/dosen"><i class="bx bx-right-arrow-alt"></i>Data Dosen</a>
                                </li>
                                <li> <a href="/mahasiswa"><i class="bx bx-right-arrow-alt"></i>Data Mahasiswa</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bx bx-repeat"></i>
                                </div>
                                <div class="menu-title">Belajar Mengajar</div>
                            </a>
                            <ul>
                                <li> <a href="/jadwal_pelajaran"><i class="bx bx-right-arrow-alt"></i>Jadwal Kelas</a>
                                </li>
                                <li> <a href="/jadwal_dosen"><i class="bx bx-right-arrow-alt"></i>Jadwal Dosen</a>
                                </li>
                                <li> <a href="{{ route('admtugas') }}"><i class="bx bx-right-arrow-alt"></i>Tugas</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Rekap Absensi Mahasiswa</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bx bx-repeat"></i>
                                </div>
                                <div class="menu-title">Absensi</div>
                            </a>
                            <ul>
                                <li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Absensi Dosen</a>
                                </li>
                                <li> <a href="/absensi_mahasiswa"><i class="bx bx-right-arrow-alt"></i>Absensi Mahasiswa</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bx bx-repeat"></i>
                                </div>
                                <div class="menu-title">Akademik</div>
                            </a>
                            <ul>
                                <li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>KTM</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Prestasi Mahasiswa</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Monitoring Kelas</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Nilai</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Kegiatan Penunjang</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">E-Book</div>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bx bx-repeat"></i>
                                </div>
                                <div class="menu-title">Tugas Akhir</div>
                            </a>
                            <ul>
                                <li> <a href="/tugas_akhir/pengajuan_proposal"><i class="bx bx-right-arrow-alt"></i>Pengajuan Proposal</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Proses Bimbingan</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Daftar Sidang</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Verifikasi</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Revisi Tugas Akhir</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>L. Monitoring Bimbingan</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>L. Pengajuan Tugas Akhir</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Berita Acara Sidang</a>
                                </li>
                                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Penguji Sidang</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/pengumuman">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Pengumuman</div>
                            </a>
                        </li>
                    </ul>
                @elseif (Auth::user()->level == 'keuangan')
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="/master/tagihan">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Data Tagihan</div>
                            </a>
                        </li>
                        <li>
                            <a href="/pengajuan/pembayaran">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Pengajuan Pembayaran</div>
                            </a>
                        </li>
                        <li>
                            <a href="/biaya/nonpendidikan">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Biaya Non Pendidikan</div>
                            </a>
                        </li>
                        <li>
                            <a href="/keuangan/kelas">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Tagihan Mahasiswa</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Honor Dosen</div>
                            </a>
                        </li>
                    </ul>
                @elseif (Auth::user()->level == 'cnp')
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="/perusahaan">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Data Perusahaan</div>
                            </a>
                        </li>
                        <li>
                            <a href="/magang_kerja">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Mahasiswa Kerja & Magang</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class="bx bx-category"></i>
                                </div>
                                <div class="menu-title">Berkas Mahasiswa</div>
                            </a>
                            <ul>
                                <li> <a href="/berkas/sertifikat"><i class="bx bx-right-arrow-alt"></i>Sertifkat KKI</a></li>
                                <li> <a href="/berkas/laporan_kki"><i class="bx bx-right-arrow-alt"></i>Laporan KKI</a></li>
                                <li> <a href="/berkas/nilai_kki"><i class="bx bx-right-arrow-alt"></i>Nilai KKI</a></li>
                                <li> <a href="/berkas/revisi_laporan"><i class="bx bx-right-arrow-alt"></i>Revisi KKI</a></li>
                                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Training Softskill</a></li>
                                <li> <a href="/berkas/curriculum_vitae"><i class="bx bx-right-arrow-alt"></i>Softcopy CV</a></li>
                            </ul>
                        </li>
                    </ul>
                @elseif (Auth::user()->level == 'perpustakaan')
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="/dashboard">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="/jenis_buku">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Jenis Buku</div>
                            </a>
                        </li>
                        <li>
                            <a href="/daftar_buku">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Daftar Buku</div>
                            </a>
                        </li>
                        <li>
                            <a href="/keanggotaan">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Keanggotaan Perpustakaan</div>
                            </a>
                        </li>
                        <li>
                            <a href="/pinjaman">
                                <div class="parent-icon"><i class='bx bx-cookie'></i>
                                </div>
                                <div class="menu-title">Pinjaman Buku</div>
                            </a>
                        </li>

                    </ul>
                @endif
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>

                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-notifications-list">

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-message-list">

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                    <p class="designattion mb-0">{{ Auth::user()->level }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('konten')
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        <div class="switcher-wrapper">
            <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                    <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                </div>
                <hr/>
                <p class="mb-0">Gaussian Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>
                <hr>
                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>
            </div>
        </div>
    </body>
{{-- @elseif (Auth::user()->level == 'keuangan')
    <body class="bg-theme bg-theme1">
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Dashtreme</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <!--navigation-->
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/dashboard">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="/pengajuan/pembayaran">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Pengajuan Pembayaran</div>
                        </a>
                    </li>
                    <li>
                        <a href="/biaya/nonpendidikan">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Biaya Non Pendidikan</div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Tagihan Mahasiswa</div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Honor Dosen</div>
                        </a>
                    </li>
                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                        </div>
                        <div class="search-bar flex-grow-1">
                            <div class="position-relative search-bar-box">
                                <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                                <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                            </div>
                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item mobile-search-icon">
                                    <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                                    </a>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="row row-cols-3 g-3 p-3">
                                            <div class="col text-center">
                                                <div class="app-box mx-auto"><i class='bx bx-group'></i>
                                                </div>
                                                <div class="app-title">Teams</div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="app-box mx-auto"><i class='bx bx-atom'></i>
                                                </div>
                                                <div class="app-title">Projects</div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="app-box mx-auto"><i class='bx bx-shield'></i>
                                                </div>
                                                <div class="app-title">Tasks</div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="app-box mx-auto"><i class='bx bx-notification'></i>
                                                </div>
                                                <div class="app-title">Feeds</div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="app-box mx-auto"><i class='bx bx-file'></i>
                                                </div>
                                                <div class="app-title">Files</div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="app-box mx-auto"><i class='bx bx-filter-alt'></i>
                                                </div>
                                                <div class="app-title">Alerts</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                        <i class='bx bx-bell'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="msg-header">
                                                <p class="msg-header-title">Notifications</p>
                                                <p class="msg-header-clear ms-auto">Marks all as read</p>
                                            </div>
                                        </a>
                                        <div class="header-notifications-list">
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class="bx bx-group"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                    ago</span></h6>
                                                        <p class="msg-info">5 new user registered</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class="bx bx-cart-alt"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                    ago</span></h6>
                                                        <p class="msg-info">You have recived new orders</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class="bx bx-file"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                    ago</span></h6>
                                                        <p class="msg-info">The pdf files generated</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class="bx bx-send"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                    ago</span></h6>
                                                        <p class="msg-info">5.1 min avarage time response</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class="bx bx-home-circle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">New Product Approved <span
                                                    class="msg-time float-end">2 hrs ago</span></h6>
                                                        <p class="msg-info">Your new product has approved</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class="bx bx-message-detail"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                    ago</span></h6>
                                                        <p class="msg-info">New customer comments recived</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class='bx bx-check-square'></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                    ago</span></h6>
                                                        <p class="msg-info">Successfully shipped your item</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class='bx bx-user-pin'></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                    ago</span></h6>
                                                        <p class="msg-info">24 new authors joined last week</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify"><i class='bx bx-door-open'></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                    ago</span></h6>
                                                        <p class="msg-info">45% less alerts last 4 weeks</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a href="javascript:;">
                                            <div class="text-center msg-footer">View All Notifications</div>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                        <i class='bx bx-comment'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="msg-header">
                                                <p class="msg-header-title">Messages</p>
                                                <p class="msg-header-clear ms-auto">Marks all as read</p>
                                            </div>
                                        </a>
                                        <div class="header-message-list">
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                    ago</span></h6>
                                                        <p class="msg-info">The standard chunk of lorem</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                    sec ago</span></h6>
                                                        <p class="msg-info">Many desktop publishing packages</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                                    ago</span></h6>
                                                        <p class="msg-info">Various versions have evolved over</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                    min ago</span></h6>
                                                        <p class="msg-info">Making this the first true generator</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                                    ago</span></h6>
                                                        <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                                    ago</span></h6>
                                                        <p class="msg-info">The passage is attributed to an unknown</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                                    ago</span></h6>
                                                        <p class="msg-info">The point of using Lorem</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                    ago</span></h6>
                                                        <p class="msg-info">It was popularised in the 1960s</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                                    ago</span></h6>
                                                        <p class="msg-info">Various versions have evolved over</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                                    ago</span></h6>
                                                        <p class="msg-info">If you are going to use a passage</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                                    ago</span></h6>
                                                        <p class="msg-info">All the Lorem Ipsum generators</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a href="javascript:;">
                                            <div class="text-center msg-footer">View All Messages</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                    <p class="designattion mb-0">{{ Auth::user()->level }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('konten')
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        <div class="switcher-wrapper">
            <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                    <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                </div>
                <hr/>
                <p class="mb-0">Gaussian Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>
                <hr>
                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>
            </div>
        </div>
        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
        <!--plugins-->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-knob/excanvas.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.js') }}"></script>
        <script>
            $(function() {
                $(".knob").knob();
            });
        </script>
        <script src="{{ asset('backend/js/index.js') }}"></script>
        <!--app JS-->
        <script src="{{ asset('backend/js/app.js') }}"></script>
        @include('layout.ajax')
    </body>
@elseif (Auth::user()->level == 'cnp')
    <body class="bg-theme bg-theme1">
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Dashtreme</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <!--navigation-->
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/dashboard">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="/perusahaan">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Data Perusahaan</div>
                        </a>
                    </li>
                    <li>
                        <a href="/magang_kerja">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Mahasiswa Kerja & Magang</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-category"></i>
                            </div>
                            <div class="menu-title">Berkas Mahasiswa</div>
                        </a>
                        <ul>
                            <li> <a href="/berkas/sertifikat"><i class="bx bx-right-arrow-alt"></i>Sertifkat KKI</a></li>
							<li> <a href="/berkas/laporan_kki"><i class="bx bx-right-arrow-alt"></i>Laporan KKI</a></li>
							<li> <a href="/berkas/nilai_kki"><i class="bx bx-right-arrow-alt"></i>Nilai KKI</a></li>
							<li> <a href="/berkas/revisi_laporan"><i class="bx bx-right-arrow-alt"></i>Revisi KKI</a></li>
							<li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Training Softskill</a></li>
							<li> <a href="/berkas/curriculum_vitae"><i class="bx bx-right-arrow-alt"></i>Softcopy CV</a></li>
                        </ul>
                    </li>
                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>

                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-notifications-list">

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-message-list">

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                    <p class="designattion mb-0">{{ Auth::user()->level }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('konten')
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        <div class="switcher-wrapper">
            <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                    <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                </div>
                <hr/>
                <p class="mb-0">Gaussian Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>
                <hr>
                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>
            </div>
        </div>
    </body>
@elseif (Auth::user()->level == 'perpustakaan')
    <body class="bg-theme bg-theme1">
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Dashtreme</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <!--navigation-->
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/dashboard">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="/jenis_buku">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Jenis Buku</div>
                        </a>
                    </li>
                    <li>
                        <a href="/daftar_buku">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Daftar Buku</div>
                        </a>
                    </li>
                    <li>
                        <a href="/keanggotaan">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Keanggotaan Perpustakaan</div>
                        </a>
                    </li>
                    <li>
                        <a href="/pinjaman">
                            <div class="parent-icon"><i class='bx bx-cookie'></i>
                            </div>
                            <div class="menu-title">Pinjaman Buku</div>
                        </a>
                    </li>

                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>

                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-notifications-list">

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-message-list">

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                    <p class="designattion mb-0">{{ Auth::user()->level }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('konten')
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        <div class="switcher-wrapper">
            <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                    <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                </div>
                <hr/>
                <p class="mb-0">Gaussian Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>
                <hr>
                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>
            </div>
        </div>
    </body>

@endif --}}
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('backend/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('texteditor');
</script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>
<script src="{{ asset('backend/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ asset('backend/js/app.js') }}"></script>
<!--end switcher-->
{{-- <script>
    tinymce.init({
      selector: '#texteditor'
    });
</script> --}}
<script>
	$('.single-select').select2({
		theme: 'bootstrap4',
		width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
		placeholder: $(this).data('placeholder'),
		allowClear: Boolean($(this).data('allow-clear')),
	});
	$('.multiple-select').select2({
		theme: 'bootstrap4',
		width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
		placeholder: $(this).data('placeholder'),
		allowClear: Boolean($(this).data('allow-clear')),
	});
</script>
@include('layout.ajax')
</html>

