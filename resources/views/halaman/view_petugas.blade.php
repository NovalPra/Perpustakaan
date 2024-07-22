@extends('index')
@section('title', 'Petugas')

@section('isihalaman')
    <div class="container">
        <h3 class="text-center">Daftar Petugas Perpustakaan Universitas Amikom</h3>
        
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalPetugasTambah"> 
            Tambah Data Petugas
        </button>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">ID Petugas</th>
                    <th class="text-center">Nama Petugas</th>
                    <th class="text-center">HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($petugas as $index => $p)
                    <tr>
                        <td class="text-center">{{ $index + $petugas->firstItem() }}</td>
                        <td>{{ $p->id_petugas }}</td>
                        <td>{{ $p->nama_petugas }}</td>
                        <td>{{ $p->hp }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPetugasEdit{{$p->id_petugas}}"> 
                                Edit
                            </button>
                            <!-- Modal Edit Data Petugas -->
                            <div class="modal fade" id="modalPetugasEdit{{$p->id_petugas}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPetugasEditLabel">Form Edit Data Petugas</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form name="formpetugasedit" id="formpetugasedit" action="/petugas/edit/{{ $p->id_petugas }} " method="post" enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="nama_petugas">Nama Petugas</label>
                                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $p->nama_petugas }}" placeholder="Masukkan Nama Petugas">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hp">HP</label>
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $p->hp }}" placeholder="Masukkan Nomor HP">
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
                            <!-- Akhir Modal Edit Data Petugas -->

                            <!-- Tombol Hapus -->
                            <a href="petugas/hapus/{{$p->id_petugas}}" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            Halaman : {{ $petugas->currentPage() }} <br />
            Jumlah Data : {{ $petugas->total() }} <br />
            Data Per Halaman : {{ $petugas->perPage() }} <br />
            {{ $petugas->links() }}
        </div>

        <!-- Modal Tambah Data Petugas -->
        <div class="modal fade" id="modalPetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalPetugasTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPetugasTambahLabel">Form Input Data Petugas</h5>
                    </div>
                    <div class="modal-body">
                        <form name="formpetugastambah" id="formpetugastambah" action="/petugas/tambah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Nama Petugas">
                            </div>
                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan Nomor HP">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Tambah Petugas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah Data Petugas -->
    </div>
@endsection
