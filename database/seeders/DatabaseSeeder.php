<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Buat akun admin default ──────────────────────────
        Admin::firstOrCreate(
            ['email' => 'admin@portfolio.com'],
            [
                'name'     => 'Ant Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        // ── Seed data project awal ───────────────────────────
        $projects = [
            [
                'title'       => 'FFKS MART',
                'description' => 'Sistem e-commerce / toko online untuk memudahkan transaksi jual beli secara digital dengan fitur manajemen produk, keranjang belanja, dan sistem pembayaran terintegrasi.',
                'role'        => 'Full-Stack Developer',
                'tech'        => ['Laravel', 'MySQL', 'Tailwind CSS', 'JavaScript'],
                'icon'        => '🛒',
                'color'       => 'from-amber-500 to-orange-600',
                'sort_order'  => 1,
            ],
            [
                'title'       => 'AI Waste Identifier',
                'description' => 'Model kecerdasan buatan berbasis computer vision untuk mendeteksi dan memilah tumpukan sampah organik dan anorganik secara real-time menggunakan kamera.',
                'role'        => 'AI Engineer',
                'tech'        => ['Google Teachable Machine', 'TensorFlow.js', 'HTML', 'CSS'],
                'icon'        => '🤖',
                'color'       => 'from-emerald-500 to-teal-600',
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Train Company Web App',
                'description' => 'Aplikasi web interaktif yang memuat profil lengkap dan informasi layanan perusahaan kereta api dengan tampilan modern dan responsif.',
                'role'        => 'Front-End Developer',
                'tech'        => ['HTML', 'CSS', 'JavaScript', 'Bootstrap'],
                'icon'        => '🚂',
                'color'       => 'from-blue-500 to-indigo-600',
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Digital Printing E-commerce',
                'description' => 'Sistem pemesanan percetakan digital terintegrasi dengan manajemen hak akses multi-actor untuk Customer, Staff, dan Manager secara terpisah.',
                'role'        => 'System Analyst & Backend Developer',
                'tech'        => ['PHP', 'MySQL', 'CSS', 'JavaScript'],
                'icon'        => '🖨️',
                'color'       => 'from-purple-500 to-pink-600',
                'sort_order'  => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(['title' => $project['title']], $project);
        }
    }
}