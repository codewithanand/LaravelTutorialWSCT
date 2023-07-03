@extends('layouts.master')

@push('title')
<title>Update Customer</title>
@endpush

@section('main-section')
<div class="container pt-5 pb-5">
    
    <h1>Update Customer</h1>
    <form action="{{$url}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name <span class="text-danger">*</span></label>
            <input type="text" name="cname" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->name}}">
            @error('cname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email <span class="text-danger">*</span></label>
            <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->email}}">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Gender <span class="text-danger">*</span></label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" {{$customer->gender == "M" ? "checked" : ""}}>
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" {{$customer->gender == "F" ? "checked" : ""}}>
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="O" {{$customer->gender == "O" ? "checked" : ""}}>
                <label class="form-check-label" for="inlineRadio3">Other</label>
            </div>
            @error('gender')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Address <span class="text-danger">*</span></label>
            <input type="text" name="address" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->address}}">
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">City <span class="text-danger">*</span></label>
            <input type="text" name="city" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->city}}">
            @error('city')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">State <span class="text-danger">*</span></label>
            <input type="text" name="state" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->state}}">
            @error('state')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Country <span class="text-danger">*</span></label>
            <input type="text" name="country" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->country}}">
            @error('country')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" name="dob" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$customer->dob}}">
            @error('dob')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Password <span class="text-danger">*</span></label>
            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection