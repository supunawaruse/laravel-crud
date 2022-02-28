<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category Page
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="card-header">
                        All Category
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>

                          @foreach($categories as $category)
                          <tr>
                            <td>{{$categories->firstItem()+$loop->index}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->user->name}}</td>
                            <td>
                                @if($category->created_at == NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{$category->created_at}}
                                @endif
                            </td>
                            <td>
                                <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-secondary">Edit</a>
                                <a href="{{url('category/delete/'.$category->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </thead>
                      </table>
                      {{$categories->links()}}
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Category</div>
                    <div class="card-body">
                        <form action="{{route('add.category')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="category_name" class="form-label">Category Name</label>
                              <input type="text" name="category_name" class="form-control" id="category_name">
                                
                              @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            
                            </div>
                            <button style="background-color: #0d6efd" type="submit" class="btn btn-primary">Add Category</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
