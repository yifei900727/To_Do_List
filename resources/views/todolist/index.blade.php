{{-- @extends('layouts.todolist') --}}

@extends('dashboard')

    



@section('main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}

@if($errors->any())
<div class="p-3 mb-2 bg-danger text-white">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>

</div>
@endif

<form action="{{route('todolist.store')}}" method="POST">
    @csrf
    <input type="text" value="{{old('content')}}" class="form-label" placeholder="輸入代辦事項" name="content">
    <button type="submit" class="btn btn-secondary">新增代辦事項</button>
</form>

<table class="table mb-4">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">ToDoList</th>
            <th scope="col">新增時間</th>
            <th scope="col">新增人員</th>
            <th scope="col">狀態</th>
            <th scope="col">選項</th>
        </tr>
    </thead>



    @foreach ($todolists as $id=>$todolist )
{{-- @if ()
    
@endif --}}
    <tbody>
        <tr>
            <th scope="row">{{$id+1}}</th>
            <td>{{$todolist->content}}</td>
            <td>{{$todolist->created_at}}</td>
            <td>{{$todolist->user->name}}</td>
            @if ($todolist->state==0)
            <td>未完成</td>
            @else
            <td>完成</td>
            @endif

            <td>
                <div class=" d-flex ">
                    <a href="{{route('todolist.update',$todolist)}}" class="btn btn-primary me-2">完成</a>
                    <form action="{{route('todolist.destroy',$todolist)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">刪除</button>
                    </form>

                </div>

            </td>
        </tr>
    </tbody>
    {{-- <ul>
    <h4>{{$todolist->content}}</h4>
    <div class="container">
        {{$todolist->created_at}}&emsp;
        <a href="{{route('todolist.edit',['todolist' => $todolist -> id])}}" class="btn btn-warning">修改</a>
        &nbsp;

        &nbsp;
        <form action="{{route('todolist.destroy',$todolist)}}" method="POST">
            @csrf
            @method('delete')
            <button type="" class="btn btn-danger">刪除</button>
        </form>

    </div>

    </ul> --}}
    @endforeach

</table>
{{$todolists ->links()}}
@endsection
