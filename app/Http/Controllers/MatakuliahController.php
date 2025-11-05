<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    public function LihatData()
    {
        try {
            $matakuliah = Matakuliah::with('dosen')->get();
            return response()->json([
                'success' => true,
                'data' => $matakuliah
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data matakuliah',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function SimpanData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_matakuliah' => 'required|size:6|unique:matakuliah',
                'kode_matakuliah' => 'required|unique:matakuliah|max:10',
                'nama_matakuliah' => 'required|max:100',
                'sks' => 'required|integer|min:1',
                'semester' => 'required|integer|min:1|max:14',
                'jenis' => 'required|in:teori,praktikum,seminar,mbkm',
                'id_dosen' => 'required|exists:dosen,id_dosen',
                'jenis_dosen' => 'required|in:pengampu,pengajaran'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $matakuliah = Matakuliah::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Matakuliah berhasil disimpan',
                'data' => $matakuliah
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan matakuliah',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function EditData(Request $request, $id)
    {
        try {
            $matakuliah = Matakuliah::find($id);

            if (!$matakuliah) {
                return response()->json([
                    'success' => false,
                    'message' => 'Matakuliah tidak ditemukan'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'kode_matakuliah' => 'sometimes|unique:matakuliah,kode_matakuliah,'.$id.',id_matakuliah',
                'nama_matakuliah' => 'sometimes|max:100',
                'sks' => 'sometimes|integer|min:1',
                'semester' => 'sometimes|integer|min:1|max:14',
                'jenis' => 'sometimes|in:teori,praktikum,seminar,mbkm',
                'id_dosen' => 'sometimes|exists:dosen,id_dosen',
                'jenis_dosen' => 'sometimes|in:pengampu,pengajaran'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $matakuliah->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Matakuliah berhasil diupdate',
                'data' => $matakuliah->load('dosen')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate matakuliah',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function HapusData($id)
    {
        try {
            $matakuliah = Matakuliah::find($id);

            if (!$matakuliah) {
                return response()->json([
                    'success' => false,
                    'message' => 'Matakuliah tidak ditemukan'
                ], 404);
            }

            $matakuliah->delete();

            return response()->json([
                'success' => true,
                'message' => 'Matakuliah berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus matakuliah',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
