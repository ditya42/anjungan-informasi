<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Model\Category;
use App\Helpers\Helper;
use App\Model\Post;
use App\Model\Tag;
use App\Model\CategoryPost;
use App\Model\PostTag;
use DataTables;
use File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('frontend.index');
    }

    public function layanan(Request $request, $id)
    {

        $layanan  = $id;
        // dd($layanan);

        return view('frontend.layanan', ['layanan'=>$layanan]);
    }

    public function syarat(Request $request, $id)
    {

        $syarat  = $id;
        $layanan = $request->subbidang;
        // dd($syarat);

        return view('frontend.persyaratan', ['syarat'=>$syarat, 'layanan'=>$layanan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
