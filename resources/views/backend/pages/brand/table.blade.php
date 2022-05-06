@isset($data)
    @foreach($data as $key => $value)
        <tr class="list-color">
            <td id="">{{$loop->index+1}}</td>
            <td id="name">{{$value->name}}</td>
            <td id="status">{{($value->status==1)?"Hiện":"Ẩn"}}</td>
            <td>
                <a href="{{route('brand.edit',$value->id)}}" style="cursor: pointer" class="status_btn btn-edit" >Edit</a>
                <a href="{{route('brand.destroy',$value->id)}}" style="cursor: pointer" class="status_btn btn-delete">Delete</a>
            </td>
        </tr>
    @endforeach
@endisset
