@extends('admin.layout.app')

@section('heading','Add Author')

@section('button')

<a href="{{route('admin_author_show')}}" class="btn btn-primary">
<i class="fas fa-eye">View</i>
</a>

@endsection

@section('main_content')


<div class="section-body">
          <form action="{{route('admin_author_store')}}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                              <div class="col-6">
                                                  <div class="card">
                                                            <div class="card-body">
                                                                      

                                                                      <div class="form-group mb-3">
                                                                                <label>Photo</label>
                                                                                <input type="file" class="form-control" name="photo" >

                                                                      </div>
                                                                      <div class="form-group mb-3">
                                                                                <label>Name</label>
                                                                                <input type="text" class="form-control" name="name" value="">

                                                                      </div>
                                                                      <div class="form-group mb-3">
                                                                                <label>Email</label>
                                                                                <input type="text" class="form-control" name="email" value="">

                                                                      </div>
                                                                      <div class="form-group mb-3">
                                                                                <label>Password</label>
                                                                                <input type="text" class="form-control" name="password" value="">

                                                                      </div>
                                                                      <div class="form-group mb-3">
                                                                                <label>Again Password</label>
                                                                                <input type="text" class="form-control" name="retype_password" value="">

                                                                      </div>
                                                                      

                                                            </div>
                                                  </div>

                              </div>
                    </div>

                    <div class="form-group">
                              <button type="submit" class="btn btn-primary">Save</button>
                    </div>
          </form>
</div>

@endsection