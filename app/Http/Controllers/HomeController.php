<?php

namespace App\Http\Controllers;
use DB;
use \App\companies;
use \App\employees;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = companies::all();
        $employee = employees::paginate(10);
        
        // $data_emp = DB::select('select id,name from companies where id = company_id');
        return view('home',compact('companies','employee'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:companies,name',
            'email' => 'required|unique:companies,email|email'
        ],[
            'name.unique' =>'Nama Perusahaan Ada Yang Sama',
            'email.unique' =>'Email Ada Yang Sama',
            'email' =>'Format Email Salah',
        ]);
        companies::create($request->all());
        return redirect('/home');
    }
    public function add(Request $request)
    {
         $this->validate($request,[
            'firstname' => 'required|unique:employees,firstname',
            'email' => 'required|unique:employees,email|email',
            'phone' => 'required|numeric'
        ],[
            'firstname.unique' =>'Nama Depan Ada Yang Sama',
            'email.unique' =>'Email Ada Yang Sama',
            'email' =>'Format Email Salah',
        ]);
        employees::create($request->all());
        return redirect('/home');
    }

    public function upd(Request $request, $id)
    {
        $is = employees::find($id);
        $is->update($request->all());
        // dd($is);
        return redirect('/home');
    }
    public function edit($id){
        $ids = companies::find($id);
        return view('/edit_company',compact('ids'));
    }
    public function edits($id)
    {
        $companies = companies::all();
        $id = employees::find($id);
        return view('/edit_employee',compact('id','companies'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|unique:companies,name',
            'email' => 'required|unique:companies,email|email'
        ],[
            'name.unique' =>'Nama Perusahaan Ada Yang Sama',
            'email.unique' =>'Email Ada Yang Sama',
            'email' =>'Format Email Salah'
        ]);
        $ids = companies::find($id);
        $ids->update($request->all());
        return redirect('/home');
    }
    public function destroy($id){
        $datas = companies::find($id);
        $datas->delete($datas);
        return redirect('/home');
    }
    public function destroys($id){
        $emp = employees::find($id);
        $emp->delete($emp);
        return redirect('/home');
    }
}
