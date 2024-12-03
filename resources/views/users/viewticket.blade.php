@extends('layouts.app')
@section('body')
    
      <div class="app-container">
      @include('layouts.navigation')
      @include('layouts.header')
      @include('layouts.mobile-nav')

      <div class="app-content">
    <div class="container-fluid">
    
       

        <section class="neworder">
        
                <div class="row">
                    <div class="col-lg-12 col-12 mb-5 mb-lg-0">
                        <div class="d-card">
                            
                            <div class="d-card-head">
                                <div class="dch-body">
                                     <i class="icon far fa-comment-dots me-3"></i>
                                     <span class="ml-3">Orders - New</span>
                                </div>
                            </div>
                            
                            <div class="d-card-body" id="dc-body">
                                <div class="row ticket-message-block ticket-message-right">
                            <div class="col-md-1"></div>
                            <div class="col-md-11" style="margin-bottom: 10px">
                            <div class="ticket-message">
                            <div class="message">
                                @isset($ticket->order_id)
                                Order Id: {{$ticket->order_id}}<br>
                                @endisset
                            Subject: {{$ticket->subject}}<br>
                            Request: {{$ticket->request}}<br>
                            {{-- Message: {{$ticketview->message}} --}}
                            </div>
                            </div>
                            <div class="info text-right mt-2" style="font-size: 13px">
                            <strong>{{$ticket->user->name}}</strong>
                            <small class="text-muted">{{$ticket->user->created_at}}</small>
                            </div>
                            </div>
                            <div class="col-md-1"></div>
                            </div>
                               
                            @forelse ($messages as $message)
                            @if ($message['isadmin'] == true)
                                <div class="row ticket-message-block ticket-message-left">
                                    <div class="col-md-11" style="margin-bottom: 10px">
                                        <div class="ticket-message">
                                            <div class="message">
                                                {{ $message['message'] }}
                                            </div>
                                        </div>
                                        <div class="info mt-2" style="font-size: 13px">
                                            <strong>Support Team <img src="https://cdn.mypanel.link/08ed14/2behggr3l6cn74dd.png" width="20"></strong>
                                            <small class="text-muted">{{ $message['updated_at'] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            @else
                                <div class="row ticket-message-block ticket-message-right">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11" style="margin-bottom: 10px">
                                        <div class="ticket-message">
                                            <div class="message">
                                                {{ $message['message'] }}
                                            </div>
                                        </div>
                                        <div class="info text-right mt-2" style="font-size: 13px">
                                            <strong>{{ $ticket->user->name }}</strong>
                                            <small class="text-muted">{{ $message['updated_at'] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            @endif
                        @empty
                            {{-- No messages yet --}}
                        @endforelse
                        
                                       
@if ($ticket->status == 'pending' || $ticket->status == 'answered')
    
<form method="post" action="{{route("ticket.addmessge")}}">
    @csrf
<div class="form-group message mt-5">
 <input type="hidden" name="ticket_id"  value={{$ticket->id}} />
<label for="message" class="control-label">Messages</label>
<textarea class="form-control" rows="7" id="message" name="message" style="height:150px!important"></textarea>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Send Reply</button>
</form>

@else
<h4 style="text-align: center"> Ticket Closed</h4>
@endif
                      
                            
                            </div>
                        </div>
                    </div>
                </div>

            </section>

    </div>
</div>
</div>

                  <!-- User Status Modal Start -->
         <div
            class="modal fade"
            id="exampleModal"
            >
            <div class="modal-dialog acStatusModal">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">
                        Account Status
                     </h4>
                  </div>
               </div>
            </div>
         </div>
         <!-- User Status Modal End -->
@endsection
