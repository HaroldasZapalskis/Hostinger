@extends('layout')
@section('content')
    <ul>
        @for ($i = 0; $i < count($categories); $i++)
            @if($i > 0 && $categories[$i]->parent_id != $categories[$i-1]->parent_id)
                @push('scripts')
                    <script>
                        var element = document.getElementById({{$categories[$i]->parent_id}});
                        var li = document.createElement("LI");
                        li.setAttribute("id", {{$categories[$i]->id}});
                        li.appendChild(document.createTextNode('{{$categories[$i]->name}}'));
                        var ul = document.createElement("UL");
                        ul.setAttribute("id", {{$categories[$i]->parent_id}});
                        ul.appendChild(li);
                        element.appendChild(ul);
                        element.removeAttribute("id");
                    </script>
                @endpush
            @else
                @if($categories[$i]->depth != 1)
                    @push('scripts')
                        <script>
                            var li = document.createElement("LI");
                            li.setAttribute("id", {{$categories[$i]->id}});
                            li.appendChild(document.createTextNode('{{$categories[$i]->name}}'));
                            document.getElementById({{$categories[$i]->parent_id}}).appendChild(li);
                        </script>
                    @endpush
                @else
                    <li id={{$categories[$i]->id}}>{{$categories[$i]->name}}</li>
                @endif
            @endif
        @endfor
    </ul>
    @stack('scripts')
@stop