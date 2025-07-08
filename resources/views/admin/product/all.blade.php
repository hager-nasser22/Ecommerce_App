@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="titles d-flex justify-content-between">
                        <h4 class="card-title">All Products</h4>
                        <a class="nav-link btn btn-success create-new-button" href="{{ route('products.create') }}">+ Create New Project</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th> Product Name </th>
                                    <th> Description </th>
                                    <th> Quantity No </th>
                                    <th> Product Cost </th>
                                    <th> Payment Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="image" />
                                            <span class="ps-2">{{ $product->name }}</span>
                                        </td>
                                        <td> {{ \Illuminate\Support\Str::limit($product->desc,50) }} </td>
                                        <td> {{ $product->quantity }} </td>
                                        <td> ${{ $product->price }} </td>
                                        <td>
                                            <a class="btn btn-success p-2"
                                                href="{{ route('products.show', $product->id) }}"><span
                                                    class="badge p-0">Show</span></a>
                                            <a class="btn btn-warning p-2"
                                                href="{{ route('products.edit', $product->id) }}"><span
                                                    class="badge p-0">Edit</span></a>
                                            <form action="{{ route('products.delete', $product->id) }}" class="d-inline"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger p-2"><span
                                                        class="badge p-0">Delete</span></button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Products Yet!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>

@endsection
