@extends('layoutspublic.app')

@section('content')

<style>
    :root{
        --primary: #0f766e; /* teal-700 */
        --accent: #eab308;  /* amber-500 */
        --muted: #f1f5f9;   /* slate-100 */
        --muted-2: #eef2ff; /* indigo-50 like */
        --success: #059669; /* green-600 */
        --danger: #dc2626;  /* red-600 */
        --card-border: #e6eef0;
    }
    .btn-primary{background:var(--primary);color:#fff}
    .btn-primary:hover{filter:brightness(.95)}
    .btn-accent{background:var(--accent);color:#07120b}
    .btn-accent:hover{filter:brightness(.97)}
    .btn-danger{background:var(--danger);color:#fff}
    .btn-danger:hover{filter:brightness(.95)}
    .btn-avatar{background:var(--primary);color:#fff;padding:.5rem;border-radius:9999px;display:inline-flex;align-items:center;justify-content:center}
    .nav-active{background:var(--muted);color:var(--primary);display:inline-flex}
    .icon-bg{background:var(--muted);border-radius:.5rem;padding:.6rem}
    .icon-color{color:var(--primary)}
    .icon-bg-success{background:#ecfdf5}
    .icon-color-success{color:var(--success)}
    .icon-bg-alt{background:var(--muted-2)}
    .icon-color-alt{color:#4f46e5}
    .rounded-lg { --tw-border-radius: 0.5rem }
    /* small visual tweak for card borders */
    .p-4.border{border-color:var(--card-border)}
    /* page background for contrast so white cards don't blend into page */
    .profile-page-bg{background:var(--muted)}
    /* card surface */
    .surface-card{background:#ffffff}
</style>

<div class="min-h-screen profile-page-bg py-12">
    @if(session('profile_incomplete'))
        <div class="max-w-7xl mx-auto p-6">
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fa fa-exclamation-triangle text-yellow-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-800">{{ session('profile_incomplete') }}</p>
                        <p class="mt-2 text-sm">
                            <a href="#edit-profile" onclick="scrollToForm(event)" class="text-yellow-700 font-semibold">Lengkapi Profil Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="max-w-7xl mx-auto p-6 grid grid-cols-12 gap-6 ">

    <!-- SIDEBAR USER -->
    <aside class="col-span-12 md:col-span-4 lg:col-span-3 surface-card shadow-lg rounded-2xl p-6 border border-gray-100">
        <div class="flex flex-col items-center text-center">
            <div class="relative">
                <img id="avatarPreview" src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/avatar.jpg') }}" alt="Avatar" class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-md">
                <label for="avatarInput" class="absolute -bottom-2 right-0 btn-avatar cursor-pointer shadow-lg hover:filter" title="Ubah avatar">
                    <i class="fa-solid fa-camera"></i>
                </label>
                <form id="avatarForm" action="{{ route('profile.avatar.save') }}" method="POST" enctype="multipart/form-data" class="hidden">
                    @csrf
                    <input id="avatarInput" name="avatar" type="file" accept="image/*" class="hidden" />
                </form>
            </div>

            <h2 class="mt-4 text-lg font-semibold">{{ Auth::user()->name ?? 'Nama Pengguna' }}</h2>
            <p class="text-sm text-gray-500">{{ Auth::user()->email ?? 'email@domain.com' }}</p>
            @php
                $created = Auth::user()->created_at ?? null;
                try { $memberSince = $created ? \Carbon\Carbon::parse($created)->format('d M Y') : '-'; } catch (\Exception $e) { $memberSince = (string)$created ?? '-'; }
            @endphp
            <p class="mt-1 text-xs text-gray-400">Member sejak {{ $memberSince }}</p>
        </div>

        <nav class="mt-6">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium nav-active">
                        <i class="fa-solid fa-user text-base"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
                <li>
                    <a href="#edit-profile" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm hover:bg-gray-50" onclick="scrollToForm(event)">
                        <i class="fa-solid fa-pen-to-square text-base text-gray-600"></i>
                        <span>Edit Profil</span>
                    </a>
                </li>
                <li>
                    <a href="#change-password" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm hover:bg-gray-50" onclick="scrollToForm(event)">
                        <i class="fa-solid fa-key text-base text-gray-600"></i>
                        <span>Ganti Password</span>
                    </a>
                </li>
                <li>
                    <a href="#documents" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm hover:bg-gray-50" onclick="scrollToForm(event)">
                        <i class="fa-solid fa-file-lines text-base text-gray-600"></i>
                        <span>Dokumen</span>
                    </a>
                </li>
                <li>
                    <button type="button" onclick="alert('Logout (static preview)')" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-red-600 hover:bg-red-50">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Keluar</span>
                    </button>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="col-span-12 md:col-span-8 lg:col-span-9">
        <div class="surface-card shadow-lg rounded-2xl p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold">Profil Saya</h1>
                    <p class="text-sm text-gray-500">Kelola informasi akun dan data pribadi Anda.</p>
                </div>
              
            </div>

            <!-- Flash messages -->
            @if(session('success'))
                <div class="mb-4 p-3 rounded-lg bg-green-50 text-green-700">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-3 rounded-lg bg-red-50 text-red-700">{{ session('error') }}</div>
            @endif

            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="p-4 border rounded-lg flex items-center gap-4">
                    <div class="p-3 icon-bg rounded-lg">
                        <i class="fa-solid fa-envelope icon-color"></i>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Email</div>
                        <div class="font-medium">{{ Auth::user()->email ?? '-' }}</div>
                    </div>
                </div>

                <div class="p-4 border rounded-lg flex items-center gap-4">
                    <div class="p-3 icon-bg-success rounded-lg">
                        <i class="fa-solid fa-phone icon-color-success"></i>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">No. HP</div>
                        <div class="font-medium">{{ Auth::user()->telepon ?? '-' }}</div>
                    </div>
                </div>

                <div class="p-4 border rounded-lg flex items-center gap-4">
                    <div class="p-3 icon-bg-alt rounded-lg">
                        <i class="fa-solid fa-briefcase icon-color-alt"></i>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Status</div>
                        <div class="font-medium">{{ Auth::user()->role ?? 'user' }}</div>
                    </div>
                </div>
            </div>

            <!-- PROFILE DETAILS -->
            <section id="profile-details">
                <h2 class="text-lg font-semibold mb-3">Data Pribadi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-3">
                        <div>
                            <div class="text-sm text-gray-500">Nama Lengkap</div>
                            <div class="font-medium">{{ Auth::user()->name ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Email</div>
                            <div class="font-medium">{{ Auth::user()->email ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">No. Handphone</div>
                            <div class="font-medium">{{ Auth::user()->telepon ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <div class="text-sm text-gray-500">Alamat</div>
                            <div class="font-medium">{{ Auth::user()->alamat ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Username</div>
                            <div class="font-medium">{{ Auth::user()->username ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Jurusan</div>
                            <div class="font-medium">{{ Auth::user()->jurusan ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Pendidikan</div>
                            <div class="font-medium">{{ Auth::user()->pendidikan ?? '-' }}</div>
                        </div>
                        <!-- jabatan display removed per request -->
                    </div>
                </div>
            </section>

            <div class="border-t my-6"></div>

            <!-- EDIT PROFILE FORM -->
            <section id="edit-profile">
                <h2 class="text-lg font-semibold mb-3">Edit Profil</h2>

                <form action="{{ route('profile.account.save') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <div>
                        <label class="text-sm font-medium">Nama Lengkap</label>
                        <input name="name" type="text" value="{{ old('name', Auth::user()->name ?? '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Email</label>
                        <input name="email" type="email" value="{{ old('email', Auth::user()->email ?? '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">No. Handphone</label>
                        <input name="telepon" type="text" value="{{ old('telepon', Auth::user()->telepon ?? '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Username</label>
                        <input name="username" type="text" value="{{ old('username', Auth::user()->username ?? '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Jurusan</label>
                        <input name="jurusan" type="text" value="{{ old('jurusan', Auth::user()->jurusan ?? '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Pendidikan</label>
                        <select name="pendidikan" class="mt-1 block w-full border rounded-lg px-3 py-2">
                            @php $edu = old('pendidikan', Auth::user()->pendidikan ?? ''); @endphp
                            <option value="" {{ $edu=='' ? 'selected' : '' }}>Pilih tingkat pendidikan</option>
                            <option value="SMA" {{ $edu=='SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="SMK" {{ $edu=='SMK' ? 'selected' : '' }}>SMK</option>
                            <option value="Diploma" {{ $edu=='Diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="Mahasiswa" {{ $edu=='Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Lainnya" {{ $edu=='Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <!-- jabatan input removed from profile edit -->

                    <div class="md:col-span-2">
                        <label class="text-sm font-medium">Alamat</label>
                        <textarea name="alamat" rows="3" class="mt-1 block w-full border rounded-lg px-3 py-2">{{ old('alamat', Auth::user()->alamat ?? '') }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center gap-3">
                        <button type="submit" class="btn-primary px-5 py-2 rounded-lg">Simpan Perubahan</button>
                        <button type="button" onclick="resetForm()" class="px-4 py-2 border rounded-lg">Batal</button>
                    </div>
                </form>
            </section>

            <div class="border-t my-6"></div>

            <!-- PESERTA MAGANG FORM -->
            <section id="peserta-profile">
                <h2 class="text-lg font-semibold mb-3">Lengkapi Data Peserta Magang</h2>

                <form action="{{ route('profile.save') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="text-sm font-medium">NIM (opsional)</label>
                        <input name="nim" type="text" value="{{ old('nim', isset($peserta) ? $peserta->nim : '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Asal Institusi</label>
                        <input name="asal_institusi" type="text" value="{{ old('asal_institusi', isset($peserta) ? $peserta->asal_institusi : '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" required />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Jurusan</label>
                        <input name="jurusan" type="text" value="{{ old('jurusan', isset($peserta) ? $peserta->jurusan : '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Fakultas</label>
                        <input name="fakultas" type="text" value="{{ old('fakultas', isset($peserta) ? $peserta->fakultas : '') }}" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm font-medium">Upload CV (PDF / DOC / DOCX)</label>
                        <input name="cv" type="file" accept=".pdf,.doc,.docx" class="mt-1 block w-full" />
                        <p class="text-xs text-gray-500 mt-1">Ukuran maksimal 5MB. File akan disimpan dan dapat dilihat oleh admin.</p>
                    </div>

                    <!-- Tanggal mulai/selesai magang removed from profile form per request -->

                    <div class="md:col-span-2 flex items-center gap-3">
                        <button type="submit" class="btn-primary px-5 py-2 rounded-lg">Simpan Data Peserta</button>
                        <a href="#" class="px-4 py-2 border rounded-lg">Batal</a>
                    </div>
                </form>
            </section>

            <div class="border-t my-6"></div>

            <!-- CHANGE PASSWORD -->
            <section id="change-password">
                <h2 class="text-lg font-semibold mb-3">Ganti Password</h2>
                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm">Password Saat Ini</label>
                        <input name="current_password" type="password" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm">Password Baru</label>
                        <input name="password" type="password" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div>
                        <label class="text-sm">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="mt-1 block w-full border rounded-lg px-3 py-2" />
                    </div>

                    <div class="md:col-span-2">
                        <button type="submit" class="btn-danger px-5 py-2 rounded-lg">Perbarui Password</button>
                    </div>
                </form>
            </section>

            <div class="border-t my-6"></div>

            <!-- RECENT ACTIVITY -->
            <section id="documents">
                <h2 class="text-lg font-semibold mb-3">Aktivitas & Dokumen</h2>
                @if(isset($latestCv) && $latestCv)
                    <div class="p-4 bg-white border rounded">
                        <div class="text-sm">CV Terbaru:</div>
                        <a class="text-indigo-600 hover:underline" href="{{ asset($latestCv) }}" target="_blank" rel="noopener">Lihat / Unduh CV</a>
                    </div>
                @else
                    <div class="text-sm text-gray-500">Belum ada aktivitas terbaru. Unggah dokumen Anda untuk melengkapi profil.</div>
                @endif
            </section>

            <div class="border-t my-6"></div>

            <!-- RIWAYAT LAMARAN -->
            <section id="riwayat-lamaran">
                <h2 class="text-lg font-semibold mb-3">Riwayat Lamaran</h2>

                @if(isset($pendaftaran) && $pendaftaran->isNotEmpty())
                    <div class="space-y-3">
                        @foreach($pendaftaran as $p)
                            <div class="p-4 border rounded-lg bg-white flex items-center justify-between">
                                <div>
                                    <div class="font-medium">{{ optional($p->lowongan)->judul_lowongan ?? 'Lowongan (dihapus)' }}</div>
                                    @php
                                        try { $tanggalDaftar = $p->tanggal_daftar ? \Carbon\Carbon::parse($p->tanggal_daftar)->format('d M Y H:i') : '-'; } catch (\Exception $e) { $tanggalDaftar = $p->tanggal_daftar ?? '-'; }
                                    @endphp
                                    <div class="text-sm text-gray-500">Tanggal daftar: {{ $tanggalDaftar }}</div>
                                </div>
                                <div>
                                    @php
                                        $status = strtolower((string)($p->status_penerimaan ?? 'menunggu'));
                                    @endphp
                                    @if($status === 'diterima')
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Diterima</span>
                                    @elseif($status === 'ditolak')
                                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Ditolak</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Menunggu</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-4 bg-white border rounded text-sm text-gray-600">Belum ada riwayat lamaran.</div>
                @endif
            </section>

        </div>
    </main>

    </div>
</div>

@push('scripts')
<script>
    // Avatar preview and auto-submit (frontend-only)
    const avatarInput = document.getElementById('avatarInput');
    if(avatarInput){
        avatarInput.addEventListener('change', function(e){
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(ev){
                document.getElementById('avatarPreview').src = ev.target.result;
            }
            reader.readAsDataURL(file);
            // Submit the avatar form automatically so user doesn't need to click extra button.
            try {
                document.getElementById('avatarForm').submit();
            } catch (err) {
                console.error('Auto-submit avatar form failed', err);
            }
        });
    }

    function scrollToForm(e){
        e.preventDefault();
        const href = e.currentTarget.getAttribute('href');
        const el = document.querySelector(href);
        if(el) el.scrollIntoView({behavior: 'smooth', block: 'start'});
    }

    function resetForm(){
        const form = document.querySelector('#edit-profile form');
        if(form) form.reset();
    }
</script>
@endpush

    @push('scripts')
    <script>
    // On profile page load, check for ?focus=field param and scroll+focus the matching input
    document.addEventListener('DOMContentLoaded', function () {
        try {
            const params = new URLSearchParams(window.location.search);
            const focus = params.get('focus');
            if (focus) {
                // determine section: edit-profile for user fields, peserta-profile for peserta fields
                const userFields = ['name','telepon','pendidikan','alamat','username','jurusan','email'];
                const pesertaFields = ['nim','asal_institusi','jurusan','fakultas','cv'];

                const sectionId = userFields.includes(focus) ? 'edit-profile' : (pesertaFields.includes(focus) ? 'peserta-profile' : 'edit-profile');
                const sectionEl = document.getElementById(sectionId);
                if (sectionEl) {
                    // scroll to section
                    sectionEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    // focus the input if present
                    setTimeout(function () {
                        const input = sectionEl.querySelector('[name="' + focus + '"]');
                        if (input) {
                            input.focus();
                            // add a quick highlight
                            input.classList.add('ring-2','ring-yellow-300');
                            setTimeout(function(){ input.classList.remove('ring-2','ring-yellow-300'); }, 3000);
                        }
                    }, 500);
                }
            }
        } catch (e) {
            // ignore
            console.error(e);
        }
    });
    </script>
    @endpush

@endsection
