@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h5 class="mb-0">Pendaftaran Siswa Baru</h5>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <table class="table table-hover table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Status Akun</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($calon as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->created_at->format('d M Y') }}</td>
                    <td>
                        @if($c->status_akun === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($c->status_akun === 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>

                    <td class="d-flex gap-2">

                        <!-- Tombol buka modal -->
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#approveModal{{ $c->id }}">
                            Approve
                        </button>

                        <!-- Tombol Decline -->
                        <form action="{{ route('admin.pendaftaran.decline', $c->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Decline</button>
                        </form>
                    </td>
                </tr>

                <!-- ============================ -->
                <!-- MODAL APPROVE -->
                <!-- ============================ -->
                <div class="modal fade" id="approveModal{{ $c->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form action="{{ route('admin.pendaftaran.approve', $c->id) }}"
                                  method="POST">
                                @csrf

                                <div class="modal-header">
                                    <h5 class="modal-title">Terima Calon Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Masukkan data siswa untuk <b>{{ $c->name }}</b></p>

                                    <div class="mb-3">
                                        <label class="form-label">NIS</label>
                                        <input type="text" name="nis" class="form-control"
                                               value="NIS-{{ str_pad($c->id, 5, '0', STR_PAD_LEFT) }}"
                                               required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <select name="kelas" class="form-control" required>
                                            <option value="">- Pilih Kelas -</option>
                                            <option value="7A">7A</option>
                                            <option value="7B">7B</option>
                                            <option value="8A">8A</option>
                                            <option value="8B">8B</option>
                                            <option value="9A">9A</option>
                                            <option value="9B">9B</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>

                                    <button type="submit" class="btn btn-success">
                                        Simpan & Terima
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- END MODAL -->

                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada pendaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
