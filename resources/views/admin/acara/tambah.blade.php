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

<form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
<div class="modal fade" id="tambahacara" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div>
                <x-jet-label for="judul" value="{{ __('Judul') }}" />
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <x-jet-label for="hasil_rapat" value="{{ __('Isi') }}" />
                <div class="form-group">
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <x-jet-label for="keterangan" value="{{ __('Keterangan Lainnya') }}" />
                <div class="form-group">
                    <textarea class="form-control" style="height:150px" name="ket" placeholder="Keterangan"></textarea>
                </div>
            </div>
            <div>
                <x-jet-label for="foto" value="{{ __('Pilih Foto') }}" />
                <x-jet-input id="foto" class="form-control form-control-user" type="file" name="foto"/>
            </div>
            </div>
        <div class="m-3">
                <h5>
                <x-jet-label for="kategori" value="{{ __('Kategori Acara') }}" />
                    <select class="bg-secondary" name="kategori" placeholder="Kategori">
                        <option value="Umum">Umum</option>
                        <option value="Kelas">Kelas</option>
                        <option value="Jurusan">Jurusan</option>
                        <option value="Kampus">Kampus</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </h5>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
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

