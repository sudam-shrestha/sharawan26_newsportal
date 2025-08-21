<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Company Create</h4>
                    <a href="{{ route('admin.company.index') }}" class="btn btn-primary">
                        go back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="my-2 col-6">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-6">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-6">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-2 col-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control"
                                    value="{{ old('facebook') }}">
                            </div>

                            <div class="my-2 col-6">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control"
                                    value="{{ old('instagram') }}">
                            </div>

                            <div class="my-2 col-6">
                                <label for="logo">Logo<span class="text-danger">*</span></label>
                                <input type="file" name="logo" id="logo" class="form-control" required>
                                @error('logo')
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
