
<div class="form-group">
    {{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}
    <select name="{{ $key }}" class="form-control select2" id="">
        @foreach (getCategory()->section as $key => $item)
        <option value="{{ $item->title }}" @if(isset($section->category) &&
            ($item->title == $section->category)) selected
            @endif>{{$item->title}}</option>
        @endforeach
    </select>
</div>
