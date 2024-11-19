<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));

     } // End Method

    public function UpdateAbout(Request $request)
        {
            $about_id = $request->id;

            if ($request->file('about_image')) {
                $image = $request->file('about_image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
                $save_url = 'upload/about_page/' . $name_gen;

                // Move the uploaded image to the destination folder
                $image->move(public_path('upload/about_page'), $name_gen);


                About::findOrFail($about_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'about_image' => $save_url,  // ឬប្រើ 'about_page' ប្រសិនបើវាលនេះមាននៅក្នុង migration
                ]);

                $notification = array(
                    'message' => 'About Page Updated with Image Successfully',
                    'alert-type' => 'success',
                );

                return redirect()->back()->with($notification);
            } else {
                About::findOrFail($about_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,

                ]);

                $notification = array(
                    'message' => 'About Page Updated without Image Successfully',
                    'alert-type' => 'success',
                );

                return redirect()->back()->with($notification);
            } // end Else
    } // End Method





    // code about controller in frontend


    // public function HomeAbout(){
    //     return view('frontend.about_page');
    // }
    public function HomeAbout(){
        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));
     }// End Method
}
