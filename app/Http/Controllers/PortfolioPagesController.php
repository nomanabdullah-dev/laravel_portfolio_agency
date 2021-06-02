<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolios.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string',
            'sub_title'=>'required|string',
            'big_image'=>'required|image',
            'small_image'=>'required|image',
            'description'=>'required|string',
            'client'=>'required|string',
            'category'=>'required|string'
        ]);

        $portfolios = new Portfolio;
        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;
        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;

        $big_file = $request->file('big_image');
        Storage::put('public/img/',$big_file);
        $portfolios->big_image = "storage/img/".$big_file->hashName();

        $small_file = $request->file('small_image');
        Storage::put('public/img/',$small_file);
        $portfolios->small_image = "storage/img/".$small_file->hashName();

        $portfolios->save();

        return redirect()->route('admin.portfolios.create')->with('success', 'New Portfolio Created Successfully');
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
        $portfolio = Portfolio::find($id);
        return view('pages.portfolios.edit', compact('portfolio'));
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
        $this->validate($request,[
            'title'=>'required|string',
            'sub_title'=>'required|string',
            'description'=>'required|string',
            'client'=>'required|string',
            'category'=>'required|string'
        ]);

        $portfolios = Portfolio::find($id);
        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;
        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;

        if($request->file('big_image')){
            unlink(public_path($portfolios->big_image));
            $big_file = $request->file('big_image');
            Storage::put('public/img/',$big_file);
            $portfolios->big_image = "storage/img/".$big_file->hashName();
        }

        if($request->file('small_image')){
            unlink(public_path($portfolios->small_image));
            $small_file = $request->file('small_image');
            Storage::put('public/img/',$small_file);
            $portfolios->small_image = "storage/img/".$small_file->hashName();
        }

        $portfolios->save();

        return redirect()->route('admin.portfolios.list')->with('success', 'Portfolio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios = Portfolio::find($id);
        unlink(public_path($portfolios->big_image));
        unlink(public_path($portfolios->small_image));
        $portfolios->delete();

        return redirect()->route('admin.portfolios.list')->with('success', 'Portfolio Delete Successfully');
    }
}
