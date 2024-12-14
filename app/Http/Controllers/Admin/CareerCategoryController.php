<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerCategoryRequest;
use App\Models\CareerCategory;
use Illuminate\Http\Request;

class CareerCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = CareerCategory::query()->with('trans')->orderBy('id', 'DESC');



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
        return view('admin.dashboard.careers_categories.index', compact('items'));
    }

    public function create()
    {
        $categories = CareerCategory::with('transNow')->active()->get();
        return view('admin.dashboard.careers_categories.create' , compact('categories'));
    }


    public function store(CareerCategoryRequest $request)
    {
        $data = $request->getSanitized();

//        if ($request->hasFile('image')) {
//            $data['image'] = $this->upload_file($request->file('image'), ('careers'));
//        }
        CareerCategory::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();
    }


    public function show( $id)
    {
        $careerCategory = CareerCategory::find($id);
        $categories = CareerCategory::with('transNow')->active()->get();
        return view('admin.dashboard.careers_categories.show', compact('careerCategory' , 'categories'));
    }


    public function edit($id)
    {
        $careerCategory = CareerCategory::with('trans')->find($id);
        return view('admin.dashboard.careers_categories.edit', compact('careerCategory' ));
    }


    public function update(CareerCategoryRequest $request, CareerCategory $careerCategory)
    {
        $data = $request->getSanitized();
//        if ($request->hasFile('image')) {
//            @unlink($careerCategory->image);
//            $data['image'] = $this->upload_file($request->file('image'), ('careers'));
//        }
        $careerCategory->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }


    public function destroy(CareerCategory $careerCategory)
    {
//        @unlink($careerCategory->image);
        $careerCategory->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


    public function update_status($id)
    {
        $careerCategorys = CareerCategory::findOrfail($id);
        $careerCategorys->status == 1 ? $careerCategorys->status = 0 : $careerCategorys->status = 1;
        $careerCategorys->save();
        return redirect()->back();
    }


    public function update_featured($id)
    {
        $careerCategorys = CareerCategory::findOrfail($id);
        $careerCategorys->feature == 1 ? $careerCategorys->feature = 0 : $careerCategorys->feature = 1;
        $careerCategorys->save();
        return redirect()->back();
    }



    public function actions(Request $request)
    {
        if ($request['publish'] == 1) {
            $careerCategorys = CareerCategory::findMany($request['record']);
            foreach ($careerCategorys as $new) {
                $new->update(['status' => 1]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['unpublish'] == 1) {
            $careerCategorys = CareerCategory::findMany($request['record']);
            foreach ($careerCategorys as $new) {
                $new->update(['status' => 0]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['delete_all'] == 1) {
            $careerCategorys = CareerCategory::findMany($request['record']);
            foreach ($careerCategorys as $new) {
//                @unlink($new->image);
                $new->delete();
            }
            session()->flash('success', trans('pages.delete_all_sucessfully'));
        }
        return redirect()->back();
    }


}
