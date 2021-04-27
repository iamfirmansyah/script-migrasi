<table>
    <thead>
        <tr>
            {{-- <td><b>ID log</b></td>
            <td><b>ID Person</b></td>
            <td><b>Nama</b></td>
            <td><b>Tanggal Kegiatan</b></td>
            <td><b>Catatan Unit</b></td>
            <td><b>Catatan Komisi</b></td>
            <td><b>Tanggal Verifikasi</b></td>
            <td><b>Nama Pemeriksa</b></td>
            <td><b>Id Pemeriksa</b></td> --}}

            <td><b>#</b></td>
            <td><b>ID Log</b></td>
            <td><b>ID Borang</b></td>
            <td><b>ID Person</b></td>
            <td><b>Nama Kegiatan</b></td>
            <td><b>Data Kegiatan (Value)</b></td>
            <td><b>Nilai SKP</b></td>
            <td><b>Tgl Kegiatan</b></td>
            <td><b>Status Evaluasi</b></td>
            <td><b>Catatan Unit</b></td>
            <td><b>Catatan Komisi</b></td>
            <td><b>Verifikator</b></td>
            <td><b>Tgl Verifikasi</b></td>
            <td><b>Tgl Pembuatan</b></td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($datas as $data)
        @php
            $namaUser = App\Person::where('id_person',$data->id_person)->pluck('nama_lengkap')->first();
            $namaVerifikator = App\Person::where('id_person',$data->verifikator)->pluck('nama_lengkap')->first();
        @endphp
        <tr>
            {{-- <td>{{ $data->id_log }}</td>
            <td>{{ $data->id_person }}</td>
            <td>{{ $namaUser !== null ? $namaUser : "tidak ada usernya" }}</td>
            <td>{{ $data->tanggal_kegiatan }}</td>
            <td>{{ $data->catatan }}</td>
            <td>{{ $data->catatan_komisi }}</td>
            <td>{{ $data->tgl_verifikasi }}</td>
            <td>{{ $namaVerifikator !== null ? $namaVerifikator : "tidak ada usernya" }}</td>
            <td>{{ $data->verifikator }}</td> --}}

            <td>{{$i++}}</td>
            <td>{{$data->id_log}}</td>
            <td>{{$data->id_form}}</td>
            <td>{{$data->id_person}}</td>
            <td>{{$data->nama_kegiatan}}</td>
            <td>{{$data->data_kegiatan}}</td>
            <td>{{$data->nilai_skp}}</td>
            <td>{{$data->tanggal_kegiatan}}</td>
            <td>{{$data->evaluated}}</td>
            <td>{{$data->catatan}}</td>
            <td>{{$data->catatan_komisi}}</td>
            <td>{{$data->verifikator}}</td>
            <td>{{$data->tgl_verifikasi}}</td>
            <td>{{$data->tanggal_kegiatan}} 00:00:00</td>
        </tr>
        @endforeach

    </tbody>
</table>
