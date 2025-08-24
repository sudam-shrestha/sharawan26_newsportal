<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Categories</h4>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        add new
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $i => $category)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            {{ $category->title }}
                                        </td>
                                        <td>
                                            {{ $category->slug }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="btn btn-primary">
                                                edit
                                            </a>
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
</x-app-layout>
