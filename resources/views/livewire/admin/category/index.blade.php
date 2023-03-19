<div class="row">
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Are you sure you want to delete this data?</h6>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        @if (session('messages'))
            <div class="alert alert-success" role="alert">
                {{ session('messages') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Category
                    <a href="{{ route('admin.category.create') }}"
                        class="btn btn-success text-white btn-sm float-end">Add
                        Category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <body>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset('uploads/category/' . $category->image) }}" />
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', ['category_id' => $category->id]) }}"
                                        class="btn btn-sm btn-primary text-white">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{ $category->id }})"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-sm btn-danger text-white">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </body>
                </table>
                <div class="pagination">
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
