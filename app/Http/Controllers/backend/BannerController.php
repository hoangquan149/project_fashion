<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        if (isset($_GET['sort_by'])) {
            $sortBy = $_GET['sort_by'];
            $pieces = explode("_", $sortBy);
            $data = Banner::orderBy($pieces[0].'_'.$pieces[1], $pieces[2])->get();
        }else{
            $data = Banner::all();
        }
        return view('backend.pages.banner.index',compact('data'));
    }


    public function create()
    {
        return view('backend.pages.banner.add');
    }

    public function uploadImage($request){
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move('uploads/banner/',$file_name);
        }
        return $file_name;
    }

    public function store(Request $request)
    {
        $messages =   [
            'title.required'=>"Tiêu đề không được để rỗng",
            'title.unique'=>"Tiêu đề không được trùng",
            'content.required'=>'Nội dung không được để trống',
            'image.required'=>'ảnh không được để trống'
        ];
        $validator = $request->validate([
            'title' => 'required|unique:banners',
            'content' => 'required',
            'image' => 'required|unique:banners',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        $request->merge(['image'=>$this->uploadImage($request)]);
        $data = Banner::create($request->all());
        if ($data){
            return response()->json([
                'messenger'=>"Thêm mới thành công",
                'data'=>$data,
                'status'=>200
            ]);
        }
    }



    public function edit($id)
    {
        $data = Banner::find($id);
        return view('backend.pages.banner.edit',compact('data'));
    }


    public function update(Request $request,Banner $banner){
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move('uploads/banner/',$file_name);
        }else {
            $file_name = $banner->image;
        }
        $request->merge(['image'=>$file_name]);
        $data = $banner->update($request->all());
        if ($data){
            return redirect()->route('banner.index');
        }
    }

    public function destroy($id)
    {
        $delete = Banner::find($id)->delete();
        if ($delete){
            return response()->json([
                'messenger'=>"Xóa thành công",
                'status'=>200
            ]);
        }
    }
}
