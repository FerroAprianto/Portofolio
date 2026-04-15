<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Pilihan warna gradient untuk card project
    const COLORS = [
        'from-amber-500 to-orange-600'   => '🟠 Amber → Orange',
        'from-emerald-500 to-teal-600'   => '🟢 Emerald → Teal',
        'from-blue-500 to-indigo-600'    => '🔵 Blue → Indigo',
        'from-purple-500 to-pink-600'    => '🟣 Purple → Pink',
        'from-rose-500 to-red-600'       => '🔴 Rose → Red',
        'from-cyan-500 to-blue-600'      => '🩵 Cyan → Blue',
        'from-yellow-500 to-amber-600'   => '🟡 Yellow → Amber',
        'from-violet-500 to-purple-600'  => '💜 Violet → Purple',
    ];

    /** Daftar semua project */
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /** Form tambah project baru */
    public function create()
    {
        $colors = self::COLORS;
        return view('admin.projects.create', compact('colors'));
    }

    /** Simpan project baru ke database */
    public function store(Request $request)
    {
        $validated = $this->validateProject($request);
        $validated['tech'] = $this->parseTech($request->input('tech_raw', ''));

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "' . $validated['title'] . '" berhasil ditambahkan! 🎉');
    }

    /** Form edit project */
    public function edit(Project $project)
    {
        $colors   = self::COLORS;
        $techRaw  = implode(', ', $project->tech ?? []);
        return view('admin.projects.edit', compact('project', 'colors', 'techRaw'));
    }

    /** Update project di database */
    public function update(Request $request, Project $project)
    {
        $validated = $this->validateProject($request, $project->id);
        $validated['tech'] = $this->parseTech($request->input('tech_raw', ''));

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "' . $project->title . '" berhasil diperbarui! ✅');
    }

    /** Hapus project */
    public function destroy(Project $project)
    {
        $title = $project->title;
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "' . $title . '" berhasil dihapus.');
    }

    /** Toggle visibility project */
    public function toggleVisibility(Project $project)
    {
        $project->update(['is_visible' => !$project->is_visible]);
        $status = $project->is_visible ? 'ditampilkan' : 'disembunyikan';

        return back()->with('success', 'Project "' . $project->title . '" berhasil ' . $status . '.');
    }

    // ── Private helpers ─────────────────────────────────────

    private function validateProject(Request $request, $ignoreId = null): array
    {
        return $request->validate([
            'title'       => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'role'        => 'required|string|max:100',
            'icon'        => 'required|string|max:10',
            'color'       => 'required|string',
            'demo_url'    => 'nullable|url|max:255',
            'github_url'  => 'nullable|url|max:255',
            'is_visible'  => 'boolean',
            'sort_order'  => 'integer|min:0',
        ], [
            'title.required'       => 'Nama project wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'role.required'        => 'Peran wajib diisi.',
            'icon.required'        => 'Icon wajib diisi.',
            'color.required'       => 'Warna wajib dipilih.',
            'demo_url.url'         => 'URL demo harus berupa link valid.',
            'github_url.url'       => 'URL GitHub harus berupa link valid.',
        ]);
    }

    private function parseTech(string $raw): array
    {
        // Input: "Laravel, MySQL, Tailwind CSS" → ['Laravel', 'MySQL', 'Tailwind CSS']
        return array_values(array_filter(
            array_map('trim', explode(',', $raw))
        ));
    }
}