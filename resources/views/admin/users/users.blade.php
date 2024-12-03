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
                        <h5 class="card-title fw-semibold mb-4">Users</h5>

                        <form action="{{ route('admin.user.addbalance') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <select class="form-control" id="id" name="id">
                                        @foreach (App\Models\User::orderBy('id')->get() as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="balance" class="form-control" placeholder="Enter balance to add">
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary">Add Balance</button>
                                </div>
                            </div>
                        </form>
                        
                        
                        
                        <p class="mb-0">

                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>UserType</th>
                                    <th>Action</th>
                      
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                       
                                        <td>
                                            {{ $user->balance }}$

                                        </td>
                                        <td>
                                            {{ $user->usertype->name }}

                                        </td>
                                        <td>
                                     @include('admin.users.updateusers')
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <td>We Dont have any Users</td>
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
