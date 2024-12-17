<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerRequest;
use App\Models\Career;
use App\Models\CareerCategoriesTranslation;
use App\Models\CareerCategory;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $query = Career::query()->with('trans' , 'transNow')->orderBy('sort', 'ASC');



        if($request->status  != ''){
            $query->where('status', $request->status );
        }
        if ($request->title  != '') {

            $query = $query->orWhereTranslationLike('title', '%' . request()->input('title') . '%');
        }

        if($request->description != ''){
            $query = $query->orWhereTranslationLike('description', '%' . request()->input('description') . '%');

        }
        $items = $query->paginate($this->pagination_count);
        return view('admin.dashboard.careers.index', compact('items'));
    }

    public function create()
    {
        $categories = CareerCategory::with('transNow')->active()->get();
        return view('admin.dashboard.careers.create' , compact('categories'));
    }


    public function store(CareerRequest $request)
    {
        $data = $request->getSanitized();

//        if ($request->hasFile('image')) {
//            $data['image'] = $this->upload_file($request->file('image'), ('careers'));
//        }
        Career::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();
    }


    public function show(Career $career)
    {
        $categories = CareerCategory::with('transNow')->active()->get();
        return view('admin.dashboard.careers.show', compact('career' , 'categories'));
    }


    public function edit(Career $career)
    {
        $categories = CareerCategory::with('transNow')->active()->get();
        return view('admin.dashboard.careers.edit', compact('career' , 'categories'));
    }


    public function update(CareerRequest $request, Career $career)
    {
        $data = $request->getSanitized();
//        if ($request->hasFile('image')) {
//            @unlink($career->image);
//            $data['image'] = $this->upload_file($request->file('image'), ('careers'));
//        }
        $career->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }


    public function destroy(Career $career)
    {
//        @unlink($career->image);
        $career->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


    public function update_status($id)
    {
        $careers = Career::findOrfail($id);
        $careers->status == 1 ? $careers->status = 0 : $careers->status = 1;
        $careers->save();
        return redirect()->back();
    }


    public function update_featured($id)
    {
        $careers = Career::findOrfail($id);
        $careers->feature == 1 ? $careers->feature = 0 : $careers->feature = 1;
        $careers->save();
        return redirect()->back();
    }



    public function actions(Request $request)
    {
        if ($request['publish'] == 1) {
            $careers = Career::findMany($request['record']);
            foreach ($careers as $new) {
                $new->update(['status' => 1]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['unpublish'] == 1) {
            $careers = Career::findMany($request['record']);
            foreach ($careers as $new) {
                $new->update(['status' => 0]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['delete_all'] == 1) {
            $careers = Career::findMany($request['record']);
            foreach ($careers as $new) {
//                @unlink($new->image);
                $new->delete();
            }
            session()->flash('success', trans('pages.delete_all_sucessfully'));
        }
        return redirect()->back();
    }


}
