<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $posts = TbPegawai::orderby('nip', 'asc')->paginate(10);
        if (Auth::user()->jabatan_user == 'Admin') {

            return view('admin.kelola-pegawai')->with('posts', $posts);
            // return view('petugas.kelola-pegawai',['posts', $posts]);


        } else if (Auth::user()->jabatan_user == 'Leader OB' || 'Komandan Regu') {
            if (Auth::user()->jabatan_user == 'Leader OB') {
                $users = TbPegawai::where('divisi', '=', 'Cleaning Service')->paginate(10);
                return view('petugas.kelola-pegawai')->with('posts', $users);
            } else {
                $users = TbPegawai::where('divisi', '=', 'Security')->paginate(10);
                return view('petugas.kelola-pegawai')->with('posts', $users);
            }


            // return view('petugas.kelola-pegawai',['posts', $posts]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form-pegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama_pegawai', $request->nama);
        Session::flash('divisi', $request->divisi);

        $request->validate([
            'nip' => 'required|numeric|unique:tb_pegawai,nip',
            'nama' => 'required',
            'divisi' => 'in:1,2',
        ], [
            'nip.required' => 'NIP wajib diisi',
            'nip.numeric' => 'NIP wajib dalam angka',
            'nip.unique' => 'NIP sudah ada',
            'nama.required' => 'Nama Pegawai wajib diisi',
            'divisi.in' => 'Divisi wajib dipilih',
        ]);
        $data = [
            'nip' => $request->nip,
            'nama_pegawai' => $request->nama,
            'divisi' => $request->divisi,
        ];
        TbPegawai::create($data);
        return redirect('admin/kelola-pegawai')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TbPegawai::where('nip', $id)->first();
        return view('admin.edit-pegawai')->with('data', $data);
        // return 'Hi' .$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'divisi' => 'in:1,2',
        ], [
            'nama.required' => 'Nama Pegawai wajib diisi',
            'divisi.in' => 'Divisi wajib dipilih',
        ]);
        $data = [
            'nama_pegawai' => $request->nama,
            'divisi' => $request->divisi,
        ];
        TbPegawai::where('nip', $id)->update($data);
        return redirect('admin/kelola-pegawai')->with('success', 'Berhasil Melakukan Ubah Data');
        //return 'HI' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TbPegawai::where('nip', $id)->delete();
        return redirect()->to('admin/kelola-pegawai')->with('success', 'Berhasil Melakukan Hapus Data');
    }
}
