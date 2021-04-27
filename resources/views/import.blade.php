<title>Perdoski | Import Dokumen Hilang</title>
<h4>IMPORT DOKUMEN HILANG</h4>
<form action="{{route('import-post')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="file" class="form-control">
    <button type="submit">Submit</button>
</form>