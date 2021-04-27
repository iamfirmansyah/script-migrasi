<title>Perdoski | Import User</title>
<form action="{{route('import-permohonan')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="file" class="form-control">
    <button type="submit">Submit</button>
</form>