<?php

namespace App\Http\Controllers;

use App\Models\Pengajaran;
use App\Models\DetailPengajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengajaranController extends Controller
{
    public function LihatData()
    {
        try {
            $pengajaran = Pengajaran::with(['dosen', 'matakuliah', 'kelas'])->get();
            return response()->json([
                'success' => true,
                'data' => $pengajaran
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // TAMBAHKAN METHOD INI UNTUK GET DATA BY ID
    public function LihatDataById($id)
    {
        try {
            $pengajaran = Pengajaran::with(['dosen', 'matakuliah', 'kelas'])->find($id);

            if (!$pengajaran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengajaran tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $pengajaran
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function SimpanData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_pengajaran' => 'required|size:8|unique:pengajaran',
                'id_dosen' => 'required|exists:dosen,id_dosen',
                'id_matakuliah' => 'required|exists:matakuliah,id_matakuliah',
                'id_kelas' => 'required|exists:kelas,id_kelas',
                'tahun_ajar' => 'required|integer|min:2000|max:2100',
                'semester' => 'required|in:Ganjil,Genap'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $pengajaran = Pengajaran::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Pengajaran berhasil disimpan',
                'data' => $pengajaran
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function EditData(Request $request, $id)
    {
        try {
            // CARI DATA PENGAJARAN
            $pengajaran = Pengajaran::find($id);

            if (!$pengajaran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengajaran tidak ditemukan'
                ], 404);
            }

            // VALIDASI YANG LEBIH SIMPLE
            $validator = Validator::make($request->all(), [
                'id_dosen' => 'sometimes|exists:dosen,id_dosen',
                'id_matakuliah' => 'sometimes|exists:matakuliah,id_matakuliah',
                'id_kelas' => 'sometimes|exists:kelas,id_kelas',
                'tahun_ajar' => 'sometimes|integer|min:2000|max:2100',
                'semester' => 'sometimes|in:Ganjil,Genap'
            ], [
                'id_dosen.exists' => 'Dosen tidak ditemukan dalam sistem',
                'id_matakuliah.exists' => 'Mata kuliah tidak ditemukan dalam sistem',
                'id_kelas.exists' => 'Kelas tidak ditemukan dalam sistem',
                'semester.in' => 'Semester harus Ganjil atau Genap'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // UPDATE DATA
            $pengajaran->update($request->all());

            // LOAD RELASI TERBARU
            $pengajaran->load(['dosen', 'matakuliah', 'kelas']);

            return response()->json([
                'success' => true,
                'message' => 'Pengajaran berhasil diupdate',
                'data' => $pengajaran
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function HapusData($id)
    {
        try {
            $pengajaran = Pengajaran::find($id);

            if (!$pengajaran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengajaran tidak ditemukan'
                ], 404);
            }

            $pengajaran->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pengajaran berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // DETAIL PENGAJARAN METHODS
    public function LihatDetailData($id_pengajaran)
    {
        try {
            $detail = DetailPengajaran::where('id_pengajaran', $id_pengajaran)
                ->with('pengajaran')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $detail
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function SimpanDetailData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_pengajaran' => 'required|exists:pengajaran,id_pengajaran',
                'tanggal' => 'required|date',
                'jenis_kegiatan' => 'required|in:Perkuliahan,UTS,UAS,Kosong',
                'pertemuan' => 'required|integer|min:1',
                'honor_pertemuan' => 'required|numeric|min:0',
                'total_honor' => 'required|numeric|min:0'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $detail = DetailPengajaran::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Detail pengajaran berhasil disimpan',
                'data' => $detail
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan detail pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function EditDetailData(Request $request, $id)
    {
        try {
            $detail = DetailPengajaran::find($id);

            if (!$detail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Detail pengajaran tidak ditemukan'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'tanggal' => 'sometimes|date',
                'jenis_kegiatan' => 'sometimes|in:Perkuliahan,UTS,UAS,Kosong',
                'pertemuan' => 'sometimes|integer|min:1',
                'honor_pertemuan' => 'sometimes|numeric|min:0',
                'total_honor' => 'sometimes|numeric|min:0'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $detail->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Detail pengajaran berhasil diupdate',
                'data' => $detail->load('pengajaran')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate detail pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function HapusDetailData($id)
    {
        try {
            $detail = DetailPengajaran::find($id);

            if (!$detail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Detail pengajaran tidak ditemukan'
                ], 404);
            }

            $detail->delete();

            return response()->json([
                'success' => true,
                'message' => 'Detail pengajaran berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus detail pengajaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
