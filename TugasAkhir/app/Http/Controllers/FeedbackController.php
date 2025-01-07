<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;

class FeedbackController extends Controller
{
    public function create($pesanan_id)
    {
        $pesanan = Pesanan::findOrFail($pesanan_id);
        return view('feedback.create', compact('pesanan'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        Feedback::create([
            'pesanan_id' => $request->pesanan_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit(Feedback $feedback)
    {
        if (auth()->user()->id !== $feedback->pesanan->user->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        return view('feedback.edit', compact('feedback'));
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        if (auth()->user()->id !== $feedback->pesanan->user->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $feedback->update($request->validated());

        return redirect()
            ->route('feedback.show', $feedback->pesanan->layanan_id)
            ->with('success', 'Feedback berhasil diperbarui.');
    }

    public function destroy(Feedback $feedback)
    {
        if (auth()->user()->id !== $feedback->pesanan->user->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $feedback->delete();

        return redirect()
            ->route('feedback.show', $feedback->pesanan->layanan_id)
            ->with('success', 'Feedback berhasil dihapus.');
    }

    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        $feedbacks = Feedback::whereHas('pesanan', function ($query) use ($layanan) {
            $query->where('layanan_id', $layanan->id);
        })->get();

        return view('feedback.show', compact('layanan', 'feedbacks'));
    }
}
