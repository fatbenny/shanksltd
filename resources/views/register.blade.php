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
    <h1>註冊頁面</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="Name" placeholder="XXX">
      <label for="Name">姓名 </label>
    </div>
    <div class="form-floating">
      <input type="Email" class="form-control" id="Email" placeholder="name@example.com">
      <label for="Email">帳號 </label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" placeholder="Password">
      <label for="Password">密碼</label>
    </div>
    <div class="d-flex justify-content-between"> 
      <a id="login_btn" class="btn btn-xs" style="background-color:#0d6efd;color:#fff">註冊</a>  
    </div>
  </form>
</main>
@endsection


@section('js')
$( "#login_btn" ).click(function() {
  let data = {
    "_token": "{{ csrf_token() }}",
    Name: $( "#Name" ).val(), 
    Email: $( "#Email" ).val(), 
    Password: $( "#Password" ).val(), 
  }
  C_ajax('POST',"{{ url('/register') }}",data,"{{ url('/login') }}");
});


@endsection