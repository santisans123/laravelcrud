@extends('template')

@section('content')
    <div class="m-3">
        <form  action="caripesan" method="GET" class="d-sm-inline-block form-inline m-10  my-2 my-md-0 mw-100 navbar-search m=3">
        @csrf
            <div class="input-group">
                <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{old('cari')}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" name="cari" value="{{old('cari')}}">
                        <i class="fas fa-search fa-sm"name="cari" value="{{old('cari')}}"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="5px" class="text-center">No</th>
            <th width="280px"class="text-center">Pengirim</th>
            <th width="280px"class="text-center">Action</th>
        </tr>

    @foreach ($messages as $message)

        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>
                Nama : {{ $message-> name }} <br>
                NRP  : {{ $message->nrp }} <br>
                Email: {{ $message->email }}
            </td>
            <td class="text-center">
                <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
                {{ $message->message }}
            </td>
        </tr>
        @endforeach

    </table>
    {!! $messages->links() !!}

    @endsection
