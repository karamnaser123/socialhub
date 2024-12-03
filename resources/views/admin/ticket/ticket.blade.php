@extends('admin.layouts.app')

@section('body')
<!-- Body Wrapper -->
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
                    <h5 class="card-title fw-semibold mb-4">Tickets</h5>
                    <p class="mb-0">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Order id</th>
                                <th>Message</th>
                                <th>Status</th>
                                {{-- <th>Update</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->order_id }}</td>
                                <td>
                                  
                                 <h6>   <a class="btn btn-warning m-1 btn-update-product" target="_blank"  href="{{ route('get-messages', ['id' => $ticket->id]) }}" 
                                    class="list-group-item list-group-item-action border-0">
                                    ViewMessages
                                </a></h6>
                                    
                                  
                                </td>
                                <td>
                                    <form class="update-ticket-form" action="{{ route('ticket.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                        <select style="text-align: center" class="form-control ticket-status" name="status">
                                            <option value="answered" {{ $ticket->status == 'answered' ? 'selected' : '' }}>Answered</option>
                                            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </form>
                                </td>
                                
                                <script>
                                    document.querySelectorAll('.ticket-status').forEach(function(selectElement) {
                                        selectElement.addEventListener('change', function() {
                                            var form = this.closest('form'); // Find the parent form of the select element
                                            form.submit(); // Submit the form associated with the select element
                                        });
                                    });
                                </script>
                                
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">We Don't have any ticket</td>
                            </tr>
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
