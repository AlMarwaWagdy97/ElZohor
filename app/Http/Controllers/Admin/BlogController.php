<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query()->with('trans' , 'transNow')->orderBy('sort', 'ASC');



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
        return view('admin.dashboard.blogs.index', compact('items'));
    }



    public function create()
    {
        return view('admin.dashboard.blogs.create');
    }


    public function store(BlogRequest $request)
    {
        $data = $request->getSanitized();

        if ($request->hasFile('image')) {
            $data['image'] = $this->upload_file($request->file('image'), ('blogs'));
        }
        Blog::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();
    }


    public function show(Blog $blog)
    {
        if(!$blog){
            session()->flash('error', trans('message.admin.not_found'));
            return redirect()->back();
        }
        $blog->load('transNow');

        return view('admin.dashboard.blogs.show', compact('blog'));
    }


    public function edit(Blog $blog)
    {
        if(!$blog){
            session()->flash('error', trans('message.admin.not_found'));
            return redirect()->back();
        }
        $blog->load('transNow');

        return view('admin.dashboard.blogs.edit', compact('blog'));
    }


    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            @unlink($blog->image);
            $data['image'] = $this->upload_file($request->file('image'), ('blogs'));
        }
        $blog->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }


    public function destroy(Blog $blog)
    {
        @unlink($blog->image);
        $blog->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


    public function update_status($id)
    {
        $blogs = Blog::findOrfail($id);
        $blogs->status == 1 ? $blogs->status = 0 : $blogs->status = 1;
        $blogs->save();
        return redirect()->back();
    }

    public function update_featured($id)
    {
        $blogs = Blog::findOrfail($id);
        $blogs->feature == 1 ? $blogs->feature = 0 : $blogs->feature = 1;
        $blogs->save();
        return redirect()->back();
    }



    public function actions(Request $request)
    {
        if ($request['publish'] == 1) {
            $blogs = Blog::findMany($request['record']);
            foreach ($blogs as $new) {
                $new->update(['status' => 1]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['unpublish'] == 1) {
            $blogs = Blog::findMany($request['record']);
            foreach ($blogs as $new) {
                $new->update(['status' => 0]);
            }
            session()->flash('success', trans('articles.status_changed_sucessfully'));
        }
        if ($request['delete_all'] == 1) {
            $blogs = Blog::findMany($request['record']);
            foreach ($blogs as $new) {
                @unlink($new->image);
                $new->delete();
            }
            session()->flash('success', trans('pages.delete_all_sucessfully'));
        }
        return redirect()->back();
    }

}
