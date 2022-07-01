<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function formDaftar()
    {
        $data['objek'] = new \App\Siswa();
       // $data['action']='SiswaController@simpanDaftar';
        $data['method']='POST';
        return view('daftar_form', $data);
    }

    public function simpanDaftar(Request $request) 
    {
        $request->validate(
            [
                'nama'          =>      'required',
                'jenis_kelamin' =>      'required',
                'tanggal_lahir' =>      'required',
                'email'         =>      'required|email|unique:siswas,email',
                'password'      =>      'required',
                'asal_sekolah'  =>      'required',
                'foto'          =>      'required|mimes:png,jpg,jpeg',
                'jurusan_id'    =>      'required'
            ]
        );
        $path = $request->file('foto')->store('foto-siswa');
        $siswa = new \App\Siswa();
        $siswa->nama    =   $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->email         = $request->email;
        $siswa->password      = bcrypt($request->password);
        $siswa->asal_sekolah  = $request->asal_sekolah;
        $siswa->foto          = $path;
        $siswa->save();

        $regitrasi = new \App\Registrasi();
        $regitrasi->user_id = 0;
        $registrasi->siswa_id = $siswa->id;
        $registrasi->jurusan_id = $request->jurusan_id;
        $registrasi->status     = 'baru';
        $registrasi->save();
    }

    public function hasilDaftar()
    {
    }
}
