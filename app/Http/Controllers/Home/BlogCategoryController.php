<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    
   public function AllCategory() {
    
        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));
   }

   public function AddCategory(){
      return view('admin.blog_category.blog_category_add');
   }

   public function StoreCategory(Request $request){
      $request->validate([
         'blog_category' => 'required',
     ], [
         'blog_category.required' => 'Blog Category is Required',
     ]);

     BlogCategory::insert([
         'blog_category' => $request->blog_category,
         'created_at' => Carbon::now(),
     ]);

     $notification = array(
         'message' => 'Blog Category Insert Successfully',
         'alert-type' => 'success',
     );

     return redirect()->route('all.blog.category')->with('message', 'Portfolio Inserted Successfully')->with('alert-type', 'success');
   }


   public function EditBlogCategory($id){

      $blogcategory = BlogCategory::findOrFail($id);
      return view('admin.blog_category.blog_category_edit', compact('blogcategory'));
  }// End Method

  public function UpdateBlogCategory(Request $request)
  {
      $blogcategory = $request->id;
          
      $request->validate([
         'blog_category' => 'required',
     ], [
         'blog_category.required' => 'Blog Category is Required',
     ]);

      try{
         BlogCategory::findOrFail($blogcategory)->update([
            'blog_category' => $request->blog_category,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
      }catch(Exception $e){
         return $notification = array(
            'message' => 'Error',
            'alert-type' => 'error',
        );
      }

  } // End Method

  public function DeleteBlogCategory($id){

      $blogcategory = BlogCategory::findOrFail($id);
      
      BlogCategory::findOrFail($id)->delete();

      $notification = array(
          'message' => 'Blog Category Delete Successfully',
          'alert-type' => 'success',
      );

      return redirect()->back()->with($notification);
  }

  public function deleteCategory($id)
    {
        $category = BlogCategory::find($id);

        if ($category) {
            $category->delete(); // This will also delete related blogs
            return response()->json(['message' => 'Category and related blogs deleted successfully!']);
        }

        return response()->json(['message' => 'Category not found!'], 404);
    }
}
