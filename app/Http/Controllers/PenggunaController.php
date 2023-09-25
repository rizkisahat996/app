<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::get()->where('jabatan', '<>', 'superadmin');
        return view('pages.pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengguna.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'jabatan' => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
        // dd($validatedData);
 
        User::create($validatedData);
        alert()->success('Berhasil','Berhasil Menambahkan Pengguna');
        return redirect('/pengguna');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', '=', $id)->first();
        // dd($data);
        
        return view('pages.pengguna.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $pengguna = User::where('id', '=', $id);

        $pengguna->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($request->has('password'))
        {
            $pengguna->update([
                'password' => Hash::make($request->password)
            ]);
        }

        alert()->success('Berhasil', 'Berhasil Mengedit Pengguna');

        return redirect('/pengguna');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = pengguna::find($id);
        $pengguna->delete();
        alert()->success('Berhasil','Berhasil Menghapus Pengguna');

        return Redirect::back();
    }
    public function login(){
        return view('pages.auth.login');
    }
    public function attemp(Request $request){
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            alert()->success('Berhasil','Berhasil Login');
            return redirect('/dashboard');
        }
        
        else{
            alert()->error('Gagal', 'Username atau password anda salah');
            return back();
        }
    }
    
    public function logout(){
        Session::flush();
        
        Auth::logout();
        alert()->success('Berhasil','Berhasil Logout');
        return redirect('/');
    }
}
