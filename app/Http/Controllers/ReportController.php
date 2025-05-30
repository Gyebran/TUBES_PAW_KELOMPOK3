<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'karya_id' => 'required|exists:karya,karya_id',
            'alasan' => 'required|string',
        ]);

        $report = Report::create([
            'reporter_id' => auth()->id(),
            'karya_id' => $request->karya_id,
            'alasan' => $request->alasan,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim');
    }

    public function index()
    {
        $reports = Report::with(['karya', 'reporter'])->latest()->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->handled_by = auth()->id(); // admin ID
        $report->save();

        return redirect()->back()->with('success', 'Status laporan diperbarui');
    }
}
