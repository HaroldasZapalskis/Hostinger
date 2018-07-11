<ul>
    @foreach($tree as $category)
        <li>{{$category->name}}</li>
        @isset($category->children)
            @include('recursive_category', ['tree' => $category->children])
        @endisset
    @endforeach
</ul>