@extends('front.layout.app')

@section('main_content')

<div class="page-top">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h2>{{$page_data->login_title}}</h2>
                      <nav class="breadcrumb-container">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{$page_data->login_title}}</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="page-content">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                    <form action="{{route('login_submit')}}" method="post">
                        @csrf
                      <div class="login-form">
                          <div class="mb-3">
                              <label for="" class="form-label">Email Address</label>
                              <input type="text" class="form-control" name="email">
                          </div>
                          <div class="mb-3">
                              <label for="" class="form-label">Password</label>
                              <input type="password" class="form-control" name="password"> 
                          </div>
                          <div class="mb-3">
                              <button type="submit" class="btn btn-primary bg-website">Login</button>
                          </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
@endsection