@extends('layouts.email')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="email_title">Welcome , {{$name}}</h3>
        </div>
        <div class="col-md-12">
            <p class="email_body">Thank you for signing up in weekenddocs.com . Please verify your email to continue with us .</p>
        </div>
        @if($password != null)
        <div class="col-md-6">
            <p class="email_body">Your Password is :{{$password}}</p>
        </div>
        @endif
        <div class="col-md-12">
            <form action="{{url('/confirmation/'.$user_id.'/'.$confirmation_code)}}" method="get">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="confirmation_code" value="{{$confirmation_code}}">
                <input type="hidden" name="user_level" value="{{$user_level}}">
                <input type="submit" value="Verify Me">
            </form>
        </div>
    </div>
</div>
@endsection