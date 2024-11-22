<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Image;
use Illuminate\Support\Carbon;

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
                $multi_image = $request->file('about_image');
                $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();  // 3434343443.jpg
                $save_url = 'upload/about_page/' . $name_gen;

                // Move the uploaded image to the destination folder
                $multi_image->move(public_path('upload/about_page'), $name_gen);


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

    public function HomeAbout(){
        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));
     }// End Method

    public function AboutMultiImage(){
        return view('admin.about_page.all_multiimage');

    }

    public function StoreMultiImage(Request $request)
    {
        // ទទួលបានរូបភាពជាច្រើនពី request
        $images = $request->file('multi_image'); // បញ្ជាក់ថាជារូបភាព

        // ពិនិត្យថាតើមានរូបភាពទេ
        if ($images) {
            foreach ($images as $multi_image) {
                // កំណត់ឈ្មោះរូបភាព
                $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

                // បញ្ជាក់ទីតាំងផ្ទុករូបភាព
                $save_path = 'upload/multi/' . $name_gen;

                // ផ្ទុករូបភាពទៅ folder
                $multi_image->move(public_path('upload/multi'), $name_gen);

                // បញ្ចូល path និង created_at ទៅក្នុង database
                MultiImage::insert([
                    'multi_image' => $save_path, // បញ្ចូល path ទៅ database
                    'created_at' => Carbon::now(),
                ]);
            }

            // notification message
            $notification = array(
                'message' => 'Add Multi Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {
            // ប្រសិនបើមិនមានរូបភាពទេ
            $notification = array(
                'message' => 'No images selected',
                'alert-type' => 'error',
            );

            return redirect()->route('all.multi.image')->with($notification);
        }
    }


    public function AllMultiImage(){
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('allMultiImage'));
    }

    public function EditMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);

        if (!$multiImage) {
            abort(404, 'Image not found');
        }

        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function UpdateMultiImage(Request $request) // Add $id as a method parameter
{
    $multi_image_id = $request->id;
    if ($request->file('multi_image')) {
        $image = $request->file('multi_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // Generate a unique file name

        // Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
        $save_url = 'upload/multi/' . $name_gen; // Destination path to save image

        // Move the uploaded image to the destination folder
        $image->move(public_path('upload/multi'), $name_gen);

        // Find the record by its ID and update the image path
        MultiImage::findOrFail($multi_image_id)->update([
            'multi_image' => $save_url,
        ]);

        // Notification after successful update
        $notification = array(
            'message' => 'Updated MultiImage with Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.multi.image')->with($notification);
    }
}

public function DeleteMultiImage($id){

    $multi = MultiImage::findOrFail($id);
    $img = $multi->multi_image;
    unlink($img);

    MultiImage::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Multi Image Delete Successfully',
        'alert-type' => 'success',
    );

    return redirect()->back()->with($notification);
}



}
