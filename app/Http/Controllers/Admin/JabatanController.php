<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jabatan;
use Illuminate\Support\Facades\Gate as IlluminateGate;
use DataTables;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() {
        $this->middleware('auth');
        // OTORISASI GATE
        $this->middleware(function($request, $next){
            if(IlluminateGate::allows('manage-post')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }


    public function index()
    {
        return view('admin.admin_pengaduan.indexJabatan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data()
    {
        $query = Jabatan::orderBy('created_at','asc');
        return DataTables::of($query)
        ->addColumn('action', function ($list) {

                return '
                <center>

                <a href="' . route('jabatan.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                <a href="' . route('jabatan.destroy', $list->id) . '" OnClick="return AlertFunction();" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </center>
                ';


        })
        ->addIndexColumn('id')
        ->toJson();
    }

    public function create()
    {
        return view('admin.admin_pengaduan.createJabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'nama_jabatan'=>'required|string'

        ])->validate();

        $db = new Jabatan;
        $db->nama_jabatan = $request->get('nama_jabatan');

        $db->save();

        session()->flash('success', 'Jabatan Berhasil Ditambah.');
        return redirect()->route('jabatan.index');
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
        $data = Jabatan::find($id);

        return view('admin.admin_pengaduan.editJabatan', compact('data'));
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
        $validation = \Validator::make($request->all(),[
            'nama_jabatan'=>'required|string'

        ])->validate();

        $db = Jabatan::find($id);
        $db->nama_jabatan = $request->get('nama_jabatan');

        $db->update();


        session()->flash('success', 'Jabatan Berhasil Diupdate.');
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->route('jabatan.index');
    }
}
