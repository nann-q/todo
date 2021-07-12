<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;


class TodoController extends Controller
{
    public function index()
    {
        $contents=Content::orderBy('id','asc')->get();
        return view('todo.index',[
            "contents"=>$contents,
        ]);
    }

    public function create(Request $request)
    {
        $content=new Content();
        $content->content=$request->content;
        $content->created_at=$request->created_at;
        $content->save();
        return redirect('/');
    }

    public function post(Request $request)
    {
        $content=$request->all();
        unset($content['_token_']);
        $content->fill($content)->save();
        return redirect('/');

        $validate_rule=[
            'content'=>'required|max:20',
        ];
        $this->validate($request,$validate_rule);
        return view('/');
    }

    public function store(Request $request)
    {
        // error
        $validate_rule=[
            'content'=>'required|max:20',
        ];
        $this->validate($request,$validate_rule);

        Content::create([
            'content'=>$request->content,
        ]);

        return redirect('/');

    }

    public function update($id,Request $request)
    {
        // error
        $validate_rule=[
            'content'=>'required|max:20',
        ];
        $this->validate($request,$validate_rule);

        $content=Content::find($id);
        $content->content=$request->content;
        $content->save();
        return redirect('/');
    }

    public function delete($id)
    {
        $content=Content::find($id);
        $content->delete();
        return redirect('/');
    }
}
