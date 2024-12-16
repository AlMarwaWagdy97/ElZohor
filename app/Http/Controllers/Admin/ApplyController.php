<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JopApplication;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function index(Request $request)
    {
        $query = JopApplication::query()->latest();


        if ($request->status != '') {
            $query->where('status', $request->status);
        }
        if ($request->name != '') {
            $query->where('name', $request->name);
        }

        if ($request->mobile != '') {
            $query->where('mobile', $request->mobile);
        }
        if ($request->email != '') {
            $query->where('email', $request->email);
        }

        $items = $query->paginate($this->pagination_count);
        return view('admin.dashboard.applications.index', compact('items'));
    }


    public function show(JopApplication $application)
    {
        if ($application->status == 0) {
            $application->status = 1;
            $application->updated_by = auth()->id();
            $application->save();
        }
        return view('admin.dashboard.applications.show', compact('application'));
    }


    public function edit(JopApplication $application)
    {
        if ($application->status == 0) {
            $application->status = 1;
            $application->updated_by = auth()->id();

            $application->save();
        }

        return view('admin.dashboard.applications.edit', compact('application'));
    }

    public function update(Request $request, JopApplication $application)
    {

        $application->update(['status' => $request->status ,  'updated_by' => auth()->id()]);
        if ($application->status === 0) {
            $application->status = 1;
            $application->updated_by = auth()->id();

            $application->save();
        }
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }


    public function destroy(JopApplication $application)
    {
//        @unlink($application->image);
        $application->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


//    public function update_status($id)
//    {
//        $applications = JopApplication::findOrfail($id);
//        $applications->status == 1 ? $applications->status = 0 : $applications->status = 1;
//        $applications->save();
//        return redirect()->back();
//    }
//
//
//    public function update_featured($id)
//    {
//        $applications = JopApplication::findOrfail($id);
//        $applications->feature == 1 ? $applications->feature = 0 : $applications->feature = 1;
//        $applications->save();
//        return redirect()->back();
//    }


    public function actions(Request $request)
    {
//        if ($request['publish'] == 1) {
//            $applications = JopApplication::findMany($request['record']);
//            foreach ($applications as $new) {
//                $new->update(['status' => 1]);
//            }
//            session()->flash('success', trans('articles.status_changed_sucessfully'));
//        }
//        if ($request['unpublish'] == 1) {
//            $applications = JopApplication::findMany($request['record']);
//            foreach ($applications as $new) {
//                $new->update(['status' => 0]);
//            }
//            session()->flash('success', trans('articles.status_changed_sucessfully'));
//        }
        if ($request['delete_all'] == 1) {
            $applications = JopApplication::findMany($request['record']);
            foreach ($applications as $new) {
//                @unlink($new->image);
                $new->delete();
            }
            session()->flash('success', trans('pages.delete_all_sucessfully'));
        }
        return redirect()->back();
    }


}
