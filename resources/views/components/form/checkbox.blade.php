<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input type="checkbox" name="{{$name}}" placeholder="{{$placeholder ?? ''}}"
    {{empty($required) ? '': 'required'}}
     value="1"
     {{$checked ? 'checked' : ''}}
    >

</div>
