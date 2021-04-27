<table>
    <thead>
        <tr>
            <td><b>#</b></td>
            <td><b>ID Form</b></td>
            <td><b>Nama Kegiatan</b></td>
            <td><b>Tipe Kegiatan</b></td>
            <td><b>SKP Manual</b></td>
            <td><b>SKP Default</b></td>
            <td><b>Tipe Element</b></td>
            <td><b>Label</b></td>
            <td><b>Order</b></td>
            <td><b>Is SKP Engine</b></td>
            <td><b>Nilai SKP</b></td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($datas as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->id_form}}</td>
                <td>{{$data->nama_kegiatan}}</td>
                <td>{{$data->form_detail->tipe}}</td>
                <td>{{$data->form_detail->is_manual}}</td>
                <td>{{$data->form_detail->default_point}}</td>
                <td>{{$data->tipe}}</td>
                <td>{{$data->label}}</td>
                <td>{{$data->elemen_sort}}</td>
                <td>{{$data->is_engine}}</td>
                <td>{{$data->skp_engine}}</td>
            </tr>
        @endforeach
    </tbody>
</table>