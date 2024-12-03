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
                        <h5 class="card-title fw-semibold mb-4">Orders</h5>

                        <form action="{{ route('admin.orders.search') }}" method="get">
                            <input type="text" class="form-control" id="searchInput" name="search"
                                placeholder="Search products">
                            <button class="btn btn-primary ms-2" type="submit">
                                <i class='fa fa-search'></i>&nbsp;
                                Search</button>
                        </form>


                        <p class="mb-0">

                        <table class="table align-middle mb-0 bg-white" >
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>UserName</th>
                                    <th>UserEmail</th>
                                    <th>Order_id</th>
                                    <th>Service_id</th>
                                    <th>Service Name</th>
                                    <th>link</th>
                                    <th>Quantity</th>
                                    <th>price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <style>
                                    .scrollable-cell {
                                        max-width: 150px; /* Adjust the max-width as needed */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
                                    }
                                </style>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>
                                            {{ $order->id }}
                                        </td>
                                        <td>
                                            {{ $order->user->name }}
                                        </td>
                                        <td style="font-size: 10px; width:10px" class="scrollable-cell">
                                            {{ $order->user->email }}
                                        </td>
                                        <td>
                                            {{ $order->order_id }}
                                        </td>
                                        <td>
                                            {{ $order->service }}

                                        </td>
                                        <td style="font-size: 10px; width:10px" >
                                            {{ $services[$order->service] }}
                                        </td>
                               
                                        <td style="font-size: 10px; width:10px" class="scrollable-cell">
                                            <a href="{{ $order->link }}" target="_blank">
                                            {{ $order->link }}
                                        </a>

                                        </td>
                                        <td>
                                            {{ $order->quantity }}

                                        </td>
                                        <td>
                                            {{ $order->price }}$

                                        </td>
                                        <td>
                                            {{ $response_data[$order->order_id]['status'] }}
                                        </td>
                                     
                                    </tr>
                                @empty
                                    <td>We Dont have any Orders</td>
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
