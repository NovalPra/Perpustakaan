@extends('index')
@section('title', 'Peminjaman')

@section('isihalaman')
    <div class="container">
        <h3 class="text-center">Data Peminjaman Buku</h3>
        <h3 class="text-center">Perpustakaan Universitas Amikom</h3>

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalPinjamTambah"> 
            Tambah Data Peminjaman
        </button>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">ID Pinjam</th>
                    <th class="text-center">Nama Petugas</th>
                    <th class="text-center">Nama Anggota</th>
                    <th class="text-center">Judul Buku</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjam as $index => $p)
                    <tr>
                        <td class="text-center">{{ $index + $pinjam->firstItem() }}</td>
                        <td class="text-center">{{ $p->id_pinjam }}</td>
                        <td>{{ $p->petugas->nama_petugas }}</td>
                        <td>{{ $p->anggota->nama_anggota }}</td>
                        <td>{{ $p->buku->judul }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPinjamEdit{{$p->id_pinjam}}"> 
                                Edit
                            </button>
                            <!-- Modal Edit Data Peminjaman -->
                            <div class="modal fade" id="modalPinjamEdit{{$p->id_pinjam}}" tabindex="-1" role="dialog" aria-labelledby="modalPinjamEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPinjamEditLabel">Form Edit Data Peminjaman</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/{{ $p->id_pinjam }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="id_pinjam">ID Pinjam</label>
                                                    <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="{{ $p->id_pinjam }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_petugas">Nama Petugas</label>
                                                    <select class="form-control" id="id_petugas" name="id_petugas">
                                                        @foreach ($petugas as $pt)
                                                            <option value="{{ $pt->id_petugas }}" {{ $pt->id_petugas == $p->id_petugas ? 'selected' : '' }}>{{ $pt->nama_petugas }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_anggota">Nama Anggota</label>
                                                    <select class="form-control" id="id_anggota" name="id_anggota">
                                                        @foreach ($anggota as $a)
                                                            <option value="{{ $a->id_anggota }}" {{ $a->id_anggota == $p->id_anggota ? 'selected' : '' }}>{{ $a->nama_anggota }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_buku">Judul Buku</label>
                                                    <select class="form-control" id="id_buku" name="id_buku">
                                                        @foreach ($buku as $bk)
                                                            <option value="{{ $bk->id_buku }}" {{ $bk->id_buku == $p->id_buku ? 'selected' : '' }}>{{ $bk->judul }}</option>
                                                        @endforeach
                                                    </select>
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
                            <!-- Akhir Modal Edit Data Peminjaman -->

                            <!-- Tombol Hapus -->
                            <a href="pinjam/hapus/{{$p->id_pinjam}}" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            Halaman : {{ $pinjam->currentPage() }} <br />
            Jumlah Data : {{ $pinjam->total() }} <br />
            Data Per Halaman : {{ $pinjam->perPage() }} <br />
            {{ $pinjam->links() }}
        </div>

        <!-- Modal Tambah Data Peminjaman -->
        <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Peminjaman</h5>
                    </div>
                    <div class="modal-body">
                        <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="id_petugas">Nama Petugas</label>
                                <select class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_anggota">Nama Anggota</label>
                                <select class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                    @foreach($anggota as $a)
                                        <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_buku">Judul Buku</label>
                                <select class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Tambah Peminjaman</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah Data Peminjaman -->
    </div>
@endsection
