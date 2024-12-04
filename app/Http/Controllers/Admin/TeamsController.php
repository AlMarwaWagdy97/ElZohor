<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teams;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\TeamsRequest;

class TeamsController extends Controller
{
    public function index(Request $request)
    {

        $query = Teams::query()->with('trans')->orderBy('created_at', 'DESC');

        if ($request->status  != '') {
            if ($request->status == 1) $query->where('status', $request->status);
            else {
                $query->where('status', '!=', 1);
            }
        }
        if ($request->is_directors  != '') {
            if ($request->is_directors == 1) $query->where('is_directors', $request->is_directors);
            else {
                $query->where('is_directors', '!=', 1);
            }
        }
        if ($request->title  != '') {
            $query = $query->orWhereTranslationLike('name', '%' . request()->input('title') . '%');
        }

        if ($request->description != '') {
            $query = $query->orWhereTranslationLike('description', '%' . request()->input('description') . '%');
        }
        $items = $query->paginate($this->pagination_count);

        return view('admin.dashboard.teams.index', compact('items'));
    }

    public function create()
    {
        return view('admin.dashboard.teams.create');
    }


    public function store(TeamsRequest $request)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            $data['image'] = $this->upload_file($request->file('image'), ('teams'));
        }
        Teams::create($data);
        session()->flash('success', trans('message.admin.created_sucessfully'));
        return back();
    }


    public function show(Teams $team)
    {
        return view('admin.dashboard.teams.show', compact('team'));
    }


    public function edit(Teams $team)
    {
        return view('admin.dashboard.teams.edit', compact('team'));
    }


    public function update(TeamsRequest $request, Teams $team)
    {
        $data = $request->getSanitized();
        if ($request->hasFile('image')) {
            @unlink($team->image);
            $data['image'] = $this->upload_file($request->file('image'), ('teams'));
        }
        $team->update($data);
        session()->flash('success', trans('message.admin.updated_sucessfully'));
        return redirect()->back();
    }


    public function destroy(Teams $team)
    {
        @unlink($team->image);
        $team->delete();
        session()->flash('success', trans('message.admin.deleted_sucessfully'));
        return redirect()->back();
    }


    public function update_status($id)
    {
        $team = Teams::findOrfail($id);
        $team->status == 1 ? $team->status = 0 : $team->status = 1;
        $team->save();
        return redirect()->back();
    }

    public function update_featured($id)
    {
        $team = Teams::findOrfail($id);
        $team->feature == 1 ? $team->feature = 0 : $team->feature = 1;
        $team->save();
        return redirect()->back();
    }

    public function update_directors($id)
    {
        $team = Teams::findOrfail($id);
        $team->is_directors == 1 ? $team->is_directors = 0 : $team->is_directors = 1;
        $team->save();
        return redirect()->back();
    }
}
