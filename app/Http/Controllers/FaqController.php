<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the FAQs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_name === 'User') {
            // Hanya ambil data FAQ milik user yang sedang login
            $faqs = Faq::where('user_id', auth()->user()->id)->get();
        } else {
            // Jika bukan role User (misalnya Admin), ambil semua data
            $faqs = Faq::all();
        }

        return view('faqs.index', compact('faqs'));
    }


    /**
     * Show the form for creating a new FAQ.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created FAQ in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Ambil data user yang sedang login
        $user = Auth::user();

        // Buat FAQ baru
        Faq::create([
            'user_id' => $user->id, // Ambil user_id dari user yang sedang login
            'name' => $user->name,  // Ambil name dari user yang login
            'email' => $user->email, // Ambil email dari user yang login
            'subject' => $request->subject,
            'message' => $request->message,
            'answer' => null, // Nullable, jawabannya bisa ditambahkan nanti
        ]);

        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the FAQ answer.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ's answer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        // Validasi input
        $request->validate([
            'answer' => 'nullable|string', // Jawaban nullable
        ]);

        // Update answer pada FAQ
        $faq->update([
            'answer' => $request->answer,
        ]);

        return redirect()->route('faqs.index')->with('success', 'Jawaban FAQ berhasil diperbarui.');
    }
}
