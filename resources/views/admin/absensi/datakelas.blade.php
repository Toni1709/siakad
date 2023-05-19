<table id="" class="table mb-0">
    <thead>
        <tr>
            <th width="40">No.</th>
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>SKS</th>
            <th>Dosen Pengampu</th>
            <th width="200">Opsi</th>
        </tr>
    </thead>
    <tbody>
        @if ($kelas->count() > 0)
            @foreach ($kelas as $no => $k)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $k->nama_mapel }}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->sks }}</td>
                    <td>{{ $k->nama_dosen }}</td>
                    <td>
                        <a href="/absensi/{{ $k->id_kelas }}" class="btn mb-1 btn-sm btn-danger">Input Absensi</a>
                        <a href="/absensi/view/{{ $k->id_kelas }}" class="btn mb-1 btn-sm btn-danger">Lihat Absensi</a>
                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center"><i>Tidak Ada Jadwal Untuk Kelas ini</i></td>
        </tr>
        @endif


    </tbody>
</table>
