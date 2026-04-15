@extends('admin.layout')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stat cards --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="card p-6">
        <p class="text-xs tracking-widest text-[#444] uppercase mb-3">Total Project</p>
        <p class="text-4xl font-light text-white">{{ $totalProjects }}</p>
        <p class="text-xs text-[#555] mt-1">Semua project</p>
    </div>
    <div class="card p-6">
        <p class="text-xs tracking-widest text-[#444] uppercase mb-3">Ditampilkan</p>
        <p class="text-4xl font-light text-emerald-400">{{ $visibleProjects }}</p>
        <p class="text-xs text-[#555] mt-1">Tampil di portofolio</p>
    </div>
    <div class="card p-6">
        <p class="text-xs tracking-widest text-[#444] uppercase mb-3">Disembunyikan</p>
        <p class="text-4xl font-light text-[#666]">{{ $hiddenProjects }}</p>
        <p class="text-xs text-[#555] mt-1">Tidak tampil</p>
    </div>
</div>

{{-- Recent projects --}}
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-white font-semibold">Project Terbaru</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn-gold text-sm px-4 py-2">+ Tambah Project</a>
    </div>

    @if($recentProjects->isEmpty())
        <div class="text-center py-12 text-[#444]">
            <p class="text-4xl mb-3">📂</p>
            <p class="text-sm">Belum ada project. <a href="{{ route('admin.projects.create') }}" class="text-[#C9A84C] hover:underline">Tambah sekarang</a></p>
        </div>
    @else
        <div class="space-y-3">
            @foreach($recentProjects as $project)
            <div class="flex items-center gap-4 p-4 bg-[#0d0d0d] rounded-xl border border-[#1e1e1e] hover:border-[#2a2a2a] transition-colors">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $project->color }} flex items-center justify-center text-lg flex-shrink-0">
                    {{ $project->icon }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-white font-medium truncate">{{ $project->title }}</p>
                    <p class="text-xs text-[#555] truncate">{{ $project->role }}</p>
                </div>
                <span class="badge-{{ $project->is_visible ? 'visible' : 'hidden' }} text-xs px-3 py-1 rounded-full flex-shrink-0">
                    {{ $project->is_visible ? 'Visible' : 'Hidden' }}
                </span>
                <a href="{{ route('admin.projects.edit', $project) }}" class="text-xs text-[#555] hover:text-[#C9A84C] transition-colors flex-shrink-0">Edit →</a>
            </div>
            @endforeach
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('admin.projects.index') }}" class="text-sm text-[#C9A84C] hover:underline">Lihat semua project →</a>
        </div>
    @endif
</div>

@endsection