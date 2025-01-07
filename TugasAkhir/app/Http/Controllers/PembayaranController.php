<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::whereHas('pesanan', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('pesanan')->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create($pesanan_id)
    {
        $pesanan = Pesanan::findOrFail($pesanan_id);

        $kodePembayaran = $this->generateRandomString(12);

        return view('pembayaran.create', compact('pesanan', 'kodePembayaran'));
    }

    private function generateRandomString($length = 12)
    {
        return substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / 36))), 1, $length);
    }

    public function store(StorePembayaranRequest $request)
    {
        $data = $request->validated();
        $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
        Pembayaran::create($data);
        return redirect()->route('pesanan.index')->with('success', 'Pembayaran berhasil dibuat.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        $data = $request->validated();
        if ($request->hasFile('bukti_transfer')) {
            $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
        }
        $data['status'] = 'pending';
        $pembayaran->update($data);
        return redirect()->route('pesanan.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pembayaran berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:success,failed', // Pastikan status hanya bisa success atau failed
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = $request->input('status');
        $pembayaran->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
