@extends('admin.layouts.app')
@section('body')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->

        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.layouts.header')
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Products</h5>

                        @include('admin.product.create-product')
                        <form action="{{ route('admin.product.search') }}" method="get">
                            <input type="text" class="form-control" id="searchInput" name="search"
                                placeholder="Search products">
                            <button class="btn btn-primary ms-2" type="submit">
                                <i class='fa fa-search'></i>&nbsp;
                                Search</button>
                        </form>

                        <p class="mb-0">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Ar_Name</th>
                                    <th>Value</th>
                                    <th>price_per_1000</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->id }}
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->ar_name }}
                                        </td>
                                        <td>
                                            {{ $product->value }}
                                        </td>
                                        <td>
                                            {{ $product->price_per_1000 }}$
                                        </td>


                                        <td>

                                            @include('admin.product.update-product')
                                        </td>
                                    </tr>
                                @empty
                                    <td>We Dont have any Products</td>
                                @endforelse

                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
