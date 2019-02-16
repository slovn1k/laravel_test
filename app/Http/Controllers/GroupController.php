<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $groups = Group::get();
        return view('group.index', compact('groups'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_groups(Request $request)
    {
        $input = $request->except('_token');

        $groups = Group::get();

        foreach ($groups as $group) {
            $delete_group = $group->id . "_delete_group";
            $group_id = $group->id . "_group_id";
            $name = $group->id . "_name";
            $create = $group->id . "_create";
            $edit = $group->id . "_edit";
            $block = $group->id . "_block";
            $delete = $group->id . "_delete";

            if (isset($input['' . $delete_group])) {
                Group::where('id', $input['' . $group_id])->delete();
            } else {
                $group->update([
                    'name' => $input[$name],
                    'create' => (isset($input['' . $create])) ? 1 : 0,
                    'edit' => (isset($input['' . $edit])) ? 1 : 0,
                    'block' => (isset($input['' . $block])) ? 1 : 0,
                    'delete' => (isset($input['' . $delete])) ? 1 : 0,
                ]);
            }
        }


        return redirect('groups')->with('status', 'Groups updated successfully');
    }

    public function delete_group($id)
    {
        Group::where('id', $id)->delete();
        return redirect('groups')->with('status', 'Group delete successfully');
    }
}
