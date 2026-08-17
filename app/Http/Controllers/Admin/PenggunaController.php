<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::where('role', 'guru')->orderBy('name', 'asc')->get();
        return view('admin.pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'nip' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:255',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'guru';

        User::create($validated);

        return redirect()->route('admin.pengguna.index')->with('success', 'Akun guru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        // Not used currently
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        
        // Pastikan hanya bisa mengedit guru
        if ($user->role !== 'guru') {
            abort(403);
        }

        return view('admin.pengguna.create', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if ($user->role !== 'guru') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:6',
            'nip' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.pengguna.index')->with('success', 'Data akun guru berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->role !== 'guru') {
            abort(403);
        }

        $user->delete();

        return redirect()->route('admin.pengguna.index')->with('success', 'Akun guru berhasil dihapus.');
    }
}
