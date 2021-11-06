<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Admin\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $seos = DB::table('seo')->get();
        return view('admin.seo.index', compact('seos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $seos = new Seo();
        $seos->meta_title = $request->meta_title;
        $seos->meta_author = $request->meta_author;
        $seos->meta_tag = $request->meta_tag;
        $seos->meta_description = $request->meta_description;
        $seos->google_analytics = $request->google_analytics;
        $seos->bing_analytics = $request->bing_analytics;
        $seos->save();

        $notification = array(
            'messege'=>'Seo Added Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
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
        $seos = DB::table('seo')->where('id', $id)->first();
        return view ('admin.seo.edit', compact('seos'));
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
        // $id = $request->id;
        $data = array();

        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['bing_analytics'] = $request->bing_analyticstitle;

       DB::table('seo')->where('id', $id)->update($data);

        $notification = array(
            'messege' => 'Seo Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.seo.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('seo')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Seo Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.seo.index')->with($notification);

    }
}
