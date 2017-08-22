<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;

class BrandsController extends Controller
{
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getAllActive($status) {
        $brands = Brand::where('status', $status)
            ->orderBy('name', 'desc')
            ->take(10)
            ->get();
        return response($brands);
    }

    public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('search')){
            $brands = Brand::where("name", "LIKE", "%{$request->get('search')}%")
                ->orWhere('created_at','LIKE',"%{$request->get('search')}%")
                ->paginate(5);
        }else{
            $brands = Brand::paginate(5);
        }
        return response($brands);
    }


    public function create()
    {

    }

    public function show($id)
    {
        $item = Brand::find($id);
        return response($item);
    }

    public function edit($id)
    {
        $item = Brand::find($id);
        return response($item);
    }


    public function update(Request $request, $id)
    {
        $user = new User();
        $user->fill(Input::get());
        $user->user_id = Auth::user()->id;

        $brand= Brand::findOrFail($id);
        $brand->name = $request['name'];
        $brand->description = $request['description'];
        $brand->user_id = "$user->user_id";

        $brand->save();

        return response($brand);
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->fill(Input::get());
        $user->user_id = Auth::user()->id;

        $brand = new Brand();
        $brand->name = $request['name'];
        $brand->description = $request['description'];
        $brand->user_id = "$user->user_id";

        $brand->save();

        return response($brand);
    }

    public function destroy($id)
    {
        return Brand::where('id',$id)->delete();
    }

    public  function disable(Request $request, $id) {
        try{
            $brand= Brand::findOrFail($id);
            $brand->status = $request[0];
            $brand->updated_at = $request['$updated_at'];
            $brand->save();
            return response($brand);
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }

    public  function enable(Request $request, $id) {
        try{
            $brand= Brand::findOrFail($id);
            $brand->status = 1;
            $brand->updated_at = $request['$updated_at'];
            $brand->save();
            return response($brand);
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }

}
