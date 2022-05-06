<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\color\AddRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        if (isset($_GET['sort_by'])) {
            $sortBy = $_GET['sort_by'];
            $by = explode('_',$sortBy);
            $data = Color::orderBy($by[0].'_'.$by[1],$by[2])->paginate(5);
        }else{
            $data = Color::paginate(5);
        }
        return view('backend.pages.color.index',['data'=>$data]);
    }

    public function getColor(){
        $data = Color::where('status',1)->orderBy('id','desc')->get();
        return view('backend.pages.color.table',compact('data'));
    }

    public function create(){
        return view('backend.pages.color.add');
    }

    public function store(Request $request){
        $messages =   [
            'name.required'=>"Tên màu không được để rỗng",
            'name.unique'=>"Tên danh mục không được trùng",
            'value.required'=>"Mã không rỗng",
        ];
        $validator = $request->validate([
            'name' => 'required|unique:colors',
            'value' => 'required',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        if ($data = Color::create($request->all())){
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
        $data = Color::find($id);
        return view('backend.pages.color.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = Color::find($id)->update($request->all());
        if ($data){
            return response()->json([
                'messenger'=>"Update mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }
    }

    public function destroy($id){
        Color::find($id)->delete();
        return response()->json([
            'messenger'=>"Xóa thành công",
            'status'=>200
        ]);
    }
}
