<div class="form-group"> 
    {{ Form::label($key,  trans('admin.'.$key),  ['class' => 'control-label iconify', 'data-icon' => "-"]) }}
    {{ Form::text($locale.'['.$key.']',  null,   array_merge(  ['class' => 'form-control ', ])) }} 
</div>
<style>
    [data-icon]:before {
        float: right;
        color:red;
        font-size: 24px;
    }
</style>