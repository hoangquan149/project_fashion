<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\product\AddRequest;
use App\Models\backend\Brand;
use App\Models\backend\Category;
use App\Models\backend\ImageProduct;
use App\Models\backend\Product;
use App\Models\ColorProduct;
use App\Models\SizeProduct;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function index(){
        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];
            $by = explode('_',$filter);
            $data = Product::orderBy($by[0],$by[1])->get();
        }else if (isset($_GET['sort_by'])){
            $sortBy = $_GET['sort_by'];
            $by = explode('_',$sortBy);
            $data = Product::orderBy($by[0],$by[1])->get();
        }else if (isset($_GET['status'])){
            $sortBy = $_GET['status'];
            $data = Product::where('status',$sortBy)->get();
        }else{
            $data = Product::orderBy('created_at','desc')->get();
        }
        return view('backend.pages.product.index',compact('data'));
    }

    public function create(){
        return view('backend.pages.product.add');
    }

    public function addImageProduct(Request $request,$product){
        if ($request->file('files')){
            foreach ($request->file('files') as $files) {
                $file_name = $files->getClientOriginalName();
                $files->move(public_path('uploads/imageProduct/'), $file_name);
                ImageProduct::create(
                    [
                        'image' => $file_name,
                        'product_id' => $product->id
                    ]
                );
            }
        }
    }

    public function show(){

    }


    public function addColorProduct($request,$product){
        
        foreach ($request->colors as $value){
            ColorProduct::create([
                'product_id'=>$product->id,
                'color_id'=>$value
            ]);
        }
    }

    public function addSizeProduct($request,$product){
        foreach ($request->sizes as $value){
            SizeProduct::create([
                'product_id'=>$product->id,
                'size_id'=>$value
            ]);
        }
    }

    public function store(Request $request){
        // if(!is_array($request['test'])){
        //     $request['test'] = [];
        // }
        // array_push($request['test'],'man');
        dd($request['test']);
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move('uploads/product/',$file_name);
        }
        $request->merge(['image' => $file_name]);
        $product = Product::create(
            $request->all()
        );

        if ($product){
            $this->addImageProduct($request,$product);
            $this->addColorProduct($request,$product);
            $this->addSizeProduct($request,$product);
            return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
        }else{
            dd("Thêm sản phẩm bị lỗi");
        }
    }

    public function update(Request $request,Product $product){
        if ($request->file('file')) {
            unlink(public_path('uploads/product/' . $product->image));
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move('uploads/product/', $file_name);
        } else {
            $file_name = $product->image;
        }

        $request->merge(['image' => $file_name]);

        $product->update($request->all());

        if ($request->file('files')){
            ImageProduct::where('product_id',$product->id)->delete();
            $this->addImageProduct($request,$product);
        }

        if ($product){
            ColorProduct::where('product_id',$product->id)->delete();
            $this->addColorProduct($request,$product);
            SizeProduct::where('product_id',$product->id)->delete();
            $this->addSizeProduct($request,$product);

            return redirect()->route('product.index')->with('success','Update thành công');
        }else{
            dd('update thất bại');
        }
    }

    public function edit(Product $product){
        $color_product = ColorProduct::where('product_id',$product->id)->pluck('color_id')->toArray();
        $size_product = SizeProduct::where('product_id',$product->id)->pluck('size_id')->toArray();
        return view('backend.pages.product.edit',compact('product','color_product','size_product'));
    }

    public function destroy($id){
       if ($id){
           ColorProduct::where('product_id',$id)->delete();
           SizeProduct::where('product_id',$id)->delete();
           ImageProduct::where('product_id',$id)->delete();
           Product::find($id)->delete();
           return ['messenger'=>'Xóa thành công','status'=>200];
       }
    }
}
