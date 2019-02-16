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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_group()
    {
        return view('group.create');
    }

    public function store_group(Request $request)
    {
        $new_group = new Group();
        $new_group->insert([
            'name' => $request->group_name,
            'create' => (isset($request->group_create) ? 1 : 0),
            'edit' => (isset($request->group_edit) ? 1 : 0),
            'block' => (isset($request->group_block) ? 1 : 0),
            'delete' => (isset($request->group_delete) ? 1 : 0),
            'allow_assign' => (isset($request->group_assign) ? 1 : 0),
            'allow_permission' => (isset($request->assign_permission) ? 1 : 0),
        ]);

        return redirect('groups')->with('status', 'Group created');
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
            $assign = $group->id . "_group_assign";
            $permission = $group->id . "_assign_permission";

            if (isset($input['' . $delete_group])) {
                Group::where('id', $input['' . $group_id])->delete();
                $message = "Groups deleted successfully";
            } else {
                $group->update([
                    'name' => $input[$name],
                    'create' => (isset($input['' . $create])) ? 1 : 0,
                    'edit' => (isset($input['' . $edit])) ? 1 : 0,
                    'block' => (isset($input['' . $block])) ? 1 : 0,
                    'delete' => (isset($input['' . $delete])) ? 1 : 0,
                    'allow_assign' => (isset($input['' . $assign])) ? 1 : 0,
                    'allow_permission' => (isset($input['' . $permission])) ? 1 : 0,
                ]);
                $message = "Groups updated successfully";
            }
        }


        return redirect('groups')->with('status', $message);
    }

    public function delete_group($id)
    {
        Group::where('id', $id)->delete();
        return redirect('groups')->with('status', 'Group delete successfully');
    }
}
