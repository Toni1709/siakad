<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="master.php?page=identitas_kampus" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Identitas kampus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/tahun_akademik" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Tahun Akademik</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/gedung" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Gedung</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/ruangan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Ruangan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/jurusan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Jurusan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/semester" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Semester</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kelas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kelas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/jam" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Jam Pelajaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/mapel" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Mata Pelajaran</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Data Pengguna
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/mahasiswa" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Mahasiswa</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dosen" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Dosen</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Administrator</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Data Akademik
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="/jadwal_pelajaran" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Jadwal Pelajaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/bahan_tugas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Bahan dan Tugas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Data Absensi
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/absensi_dosen" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Absensi Dosen</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/absensi_mahasiswa" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Absensi Mahasiswa</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
</ul>
