@include('client.assets.head')
@include('client.components.navbar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Profile</h4>
                    <a href="{{ url('/') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Back
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-4 text-center">
                                <div class="profile-photo-container mb-3">
                                    <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo) : asset('images/profile_img/default-image.jpg') }}"
                                         class="rounded-circle shadow"
                                         alt="Profile Photo"
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control" id="photo" name="photo">
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name', Auth::user()->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                                        @foreach($prodi as $id => $nama_prodi)
                                            <option value="{{ $id }}" {{ old('prodi', Auth::user()->prodi) == $id ? 'selected' : '' }}>
                                                {{ $nama_prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('prodi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                @if(Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text"
                                           class="form-control"
                                           id="role"
                                           value="{{ Auth::user()->role }}"
                                           disabled>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('client.components.footer')
@include('client.assets.scripts')
