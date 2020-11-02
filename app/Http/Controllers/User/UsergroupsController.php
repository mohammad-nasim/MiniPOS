<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\UserGroup;
use Illuminate\Http\Request;
use Session;

class UsergroupsController extends Controller
{
    //view
    public function index(){
        $this->data['groups'] = UserGroup::all();
        return view('group.groups', $this->data);
    }

    //creat
    public function create(){
       return view('group.create');
    }

    //insert
    public function store(Request $request){
        $groupName = $request->all();

        if(UserGroup::create($groupName)){
            session::flash('message-success', 'Group Created Successfully');
            return redirect()->route('group-view');
        }      
    }

    //edit
    public function edit($id){
        $this->data['editGroup'] = UserGroup::find($id);
        return view('group.edit', $this->data);
    }

    //update
    public function update (Request $request, $id){
        $updateGroup = UserGroup::find($id);

        $updateGroup->title = $request->title;
        if($updateGroup->save()){
            session::flash('message-success', 'Group Updated Successfully');
            return redirect()->route('group-view');
        }
    }

    //delete
    public function destroy($id){

        if(UserGroup::find($id)->delete()){
            session::flash('message-danger', 'Group Deleted Successfully');
            return redirect()->route('group-view');
        }
        
    }
}
