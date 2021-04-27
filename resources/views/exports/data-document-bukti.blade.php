<table>
    <thead>
        <tr>
            <td><b>ID Priode</b></td>
            <td><b>ID User</b></td>
            <td><b>Tanggal Kegiatan</b></td>
            <td><b>Title</b></td>
            <td><b>Description</b></td>
            <td><b>Status</b></td>
            <td><b>Verifikator</b></td>
            <td><b>Tanggal Verifikasi</b></td>
            <td><b>Catatan Verifikasi</b></td>
            <td><b>Filename</b></td>
            <td><b>Url</b></td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
       @foreach ($datas as $data)
        <tr>
            <td>{{$data->id_periode}}</td>
            <td>{{$data->mdb}}</td>
            <td>{{$data->tgl_dokumen}}</td>
            <td>{{$data->judul}}</td>
            <td>{{$data->deskripsi}}</td>
            <td>@if($data->evaluated === "yes") 1 @elseif($data->evaluated === "no") 2 @else 0 @endif</td>
            <td>{{$data->verifikator}}</td>
            <td>{{$data->tgl_verifikasi}}</td>
            <td>{{$data->catatan}}</td>
            <td>{{$data->file_name}}</td>
            <td>http://perdoski.or.id/{{str_replace('amp;', '', $data->file_path)}}{{$data->file_name}}</td>
        </tr>
       @endforeach
    </tbody>
</table>
