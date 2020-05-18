<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::latest()->get();
        return view('admin.pages.index', compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request, [
            'page_headline' => 'required|unique:pages|max:255', 
            'page_content' =>  'required'
        ]);

        $pages = new Pages();

        $pages->page_headline = $request->page_headline;
        $pages->slug = str_slug($request->page_headline);
        $pages->page_title = $request->page_title;
        $pages->keywords = $request->keywords;
        $pages->meta_description = $request->meta_description;
        $pages->page_content = $request->page_content;
        if ($request->image == null)
        {
            unset($pages->image);
        }
        else
        {
            //Image Upload Code
        }
        $pages->display_image_on_left = ($request->display_image_on_left == true) ? '1' : '0';
        $pages->save();

        return redirect(route('admin.pages.index'))->with('successMsg', 'Page Created Successfully!!');

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
