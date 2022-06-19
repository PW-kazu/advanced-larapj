<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $items = Author::all();
        return view('index', ['items' => $items]);
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
        $item = Author::find($request->input);
        $param = [
            'item' => $item,
            'input' => $request->input
        ];
        return view('find', $param);
    }
}
?>
