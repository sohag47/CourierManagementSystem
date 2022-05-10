<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\User;
use App\Models\Address;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $viewPath = 'dashboard.branch.';

    public function index()
    {
        $branches = Branch::with('addresses')->get()->toArray();
        // dd($branches);
        return view($this->viewPath.'index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::get()->toArray();
        return view($this->viewPath.'add', compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:branch,name',
            'phone' => 'required',
            'address_id' => 'required',
            'status' => 'required',
        ]);
        Branch::create($validatedData);
        return redirect()->route('address.index')->with('status', 'Saved Successfully');
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
        $branch = Branch::find($id)->toArray();
        $addresses = Address::get()->toArray();
        return view($this->viewPath.'edit', compact('branch', 'addresses'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address_id' => 'required',
            'status' => 'required',
        ]);
        Branch::where('id', '=', $id)->update($validatedData);
        return redirect()->route('branch.index')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::findOrFail($id)->destroy($id);
        return redirect()->route('branch.index')->with('status', 'Deleted Successfully.');
    }
    public function branchSetup()
    {
        $users = User::with('branch', 'roles')->get()->toArray();
        // dd($users);
        return view($this->viewPath.'branch_setup', compact('users'));
    }
    
}
