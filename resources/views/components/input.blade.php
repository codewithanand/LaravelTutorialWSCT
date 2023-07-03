<div class="form-group">
    <input type="{{$type}}" name="{{$name}}" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpId" class="text-muted">{{$label}}</small>
    @error('{{$name}}')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>