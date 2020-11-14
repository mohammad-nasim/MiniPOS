<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();

        return view('user.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups'] = UserGroup::arrForSelect();
        return view('user.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $group_id = $request->group_id;
        $name     = $request->name;
        $email    = $request->email;
        $phone    = $request->phone;
        $address  = $request->address;
       
        if( User::create([
            'group_id' => $group_id,
            'name'     => $name,
            'email'    => $email,
            'phone'    => $phone,
            'address'  => $address
        ])){
            session::flash('message-success', 'User Created Successfully');
            return redirect()->route('users.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['groups'] = UserGroup::arrForSelect();
        $this->data['show'] = User::findorfail($id);

         return view('user.edit', $this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();  

        $user = User::find($id);
        $user->group_id = $data['group_id'];
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->phone    = $data['phone'];
        $user->address  = $data['address'];

        if($user->save()){
            session::flash('message-success', 'User Updated Successfully');
            return redirect()->route('users.index');
        }

      

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            session::flash('message-danger', 'User Deleted Successfully');
            return redirect()->route('users.index');
        }
    }
}
