@extends('admin.layout.app')

@section('heading','Author')

@section('button')
<a href="{{route('admin_author_create')}}" class="btn btn-primary">

          <i class="fas fa-plus">Add</i>

</a>
@endsection

@section('main_content')

<div class="section-body">
          <div class="row">
                    <div class="col-12">
                              <div class="card">
                                        <div class="card-body">
                                                  <div class="table-responsive">
                                                            <table class="table table-bordered" id="example1">
                                                                      <thead>
                                                                                <tr>
                                                                                          <th>SL</th>
                                                                                          <th>Photo</th>
                                                                                          <th>Name</th>
                                                                                          <th>Email</th>
                                                                                          <th>Action</th>
                                                                                </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                                @foreach ($authors as $row )
                                                                                <tr>
                                                                                          <td>{{$loop-> iteration}}</td>
                                                                                          <td>
                                                                                                    <img src="{{asset('uploads/'.$row->photo)}}" alt="" width="100px">
                                                                                          </td>
                                                                                          <td>{{$row -> name}}</td>
                                                                                          <td>{{$row -> email}}</td>
                                                                                          <td>
                                                                                                    @if ($row->admin_id != 0)
                                                                                                             {{ Auth::guard('admin')->user()->name}}
                                                                                                    @endif
                                                                                          </td>
                                                                                          <td class="pt_10 pb_10">
                                                                                                    <a href="{{route('admin_author_edit',$row->id)}}" class="btn btn-primary">Edit</a>
                                                                                                    <a href="{{route('admin_author_delete' , $row->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                                                                          </td>
                                                                                </tr>       
                                                                                @endforeach
                                                                      </tbody>
                                                            </table>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </div>
</div>



@endsection