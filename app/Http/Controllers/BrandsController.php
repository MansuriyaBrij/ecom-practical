<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Products;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brands::where('active', 1)->get();
        $products = Products::where('active', 1)->where('stock', '>', 0)->get();
        return view('brands.index', compact('brands', 'products'));
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
     * @param  \App\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $brand = Brands::find($id);
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit(Brands $brands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brands $brands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brands $brands)
    {
        //
    }
}
