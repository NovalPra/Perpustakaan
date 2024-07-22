@extends('index')
@section('title', 'Daftar Buku')

@section('isihalaman')
    <div class="container">
        <h3 class="text-center">Daftar Buku Perpustakaan Universitas Amikom</h3>
        
        <!-- Tombol Tambah Data Buku -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalBukuTambah">Tambah Data Buku</button>

        <!-- Tabel Daftar Buku -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">ID Buku</th>
                        <th scope="col" class="text-center">Kode Buku</th>
                        <th scope="col" class="text-center">Judul Buku</th>
                        <th scope="col" class="text-center">Pengarang</th>
                        <th scope="col" class="text-center">Kategori</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $index => $bk)
                        <tr>
                            <td class="text-center" scope="row">{{ $index + $buku->firstItem() }}</td>
                            <td>{{ $bk->id_buku }}</td>
                            <td>{{ $bk->kode_buku }}</td>
                            <td>{{ $bk->judul }}</td>
                            <td>{{ $bk->pengarang }}</td>
                            <td>{{ $bk->kategori }}</td>
                            <td class="text-center">
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBukuEdit{{ $bk->id_buku }}">Edit</button>

                                <!-- Modal Edit Data Buku -->
                                <div class="modal fade" id="modalBukuEdit{{ $bk->id_buku }}" tabindex="-1" role="dialog" aria-labelledby="modalBukuEditLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalBukuEditLabel">Form Edit Data Buku</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/buku/edit/{{ $bk->id_buku }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="kode_buku">Kode Buku</label>
                                                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="{{ $bk->kode_buku }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="judul">Judul Buku</label>
                                                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $bk->judul }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pengarang">Nama Pengarang</label>
                                                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $bk->pengarang }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kategori">Kategori</label>
                                                        <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $bk->kategori }}">
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

                                <!-- Tombol Hapus -->
                                <form action="/buku/hapus/{{ $bk->id_buku }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            Halaman: {{ $buku->currentPage() }} <br>
            Jumlah Data: {{ $buku->total() }} <br>
            Data Per Halaman: {{ $buku->perPage() }} <br>

            {{ $buku->links() }}
        </div>
        <!-- Akhir Pagination -->

        <!-- Modal Tambah Data Buku -->
        <div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBukuTambahLabel">Form Tambah Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/buku/tambah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kode_buku">Kode Buku</label>
                                <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukan Kode Buku">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Buku</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Buku">
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Nama Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Nama Pengarang">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Tambah Buku</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah Data Buku -->
    </div>
@endsection
