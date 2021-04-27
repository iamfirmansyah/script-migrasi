<table>
   <thead>
    <tr>
        <th><b>#</b></th>
        <th><b>ID Anggota</b></th>
        <th><b>name</b></th>
        <th><b>email</b></th>
        <th><b>username</b></th>
        <th><b>password(Min : 8)</b></th>
        <th><b>prefix</b></th>
        <th><b>suffix</b></th>
        <th><b>tempat lahir</b></th>
        <th><b>tanggal lahir</b></th>
        <th><b>npa</b></th>
        <th><b>No IDI</b></th>
        <th><b>mambership status</b></th>
        <th><b>Agama</b></th>
        <th><b>Kota</b></th>
        <th><b>Alamat</b></th>
        <th><b>Telepon</b></th>
        <th><b>cabang</b></th>
        <th><b>gender</b></th>
        <th><b>akses</b></th>
        <th><b>Tahun Terakhir Bayar Iuran</b></th>
        <th><b>Keterangan Iuran</b></th>
        <th><b>Status Pelanggaran Etik (ex: pernah / Sedang / tidak pernah)</b></th>
   </tr>
   </thead>
   @php
       $i = 1;
   @endphp
   <tbody>
       @foreach ($datas as $data)
       <tr>
            <td>{{$i++}}</td>
            <td>{{$data[0]->id_person}}</td>
            <td>{{$data[0]->nama_lengkap}}</td>
            <td>{{$data[0]->email}}</td>
            <td>{{$data[0]->username}}</td>
            <td>12345678</td>
            <td>{{$data[0]->prefix}}</td>
            <td>{{$data[0]->suffix}}</td>
            <td>{{$data[0]->tempat_lahir}}</td>
            <td>{{$data[0]->tanggal_lahir}}</td>
            <td>{{$data[0]->no_anggota}}</td>
            <td>{{$data[0]->no_idi}}</td>
            <td>{{$data[0]->access_group}}</td>
            <td>{{$data[0]->agama}}</td>
            <td>{{$data[0]->city}}</td>
            <td>{{$data[0]->alamat}}</td>
            <td>{{$data[0]->no_hp}}</td>
            <td>{{$data[0]->id_cabang}}</td>
            <td>{{$data[0]->jenis_kelamin}}</td>
            <td>{{$data[0]->access_group}}</td>
            <td>{{$data[0]->last_iuran}}</td>
            <td>{{$data[0]->status_anggota}}</td>
            <td>tidak pernah</td>
        </tr>
       @endforeach

   </tbody>
</table>
