<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog() {
    
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blog_all', compact('blogs'));
   }

    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blog_add', compact('categories'));
    }

    

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_image' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
        ], [
            'blog_category_id.required' => 'Blog Category Name is Required',
            'blog_title.required' => 'Blog Title is Required',
            'blog_image.required' => 'Blog Image is Required',
            'blog_tags.required' => 'Blog Tag is Required',
            'blog_description.required' => 'Blog Description is Required',
        ]);

        // Handle the image upload
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // Generates unique name for the image
        $save_url = 'upload/blog/' . $name_gen;

        // Move the uploaded image to the destination folder
        $image->move(public_path('upload/blog/'), $name_gen);

        // Wrap the database insert in a try-catch block
        try {
            Blog::insert([
                'blog_category_id' => $request->blog_category_id, // Correct the field name here
                'blog_title' => $request->blog_title, // Correct the field name here
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            // Success message
            return redirect()->route('all.blog')->with('message', 'Blog Inserted Successfully')->with('alert-type', 'success');
        } catch (\Exception $e) {
            // If there is an error, show a failure message
            return redirect()->route('add.blog')->with('message', 'Failed to Insert Blog. Please try again')->with('alert-type', 'error');
        }
    }

     public function DeleteBlog($id){

        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Image Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function EditBlog($id){ 
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blog_edit', compact(['blogs', 'categories']));
    }// End Method 

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = 'upload/blog/' . $name_gen;

            // Move the uploaded image to the destination folder
            $image->move(public_path('upload/blog/'), $name_gen);

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id, // Correct the field name here
                'blog_title' => $request->blog_title, // Correct the field name here
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
                'blog_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.blog')->with($notification);
        } else {
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id, // Correct the field name here
                'blog_title' => $request->blog_title, // Correct the field name here
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.blog')->with($notification);
        } // end Else
    } // End Method

}
