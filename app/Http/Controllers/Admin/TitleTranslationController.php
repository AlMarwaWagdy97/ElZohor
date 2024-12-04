<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TitleTranslation;
use Illuminate\Http\Request;

class TitleTranslationController extends Controller
{


    public function index(Request $request)
    {

//        dd(config('app.pagination_num'));

        $query = TitleTranslation::active()->orderBy('id', 'ASC');
//        $portfolios = $this->portfolio;

        if($request->status  != ''){
            if( $request->status == 1) $query->where('status', $request->status );
            else{  $query->where('status', '!=', 1); }
        }

        if($request->key != ''){
            $query = $query->where('key',  request()->input('key') );
        }

        $items = $query->paginate($this->pagination_count);

//        dd(config('app.pagination_num'));
//        $items = TitleTranslation::latest()->paginate(config('app.pagination_num'));
        return view('admin/dashboard/title_translations/index' , compact('items'));

    }

    public function create()
    {
        return view('admin/dashboard/title_translations/create');
    }

    public function store(Request $request)
    {
        $titleTranslation = new TitleTranslation();
        $val = [];
        $desc = [];

        foreach (config('translatable.locales') as $lang) {
            $val[$lang] = $request->$lang['title'];
            $desc[$lang] = $request->$lang['description'];
        }

        $titleTranslation->value = json_encode($val, true);
        $titleTranslation->description = json_encode($desc, true);
        $titleTranslation->key = $request->key;
        $titleTranslation->status = $request->status;
        $titleTranslation->created_by = auth()->id();

        $titleTranslation->save();
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return redirect()->back();
    }


    public function show(TitleTranslation $titleTranslation)
    {
          return view('admin/dashboard/title_translations/show' , compact('titleTranslation'));
    }

    public function edit(TitleTranslation $titleTranslation)
    {
        return view('admin/dashboard/title_translations/edit', compact('titleTranslation'));
    }


    public function update(TitleTranslation $titleTranslation, Request $request)
    {
        $val = [];
        $desc = [];

        foreach (config('translatable.locales') as $lang) {
            $val[$lang] = $request->$lang['title'];
            $desc[$lang] = $request->$lang['description'];
        }

        $titleTranslation->value = json_encode($val, true);
        $titleTranslation->description = json_encode($desc, true);
        $titleTranslation->key = $request->key;
        $titleTranslation->status = $request->status;
        $titleTranslation->updated_by = auth()->id();

        $titleTranslation->save();
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }

}
