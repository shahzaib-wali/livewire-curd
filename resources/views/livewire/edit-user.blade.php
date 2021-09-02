<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 m-4">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('show')}}" class="float-right p-2 btn btn-primary">View Users</a>
                        <h4 class="text-center ">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateUser">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" wire:model="name">
                                @error('name')<span>{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" wire:model="phone">
                                @error('phone')<span>{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" wire:model="newimage">
                                @error('image')<span>{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update User</button>
                            </div>
                        </form>
                        @if(Session::has('msg'))
                            <span class="alert alert-success">{{Session('msg')}}</span>
                        @endif

                        @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="50px">
                        @else
                            <img src="{{asset('images/emp_images')}}/{{$image}}" width="50px">
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
