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
        $data = companies::paginate(10);
        $employee = employees::paginate(10);
        // $data_emp = DB::select('select name from companies');
        return view('home',compact('data','employee'));
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

    public function edit($id){
        $ids = companies::find($id);
        return view('/edit_company',compact('ids'));
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
    public function hapus($id){
        
    }
}
