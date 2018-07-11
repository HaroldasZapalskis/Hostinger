<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function iterative()
    {
        $categories = Category::orderBy('depth')->orderBy('parent_id')->get();
        $maxDepth = Category::getMaxDepth();

        return view('iterative')
            ->with(['categories' => $categories, 'maxDepth' => $maxDepth]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'parent_id' => 'required',
        ]);

        $parent = Category::find($request->parent_id);
        if($validator->fails() || (empty($parent) && $request->parent_id != 0)) {
            return redirect('/recursive');
        }

        $category = new Category;
        $category->name = $request->name;

        if($request->parent_id != 0) {
            $category->parent_id = $request->parent_id;
            $depth =  Category::select('depth')->where('id', $request->parent_id)->get();
            $category->depth = $depth[0]['depth'] + 1;
        } else {
            $category->depth = 1;
        }
        $category->save();

        return redirect('/recursive');
    }
}
