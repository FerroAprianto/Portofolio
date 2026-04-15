@extends('admin.layout')
@section('title', 'Kelola Projects')
@section('page-title', 'Kelola Projects')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-[#555]">Total {{ $projects->count() }} project</p>
    <a href="{{ route('admin.projects.create') }}" class="btn-gold text-sm">+ Tambah Project Baru</a>
</div>

<div class="card overflow-hidden">
    @if($projects->isEmpty())
        <div class="text-center py-20 text-[#444]">
            <p class="text-5xl mb-4">📂</p>
            <p class="text-sm mb-4">Belum ada project.</p>
            <a href="{{ route('admin.projects.create') }}" class="btn-gold text-sm px-6 py-2.5 inline-block">Tambah Project Pertama</a>
        </div>
    @else
        <table class="w-full">
            <thead>
                <tr class="border-b border-[#1e1e1e]">
                    <th class="text-left px-6 py-4 text-xs tracking-widest text-[#444] uppercase">Project</th>
                    <th class="text-left px-6 py-4 text-xs tracking-widest text-[#444] uppercase hidden md:table-cell">Role</th>
                    <th class="text-left px-6 py-4 text-xs tracking-widest text-[#444] uppercase hidden lg:table-cell">Teknologi</th>
                    <th class="text-center px-6 py-4 text-xs tracking-widest text-[#444] uppercase">Status</th>
                    <th class="text-right px-6 py-4 text-xs tracking-widest text-[#444] uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#1a1a1a]">
                @foreach($projects as $project)
                <tr class="hover:bg-[#111] transition-colors group">
                    {{-- Project name --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $project->color }} flex items-center justify-center text-base flex-shrink-0">
                                {{ $project->icon }}
                            </div>
                            <div>
                                <p class="text-sm text-white font-medium">{{ $project->title }}</p>
                                <p class="text-xs text-[#444] mt-0.5">#{{ $project->id }}</p>
                            </div>
                        </div>
                    </td>
                    {{-- Role --}}
                    <td class="px-6 py-4 hidden md:table-cell">
                        <p class="text-sm text-[#777]">{{ $project->role }}</p>
                    </td>
                    {{-- Tech --}}
                    <td class="px-6 py-4 hidden lg:table-cell">
                        <div class="flex flex-wrap gap-1">
                            @foreach(array_slice($project->tech ?? [], 0, 3) as $tech)
                                <span class="text-[10px] bg-[#1a1a1a] border border-[#2a2a2a] text-[#888] px-2 py-0.5 rounded-full font-mono">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->tech ?? []) > 3)
                                <span class="text-[10px] text-[#555]">+{{ count($project->tech) - 3 }}</span>
                            @endif
                        </div>
                    </td>
                    {{-- Status --}}
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('admin.projects.toggle', $project) }}" method="POST" class="inline">
                            @csrf @method('PATCH')
                            <button type="submit"
                                class="badge-{{ $project->is_visible ? 'visible' : 'hidden' }} text-xs px-3 py-1 rounded-full cursor-pointer hover:opacity-80 transition-opacity">
                                {{ $project->is_visible ? '● Visible' : '○ Hidden' }}
                            </button>
                        </form>
                    </td>
                    {{-- Actions --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="text-xs text-[#555] hover:text-[#C9A84C] transition-colors border border-[#2a2a2a] hover:border-[#C9A84C] px-3 py-1.5 rounded-lg">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                  onsubmit="return confirm('Hapus project {{ addslashes($project->title) }}? Tindakan ini tidak bisa dibatalkan.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection