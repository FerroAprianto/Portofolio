<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Portofolio Ferro — Web Developer, AI Enthusiast & Database Engineer" />
    <title>Ferro | Developer Portfolio</title>

    {{-- Tailwind CSS via CDN (ganti dengan build Vite untuk produksi) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts: Cormorant Garamond (luxury display) + DM Sans (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
  <rect width='100' height='100' rx='20' fill='%230A0A0A'/>
  <text y='.9em' font-size='80' x='10'>⚡</text>
</svg>">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Cormorant Garamond"', 'serif'],
                        body:    ['"DM Sans"', 'sans-serif'],
                        mono:    ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        gold:    { DEFAULT: '#C9A84C', light: '#E8C96A', dark: '#9A7A2E' },
                        obsidian:{ DEFAULT: '#0A0A0A', 1: '#111111', 2: '#181818', 3: '#222222', 4: '#2C2C2C' },
                    },
                    animation: {
                        'fade-up':   'fadeUp 0.7s ease forwards',
                        'fade-in':   'fadeIn 1s ease forwards',
                        'pulse-gold':'pulseGold 2s ease-in-out infinite',
                        'cursor-blink': 'cursorBlink 0.8s step-end infinite',
                    },
                    keyframes: {
                        fadeUp:  { from: { opacity: '0', transform: 'translateY(30px)' }, to: { opacity: '1', transform: 'translateY(0)' } },
                        fadeIn:  { from: { opacity: '0' }, to: { opacity: '1' } },
                        pulseGold: { '0%,100%': { boxShadow: '0 0 0 0 rgba(201,168,76,0.4)' }, '50%': { boxShadow: '0 0 0 12px rgba(201,168,76,0)' } },
                        cursorBlink: { '0%,100%': { opacity: '1' }, '50%': { opacity: '0' } },
                    }
                }
            }
        }
    </script>

    <style>
        /* ── Base ───────────────────────────────────────────── */
        * { box-sizing: border-box; }
        body {
            background-color: #0A0A0A;
            color: #E8E8E0;
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        /* ── Grain overlay ──────────────────────────────────── */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none; opacity: 0.3;
        }

        /* ── Gold gradient text ─────────────────────────────── */
        .gold-text {
            background: linear-gradient(135deg, #E8C96A 0%, #C9A84C 50%, #9A7A2E 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .gold-border { border-color: #C9A84C; }

        /* ── Navbar ─────────────────────────────────────────── */
        #navbar {
            transition: background 0.4s, backdrop-filter 0.4s, box-shadow 0.4s;
        }
        #navbar.scrolled {
            background: rgba(10,10,10,0.92);
            backdrop-filter: blur(16px);
            box-shadow: 0 1px 0 rgba(201,168,76,0.15);
        }

        /* ── Hero typing cursor ─────────────────────────────── */
        #typed-cursor {
            display: inline-block;
            width: 3px; height: 1em;
            background: #C9A84C;
            margin-left: 4px;
            vertical-align: middle;
            animation: cursorBlink 0.8s step-end infinite;
        }

        /* ── Scroll reveal ──────────────────────────────────── */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* ── Gold divider line ──────────────────────────────── */
        .gold-line {
            height: 1px;
            background: linear-gradient(to right, transparent, #C9A84C, transparent);
        }

        /* ── Project card ───────────────────────────────────── */
        .project-card {
            background: #111111;
            border: 1px solid #222222;
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-6px);
            border-color: #C9A84C;
            box-shadow: 0 20px 60px rgba(201,168,76,0.12);
        }

        /* ── Skill card ─────────────────────────────────────── */
        .skill-card {
            background: #111111;
            border: 1px solid #222222;
            transition: border-color 0.3s, background 0.3s;
        }
        .skill-card:hover {
            border-color: rgba(201,168,76,0.5);
            background: #181818;
        }

        /* ── Form input ─────────────────────────────────────── */
        .form-input {
            background: #111111;
            border: 1px solid #2C2C2C;
            color: #E8E8E0;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
        }
        .form-input:focus {
            border-color: #C9A84C;
            box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
        }
        .form-input::placeholder { color: #555555; }

        /* ── Gold button ────────────────────────────────────── */
        .btn-gold {
            background: linear-gradient(135deg, #C9A84C, #9A7A2E);
            color: #0A0A0A;
            font-weight: 600;
            transition: opacity 0.3s, transform 0.2s, box-shadow 0.3s;
            animation: pulseGold 2s ease-in-out infinite;
        }
        .btn-gold:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(201,168,76,0.35);
        }

        /* ── Ghost button ───────────────────────────────────── */
        .btn-ghost {
            border: 1px solid #C9A84C;
            color: #C9A84C;
            transition: background 0.3s, transform 0.2s;
        }
        .btn-ghost:hover {
            background: rgba(201,168,76,0.08);
            transform: translateY(-2px);
        }

        /* ── Decorative corner ──────────────────────────────── */
        .deco-corner {
            position: absolute;
            width: 60px; height: 60px;
            border-color: rgba(201,168,76,0.3);
            border-style: solid;
        }
        .deco-tl { top: 0; left: 0; border-width: 1px 0 0 1px; }
        .deco-br { bottom: 0; right: 0; border-width: 0 1px 1px 0; }

        /* ── Hero ambient glow ──────────────────────────────── */
        .hero-glow {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(201,168,76,0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ── Section number ─────────────────────────────────── */
        .section-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: #C9A84C;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* ── Tech tag ───────────────────────────────────────── */
        .tech-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            background: rgba(201,168,76,0.08);
            border: 1px solid rgba(201,168,76,0.2);
            color: #C9A84C;
            padding: 3px 10px;
            border-radius: 99px;
        }

        /* ── Social icon ────────────────────────────────────── */
        .social-icon {
            width: 44px; height: 44px;
            border: 1px solid #2C2C2C;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            transition: border-color 0.3s, transform 0.3s, background 0.3s;
            color: #888;
        }
        .social-icon:hover {
            border-color: #C9A84C;
            background: rgba(201,168,76,0.08);
            color: #C9A84C;
            transform: translateY(-3px);
        }

        /* ── Mobile menu ────────────────────────────────────── */
        #mobile-menu {
            max-height: 0; overflow: hidden;
            transition: max-height 0.4s ease;
        }
        #mobile-menu.open { max-height: 400px; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="relative">

<!-- ════════════════════════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════════════════════ -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 px-6 py-4">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="#hero" class="font-display text-2xl gold-text font-semibold tracking-widest">PORTOFOLIO</a>

        <!-- Desktop links -->
        <div class="hidden md:flex items-center gap-8">
            @foreach(['about' => 'About', 'projects' => 'Projects', 'contact' => 'Contact'] as $id => $label)
                <a href="#{{ $id }}"
                   class="text-sm font-body text-[#888] hover:text-[#C9A84C] transition-colors tracking-wide">
                    {{ $label }}
                </a>
            @endforeach
            <a href="{{ route('cv.download') }}"
               class="btn-gold text-xs px-4 py-2 rounded-full tracking-wider">
                Download CV
            </a>
        </div>

        <!-- Mobile hamburger -->
        <button id="menu-btn" class="md:hidden text-[#C9A84C]" aria-label="Toggle menu">
            <svg id="icon-open"  class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
            <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden">
        <div class="max-w-6xl mx-auto px-2 pt-4 pb-6 flex flex-col gap-4">
            @foreach(['about' => 'About', 'projects' => 'Projects', 'contact' => 'Contact'] as $id => $label)
                <a href="#{{ $id }}" class="mobile-link text-[#888] hover:text-[#C9A84C] transition-colors py-2 border-b border-[#1a1a1a]">{{ $label }}</a>
            @endforeach
            <a href="{{ route('cv.download') }}" class="btn-gold text-center py-2 rounded-full text-sm tracking-wider mt-2">Download CV</a>
        </div>
    </div>
</nav>

<!-- ════════════════════════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════════════════════ -->
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden px-6">
    <!-- Ambient glows -->
    <div class="hero-glow top-1/4 left-1/4 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="hero-glow bottom-1/4 right-1/4 translate-x-1/2 translate-y-1/2" style="background:radial-gradient(circle,rgba(201,168,76,0.04) 0%,transparent 70%)"></div>

    <!-- Decorative horizontal line -->
    <div class="absolute top-1/2 left-0 right-0 gold-line opacity-20"></div>

    <div class="relative z-10 w-full max-w-5xl mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-12 md:gap-16">

            <!-- Kiri: Foto Profil -->
            <div class="flex-shrink-0 animate-fade-in" style="animation-delay:0.3s">
                <div class="relative">
                    <!-- Ring dekorasi luar -->
                    <div class="absolute -inset-4 rounded-full border border-[#C9A84C] opacity-15"></div>
                    <div class="absolute -inset-2 rounded-full border border-[#C9A84C] opacity-25"></div>

                    <!-- Foto -->
                    <div class="relative w-52 h-52 md:w-64 md:h-64 rounded-full overflow-hidden border-2 border-[#C9A84C] border-opacity-40"
                         style="box-shadow: 0 0 60px rgba(201,168,76,0.2);">
                        <img src="{{ asset('images/foto-profil.jpg') }}"
                             alt="Foto Ferro Aprianto"
                             class="w-full h-full object-cover object-center"
                             onerror="this.style.display='none'; document.getElementById('hero-placeholder').style.display='flex';">

                        <!-- Placeholder jika foto belum ada -->
                        <div id="hero-placeholder"
                             class="absolute inset-0 hidden items-center justify-center bg-[#111] flex-col gap-2">
                            <span class="text-6xl">👤</span>
                            <span class="text-[#444] text-xs font-mono">foto-profil.jpg</span>
                        </div>
                    </div>

                    <!-- Badge status online -->
                    <div class="absolute bottom-3 right-3 flex items-center gap-1.5 bg-[#111] border border-[#2a2a2a] px-3 py-1.5 rounded-full"
                         style="box-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs text-[#888] font-mono">Available</span>
                    </div>
                </div>
            </div>

            <!-- Kanan: Teks -->
            <div class="flex-1 text-center md:text-left">
                <!-- Pre-title -->
                <p class="section-num mb-5 animate-fade-in" style="animation-delay:0.2s">
                    &lt; welcome to my portfolio /&gt;
                </p>

                <!-- Main heading -->
                <h1 class="font-display text-5xl sm:text-6xl md:text-7xl font-light leading-tight mb-4 animate-fade-up" style="animation-delay:0.4s">
                    Hi, saya <span class="gold-text font-semibold">Ferro</span>
                </h1>

                <!-- Typing animation row -->
                <div class="flex items-center justify-center md:justify-start gap-3 mb-8 animate-fade-up" style="animation-delay:0.6s">
                    <span class="text-[#444] font-mono text-sm hidden sm:block">~ $</span>
                    <div class="font-mono text-lg sm:text-2xl text-[#C9A84C] min-h-[2rem] flex items-center">
                        <span id="typed-text"></span>
                        <span id="typed-cursor"></span>
                    </div>
                </div>

                <!-- Sub description -->
                <p class="text-[#666] text-base sm:text-lg max-w-xl mb-10 leading-relaxed animate-fade-up mx-auto md:mx-0" style="animation-delay:0.8s">
                    Mahasiswa IT yang bersemangat membangun solusi digital —
                    dari web app hingga sistem AI.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start animate-fade-up" style="animation-delay:1s">
                    <a href="{{ route('cv.download') }}" class="btn-gold px-8 py-3.5 rounded-full text-sm tracking-wider inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 16v-8m0 8l-3-3m3 3l3-3M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2"/></svg>
                        Download CV
                    </a>
                    <a href="#contact" class="btn-ghost px-8 py-3.5 rounded-full text-sm tracking-wider inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        Hubungi Saya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-fade-in" style="animation-delay:1.5s">
        <span class="text-[#444] text-xs tracking-widest">SCROLL</span>
        <div class="w-px h-12 bg-gradient-to-b from-[#C9A84C] to-transparent"></div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     ABOUT ME SECTION
════════════════════════════════════════════════════════════ -->
<section id="about" class="relative py-28 px-6">
    <div class="max-w-6xl mx-auto">

        <div class="grid md:grid-cols-2 gap-16 items-center">

            <!-- Left: Text -->
            <div>
                <p class="section-num mb-4 reveal">01 — About Me</p>
                <h2 class="font-display text-4xl sm:text-5xl font-light leading-snug mb-6 reveal reveal-delay-1">
                    Membangun solusi<br><em class="gold-text not-italic font-semibold">dari baris kode</em>
                </h2>
                <div class="gold-line mb-8 w-24 reveal reveal-delay-2"></div>
                <p class="text-[#999] leading-relaxed mb-5 reveal reveal-delay-2">
                    Saya adalah seorang <strong class="text-[#E8E8E0]">mahasiswa IT</strong> yang sangat tertarik memecahkan masalah nyata melalui teknologi. Saya percaya bahwa kode yang baik bukan hanya soal fungsi — tapi tentang menciptakan pengalaman yang bermakna.
                </p>
                <p class="text-[#999] leading-relaxed reveal reveal-delay-3">
                    Dengan latar belakang yang mencakup pengembangan web, desain sistem OOP, manajemen database, hingga eksplorasi AI/ML, saya selalu berusaha untuk memahami setiap lapisan teknologi — dari antarmuka pengguna hingga arsitektur backend dan model kecerdasan buatan.
                </p>
            </div>

            <!-- Right: Skill cards -->
            <div class="grid grid-cols-2 gap-4">
                @foreach($skills as $i => $skill)
                <div class="skill-card rounded-2xl p-6 relative overflow-hidden reveal reveal-delay-{{ $i + 1 }}">
                    <div class="deco-corner deco-tl"></div>
                    <div class="deco-corner deco-br"></div>
                    <div class="text-3xl mb-3">{{ $skill['icon'] }}</div>
                    <h3 class="font-body font-semibold text-[#E8E8E0] text-sm mb-1">{{ $skill['name'] }}</h3>
                    <p class="text-[#555] text-xs">{{ $skill['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Gold divider -->
<div class="max-w-6xl mx-auto px-6"><div class="gold-line opacity-20"></div></div>

<!-- ════════════════════════════════════════════════════════════
     PROJECTS SECTION
════════════════════════════════════════════════════════════ -->
<section id="projects" class="py-28 px-6">
    <div class="max-w-6xl mx-auto">

        <!-- Section header -->
        <div class="text-center mb-16">
            <p class="section-num mb-4 reveal">02 — Projects</p>
            <h2 class="font-display text-4xl sm:text-5xl font-light reveal reveal-delay-1">
                Karya yang Pernah<br><span class="gold-text font-semibold">Saya Bangun</span>
            </h2>
        </div>

        <!-- Project grid -->
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($projects as $i => $project)
            <div class="project-card rounded-2xl p-7 relative overflow-hidden reveal reveal-delay-{{ ($i % 2) + 1 }}">
                <!-- Top accent bar -->
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r {{ $project['color'] }} opacity-60"></div>

                <!-- Icon + title row -->
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $project['color'] }} flex items-center justify-center text-xl flex-shrink-0 shadow-lg">
                        {{ $project['icon'] }}
                    </div>
                    <div>
                        <h3 class="font-body font-semibold text-[#E8E8E0] text-lg leading-tight">{{ $project['title'] }}</h3>
                        <span class="text-[#C9A84C] text-xs font-mono mt-0.5 block">{{ $project['role'] }}</span>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-[#777] text-sm leading-relaxed mb-5">{{ $project['description'] }}</p>

                <!-- Tech tags -->
                <div class="flex flex-wrap gap-2">
                    @foreach($project['tech'] as $tech)
                        <span class="tech-tag">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gold divider -->
<div class="max-w-6xl mx-auto px-6"><div class="gold-line opacity-20"></div></div>

<!-- ════════════════════════════════════════════════════════════
     CONTACT SECTION
════════════════════════════════════════════════════════════ -->
<section id="contact" class="py-28 px-6">
    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-14">
            <p class="section-num mb-4 reveal">03 — Contact</p>
            <h2 class="font-display text-4xl sm:text-5xl font-light mb-4 reveal reveal-delay-1">
                Mari <span class="gold-text font-semibold">Berkolaborasi</span>
            </h2>
            <p class="text-[#666] reveal reveal-delay-2">
                Punya ide project atau ingin diskusi? Kirim pesan dan saya akan segera merespons.
            </p>
        </div>

        <!-- Flash messages -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl border border-emerald-800 bg-emerald-950/50 text-emerald-400 text-sm reveal">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl border border-red-800 bg-red-950/50 text-red-400 text-sm reveal">
                {{ session('error') }}
            </div>
        @endif

        <!-- Contact form -->
        <div class="relative rounded-2xl overflow-hidden reveal reveal-delay-2">
            <div class="deco-corner deco-tl"></div>
            <div class="deco-corner deco-br"></div>
            <div class="bg-[#111] border border-[#222] rounded-2xl p-8">
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-5">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-xs tracking-widest text-[#555] uppercase mb-2">Nama</label>
                            <input type="text" id="name" name="name"
                                   value="{{ old('name') }}"
                                   placeholder="John Doe"
                                   class="form-input w-full px-4 py-3 rounded-xl text-sm @error('name') border-red-700 @enderror">
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-xs tracking-widest text-[#555] uppercase mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="john@example.com"
                                   class="form-input w-full px-4 py-3 rounded-xl text-sm @error('email') border-red-700 @enderror">
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-xs tracking-widest text-[#555] uppercase mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="5"
                                  placeholder="Halo ferro, saya tertarik untuk..."
                                  class="form-input w-full px-4 py-3 rounded-xl text-sm resize-none @error('message') border-red-700 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-gold w-full py-3.5 rounded-xl text-sm tracking-wider font-semibold">
                        Kirim Pesan →
                    </button>
                </form>
            </div>
        </div>

        <!-- Social icons -->
        <div class="mt-14 text-center reveal reveal-delay-3">
            <p class="text-[#444] text-xs tracking-widest uppercase mb-6">Find me on</p>
            <div class="flex justify-center gap-4">
                <!-- GitHub -->
                <a href="https://github.com/FerroAprianto" target="_blank" rel="noopener" class="social-icon" aria-label="GitHub">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.75.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49.99.11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 013-.4c1.02 0 2.04.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.66 1.66.24 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.7.83.58C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/>
                    </svg>
                </a>
                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/in/ferro-aprianto-683a60325/" target="_blank" rel="noopener" class="social-icon" aria-label="LinkedIn">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.07 2.07 0 110-4.14 2.07 2.07 0 010 4.14zM6.62 20.45H4.05V9h2.57v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0z"/>
                    </svg>
                </a>
                <!-- Instagram -->
                <a href="https://www.instagram.com/franpnn/" target="_blank" rel="noopener" class="social-icon" aria-label="Instagram">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                </a>
                <!-- Email -->
                <a href="mailto:ferroaprianto24@gmail.com" class="social-icon" aria-label="Email">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════════════════ -->
<footer class="border-t border-[#1a1a1a] py-8 px-6">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
        <span class="font-display text-xl gold-text">Ferro</span>
        <p class="text-[#3a3a3a] text-xs font-mono">
            &copy; {{ date('Y') }} Ferro. Crafted with Laravel & Tailwind CSS.
        </p>
        <a href="#hero" class="text-[#444] hover:text-[#C9A84C] transition-colors text-xs tracking-widest">↑ BACK TO TOP</a>
    </div>
</footer>


<!-- ════════════════════════════════════════════════════════════
     JAVASCRIPT
════════════════════════════════════════════════════════════ -->
<script>
(function () {
    'use strict';

    /* ── 1. Navbar scroll effect ─────────────────────────── */
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });

    /* ── 2. Mobile menu toggle ───────────────────────────── */
    const menuBtn   = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen  = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    menuBtn.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('open');
        iconOpen.classList.toggle('hidden', isOpen);
        iconClose.classList.toggle('hidden', !isOpen);
    });

    // Close mobile menu on link click
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
        });
    });

    /* ── 3. Typing animation ─────────────────────────────── */
    const phrases   = ['Web Developer', 'AI Enthusiast', 'Database Engineer'];
    const typedEl   = document.getElementById('typed-text');
    let phraseIndex = 0;
    let charIndex   = 0;
    let isDeleting  = false;
    let isPausing   = false;

    function type() {
        if (isPausing) return;

        const current = phrases[phraseIndex];

        if (!isDeleting) {
            typedEl.textContent = current.slice(0, ++charIndex);
            if (charIndex === current.length) {
                isPausing = true;
                setTimeout(() => { isPausing = false; isDeleting = true; }, 2000);
            }
        } else {
            typedEl.textContent = current.slice(0, --charIndex);
            if (charIndex === 0) {
                isDeleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
            }
        }

        setTimeout(type, isDeleting ? 50 : 80);
    }
    setTimeout(type, 1200);

    /* ── 4. Scroll reveal (IntersectionObserver) ─────────── */
    const revealEls = document.querySelectorAll('.reveal');
    const observer  = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    revealEls.forEach(el => observer.observe(el));

    /* ── 5. Smooth scroll to contact after form submit ───── */
    @if(session('scroll_to'))
        document.addEventListener('DOMContentLoaded', () => {
            const target = document.getElementById('{{ session('scroll_to') }}');
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    @endif

})();
</script>

</body>
</html>
