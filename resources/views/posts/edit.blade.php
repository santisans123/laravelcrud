<!DOCTYPE html>
<html>
<head>
    <title>Tutorial CRUD Laravel 8 untuk Pemula - Ilmucoding.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>EDIT</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Isi</strong>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Content">{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <textarea class="form-control" style="height:150px" name="ket" placeholder="ket">{{ $post->ket }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div>
                        <x-jet-input id="foto" class="form-control form-control-user" type="file" name="foto" :value="old('foto')" required autofocus autocomplete="foto" enctype="multipart/form-data"/>
                    </div>
                </div>
            </div>

            </div>
            <div  class="col-xs-12 col-sm-12 col-md-12">
            <strong>Kategori</strong>
                <h6>
                    <select name="kategori" placeholder="Kategori">
                        <option value="Umum">Umum</option>
                        <option value="Kelas">Kelas</option>
                        <option value="Jurusan">Jurusan</option>
                        <option value="Kampus">Kampus</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </h6>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Create at: </strong>
                    <h6>{{ $post->created_at }}</h6>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
    </div>

</body>
</html>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
