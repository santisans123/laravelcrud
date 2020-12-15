<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Coba upload</title>
</head>
<body>
    <h3>Script Upload File</h3>
    <form action="upload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="gambar">
    <Br>
    <button type="submit">Upload File</button>
    </form>
</body>
</html>
