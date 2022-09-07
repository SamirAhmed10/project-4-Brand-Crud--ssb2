@extends('layouts.app-layout')
 <title>Admin Sign Up</title>
 @section('body-content')
   <body>

       <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
    <div class="signin-logo tx-center mt-3 tx-38 tx-bold tx-inverse">
    <span class="tx-normal"></span>Admin  
    <span class="tx-info">Sign Up</span> 
    <span class="tx-normal"></span>
    </div>
    <div class="tx-center mg-b-30"></div>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="form-group">
       <label for="name"> Full Name</label>
      <input type="text" id="name" class="form-control" name="name"value="{{old('name')}}" placeholder="Enter your Fullname" required autofocus>
    </div>
    <div class="form-group">
       <label for="email"> Email Address </label>
      <input type="email" id="email" class="form-control" name="email"value="{{old('email')}}" placeholder="Enter your Email" required>
    </div>
   
      <div class="form-group">
     <label for="password"> Password</label>
      <input type="password" id="password" class="form-control"name="password"placeholder="Enter your password" required autocomplete="new-password">
      </div>
      <div class="form-group">
      <label for="password_confirmation">Re-Type Password</label>
      <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Re-type your password" required>
      </div>
     
    <button type="submit" class="btn btn-info mb-3 btn-block">Sign Up</button>
    <a class="btn btn-info mb-3 btn-block" href="{{route('admin.dashboard')}}" role="button">Go To Dashboard</a>
   
    
   

    
</div>
</body>
@endsection