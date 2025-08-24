<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Category Edit</h4>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
                        go back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="my-2 col-6">
                                <label for="title">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $category->title }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                             <div class="my-2 col-6">
                                <label for="slug">Slug<span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ $category->slug }}" required>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="my-2 col-12">
                                <button type="submit" class="btn btn-success">Save Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
