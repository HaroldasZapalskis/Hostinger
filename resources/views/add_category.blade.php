{{ Form::open(['route' => 'category.store']) }}
<div class="form-group">
    {!! Form::label('parent_id', 'Enter category\'s name') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('parent_id', 'Select root category\'s name') !!}
    <select name="parent_id">
        <option value=0>root</option>
        @foreach($categories as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
        @endforeach
    </select>
</div>
{!! Form::submit('Submit', ['class'=> 'btn btn-info']) !!}
{!! Form::close() !!}