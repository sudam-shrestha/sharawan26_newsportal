<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Article Edit</h4>
                    <a href="{{ route('admin.article.index') }}" class="btn btn-primary">
                        go back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.article.update', $article->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group my-2 col-12">
                                <label for="categories">Select2 Multiple</label>
                                <select class="form-control select2" name="categories[]" id="categories" multiple="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $article->categories->contains($category->id) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="my-2 col-6">
                                <label for="title">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $article->title }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-6">
                                <label for="slug">Slug<span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ $article->slug }}" required>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-12">
                                <label for="content">Content<span class="text-danger">*</span></label>
                                <textarea name="content" id="content" class="form-control summernote">
                                    {{ $article->content }}
                                </textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-12">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control">
                                    {{ $article->meta_keywords }}
                                </textarea>
                                @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-12">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control">
                                    {{ $article->meta_description }}
                                </textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-6">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{ asset($article->image) }}" height="80" alt="">
                                @error('image')
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
