@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')

@section('content')


    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <p class="card-description"> Edit Product </p>
                    <form class="forms-sample" action="{{ route('products.update',$product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                id="exampleInputName1" placeholder="Name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" name="desc" id="exampleTextarea1" rows="4">{{ $product->desc }}</textarea>
                        </div>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input type="text" class="form-control" name="price" id="Price"
                                value="{{ $product->price }}" placeholder="Price">
                        </div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="Quantity"
                                value="{{ $product->quantity }}" placeholder="Quantity">
                        </div>
                        @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>File upload</label>

                            <div id="imagePreview" style="margin-bottom: 15px;">
                                <img id="previewImg" src="{{ asset('storage/'.$product->image) }}" alt="Image Preview"
                                    style="max-width: 200px; display: block;" />
                            </div>

                            <input type="file" name="image" class="file-upload-default" id="imageUpload">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('storage/admin/assets/js/file-upload.js') }}"></script>
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImg');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.setAttribute('src', e.target.result);
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
