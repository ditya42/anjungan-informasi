<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jabatan;
use App\pengaduan;
use DataTables;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as IlluminateGate;
use Illuminate\Support\Str;

class AdminPengaduanController extends Controller
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
        return view('admin.admin_pengaduan.index');
    }

    public function data()
    {
        $query = pengaduan::with('User', 'jabatan')->orderBy('created_at','desc');
        return DataTables::of($query)
        ->editColumn('perbuatan', function ($data) {
            return Str::limit($data->perbuatan, 30);
        })
        ->addColumn('action', function ($list) {

                return '
                <center>
                <a href="' . route('AdminPengaduan.show', $list->id) . '"  class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                <a href="' . route('AdminPengaduan.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                <a href="' . route('AdminPengaduan.destroy', $list->id) . '" OnClick="return AlertFunction();" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </center>
                ';


        })->addColumn('file', function ($list) {
            if($list->file){
                return '
                <center>
                <a href="' . route('FilePengaduan.destroy', $list->id) . '"></i>Hapus File</a>

                </center>
                ';
            }else{
                return '
                <center>
                <p>File Tidak Ada</p>
                </center>
                ';
            }
        }) ->rawColumns(['file', 'action'])
        ->addIndexColumn('id')
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('admin.admin_pengaduan.create', compact('jabatan'));
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
            'nama'=>'nullable|string',
            'jabatan'=> 'required',
            'perbuatan' => 'required',
            'perkara' => 'nullable',
            'tanggapan' => 'nullable',
            'file_upload' => 'sometimes|mimes:pdf,jpg,jpeg,rar,mp4|max:25000'
        ])->validate();

        $db = new pengaduan;
        $db->nama_terlapor = $request->get('nama');
        $db->jabatan_id = $request->get('jabatan');
        $db->perbuatan = $request->get('perbuatan');
        $db->perkara = $request->get('perkara');

        if($request->get('tanggapan')){
            $db->tanggapan = $request->get('tanggapan');
            $db->status = "sudah";
        }else{
            $db->status = "belum";
        }


        $db->user_id = auth()->user()->id;

        if ($request->hasFile('file_upload')) {
            $unique_name = md5(time());
            $file = $unique_name . '-' . 'file.' . $request->file_upload->getClientOriginalExtension();
            $filename = $request->file('file_upload');
            $filename->move('files/file_upload_post', $file);

            $db->file = $file;
        }

        $db->save();

        session()->flash('success', 'Pengaduan Berhasil Ditambah.');
        return redirect()->route('AdminPengaduan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pengaduan::find($id);


       return view('admin.admin_pengaduan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pengaduan::find($id);
        $jabatan = Jabatan::all();

       return view('admin.admin_pengaduan.edit', compact('data','jabatan'));
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
            'nama'=>'nullable|string',
            'jabatan'=>'required',
            'perbuatan' => 'required',
            'perkara' => 'nullable',
            'tanggapan' => 'nullable',
            'file_upload' => 'sometimes|mimes:pdf,jpg,jpeg,rar,mp4|max:25000'
        ])->validate();

        $db = pengaduan::find($id);
        $db->nama_terlapor = $request->get('nama');
        $db->jabatan_id = $request->get('jabatan');
        $db->perbuatan = $request->get('perbuatan');
        $db->perkara = $request->get('perkara');

        if($request->get('tanggapan')){
            $db->tanggapan = $request->get('tanggapan');
            $db->status = "sudah";
        }else{
            $db->status = "belum";
        }



        $db->user_id = auth()->user()->id;

        $db->update();

        if ($request->hasFile('file_upload')) {
            if($db->file){

                File::delete('files/file_upload_post/'.$db->file);
            }


            $unique_name = md5(time());
            $file = $unique_name . '-' . 'file.' . $request->file_upload->getClientOriginalExtension();
            $filename = $request->file('file_upload');
            $filename->move('files/file_upload_post', $file);

            $db->file = $file;
            $db->update();
        }

        session()->flash('success', 'Pengaduan Berhasil Diupdate.');
        return redirect()->route('AdminPengaduan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = pengaduan::find($id);
        File::delete('files/file_upload_post/'.$db->file);

        pengaduan::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->route('AdminPengaduan.index');
    }

    public function Filedestroy($id)
    {
        $db = pengaduan::find($id);
        File::delete('files/file_upload_post/'.$db->file);
        $db->file = null;
        $db->save();


        session()->flash('success', 'File Berhasil Dihapus.');
        return redirect()->route('AdminPengaduan.index');
    }
}

