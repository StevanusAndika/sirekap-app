<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function LihatData()
    {
        try {
            $kelas = Kelas::all();
            return response()->json([
                'success' => true,
                'data' => $kelas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data kelas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function SimpanData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_kelas' => 'required|size:6|unique:kelas',
                'nama_kelas' => 'required|max:10',
                'kapasitas' => 'required|integer|min:1',
                'tahun_ajaran' => 'required|max:9',
                'semester' => 'required|in:ganjil,genap',
                'program_studi' => 'required|in:Rekayasa Perangkat Lunak,Sistem Informasi,Informatika,Kewirausahaan,Manajemen,Kebidanan',
                'jenjang' => 'required|in:S1,S2,D3'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $kelas = Kelas::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Kelas berhasil disimpan',
                'data' => $kelas
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan kelas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function EditData(Request $request, $id)
    {
        try {
            $kelas = Kelas::find($id);

            if (!$kelas) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kelas tidak ditemukan'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'nama_kelas' => 'sometimes|max:10',
                'kapasitas' => 'sometimes|integer|min:1',
                'tahun_ajaran' => 'sometimes|max:9',
                'semester' => 'sometimes|in:ganjil,genap',
                'program_studi' => 'sometimes|in:Rekayasa Perangkat Lunak,Sistem Informasi,Informatika,Kewirausahaan,Manajemen,Kebidanan',
                'jenjang' => 'sometimes|in:S1,S2,D3'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $kelas->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Kelas berhasil diupdate',
                'data' => $kelas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate kelas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function HapusData($id)
    {
        try {
            $kelas = Kelas::find($id);

            if (!$kelas) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kelas tidak ditemukan'
                ], 404);
            }

            $kelas->delete();

            return response()->json([
                'success' => true,
                'message' => 'Kelas berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus kelas',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
