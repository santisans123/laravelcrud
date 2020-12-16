@extends('template')

@section('content')
    <div class="m-3">
        <form  action="{{ route('acara.cari') }}" method="POST" class="d-sm-inline-block form-inline m-10  my-2 my-md-0 mw-100 navbar-search m=3">
        @csrf
            <div class="input-group">
                <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="float-right">
            <a class="btn btn-primary btn-sm" data-target="#tambahacara" data-toggle="modal">Create</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Title</th>
            <th width="280px"class="text-center">Gambar</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
    @isset($posts)
    @foreach ($posts as $post)

        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <img src="{{ url('uploads/'.$post->foto)}}" alt="foto">
            </td>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <a class="btn btn-secondary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    @endisset
    </table>
    {!! $posts->links() !!}

 @endsection

