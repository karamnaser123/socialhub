



<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
    body{margin-top:20px;}

.chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 800px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
}
</style>

<main class="content">
    <div class="container p-0">

		<h1 class="h3 mb-3">Messages</h1>

		<div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">

					<div class="px-4 d-none d-md-block">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								{{-- <form action="{{route('admin.ticket.search')}}" method="get">
									@csrf
								<input type="text" name="search" class="form-control my-3" placeholder="Search...">
							</form> --}}
							</div>
						</div>
					</div>

					<style>
						.list-group-item {
							transition: background-color 0.3s ease;
						}
						.list-group-item:hover {
							background-color: #f5f5f5; /* Change to your desired hover background color */
						}
						.selected {
							background-color: #3490dc; /* Change to your desired selected background color */
							color: white; /* Change to your desired text color */
							border-color: #3490dc; /* Change to match the background color or to your desired border color */
						}
						.selected:hover {
							background-color: #2779bd; /* Change to your desired hover background color for selected items */
							border-color: #2779bd; /* Change to match the background color or to your desired border color for selected items */
						}
					</style>
					

                    @forelse ($tickets as $ticketss)
       <a href="{{ route('get-messages', ['id' => $ticketss->id]) }}" class="list-group-item list-group-item-action border-0 @if ($id == $ticketss->id) selected @endif">
        <div class="d-flex align-items-start">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="William Harris" width="40" height="40">
            <div class="flex-grow-1 ml-3">
                {{ $ticketss->user->name }}
            </div>
        </div>
    </a>
@empty
    <p>No tickets available.</p>
@endforelse		
				

					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
								<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
							</div>
							<div class="flex-grow-1 pl-3">
								<strong>{{ $ticket->user->name }}</strong>
								{{-- <div class="text-muted small"><em>Typing...</em></div> --}}
							</div>
							{{-- <div>
								<button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
								<button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
								<button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
							</div> --}}
						</div>
					</div>

					<div class="position-relative">
						<div class="chat-messages p-4">

                            <h6>Order Id:  {{ $ticket->order_id }}</h6>
                            <h6>Subject:  {{ $ticket->subject }}</h6>
                            <h6>Request: {{ $ticket->request }}</h6>
                            @if (isset($messages[$ticket->id]))
                            @foreach ($messages[$ticket->id] as $message)
                            @if ($message['isadmin'] == true)
                            <div class="chat-message-left pb-4">
								<div>
									<img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">{{ $message['updated_at'] }}</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1">Support Team <img src="https://cdn.mypanel.link/08ed14/2behggr3l6cn74dd.png" width="20"></div>
									{{ $message['message'] }}
								</div>
							</div>

                            @else
                            <div class="chat-message-right pb-4">
								<div>
									<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">{{ $message['updated_at'] }}</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">{{ $ticket->user->name }}</div>
									{{ $message['message'] }}
								</div>
							</div>

                            @endif
                            <br>
                            @endforeach
                            @endif
                        </td>
							
					

							

					<div class="flex-grow-0 py-3 px-4 border-top">
                        <form action="{{route('ticket.create.admin')}}" method="post">
                            @csrf

						<div class="input-group">
                              <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                <input type="text" name="message" class="form-control" placeholder="Type your message">
                                <button type="submit" class="btn btn-primary">Send</button>
							
						</div>
                    </form>

					</div>

				</div>
			</div>
		</div>
	</div>
</main>