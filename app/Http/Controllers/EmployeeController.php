<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Employee;
use Session;

class EmployeeController extends Controller
{

    public function index()
    {
        return view('admin.employees.index')->with('employees',Employee::all());
    }

   
    public function create()
    {
         return view('admin.employees.create');
    }

   
    public function store(Request $request)
    {
       
       $user=Employee::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
            'inviteToZoho' => $request->zoho,
            'inviteToSlack' => $request->slack,
            'inviteToAsana' => $request->asana
        ]);

        Session::flash('success', 'employee added successfuly.');
        return redirect()->route('users');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
