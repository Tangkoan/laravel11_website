<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function FooterSetup()
    {
        $footer = Footer::find(1);
        if (!$footer) {
            return redirect()->back()->with([
                'message' => 'Footer not found!',
                'alert-type' => 'error'
            ]);
        }
        return view('admin.footer.footersetup', compact('footer'));
    }

    public function UpdateFooter(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'short_description' => 'required',
            'adress' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'copyright' => 'required',
        ], [
            'number.required' => 'Number is required',
            'email.email' => 'Email must be a valid email address',
            'facebook.url' => 'Facebook must be a valid URL',
            'twitter.url' => 'Twitter must be a valid URL',
        ]);

        try {
            Footer::findOrFail($request->id)->update($request->all() + [
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('footersetup')->with([
                'message' => 'Footer updated successfully',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'message' => 'An error occurred: ' . $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }
    }
}
