<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
use Illuminate\Support\Carbon;


class PortfolioController extends Controller
{
    public function AllPortfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    } // End Method

    public function AddPortfolio(){
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
        ]);

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
        $save_url = 'upload/portfolio/' . $name_gen;

        // Move the uploaded image to the destination folder
        $image->move(public_path('upload/portfolio/'), $name_gen);

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => 'upload/portfolio/' . $name_gen,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Home Slide Updated with Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.portfolio')->with('message', 'Portfolio Inserted Successfully')->with('alert-type', 'success');
    } // end method

    public function EditPortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    }// End Method

    public function UpdatePortfolio(Request $request)
    {
        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = 'upload/portfolio/' . $name_gen;

            // Move the uploaded image to the destination folder
            $image->move(public_path('upload/portfolio/'), $name_gen);

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'updated_at' => Carbon::now(),
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.portfolio')->with($notification);
        } else {
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Portfolio Updated without Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.portfolio')->with($notification);
        } // end Else
    } // End Method

    public function DeletePortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Image Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function PortfolioDetails($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.protfolio_details', compact('portfolio'));
    }// End Method

    public function HomePortfolio(){
      $portfolio = Portfolio::latest()->get();
      return view('frontend.portfolio',compact('portfolio'));
     } // End Method 
}
