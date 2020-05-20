<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            'page_content' =>  'required',
            'image' => 'image|nullable|mimes:jpeg,jpg,png|max:1999'
        ]);

        $pages = new Pages();

        $pages->page_headline = $request->page_headline;
        $pages->slug = str_slug($request->page_headline);
        $pages->page_title = $request->page_title;
        $pages->keywords = $request->keywords;
        $pages->meta_description = $request->meta_description;
        $pages->page_content = $request->page_content;

        /* Image Upload Handling */       
        if ($request->hasFile('image')) 
        {
            if ($request->file('image')->isValid()) 
            {
                //Make Unique Name for Image
                $image = $request->file('image');
                $ext = $request->file('image')->extension();
                $currentDate = Carbon::now()->toDateString();
                $imageName = $pages->slug."-".$currentDate."-".uniqid().".".$ext;

                //Check Category Directory Exist
                    if(!Storage::disk('public')->exists('pages'))
                    {
                        Storage::disk('public')->makeDirectory('pages');
                    }
                
                //Resize Image for Category and Upload
                    //350px X 220px
                    $img = Image::make($image)->resize(350,220)->stream();
                    Storage::disk('public')->put('pages/'.$imageName, $img);

                //Saving Image Name in DB
                    $pages->image = $imageName;
            }
            else
            {
                //print this error if required
                //return redirect(route('admin.pages.index'))->with('unsuccessMsg', 'Error While Uploading File!!');
            }
        }
        else
        {
            //unsetting image name since, automatically it will store default name from migration
            unset($pages->image);
        }        
        /* EO Image Upload Handling */
        
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
        $page = Page::find($id);
        return view('admin.pages.edit', compact('page'));
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
