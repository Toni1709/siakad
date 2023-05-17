<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
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
					<h4 class="logo-text">E-Student</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li>
					<a href="/home">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Home</div>
					</a>
				</li>
                <li>
					<a href="/biodata">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Biodata</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Akademik</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>KRS</a>
						</li>
						<li> <a href="{{ route('jadwal_mahasiswa') }}"><i class="bx bx-right-arrow-alt"></i>Jadwal</a>
						</li>
						<li> <a href="/kehadiran"><i class="bx bx-right-arrow-alt"></i>Kehadiran</a>
						</li>
						<li> <a href="/nilai"><i class="bx bx-right-arrow-alt"></i>Nilai</a>
						</li>
						<li> <a href="/mahasiswa/tugas"><i class="bx bx-right-arrow-alt"></i>Tugas</a>
						</li>
						<li> <a href="/trackrecord"><i class="bx bx-right-arrow-alt"></i>Track Record</a>
						</li>
						<li> <a href="dashboard-sales.html"><i class="bx bx-right-arrow-alt"></i>Perbaikan Nilai</a>
						</li>
						<li> <a href="dashboard-sales.html"><i class="bx bx-right-arrow-alt"></i>UTS</a>
						</li>
						<li> <a href="dashboard-sales.html"><i class="bx bx-right-arrow-alt"></i>UAS</a>
						</li>
						<li> <a href="dashboard-sales.html"><i class="bx bx-right-arrow-alt"></i>Screening</a>
						</li>
                        <hr>
                        <li> <a href="dashboard-sales.html"><i class="bx bx-right-arrow-alt"></i>Digital Literasi</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Keuangan</div>
					</a>
					<ul>
						<li> <a href="/tagihan_mahasiswa"><i class="bx bx-right-arrow-alt"></i>Tagihan</a>
						</li>
						<li> <a href="/realisasi/pendidikan"><i class="bx bx-right-arrow-alt"></i>Biaya Pendidikaan</a>
						</li>
						<li> <a href="/realisasi/nonpendidikan"><i class="bx bx-right-arrow-alt"></i>Biaya Nonpendidikan</a>
						</li>
						<li> <a href="/pengajuan_pembayaran"><i class="bx bx-right-arrow-alt"></i>Pengajuan Pembayaran</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Perpustakaan</div>
					</a>
					<ul>
						<li> <a href="/kartu_anggota"><i class="bx bx-right-arrow-alt"></i>Kartu Anggota</a>
						</li>
						<li> <a href="/riwayat_pinjaman"><i class="bx bx-right-arrow-alt"></i>Riwayat Pinjaman Buku</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">CNP</div>
					</a>
					<ul>
						<li> <a href="/bimbingan/kki"><i class="bx bx-right-arrow-alt"></i>Bimbingan KKI</a></li>
						<li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Jadwal Sidang KKI</a></li>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Upload</a>
							<ul>
								<li> <a href="/kki/upload/sertifikat"><i class="bx bx-right-arrow-alt"></i>Sertifkat KKI</a></li>
								<li> <a href="/kki/upload/laporan"><i class="bx bx-right-arrow-alt"></i>Laporan KKI</a></li>
								<li> <a href="/kki/upload/nilai"><i class="bx bx-right-arrow-alt"></i>Nilai KKI</a></li>
								<li> <a href="/kki/upload/revisi_laporan"><i class="bx bx-right-arrow-alt"></i>Revisi KKI</a></li>
								<li> <a href="/kki/upload/ts"><i class="bx bx-right-arrow-alt"></i>Training Softskill</a></li>
								<li> <a href="/kki/upload/cv"><i class="bx bx-right-arrow-alt"></i>Softcopy CV</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Tugas Akhir</div>
					</a>
					<ul>
						<li> <a href="/ta/pengajuan_judul"><i class="bx bx-right-arrow-alt"></i>Pengajuan Judul</a></li>
						<li> <a href="/ta/entribimbingan"><i class="bx bx-right-arrow-alt"></i>Bimbingan</a></li>
						<li> <a href="/ta/daftarsidang"><i class="bx bx-right-arrow-alt"></i>Daftar Sidang</a></li>
						<li> <a href="/ta/verifikasi_sidang"><i class="bx bx-right-arrow-alt"></i>Virifikasi Sidang</a></li>
						<li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Jadwal Sidang</a></li>
						<li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Revisi</a></li>
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
                            @if (Auth::user()->foto)
							    <img src="{{ asset('berkas/profil/'.Auth::user()->foto) }}" class="user-img" alt="user avatar">
                            @else
							    <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                            @endif
							<div class="user-info ps-3 text-center">
								<p class="user-name mb-0">{{ Auth::user()->nama_mahasiswa }}</p>
								<p class="designattion mb-0">{{ Auth::user()->nim }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
							<li><a class="dropdown-item" href="/biodata"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="/biodata/edit"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('logout2') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
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
                @yield('content')
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
    <script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{ asset('backend/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('backend/js/app.js') }}"></script>
    <script>

        $(document).ready(function() {
        $('#example').DataTable()
      });

      </script>
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

      <script>
          $(document).ready(function() {
              var table = $('#example2').DataTable( {
                    lengthChange: false,
                    responsive: true,
                    autoWidth: true,
                    buttons: [ 'copy', 'excel', 'pdf', 'print']
              } );

              table.buttons().container()
                  .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
          } );
      </script>
</body>

</html>
