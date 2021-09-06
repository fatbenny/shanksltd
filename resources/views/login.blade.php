@extends('public')
@section('css')
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
  min-height: 75vh;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
@endsection
@section('content')
<main class="form-signin d-grid align-items-center ">
  <form>
  <h1>登入頁面</h1>
    <div class="form-floating">
      <input type="Email" class="form-control" id="Input" placeholder="name@example.com">
      <label for="Input">帳號 </label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" placeholder="Password">
      <label for="Password">密碼</label>
    </div>

    <small class="text-secondary">※未註冊會員請按註冊</small>
    <div class="d-flex justify-content-between">
      <a href="{{ url('/register') }}" class="btn btn-xs" style="background-color:rgb(239 174 169);color:#fff">註冊</a>    
      <a id="login_btn" class="btn btn-xs" style="background-color:#0d6efd;color:#fff">登入</a>  
    </div>
    <!-- <p class="mt-3 mb-3 "><a class="main_color" href="{{ url('/forget') }}">忘記密碼</a></p> -->
  </form>
</main>
@endsection


@section('js')
$( "#login_btn" ).click(function() {
  let data = {
    "_token": "{{ csrf_token() }}",
      Input: $( "#Input" ).val(), 
      Password: $( "#Password" ).val(), 
  }
  C_ajax('POST',"{{ url('/login') }}",data,'/');
});


@endsection