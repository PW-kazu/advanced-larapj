<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Author::Paginate(4);
        $param = ['items' => $items, 'user' =>$user];
        return view('index',$param);
    }
    public function add()
    {
        return view('add');
    }
    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {
        $item = Author::where('name','LIKE',"%{$request->input}%")->first();
        $param = [
            'input'=>$request->input,
            'item'=>$item
        ];
        return view('find', $param);
    }
    public function bind(Author $author)
    {
        $data = [
            'item'=>$author,
        ];
        return view('author.binds',$data);
    }
    public function create(Request $request)
    {
        $this->validate($request,Author::$rules);
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $this->validate($request,Author::$rules);
        $form = $request->all();
        unset($form['_token']);
        Author::where('id',$request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete',['form'=>$author]);
    }
    public function remove(Request $request)
    {
        AUthor::find($request->id)->delete();
        return redirect('/');
    }
    
    public function relate(Request $request) 
    {
        $hasItems = Author::has('book')->get();
        $noItems = Author::doesntHave('book')->get();
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('author.index',$param);
    }
    
    public function check(Request $request)
    {
    $text = ['text' => 'ログインして下さい。'];
    return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        $text =   Auth::user()->name . 'さんがログインしました';
    } else {
        $text = 'ログインに失敗しました';
    }
    return view('auth', ['text' => $text]);
    }

    
   
}
?>
