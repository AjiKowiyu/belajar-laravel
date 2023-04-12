<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_berita extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('berita/index');
    }



    public function create()
    {
        return view('berita/tambah');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
