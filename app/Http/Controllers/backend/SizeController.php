<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        if (isset($_GET['sort_by'])) {
            $sortBy = $_GET['sort_by'];
            $by = explode('_',$sortBy);
            $data = Size::orderBy($by[0].'_'.$by[1],$by[2])->get();
        }else{
            $data = Size::all();
        }
        return view('backend.pages.size.index',['data'=>$data]);
    }


    public function create(){
        return view('backend.pages.size.add');
    }

    public function store(Request $request){
        $messages =   [
            'name.required'=>"Tên size không được để rỗng",
            'name.unique'=>"Tên size  không được trùng",
        ];
        $validator = $request->validate([
            'name' => 'required|unique:sizes',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        if ($data = Size::create($request->all())){
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
        $data = Size::find($id);
        return view('backend.pages.size.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = Size::find($id)->update($request->all());
        if ($data){
            return response()->json([
                'messenger'=>"Update mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }
    }

    public function destroy($id){
        Size::find($id)->delete();
        return response()->json([
            'messenger'=>"Xóa thành công",
            'status'=>200
        ]);
    }
}
