@extends('layouts.app')

@section('title', 'Edit Materi Pembelajaran')

@section('content')
    <h2 class="text-primary mb-4">Edit Materi: {{ $materi->judul }}</h2>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('guru.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label for="judul" class="form-label">Judul Materi</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" 
                        value="{{ old('judul', $materi->judul) }}" required>
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="kelas" class="form-label">Target Kelas</label>
                        <select class="form-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelasOptions as $kelas)
                                <option value="{{ $kelas }}" {{ old('kelas', $materi->kelas) == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran" name="mata_pelajaran" required>
                            <option value="">Pilih Mapel</option>
                            @foreach ($mapelOptions as $mapel)
                                <option value="{{ $mapel }}" {{ old('mata_pelajaran', $materi->mata_pelajaran) == $mapel ? 'selected' : '' }}>{{ $mapel }}</option>
                            @endforeach
                        </select>
                        @error('mata_pelajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tipe" class="form-label">Tipe Materi</label>
                        @php $tipeOld = old('tipe', $materi->tipe); @endphp
                        <select class="form-select @error('tipe') is-invalid @enderror" id="tipe" name="tipe" required>
                            <option value="">Pilih Tipe</option>
                            <option value="video" {{ $tipeOld == 'video' ? 'selected' : '' }}>Video (.mp4 / Link YouTube)</option>
                            <option value="dokumen" {{ $tipeOld == 'dokumen' ? 'selected' : '' }}>Dokumen (PDF, DOCX)</option>
                            <option value="foto" {{ $tipeOld == 'foto' ? 'selected' : '' }}>Foto/Gambar (JPG, PNG)</option>
                            <option value="link" {{ $tipeOld == 'link' ? 'selected' : '' }}>Link Eksternal/Google Drive</option>
                        </select>
                        @error('tipe') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <p class="mt-3 text-muted small">Materi saat ini: <a href="{{ $materi->url_file }}" target="_blank">{{ $materi->url_file }}</a></p>

                <div class="mb-3" id="field-file" style="{{ $tipeOld !== 'link' ? '' : 'display:none;' }}">
                    <label for="materi_file" class="form-label">Ganti File Materi (Maks 50MB) - Kosongkan jika tidak diubah</label>
                    <input class="form-control @error('materi_file') is-invalid @enderror" type="file" id="materi_file" name="materi_file">
                    @error('materi_file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3" id="field-link" style="{{ $tipeOld == 'link' ? '' : 'display:none;' }}">
                    <label for="materi_link" class="form-label">Ganti Link Eksternal (URL)</label>
                    <input type="url" class="form-control @error('materi_link') is-invalid @enderror" id="materi_link" name="materi_link" 
                        value="{{ old('materi_link', $materi->tipe == 'link' ? $materi->url_file : '') }}">
                    @error('materi_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Perbarui Materi</button>
                <a href="{{ route('guru.materi.index') }}" class="btn btn-secondary mt-3">Batal</a>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipeSelect = document.getElementById('tipe');
        const fileField = document.getElementById('field-file');
        const linkField = document.getElementById('field-link');

        function toggleFields() {
            const tipe = tipeSelect.value;
            fileField.style.display = 'none';
            linkField.style.display = 'none';

            if (tipe === 'link') {
                linkField.style.display = 'block';
            } else if (tipe !== '') {
                fileField.style.display = 'block';
            }
        }

        tipeSelect.addEventListener('change', toggleFields);
        toggleFields(); // Panggil saat memuat halaman
    });
</script>
@endpush