<?php

namespace App\Http\Controllers\Admin;

use App\DasarLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Persyaratan;
use App\Prosedur;
use App\Subbidang;
use App\SubPersyaratan;
use App\SubProsedur;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;
use Illuminate\Support\Facades\DB as IlluminateDB;

class SubProsedurController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        // OTORISASI GATE
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index($id)
    {

        $cek = Prosedur::where('prosedur_id',$id)->first();

        // $DasarLayanan = DB::table('dasar_layanan')
        //                 ->leftJoin('dasar_hukum','dasar_layanan.dasarhukum_id','=','dasar_hukum.dasarhukum_id')

        //                 ->where('layanan_id', $id)
        //                 ->select('nama_peraturan', 'tentang')
        //                 ->get();

        return view('admin.admin_pengaduan.indexSubProsedur',[
            'prosedur' => $cek,
        ]);
    }

    public function data(Request $request)
    {
        $id_prosedur = $request->input('id');

        $query = DB::table('subprosedur')


                        ->where('prosedur_id', $id_prosedur)

                        ->get();
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>

            <a href="' . route('subprosedur.edit', $list->subprosedur_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick= "deleteData('.$list->subprosedur_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();


        // <a href="' . route('subbidang.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
        //     <a onclick
    }

    public function create($id)
    {
        $prosedur = Prosedur::where('prosedur_id',$id)->first();
        // dd($layanan);
        return view('admin.admin_pengaduan.createSubProsedur',[
            'prosedur' => $prosedur,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "subprosedur" => "required",


        ])->validate();

        $subprosedur = new SubProsedur;
        $subprosedur->uraian_subprosedur = $request->get('subprosedur');
        $subprosedur->prosedur_id = $request->get('prosedur_id');

        $prosedur_id = $request->get('prosedur_id');
        $subprosedur->save();
        session()->flash('success', 'Data Berhasil Disimpan.');
        return redirect()->route('subprosedur.index', $prosedur_id);
    }

    public function edit($id)
    {
        $subprosedur = SubProsedur::findOrFail($id);

        // dd($layanan);
        return view('admin.admin_pengaduan.editSubProsedur',[
            'subprosedur' => $subprosedur,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "subprosedur" => "required",


        ])->validate();

        $subprosedur= SubProsedur::findOrFail($id);
        $subprosedur->uraian_subprosedur = $request->get('subprosedur');

        $prosedur = $subprosedur->prosedur_id;

        $subprosedur->save();
        session()->flash('success', 'Data Berhasil Diupdate.');
        return redirect()->route('subprosedur.index', $prosedur);
    }

    public function destroy($id)
    {
        // dd($id);
        SubProsedur::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}
