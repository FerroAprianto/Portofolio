@extends('admin.layout')
@section('title', isset($project) ? 'Edit Project' : 'Tambah Project')
@section('page-title', isset($project) ? 'Edit Project: ' . $project->title : 'Tambah Project Baru')

@section('content')

<div class="max-w-2xl">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-sm text-[#555] hover:text-[#C9A84C] transition-colors mb-6">
        ← Kembali ke daftar project
    </a>

    <div class="card p-8">
        <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
              method="POST" class="space-y-6">
            @csrf
            @if(isset($project)) @method('PUT') @endif

            {{-- Title --}}
            <div>
                <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Nama Project *</label>
                <input type="text" name="title"
                       value="{{ old('title', $project->title ?? '') }}"
                       placeholder="Contoh: FFKS MART"
                       class="form-input @error('title') border-red-700 @enderror">
                @error('title')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Deskripsi *</label>
                <textarea name="description" rows="4"
                          placeholder="Jelaskan project ini secara singkat dan jelas..."
                          class="form-input @error('description') border-red-700 @enderror">{{ old('description', $project->description ?? '') }}</textarea>
                @error('description')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Role --}}
            <div>
                <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Peran Kamu *</label>
                <input type="text" name="role"
                       value="{{ old('role', $project->role ?? '') }}"
                       placeholder="Contoh: Full-Stack Developer"
                       class="form-input @error('role') border-red-700 @enderror">
                @error('role')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Tech --}}
            <div>
                <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Teknologi *</label>
                <input type="text" name="tech_raw"
                       value="{{ old('tech_raw', $techRaw ?? '') }}"
                       placeholder="Laravel, MySQL, Tailwind CSS, JavaScript"
                       class="form-input">
                <p class="text-xs text-[#444] mt-1.5">Pisahkan dengan koma. Contoh: Laravel, MySQL, Tailwind CSS</p>
            </div>

            {{-- Icon + Color (2 col) --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Icon Emoji *</label>
                    <input type="text" name="icon"
                           value="{{ old('icon', $project->icon ?? '🚀') }}"
                           placeholder="🚀"
                           class="form-input @error('icon') border-red-700 @enderror">
                    <p class="text-xs text-[#444] mt-1.5">Satu emoji saja. Contoh: 🛒 🤖 🚂</p>
                    @error('icon')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Warna Card *</label>
                    <select name="color" class="form-input @error('color') border-red-700 @enderror">
                        @foreach($colors as $value => $label)
                            <option value="{{ $value }}" {{ old('color', $project->color ?? '') === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('color')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- URLs (2 col) --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">URL Demo</label>
                    <input type="url" name="demo_url"
                           value="{{ old('demo_url', $project->demo_url ?? '') }}"
                           placeholder="https://demo.example.com"
                           class="form-input @error('demo_url') border-red-700 @enderror">
                    @error('demo_url')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">URL GitHub</label>
                    <input type="url" name="github_url"
                           value="{{ old('github_url', $project->github_url ?? '') }}"
                           placeholder="https://github.com/ant/repo"
                           class="form-input @error('github_url') border-red-700 @enderror">
                    @error('github_url')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Sort order + Visibility --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Urutan Tampil</label>
                    <input type="number" name="sort_order" min="0"
                           value="{{ old('sort_order', $project->sort_order ?? 0) }}"
                           class="form-input">
                    <p class="text-xs text-[#444] mt-1.5">Angka kecil = tampil lebih dulu</p>
                </div>
                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Visibilitas</label>
                    <div class="form-input flex items-center gap-3 cursor-pointer" onclick="document.getElementById('is_visible').click()">
                        <input type="checkbox" id="is_visible" name="is_visible" value="1"
                               {{ old('is_visible', $project->is_visible ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 accent-[#C9A84C]">
                        <span class="text-sm text-[#888]">Tampilkan di portofolio</span>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-gold flex-1">
                    {{ isset($project) ? '💾 Simpan Perubahan' : '✨ Tambah Project' }}
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn-ghost">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection