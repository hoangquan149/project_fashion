<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    public function index(){
        if (isset($_GET['sort_by'])) {
            $sortBy = $_GET['sort_by'];
            $by = explode('_',$sortBy);
            $data = CategoryBlog::orderBy($by[0].'_'.$by[1],$by[2])->get();
        }else{
            $data = CategoryBlog::all();
        }
        return view('backend.pages.blogCate.index',['data'=>$data]);
    }

    public function create(){
        return view('backend.pages.blogCate.add');
    }

    public function store(Request $request){
        $messages =   [
            'name.required'=>"Tên danh mục không được để rỗng",
            'name.unique'=>"Tên nhãn hiệu không được trùng",
        ];
        $validator = $request->validate([
            'name' => 'required|unique:category_blogs',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        $data = $request->only('name','status');
        if ($query = CategoryBlog::create($data)){
            return response()->json([
                'messenger'=>"Thêm mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }

    }

    public function edit($id){
        $data = CategoryBlog::find($id);
        return view('backend.pages.blogCate.edit',compact('data'));
    }

    public function update(Request $request, $id){
        if (CategoryBlog::find($id)->update($request->all())){
            return response()->json([
                'messenger'=>"Update mới thành công",
                'status'=>200
            ]);
        }
    }

    public function destroy($id){
        CategoryBlog::find($id)->delete();
        return response()->json([
            'messenger'=>"Xóa thành công",
            'status'=>200
        ]);
    }
}
