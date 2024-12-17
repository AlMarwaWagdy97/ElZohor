<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Categories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query()->with('trans', 'category.transNow')->orderBy('sort', 'ASC');


        if ($request->status  != '') {
            if ($request->status == 1) $query->where('status', $request->status);
            else {
                $query->where('status', '!=', 1);
            }
        }
        if ($request->title  != '') {
            $query = $query->orWhereTranslationLike('name', '%' . request()->input('title') . '%');
        }

        if ($request->description != '') {
            $query = $query->orWhereTranslationLike('description', '%' . request()->input('description') . '%');
        }
        $items = $query->paginate($this->pagination_count);

        return view('admin.dashboard.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Categories::query()->with('trans');
        $ids = arrang_records(clone $query);
        if ($ids) $categories = @$query->whereIn('id', $ids)->orderByRaw("field(id," . implode(',', $ids) . ")")->get();
        else $categories = $query->get();
        return view('admin.dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            $data['image'] = $this->upload_file($request->file('image'), ('products'));
        }

        Product::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $item = $product;
        return view('admin.dashboard.products.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $item = $product;

        $query = Categories::query()->with('trans');
        $ids = arrang_records(clone $query);
        if ($ids) $categories = @$query->whereIn('id', $ids)->orderByRaw("field(id," . implode(',', $ids) . ")")->get();
        else $categories = $query->get();

        return view('admin.dashboard.products.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            @unlink($product->image);
            $data['image'] = $this->upload_file($request->file('image'), ('products'));
        }
        $product->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        @unlink($product->image);
        $product->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


    public function update_status($id)
    {
        $product = Product::findOrfail($id);
        $product->status == 1 ? $product->status = 0 : $product->status = 1;
        $product->save();
        return redirect()->back();
    }

    public function update_featured($id)
    {
        $product = Product::findOrfail($id);
        $product->feature == 1 ? $product->feature = 0 : $product->feature = 1;
        $product->save();
        return redirect()->back();
    }



    public function actions(Request $request)
    {
        if ($request['publish'] == 1) {
            $products = Product::findMany($request['record']);
            foreach ($products as $product) {
                $product->update(['status' => 1]);
            }
            session()->flash('success', trans('product.status_changed_sucessfully'));
        }
        if ($request['unpublish'] == 1) {
            $products = Product::findMany($request['record']);
            foreach ($products as $product) {
                $product->update(['status' => 0]);
            }
            session()->flash('success', trans('product.status_changed_sucessfully'));
        }
        if ($request['delete_all'] == 1) {
            $products = Product::findMany($request['record']);
            foreach ($products as $product) {
                @unlink($product->image);
                $product->delete();
            }
            session()->flash('success', trans('product.delete_all_sucessfully'));
        }
        return redirect()->back();
    }
}
