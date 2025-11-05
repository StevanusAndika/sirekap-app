<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function LihatData()
    {
        try {
            $dosen = Dosen::with('user')->get();

            return response()->json([
                'success' => true,
                'data' => $dosen
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data dosen',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function SimpanData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_dosen' => 'required|size:6|unique:dosen',
                'nidn' => 'required|unique:dosen|max:20',
                'nama_dosen' => 'required|max:100',
                'gelar' => 'nullable|max:50',
                'no_hp' => 'nullable|max:15',
                'email' => 'required|email|max:100',
                'id_user' => 'required|exists:users,id_user'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $dosen = Dosen::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Dosen berhasil disimpan',
                'data' => $dosen
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan dosen',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function EditData(Request $request, $id)
{
    try {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'success' => false,
                'message' => 'Dosen tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nidn' => 'sometimes|unique:dosen,nidn,'.$id.',id_dosen',
            'nama_dosen' => 'sometimes|max:100',
            'gelar' => 'nullable|max:50',
            'no_hp' => 'nullable|max:15',
            'email' => 'sometimes|email|max:100',
            'id_user' => 'sometimes|exists:users,id_user'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $dosen->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Dosen berhasil diupdate',
            'data' => $dosen
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupdate dosen',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function HapusData($id)
    {
        try {
            $dosen = Dosen::find($id);

            if (!$dosen) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dosen tidak ditemukan'
                ], 404);
            }

            $dosen->delete();

            return response()->json([
                'success' => true,
                'message' => 'Dosen berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus dosen',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
