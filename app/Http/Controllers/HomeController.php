<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
       
        $projects = Project::visible()->get();

        $skills = [
            ['name' => 'Web Development', 'icon' => '🌐', 'desc' => 'Front-End & Back-End'],
            ['name' => 'OOP Design',      'icon' => '⚙️', 'desc' => 'Object-Oriented Programming'],
            ['name' => 'Database (SQL)',  'icon' => '🗄️', 'desc' => 'Database Management'],
            ['name' => 'AI / ML',         'icon' => '🧠', 'desc' => 'Artificial Intelligence'],
        ];

        return view('home', compact('projects', 'skills'));
    }

    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|min:2|max:100',
            'email'   => 'required|email|max:150',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required'    => 'Nama wajib diisi.',
            'name.min'         => 'Nama minimal 2 karakter.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min'      => 'Pesan minimal 10 karakter.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('scroll_to', 'contact');
        }

        try {
            Mail::to(config('mail.portfolio_recipient', 'ferroaprianto14@gmail.com'))
                ->send(new ContactMail($request->only('name', 'email', 'message')));

            return back()
                ->with('success', 'Pesan kamu berhasil terkirim! Saya akan segera membalasnya. 🚀')
                ->with('scroll_to', 'contact');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi atau hubungi langsung via email.')
                ->withInput()
                ->with('scroll_to', 'contact');
        }
    }

    public function downloadCV()
{
    $cvPath = public_path('files/cv-ferro.pdf');  

    if (file_exists($cvPath)) {
        return response()->download($cvPath, 'CV-Ferro-Aprianto.pdf'); 
    }

    return back()->with('error', 'File CV sedang tidak tersedia.');
}
}