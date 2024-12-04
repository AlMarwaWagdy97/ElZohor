<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurance = Insurance::with(['trans' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->latest()->first();
        return view('admin/dashboard/insurance/index', compact('insurance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/dashboard/insurance/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insurance = Insurance::get();
        if ($insurance && $insurance->count()) {
            foreach ($insurance as $item) {
                $item->delete();

            }
        }
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->upload_file($request->file('image'), ('doctors'));
        }
        Insurance::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Insurance $insurance)
    {
        return view('admin/dashboard/insurance/show', compact('insurance'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit(Insurance $insurance)
    {

        return view('admin/dashboard/insurance/edit', compact('insurance'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insurance $insurance)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            @unlink($insurance->image);
            $data['image'] = $this->upload_file($request->file('image'), ('insurance'));
        }
        $insurance->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insurance $insurance)
    {
        @unlink($insurance->image);

        $insurance->delete();
        session()->flash('error', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();

    }


    public function update_status($id)
    {
        $insurance = Insurance::findOrfail($id);
        $insurance->status == 1 ? $insurance->status = 0 : $insurance->status = 1;
        $insurance->save();
        return redirect()->back();
    }

    public function update_featured($id)
    {
        $insurance = Insurance::findOrfail($id);
        $insurance->feature == 1 ? $insurance->feature = 0 : $insurance->feature = 1;
        $insurance->save();
        return redirect()->back();
    }

}
