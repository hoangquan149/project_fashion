<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\category\AddRequest;
use App\Models\backend\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        if (isset($_GET['sort_by'])) {
            $sortBy = $_GET['sort_by'];
            $by = explode('_',$sortBy);
            $data = Category::orderBy($by[0],$by[1])->get();
        }else{
            $data = Category::orderBy('created_at','DESC')->get();
        }
        return view('backend.pages.category.index',['data'=>$data]);
    }

    public function create(){
        return view('backend.pages.category.add');
    }

    public function store(Request $request){
        $messages =   [
            'name.required'=>"Tên danh mục không được để rỗng",
            'name.unique'=>"Tên danh mục không được trùng",
        ];
        $validator = $request->validate([
            'name' => 'required|unique:categories',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        $data = $request->only('name','status');
        if ($query = Category::create($data)){
            return response()->json([
                'messenger'=>"Thêm mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }

    }

    public function edit($id){
        $data = Category::find($id);
        return view('backend.pages.category.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = Category::find($id)->update($request->all());
        if ($data){
            return response()->json([
                'messenger'=>"Update mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }
    }

    public function destroy($id){
        $category = Category::find($id)->delete();
        return response()->json([
            'messenger'=>"Xóa thành công",
            'status'=>200
        ]);
    }
}
