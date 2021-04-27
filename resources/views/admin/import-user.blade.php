<title>Perdoski | Import User</title>
<form action="{{route('import-user')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="user" class="form-control">
    <button type="submit">Submit</button>
</form>