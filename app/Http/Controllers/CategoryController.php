<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function recursive()
    {
        $categories = Category::all();

        $tree = $this->buildRecursiveTree($categories, null);

        return view('recursive')
            ->with(['categories' => $categories, 'tree' => $tree]);
    }

    public function buildRecursiveTree($categories, $parentId) {
        $branch = array();

        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $children = $this->buildRecursiveTree($categories, $category->id);
                if ($children) {
                    $category->children = $children;
                }
                $branch[] = $category;
            }
        }
        return $branch;
    }
}
