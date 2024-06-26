<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BadanAdhocDetail;
use Illuminate\Support\Facades\DB;

class BadanAdhocDetailController extends Controller
{
    public function index(Request $request)
    {
        $details = BadanAdhocDetail::all();

        $query = BadanAdhocDetail::query();

        if ($request->filled('posisi')) {
            $query->where('posisi', $request->posisi);
        }

        if ($request->filled('kabupaten_kota')) {
            $query->where('kabupaten_kota', $request->kabupaten_kota);
        }

        if ($request->filled('kecamatan')) {
            $query->where('kecamatan', $request->kecamatan);
        }

        if ($request->filled('kelurahan')) {
            $query->where('kelurahan', $request->kelurahan);
        }

        if ($request->filled('tps')) {
            $query->where('tps', $request->tps);
        }

        $details = $query->get();

        $totalDetailsCount = BadanAdhocDetail::count();
        $filteredDetailsCount = $details->count();

        return view('detailadhoc.index', compact('details', 'totalDetailsCount', 'filteredDetailsCount'));
    }

    public function create()
    {
        return view('detailadhoc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|in:PPK,PPS',
            'tps' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:badan_adhoc_details',
            'nik' => 'required|string|size:16|unique:badan_adhoc_details',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_bpjs_kesehatan' => 'required|string|unique:badan_adhoc_details',
            'no_bpjs_ketenagakerjaan' => 'required|string|unique:badan_adhoc_details',
            'npwp' => 'required|string|unique:badan_adhoc_details',
            'no_hp' => 'required|string|unique:badan_adhoc_details',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'agama' => 'required|string|max:255',
        ]);

        BadanAdhocDetail::create($request->all());

        return redirect()->route('badan_adhoc_details.index')->with('success', 'Detail badan ad/hoc berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $detail = BadanAdhocDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('badan_adhoc_details.index')->with('success', 'Detail badan ad/hoc berhasil dihapus');
    }



    public function chart(Request $request)
    {
        $query = BadanAdhocDetail::query();

        if ($request->filled('posisi')) {
            $query->where('posisi', $request->posisi);
        }

        $cities = $query->select('kabupaten_kota', DB::raw('count(*) as total'))
            ->groupBy('kabupaten_kota')
            ->pluck('total', 'kabupaten_kota')->all();

        $kecamatanData = $query->select(
            'kabupaten_kota',
            'kecamatan',
            'kelurahan',
            DB::raw('SUM(CASE WHEN posisi = "PPK" THEN 1 ELSE 0 END) as total_ppk'),
            DB::raw('SUM(CASE WHEN posisi = "PPS" THEN 1 ELSE 0 END) as total_pps')
        )
            ->groupBy('kabupaten_kota', 'kecamatan', 'kelurahan')
            ->get();

        $positions = ['' => 'Semua', 'PPK' => 'PPK', 'PPS' => 'PPS'];
        $selectedPosition = $request->input('posisi', '');

        return view('charts.badan_adhoc', compact('cities', 'kecamatanData', 'positions', 'selectedPosition'));
    }

    public function edit($id)
    {
        $detail = BadanAdhocDetail::findOrFail($id);
        return view('detailadhoc.edit', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|in:PPK,PPS',
            'tps' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:badan_adhoc_details,email,' . $id,
            'nik' => 'required|string|size:16|unique:badan_adhoc_details,nik,' . $id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_bpjs_kesehatan' => 'required|string|unique:badan_adhoc_details,no_bpjs_kesehatan,' . $id,
            'no_bpjs_ketenagakerjaan' => 'required|string|unique:badan_adhoc_details,no_bpjs_ketenagakerjaan,' . $id,
            'npwp' => 'required|string|unique:badan_adhoc_details,npwp,' . $id,
            'no_hp' => 'required|string|unique:badan_adhoc_details,no_hp,' . $id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'agama' => 'required|string|max:255',
        ]);

        $detail = BadanAdhocDetail::findOrFail($id);
        $detail->update($request->all());

        return redirect()->route('badan_adhoc_details.index')->with('success', 'Detail badan ad/hoc berhasil diperbarui');
    }
}