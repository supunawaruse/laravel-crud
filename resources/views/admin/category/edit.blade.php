<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category Page
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Update Category</div>
                    <div class="card-body">
                        <form action="{{url('category/update/'.$category->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="category_name" class="form-label">New Category Name</label>
                              <input type="text" name="category_name" class="form-control" id="category_name" value="{{$category->category_name}}">
                                
                              @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            
                            </div>
                            <button style="background-color: #0d6efd" type="submit" class="btn btn-primary">Update Category</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
