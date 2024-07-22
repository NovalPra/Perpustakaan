@extends('index')
@section('title', 'Anggota')

@section('isihalaman')
    <div class="container">
        <h3 class="text-center">Daftar Anggota Perpustakaan Universitas Amikom</h3>
        
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAnggotaTambah"> 
            Tambah Data Anggota
        </button>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">ID Anggota</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Nama Anggota</th>
                    <th class="text-center">Prodi</th>
                    <th class="text-center">HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($anggota as $index => $a)
                    <tr>
                        <td class="text-center">{{ $index + $anggota->firstItem() }}</td>
                        <td>{{ $a->id_anggota }}</td>
                        <td>{{ $a->nim }}</td>
                        <td>{{ $a->nama_anggota }}</td>
                        <td>{{ $a->prodi }}</td>
                        <td>{{ $a->hp }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAnggotaEdit{{$a->id_anggota}}"> 
                                Edit
                            </button>
                            <!-- Modal Edit Data Anggota -->
                            <div class="modal fade" id="modalAnggotaEdit{{$a->id_anggota}}" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalAnggotaEditLabel">Form Edit Data Anggota</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form name="formanggotaedit" id="formanggotaedit" action="/anggota/edit/{{ $a->id_anggota }} " method="post" enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="nim">NIM</label>
                                                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $a->nim }}" placeholder="Masukkan NIM">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_anggota">Nama Anggota</label>
                                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $a->nama_anggota }}" placeholder="Masukkan Nama Anggota">
                                                </div>
                                                <div class="form-group">
                                                    <label for="prodi">Prodi</label>
                                                    <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $a->prodi }}" placeholder="Masukkan Prodi">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hp">HP</label>
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $a->hp }}" placeholder="Masukkan HP">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Edit Data Anggota -->

                            <!-- Tombol Hapus -->
                            <a href="anggota/hapus/{{$a->id_anggota}}" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            Halaman : {{ $anggota->currentPage() }} <br />
            Jumlah Data : {{ $anggota->total() }} <br />
            Data Per Halaman : {{ $anggota->perPage() }} <br />
            {{ $anggota->links() }}
        </div>

        <!-- Modal Tambah Data Anggota -->
        <div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Input Data Anggota</h5>
                    </div>
                    <div class="modal-body">
                        <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                            </div>
                            <div class="form-group">
                                <label for="nama_anggota">Nama Anggota</label>
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Masukkan Nama Anggota">
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Prodi">
                            </div>
                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan HP">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Tambah Anggota</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah Data Anggota -->
    </div>
@endsection
