<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illminate\Http\Response
     */

    public function index()
    {
        
        $companies = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }
    /**
     * show the for for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('companies.create');

    }

    /**
     * store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'address'=> 'required',
            'number'=>'required',
        ]);
    

        Company::create($request->post());

        return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');

       
           
    }

    /**
     * display the specified resource.
     * 
     * @param \app\company $company
     * @return \Illuminate\Http\Response
     */


    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
    /**
     * show the form for editing the specified resource.
     * 
     * @paran \App\Company $company
     * @return \Illuminate\Http\Response
     */

    public function edit(Company $company)
    {
        return view ('companies.edit', compact('company'));

    }

    /**
     * remove the specified resource from storage.
     * 
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'number' =>'required',
        ]);

        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success', 'Company has been update successfully.');

    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company has been deleted successfully.');

    }
}
