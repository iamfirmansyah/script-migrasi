<table>
    <thead>
        <tr>
            <td><b>ID Log</b></td>
            <td><b>ID User</b></td>
            <td><b>Filename</b></td>
            <td><b>Url</b></td>
            <td><b>Tanggal Kegiatan</b></td>
        </tr>
    </thead>
    <tbody>
       @foreach ($datas as $data)
        <tr>
            <td>{{$data->id_log}}</td>
            <td>{{$data->mdb}}</td>
            <td>{{$data->file_name}}</td>
            <td>http://perdoski.or.id/{{str_replace('amp;', '', $data->file_path)}}{{$data->file_name}}</td>
            <td>{{$data->mdd}}</td>
        </tr>
       @endforeach
    </tbody>
</table>
