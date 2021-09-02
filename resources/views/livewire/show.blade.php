<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 m-4">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('add_user')}}" class="float-right p-2 btn btn-primary">Add User</a>
                        <h4 class="text-center ">Users</h4>
                    </div>
                    <div class="card-body">
                        <table  class="table table-striped" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($emps->count() > 0)
                            @foreach($emps as $emp)
                                <tr>
                                    <td>{{$emp->name}}</td>
                                    <td>{{$emp->phone}}</td>
                                    <td><img width="30px" src="{{asset('images/emp_images')}}/{{$emp->image}}"></td>
                                    <td><a href="edit-user/{{$emp->id}}" ><i class="fa fa-edit"></i> </a> |
                                        <a href="#" wire:click.prevent="deleteUser({{$emp->id}})" ><i class="fa fa-trash"></i> </a></td>
                                </tr>
                            @endforeach
                            @else
                                <tr><td colspan="4" class="text-center">No record found!</td></tr>
                            @endif
                            </tbody>
                        </table>
                        {{$emps->links()}}
                        @if(Session::has('msg'))
                            <span class="alert alert-success">{{Session('msg')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
