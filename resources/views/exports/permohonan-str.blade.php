<table>
    <thead>
        <tr>
            <td><b>#</b></td>
            <td><b>ID</b></td>
            <td><b>ID Person</b></td>
            <td><b>No STR</b></td>
            <td><b>Tgl Lulus</b></td>
            <td><b>Universitas</b></td>
            <td><b>Tgl Mulai</b></td>
            <td><b>Tgl Selesai</b></td>
            <td><b>Status Pengajuan</b></td>
            <td><b>Status Mulai</b></td>
            <td><b>Status Selesai</b></td>
            <td><b>Status Evaluasi</b></td>
            <td><b>Catatan Evaluasi</b></td>
            <td><b>Tgl Pembuatan</b></td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($datas as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->id_periode}}</td>
                <td>{{$data->id_person}}</td>
                <td>{{$data->no_str}}</td>
                <td>{{$data->tgl_lulus}}</td>
                <td>{{$data->university}}</td>
                <td>{{$data->tgl_mulai}}</td>
                <td>{{$data->tgl_selesai}}</td>
                <td>{{$data->status_pengajuan}}</td>
                <td>{{$data->status_mulai}}</td>
                <td>{{$data->status_selesai}}</td>
                <td>{{$data->status_evaluasi}}</td>
                <td>{{$data->catatan}}</td>
                <td>{{$data->mdd}}</td>
            </tr>
        @endforeach
    </tbody>
</table>