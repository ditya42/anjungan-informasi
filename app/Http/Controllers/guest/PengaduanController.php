<?php

namespace App\Http\Controllers\guest;

use App\Events\PengaduanWasCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jabatan;
use App\pengaduan;
use DataTables;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Str as IlluminateStr;
use Psy\Util\Str;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() {
        $this->middleware('auth');
        // OTORISASI GATE

    }

    public function index()
    {
        return view('admin.guest.index');
    }

    public function data()
    {
        $query = pengaduan::with('jabatan')->where('user_id', Auth::user()->id)->orderBy('created_at','desc');
        return DataTables::of($query)
        ->editColumn('perbuatan', function ($data) {
            return IlluminateStr::limit($data->perbuatan, 50);
        })
        ->addColumn('action', function ($list) {
            if($list->status == "sudah"){
                return '
                <center>
                <a href="' . route('pengaduan.show', $list->id) . '"  class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                <a href="' . route('pengaduan.destroy', $list->id) . '" OnClick="return AlertFunction();" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </center>
                ';
            }else{
                return '
                <center>
                <a href="' . route('pengaduan.show', $list->id) . '"  class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                <a href="' . route('pengaduan.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                <a href="' . route('pengaduan.destroy', $list->id) . '" OnClick="return AlertFunction();" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </center>
                ';
            }

        })
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

        return view('admin.guest.create', compact('jabatan'));
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
            'jabatan'=>'required',
            'perbuatan' => 'required',
            'perkara' => 'nullable',
            'file_upload' => 'required|mimes:pdf,jpg,jpeg,rar,mp4|max:25000'
        ])->validate();

        $db = new pengaduan;
        $db->nama_terlapor = $request->get('nama');
        $db->jabatan_id = $request->get('jabatan');
        $db->perbuatan = $request->get('perbuatan');
        $db->perkara = $request->get('perkara');
        $db->status = "belum";
        $db->user_id = auth()->user()->id;

        if ($request->hasFile('file_upload')) {
            $unique_name = md5(time());
            $file = $unique_name . '-' . 'file.' . $request->file_upload->getClientOriginalExtension();
            $filename = $request->file('file_upload');
            $filename->move('files/file_upload_post', $file);

            $db->file = $file;
        }


        $db->save();

        event(new PengaduanWasCreated($db));

        session()->flash('success', 'Pengaduan Berhasil Ditambah.');
        return redirect()->route('pengaduan.index');
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

       return view('admin.guest.show', compact('data'));
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

       return view('admin.guest.edit', compact('data','jabatan'));
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
            'file_upload' => 'sometimes|mimes:pdf,jpg,jpeg,rar,mp4|max:25000'
        ])->validate();

        $db = pengaduan::find($id);
        $db->nama_terlapor = $request->get('nama');
        $db->jabatan_id = $request->get('jabatan');
        $db->perbuatan = $request->get('perbuatan');
        $db->perkara = $request->get('perkara');
        $db->status = "belum";
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
        return redirect()->route('pengaduan.index');
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
        return redirect()->route('pengaduan.index');
    }
}
