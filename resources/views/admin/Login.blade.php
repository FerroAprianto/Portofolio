<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login — Portfolio Ant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
   
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
  <rect width='100' height='100' rx='20' fill='%230A0A0A'/>
  <text y='.9em' font-size='80' x='10'>⚡</text>
</svg>">
    <style>
        body { font-family:'DM Sans',sans-serif; background:#0a0a0a; }
        .gold-text { background:linear-gradient(135deg,#E8C96A,#C9A84C); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
        .form-input { background:#111; border:1px solid #2a2a2a; color:#e5e5e0; border-radius:10px; padding:12px 16px; width:100%; transition:border-color 0.2s,box-shadow 0.2s; outline:none; font-family:'DM Sans',sans-serif; }
        .form-input:focus { border-color:#C9A84C; box-shadow:0 0 0 3px rgba(201,168,76,0.1); }
        .form-input::placeholder { color:#444; }
        .btn-gold { background:linear-gradient(135deg,#C9A84C,#9A7A2E); color:#0a0a0a; font-weight:600; border-radius:10px; padding:13px; width:100%; transition:opacity 0.2s,transform 0.2s; }
        .btn-gold:hover { opacity:0.85; transform:translateY(-1px); }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center px-4">

    <!-- Background glow -->
    <div class="fixed inset-0 pointer-events-none">
        <div style="position:absolute;top:30%;left:50%;transform:translate(-50%,-50%);width:500px;height:500px;background:radial-gradient(circle,rgba(201,168,76,0.05) 0%,transparent 70%);border-radius:50%;"></div>
    </div>

    <div class="w-full max-w-sm relative z-10">
        <!-- Logo -->
        <div class="text-center mb-10">
            <div class="inline-flex w-16 h-16 rounded-2xl bg-gradient-to-br from-[#C9A84C] to-[#9A7A2E] items-center justify-center text-black text-2xl font-bold mb-4" style="font-family:'Cormorant Garamond',serif;">A</div>
            <h1 class="text-2xl font-light gold-text" style="font-family:'Cormorant Garamond',serif;">Admin Panel</h1>
            <p class="text-[#444] text-sm mt-1">Portfolio Ant</p>
        </div>

        <!-- Card -->
        <div class="bg-[#111] border border-[#1e1e1e] rounded-2xl p-8">
            <h2 class="text-white font-semibold text-lg mb-6">Masuk ke Dashboard</h2>

            @if(session('error'))
                <div class="mb-5 px-4 py-3 rounded-xl border border-red-800/50 bg-red-950/40 text-red-400 text-sm">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div class="mb-5 px-4 py-3 rounded-xl border border-emerald-800/50 bg-emerald-950/40 text-emerald-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="admin@portfolio.com"
                           class="form-input @error('email') border-red-700 @enderror">
                    @error('email')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs tracking-widest text-[#555] uppercase mb-2">Password</label>
                    <input type="password" name="password"
                           placeholder="••••••••"
                           class="form-input @error('password') border-red-700 @enderror">
                    @error('password')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 accent-[#C9A84C]">
                    <label for="remember" class="text-sm text-[#555]">Ingat saya</label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn-gold">Masuk →</button>
                </div>
            </form>
        </div>

        <p class="text-center text-[#333] text-xs mt-6 font-mono">
            Default: admin@portfolio.com / admin123
        </p>
    </div>
</body>
</html>