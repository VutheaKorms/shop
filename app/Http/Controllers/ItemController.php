<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use DB;

class ItemController extends Controller
{

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index(Request $request)
    {
        $products = DB::table('products')
            ->select('products.description as description',
                'products.price as price',
                'products.status as status',
                'products.created_at as created_at',
                'products.product_name as product_name',
                'products.product_code as product_code',
                'products.created_at as created_at',
                'product_photos.deleted_at as deleted_at',
                'product_photos.name as photo_name',
                'product_photos.product_id as product_id',
                'products.type as product_type',
                'products.category_id as category_id',
                'categories.id as category_id',
                'brands.id as brand_id',
                'brands.name as brand_name',
                'categories.name as category_name')
            ->join('categories','categories.id', '=' ,'products.category_id')
            ->join('brands','brands.id', '=' ,'products.brand_id')
            ->join('product_photos','products.id', '=' ,'product_photos.product_id')
            ->groupBy('products.product_name')
            ->distinct('product_photos.product_id')
            ->where("products.category_id","=", "{$request->get('category_id')}")
            ->orWhere("products.brand_id","=", "{$request->get('brand_id')}")
            ->orWhere('products.product_name','LIKE',"%{$request->get('search')}%")
            ->orWhere('products.created_at','LIKE',"%{$request->get('search')}%")
            ->orderBy('products.created_at', 'asc')
            ->paginate(6);

        return response($products);

    }

    public function getProByCate($category_id)
    {
        $products = DB::table('products')
            ->select('products.description as description',
                'products.price as price',
                'products.status as status',
                'products.created_at as created_at',
                'products.product_name as product_name',
                'products.product_code as product_code',
                'products.created_at as created_at',
                'product_photos.deleted_at as deleted_at',
                'product_photos.name as photo_name',
                'product_photos.product_id as product_id',
                'products.type as product_type',
                'products.category_id as category_id',
                'categories.id as category_id',
                'categories.name as category_name')
            ->join('categories','categories.id', '=' ,'products.category_id')
            ->join('product_photos','products.id', '=' ,'product_photos.product_id')
            ->groupBy('products.product_name')
            ->distinct('product_photos.product_id')
            ->where("products.category_id","=", $category_id)
            ->paginate(6);

        return view('search', ['products' => $products]);

    }

    public function getProByCategory($category_id)
    {
        $products = DB::table('products')
            ->select('products.description as description',
                'products.price as price',
                'products.status as status',
                'products.created_at as created_at',
                'products.product_name as product_name',
                'products.product_code as product_code',
                'products.created_at as created_at',
                'product_photos.deleted_at as deleted_at',
                'product_photos.name as photo_name',
                'product_photos.product_id as product_id',
                'products.type as product_type',
                'products.category_id as category_id',
                'categories.id as category_id',
                'categories.name as category_name')
            ->join('categories','categories.id', '=' ,'products.category_id')
            ->join('product_photos','products.id', '=' ,'product_photos.product_id')
            ->groupBy('products.product_name')
            ->distinct('product_photos.product_id')
            ->where("products.category_id","=", $category_id)
            ->paginate(6);

        return response($products);

    }

    public function store(Request $request)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request,$id)
    {

    }
    public function destroy($id)
    {

    }


    public function detail($id) {

        $product = DB::table('products')
            ->select('products.description as description',
                'products.price as price',
                'products.id as product_id',
                'products.specification as specification',
                'products.status as status',
                'products.created_at as created_at',
                'products.product_name as product_name',
                'products.product_code as product_code',
                'products.product_color as product_color',
                'products.type as product_type',
                'brands.id as brand_id',
                'contacts.name as contact_name',
                'contacts.email_address as email_address',
                'addresses.address1 as address1',
                'addresses.address2 as address2',
                'countries.name as country_name',
                'states.name as state_name',
                'locations.name as location_name',
                'contacts.number1 as phone_number',
                'brands.name as brand_name',
                'categories.name as category_name')
            ->join('categories','categories.id', '=' ,'products.category_id')
            ->join('contacts','contacts.id', '=' ,'products.contact_id')
            ->join('addresses','addresses.id', '=' ,'contacts.address_id')
            ->join('countries','countries.id', '=' ,'addresses.country_id')
            ->join('states','states.id', '=' ,'addresses.state_id')
            ->join('locations','locations.id', '=' ,'addresses.location_id')
            ->join('brands','brands.id', '=' ,'products.brand_id')
            ->where('products.id','=', $id)
            ->get();

        $product_photo = DB::table('product_photos')
            ->select('product_photos.product_id as product_id','product_photos.name as image')
            ->where('product_photos.product_id',$id)
            ->get();

        return view('product_details', ['product' => $product, 'product_photo' => $product_photo]);

        //return view('product_details')->with('product', $product);
    }

}
