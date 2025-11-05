<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function LihatData()
    {
        try {
            $users = User::all();
            return response()->json([
                'success' => true,
                'data' => $users
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function SimpanData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:users|max:50',
                'email' => 'required|email|unique:users|max:100',
                'password' => 'required|min:6',
                'role' => 'required|in:admin,operator,kaprodi,dosen'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'is_active' => $request->is_active ?? 1,
                'ls_lock' => $request->ls_lock ?? 0
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil disimpan',
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function EditData(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'username' => 'sometimes|unique:users,username,'.$id.',id_user',
                'email' => 'sometimes|email|unique:users,email,'.$id.',id_user',
                'password' => 'sometimes|min:6',
                'role' => 'sometimes|in:admin,operator,kaprodi,dosen',
                'is_active' => 'sometimes|boolean',
                'ls_lock' => 'sometimes|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $updateData = $request->all();
            if (isset($updateData['password'])) {
                $updateData['password'] = Hash::make($updateData['password']);
            }

            $user->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil diupdate',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function HapusData($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
