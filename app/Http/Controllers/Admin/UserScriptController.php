<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserScript;
use Illuminate\Http\Request;

class UserScriptController extends Controller
{
    public function index()
    {
        $user_script_footer = UserScript::where('place', 'footer')->first();
        $user_script_header = UserScript::where('place', 'header')->first();

        return view('admin/dashboard/user_scripts/index', compact('user_script_footer', 'user_script_header'));
    }


    public function create()
    {
        return view('admin/dashboard/user_scripts/create');

    }


    public function store(Request $request)
    {
        $data = $request->all();

        $data['created_by'] = auth()->id();
        UserScript::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();

    }


    public function showAll(UserScript $user_script)
    {
        $user_script_footer = UserScript::where('place', 'footer')->first();
        $user_script_header = UserScript::where('place', 'header')->first();

        return view('admin/dashboard/user_scripts/show', compact('user_script_footer', 'user_script_header'));

    }


    public function editAll()
    {

        $user_script_footer = UserScript::where('place', 'footer')->first();
        $user_script_header = UserScript::where('place', 'header')->first();

        return view('admin/dashboard/user_scripts/edit', compact('user_script_footer', 'user_script_header'));

    }


//<!-- Google tag (gtag.js) -->     <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZ48Z2EJ79"></script>     <script>         window.dataLayer = window.dataLayer || [];         function gtag(){dataLayer.push(arguments);}         gtag('js', new Date());          gtag('config', 'G-YZ48Z2EJ79');     </script>
    public function updateAll(Request $request)
    {


        $header = $request->header;
        $header['status'] = isset($header['status']) && $header['status'] == 1 ? 1 : 0;
        $header['updated_by'] = auth()->id();
        $footer = $request->footer;
        $footer['status'] = isset($footer['status']) && $footer['status'] == 1 ? 1 : 0;
        $footer['updated_by'] = auth()->id();


        // Update or create records for 'header'
        UserScript::updateOrCreate(
            ['place' => 'header'],  // Search criteria
            $header  // Attributes to update or create
        );

        // Update or create records for 'footer'
        UserScript::updateOrCreate(
            ['place' => 'footer'],  // Search criteria
            $footer  // Attributes to update or create
        );


        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();


    }




    public function update(Request $request, UserScript $userScript)
    {
        $data = $request->all();
        $data['updated_by'] = auth()->id();
        $data['status'] = ($request->status && $request->status) == 1 ? 1 : 0;
        $userScript->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();

    }


//    public function destroy(UserScript $userScript)
//    {
//
//        $userScript->delete();
//        session()->flash('error', trans('message.admin.deleted_sucessfully'));
//        return redirect()->back();
//
//    }


    public function update_status($id)
    {
        $userScript = UserScript::findOrfail($id);
        $userScript->status == 1 ? $userScript->status = 0 : $userScript->status = 1;
        $userScript->save();
        return redirect()->back();
    }


}
