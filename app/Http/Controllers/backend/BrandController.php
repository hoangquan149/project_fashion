<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\brand\AddRequest;
use App\Models\backend\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        if (isset($_GET['status'])) {
            $sortBy = $_GET['status'];
            $brand = Brand::where('status',$sortBy)->get();
        }else{
            $brand = Brand::all();
        }
        return view('backend.pages.brand.index',compact('brand'));
    }

    public function getBrand(){
        $data = Brand::where('status',1)->orderBy('id','desc')->get();
        return view('backend.pages.brand.table',compact('data'));
    }
    public function create(){
        return view('backend.pages.brand.add');
    }

    public function store(Request $request){
        $messages =   [
            'name.required'=>"Tên nhãn hiệu không được để rỗng",
            'name.unique'=>"Tên nhãn hiệu không được trùng",
        ];
        $validator = $request->validate([
            'name' => 'required|unique:brands',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        if ($data = Brand::create($request->all())){
            return response()->json([
                'messenger'=>"Thêm mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }
        return response()->json([
            'messenger'=>"Thêm mới thất bại",
            'status'=>404
        ]);

    }

    public function edit($id){
        $data = Brand::find($id);
        return view('backend.pages.brand.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = Brand::find($id)->update($request->all());
        if ($data){
            return response()->json([
                'messenger'=>"Update mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }
    }

    public function destroy($id){
        Brand::find($id)->delete();
        return response()->json([
            'messenger'=>"Xóa thành công",
            'status'=>200
        ]);
    }
}
