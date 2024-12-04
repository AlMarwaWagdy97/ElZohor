<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewsRequest;
use App\Models\Reviews;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Reviews::query()->with('trans')->orderBy('id', 'ASC');

        if ($request->status  != '') {
            if ($request->status == 1) $query->where('status', $request->status);
            else {
                $query->where('status', '!=', 1);
            }
        }
        if ($request->title  != '') {
            $query = $query->orWhereTranslationLike('title', '%' . request()->input('title') . '%');
        }

        if ($request->description != '') {
            $query = $query->orWhereTranslationLike('description', '%' . request()->input('description') . '%');
        }
        $items = $query->paginate($this->pagination_count);

        return view('admin.dashboard.reviews.index', compact('items'));
    }

    public function create()
    {
        return view('admin.dashboard.reviews.create');
    }


    public function store(ReviewsRequest $request)
    {
        $data = $request->getSanitized();

        if ($request->hasFile('image')) {
            $data['image'] = $this->upload_file($request->file('image'), ('reviews'));
        }
        Reviews::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();
    }


    public function show(Reviews $review)
    {
        return view('admin.dashboard.reviews.show', compact('review'));
    }


    public function edit(Reviews $review)
    {
        return view('admin.dashboard.reviews.edit', compact('review'));
    }


    public function update(ReviewsRequest $request, Reviews $review)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            @unlink($review->image);
            $data['image'] = $this->upload_file($request->file('image'), ('reviews'));
        }
        $review->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }


    public function destroy(Reviews $review)
    {
        @unlink($review->image);
        $review->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


    public function update_status($id)
    {
        $item = Reviews::findOrfail($id);
        $item->status == 1 ? $item->status = 0 : $item->status = 1;
        $item->save();
        return redirect()->back();
    }

    public function update_featured($id)
    {
        $item = Reviews::findOrfail($id);
        $item->feature == 1 ? $item->feature = 0 : $item->feature = 1;
        $item->save();
        return redirect()->back();
    }



    public function actions(Request $request)
    {
        if ($request['publish'] == 1) {
            $reviews = Reviews::findMany($request['record']);
            foreach ($reviews as $review) {
                $review->update(['status' => 1]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['unpublish'] == 1) {
            $reviews = Reviews::findMany($request['record']);
            foreach ($reviews as $review) {
                $review->update(['status' => 0]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['delete_all'] == 1) {
            $reviews = Reviews::findMany($request['record']);
            foreach ($reviews as $review) {
                @unlink($review->image);
                $review->delete();
            }
            session()->flash('success', trans('pages.delete_all_sucessfully'));
        }
        return redirect()->back();
    }
}
