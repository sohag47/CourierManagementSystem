<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Branch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $viewPath = 'dashboard.settings.user.';
    public function index()
    {
        // $users = User::all()->toArray();
        $users = User::with('roles')->get()->toArray();
        return view($this->viewPath.'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id)->toArray();
        return view($this->viewPath.'edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    
    {
        // dd($request->all());
        $imageName = '';        
        if($request->photo){
            $image = $request->file('photo');
            $imageName = time().'.'.$request->photo->extension();
            $image->move(public_path('photo/user_photo'), $imageName);
            
            $user = [
            'name'=>$request->name,
            'email' =>$request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' =>  $imageName
            ];
            User::where('id', '=', $id)->update($user);
            return redirect()->route('user.index')->with('status', 'Updated Successfully');
        }else{
            $user = [
            'name'=>$request->name,
            'email' =>$request->email,
            'phone' => $request->phone,
            'address' => $request->address
            ];
            User::where('id', '=', $id)->update($user);
            return redirect()->route('user.index')->with('status', 'Updated Successfully');
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
        User::findOrFail($id)->destroy($id);
        return redirect()->back()->with('status', 'Deleted Successfully.');
    }
    public function user_permission($id)
    {
        $user = User::findOrFail($id)->toArray();
        $roles = Role::all()->toArray();
        return view($this->viewPath.'user_role', compact('user', 'roles'));
    }
    public function user_permission_save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_role' => 'required',
        ]);
        // dd($validatedData);
        User::where('id', '=', $id)->update($validatedData);
        return redirect()->back()->with('status', 'Permission Updated Successfully');
    }
    public function userProfile($id)
    {
        $user = User::find($id)->toArray();
        return view($this->viewPath.'profile', compact('user'));
    }

    public function branchUserSetup($id)
    {
        $user = User::findOrFail($id)->toArray();
        $branches = Branch::all()->toArray();
        return view($this->viewPath.'branch_setup_edit', compact('user','branches'));
    }

    public function branchUserSetupSave(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'branch_id' => 'required',
        ]);
        // dd($validatedData);
        User::where('id', '=', $id)->update($validatedData);
        return redirect()->back()->with('status', 'Permission Updated Successfully');
    }
}
