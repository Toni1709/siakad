<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Mata Kuliah</th>
            @for ($i = 1; $i <= 14; $i++)
                <th>P{{ $i }}</th>
            @endfor
            <th>UTS</th>
            <th>UAS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwal as $no => $j)
            @php
                $absen = DB::table('absensi_mahasiswa')
                    ->where('id_mapel', $j->id_mapel)
                    ->where('id_mahasiswa', Auth::user()->id)
                    ->get();
            @endphp
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $j->nama_mapel }}</td>
                @foreach ($absen as $a)
                    <td>{{ $a->kehadiran }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
