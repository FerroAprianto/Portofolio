<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') — Portfolio Ant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
  <rect width='100' height='100' rx='20' fill='%230A0A0A'/>
  <text y='.9em' font-size='80' x='10'>⚡</text>
</svg>">
    <style>
        body { font-family: 'DM Sans', sans-serif; background: #0d0d0d; color: #e5e5e0; }
        .gold-text { background: linear-gradient(135deg,#E8C96A,#C9A84C); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
        .sidebar-link { transition: background 0.2s, color 0.2s, border-color 0.2s; }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(201,168,76,0.08);
            border-left-color: #C9A84C;
            color: #C9A84C;
        }
        .card { background: #111; border: 1px solid #222; border-radius: 16px; }
        .form-input {
            background: #0d0d0d; border: 1px solid #2a2a2a; color: #e5e5e0;
            border-radius: 10px; padding: 10px 14px; width: 100%;
            transition: border-color 0.2s, box-shadow 0.2s; outline: none;
        }
        .form-input:focus { border-color: #C9A84C; box-shadow: 0 0 0 3px rgba(201,168,76,0.1); }
        .form-input::placeholder { color: #444; }
        .btn-gold { background: linear-gradient(135deg,#C9A84C,#9A7A2E); color:#0d0d0d; font-weight:600; border-radius:10px; padding:10px 20px; transition: opacity 0.2s, transform 0.2s; }
        .btn-gold:hover { opacity:0.85; transform:translateY(-1px); }
        .btn-ghost { border:1px solid #2a2a2a; color:#888; border-radius:10px; padding:10px 20px; transition:all 0.2s; }
        .btn-ghost:hover { border-color:#C9A84C; color:#C9A84C; }
        .btn-danger { background:#1a0808; border:1px solid #4a1515; color:#f87171; border-radius:10px; padding:8px 16px; transition:all 0.2s; font-size:13px; }
        .btn-danger:hover { background:#2a0f0f; border-color:#ef4444; }
        .badge-visible { background:rgba(16,185,129,0.1); color:#34d399; border:1px solid rgba(16,185,129,0.2); }
        .badge-hidden  { background:rgba(107,114,128,0.1); color:#9ca3af; border:1px solid rgba(107,114,128,0.2); }
        select.form-input option { background:#1a1a1a; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="h-full flex">

<!-- ── Sidebar ──────────────────────────────────────────── -->
<aside class="w-64 min-h-screen flex flex-col border-r border-[#1a1a1a] flex-shrink-0">
    <!-- Logo -->
    <div class="px-6 py-6 border-b border-[#1a1a1a]">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#C9A84C] to-[#9A7A2E] flex items-center justify-center text-black font-bold text-sm">A</div>
            <div>
                <p class="font-semibold text-sm text-white leading-none">Admin Panel</p>
                <p class="text-xs text-[#555] mt-0.5">Portfolio Ant</p>
            </div>
        </a>
    </div>

    <!-- Nav -->
    <nav class="flex-1 px-3 py-4 space-y-1">
        <p class="px-3 text-[10px] tracking-widest text-[#444] uppercase mb-3">Menu</p>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl border-l-2 border-transparent text-sm text-[#777] {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25A2.25 2.25 0 0113.5 8.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
            Dashboard
        </a>

        <a href="{{ route('admin.projects.index') }}"
           class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl border-l-2 border-transparent text-sm text-[#777] {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/></svg>
            Projects
            <span class="ml-auto text-xs bg-[#1a1a1a] border border-[#2a2a2a] px-2 py-0.5 rounded-full text-[#555]">
                {{ \App\Models\Project::count() }}
            </span>
        </a>

        <div class="pt-4">
            <p class="px-3 text-[10px] tracking-widest text-[#444] uppercase mb-3">Lainnya</p>
            <a href="{{ route('home') }}" target="_blank"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl border-l-2 border-transparent text-sm text-[#777]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                Lihat Portofolio
            </a>
        </div>
    </nav>

    <!-- User info + logout -->
    <div class="px-4 py-4 border-t border-[#1a1a1a]">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#C9A84C] to-[#9A7A2E] flex items-center justify-center text-black text-xs font-bold">
                {{ substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-white truncate">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-[#555] truncate">{{ Auth::guard('admin')->user()->email ?? '' }}</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-left text-xs text-[#555] hover:text-red-400 transition-colors px-3 py-2 rounded-lg hover:bg-red-950/30">
                ← Logout
            </button>
        </form>
    </div>
</aside>

<!-- ── Main Content ─────────────────────────────────────── -->
<main class="flex-1 overflow-auto">
    <!-- Top bar -->
    <div class="sticky top-0 z-10 bg-[#0d0d0d]/90 backdrop-blur border-b border-[#1a1a1a] px-8 py-4 flex items-center justify-between">
        <h1 class="text-sm font-semibold text-white">@yield('page-title', 'Dashboard')</h1>
        <div class="flex items-center gap-2 text-xs text-[#444] font-mono">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            Online
        </div>
    </div>

    <div class="px-8 py-6">
        <!-- Flash messages -->
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-xl border border-emerald-800/50 bg-emerald-950/40 text-emerald-400 text-sm flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 px-4 py-3 rounded-xl border border-red-800/50 bg-red-950/40 text-red-400 text-sm flex items-center gap-2">
                <span>❌</span> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</main>

</body>
</html>