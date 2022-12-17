<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    public function __construct() {
        $this->category = new Category();
    }

    public function index() {
        return view('categories', ['categories'=>$this->category->all()]);
    }

    public function show($id) {
        return view('categories', ['category'=> Category::find($id)]);
    }
}
