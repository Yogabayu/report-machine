<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::findOrFail(1);
        return view('content.web-pages.site.index',compact('site'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id'            => ['required'],
                'name_site'     => ['required'],
                'name_business' => ['required'],
                'address'       => ['required'],
                'tlp'           => ['required'],
                'logo'          => ['required'],
            ]);

            $site = Site::where('id',$request->id)->first();

            if ($request->hasFile('logo')) {
                $oldPhoto = $site->photo;

                if ($oldPhoto && File::exists(public_path('file/site/foto/' . $oldPhoto))) {
                    File::delete(public_path('file/site/foto/' . $oldPhoto));
                }

                $imageEXT   = $request->file('logo')->getClientOriginalName();
                $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT        = $request->file('logo')->getClientOriginalExtension();
                $fileimage  = $filename . '_' . time() . '.' . $EXT;

                $path       = $request->file('logo')->move(public_path('file/site/foto'), $fileimage);

                $site->logo = $fileimage;
            }

            $site->name_site = $request->name_site;
            $site->name_site = $request->name_business;
            $site->address = $request->address;
            $site->tlp = $request->tlp;
            $site->save();

            Session::flash('success','Berhasil update data');
            return redirect('websetting');
        } catch (\Exception $e) {
            Session::flash('error','error: '.$e->getMessage());
            return back();
        }
        
    }

}
