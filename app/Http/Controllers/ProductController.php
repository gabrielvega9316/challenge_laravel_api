<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ApiResponse;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $search = $request->query('search');
        try {
            $query = Product::query();
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }

            $products = $query->paginate($perPage);
            return ApiResponse::ok(__('messages.product_get_ok'), 'products', $products->toArray());

        } catch (\Throwable $th) {
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, Product::$rules);
        if($validator->fails()) return ApiResponse::badRequest($validator->errors());
        // dd('aqui toy');

        DB::beginTransaction();
        try {
            $product = Product::create($data);
            $image = ImageService::store($request->file('file'), $product);
            $product->update(['image' => $image]);

            $response = $product->with('category')->find($product->id);
            DB::commit();
            return ApiResponse::created(__('messages.product_store_ok'), $response->toArray(), 'product');
        } catch (\Throwable $th) {
            DB::rollback();
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try {
            if($product) return ApiResponse::ok(__('messages.product_get_id_ok'), $product, 'product');
            else return ApiResponse::notFound(__('messages.product_get_id_404'));

        } catch (\Throwable $th) {
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $validator = Validator::make($data, Product::$rules);
        if($validator->fails()) throw new ValidationException($validator);

        DB::beginTransaction();
        try {
            $product->update($data);
            //logica de update de imagen
            DB::commit();

            $response = $product->with('category');
            return ApiResponse::ok(__('messages.product_update_ok'), $response->toArray(), 'product');
        } catch (\Throwable $th) {
            return (config('app.debug')) ? ApiResponse::serverError($th->getMessage()) : ApiResponse::serverError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product){
            $product->delete();
            return ApiResponse::ok(__('messages.product_delete_ok'), $product, 'product');
        } else {
            return ApiResponse::notFound(__('messages.product_delete_404'));
        }
    }
}
