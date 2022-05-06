<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        if (isset($_GET['sort_by'])) {
            $sortBy = $_GET['sort_by'];
            $by = explode('_',$sortBy);
            $data = Blog::orderBy($by[0],$by[1])->get();
        }else{
            $data = Blog::all();
        }
        return view('backend.pages.blog.index',compact('data'));
    }

    public function create()
    {
        return view('backend.pages.blog.add');
    }

    public function uploadImage($request){
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move('uploads/blog/',$file_name);
        }
        return $file_name;
    }

    public function store(Request $request)
    {
        $messages =   [
            'title.required'=>"Tiêu đề không được để rỗng",
            'title.unique'=>"Tiêu đề không được trùng",
            'content.required'=>'Nội dung không được để trống',
            'image.required'=>'ảnh không được để trống',
        ];
        $validator = $request->validate([
            'title' => 'required|unique:blogs',
            'content' => 'required',
            'image' => 'required|unique:banners',
        ],$messages);
        if ($validator->passes()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        $request->merge(['image'=>$this->uploadImage($request)]);
        $data = Blog::create($request->all());
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
        $data = Blog::find($id);
        return view('backend.pages.blog.edit',compact('data'));
    }


    public function update(Request $request,Blog $blog){
        if ($request->file('file')){
            unlink(public_path('uploads/blog/' . $blog->image));
            $file_name = $this->uploadImage($request);
        }else{
            $file_name = $blog->image;
        }
        $request->merge(['image'=>$file_name]);
        $data = $blog->update($request->all());
//
        return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        $delete = Blog::find($id)->delete();
        if ($delete){
            return response()->json([
                'messenger'=>"Xóa thành công",
                'status'=>200
            ]);
        }
    }
}
