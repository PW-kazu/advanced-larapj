<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function index()
    {
        $items = Author::all();
        return view('index', ['items' => $items]);
    }
}
?>
