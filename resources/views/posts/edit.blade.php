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
<div class="modal fade" id="editacara" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div>
                <div class="form-group">
                    <strong>Judul</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <strong>Isi</strong>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Content">{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <textarea class="form-control" style="height:150px" name="ket" placeholder="ket">{{ $post->ket }}</textarea>
                </div>
            </div>
            <div>
                <x-jet-input id="foto" class="form-control form-control-user" type="file" name="foto" :value="old('foto')" required autofocus autocomplete="foto" enctype="multipart/form-data"/>
            </div>
            </div>
            <div class="m-3">
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </div>
        </div>
  </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</form>

