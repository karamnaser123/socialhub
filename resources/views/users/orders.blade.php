@extends('layouts.app')
@section('body')
    <div class="app-container">
        @include('layouts.navigation')
        @include('layouts.header')
        <!-- header -->
        @include('layouts.mobile-nav')

        <!-- Main variables *content* -->
        <div class="app-content">
            <div class="container-fluid">
                <section class="neworder">




                    <div class="row">
                        <div class="col-lg-12 col-12 mb-5 mb-lg-0">
                            <div class="orders-btn py-3">
                                <ul class="nav nav-pills app-ord-nav">

                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders') ? 'active' : '' }}" href="/orders"><i
                                                class="fas fa-filter mr-1"></i>@lang('messages.All')</a>
                                    </li>
                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders/Pending') ? 'active' : '' }}"
                                            href="/orders/Pending"><i class="fas fa-file-import mr-1"></i>
                                            @lang('messages.Pending')</a>
                                    </li>
                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders/In progress') ? 'active' : '' }}"
                                            href="/orders/In progress"><i
                                                class="fas fa-spinner mr-1"></i>@lang('messages.In Progress')</a>
                                    </li>
                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders/completed') ? 'active' : '' }}"
                                            href="/orders/completed"><i class="far fa-check-circle mr-1"></i>
                                            @lang('messages.Completed')</a>
                                    </li>
                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders/partial') ? 'active' : '' }}"
                                            href="/orders/partial"><i class="fas fa-hourglass-start mr-1"></i>
                                            @lang('messages.Partial')</a>
                                    </li>
                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders/processing') ? 'active' : '' }}"
                                            href="/orders/processing"><i class="fas fa-sort-numeric-down mr-1"></i>
                                            @lang('messages.Processing')</a>
                                    </li>
                                    <li class="mr-2">
                                        <a class="{{ Request::is('orders/canceled') ? 'active' : '' }}"
                                            href="/orders/canceled"><i class="fas fa-ban mr-1"></i> @lang('messages.Canceled')</a>
                                    </li>
                                    <li class="pull-right search mr-2">
                                        <form action="{{ route('orders.search') }}" method="get" id="history-search">
                                            <div class="app-ord-search">
                                                <input type="text" name="search" value=""
                                                    placeholder="@lang('messages.Search')" class="app-ord-input">

                                                <button type="submit" class="app-ord-submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <div class="d-card" style="word-break: break-all;">
                                <div class="d-card-body">
                                    <table class="table app-mtable">

                                        <thead>
                                            <tr class="thead-tr">
                                                <th style="width: 10%"> @lang('messages.ID')</th>
                                                <th style="width: 8%"> @lang('messages.Date')</th>
                                                <th style="width: 25%"> @lang('messages.Link')</th>
                                                <th style="width: 10%"> @lang('messages.Charge')</th>
                                                <th style="width: 12%" class="nowrap"> @lang('messages.Start count')</th>
                                                <th style="width: 10%"> @lang('messages.Quantity')</th>
                                                <th style="width: 18%"> @lang('messages.Service')</th>
                                                <th style="width: 12%"> @lang('messages.Remains')</th>
                                                <th style="min-width:140px"> @lang('messages.Status')</th>
                                                <th style="min-width:90px">&nbsp;</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($orders as $order)
                                                <tr class="app-block">

                                                    <td class="app-col" data-title="ID">{{ $order->id }}</td>
                                                    <td class="app-col" data-title="Date">{{ $order->created_at }}</td>
                                                    <td class="app-col" data-title="Link">
                                                        <a target="_blank"
                                                            href="{{ $order->link }}">{{ $order->link }}</a>
                                                    </td>
                                                    <td class="app-col" data-title="Charge">{{ $order->price }}$</td>
                                                    <td class="app-col" data-title="Start Count">
                                                        {{ $response_data[$order->order_id]['start_count'] }}</td>
                                                    <td class="app-col" data-title="Quantity">{{ $order->quantity }}</td>
                                                    <td class="app-col" data-title="Services">
                                                        @if (isset($services[$order->service]))
                                                            {{ $services[$order->service] }}
                                                        @else
                                                            Service Name Not Available
                                                        @endif
                                                    </td>
                                                    <td class="app-col" data-title="Remain">
                                                        {{ $response_data[$order->order_id]['remains'] }}</td>
                                                    <td class="app-col" data-title="Status">
                                                        @if ($response_data[$order->order_id]['status'] == 'Completed')
                                                            @if (session('locale') == 'ar')
                                                                <span class="order-status">مكتمل</span>
                                                            @else
                                                                <span
                                                                    class="order-status">{{ $response_data[$order->order_id]['status'] }}</span>
                                                            @endif
                                                        @elseif ($response_data[$order->order_id]['status'] == 'Partial')
                                                            @if (session('locale') == 'ar')
                                                                <span class="order-status os-partial">جزئي</span>
                                                            @else
                                                                <span
                                                                    class="order-status os-partial">{{ $response_data[$order->order_id]['status'] }}</span>
                                                            @endif
                                                        @elseif ($response_data[$order->order_id]['status'] == 'Canceled')
                                                            @if (session('locale') == 'ar')
                                                                <span class="order-status os-cancel">ملغاة</span>
                                                            @else
                                                                <span
                                                                    class="order-status os-cancel">{{ $response_data[$order->order_id]['status'] }}</span>
                                                            @endif
                                                        @elseif ($response_data[$order->order_id]['status'] == 'Pending')
                                                            @if (session('locale') == 'ar')
                                                                <span class="order-status os-pending">معلقة</span>
                                                            @else
                                                                <span
                                                                    class="order-status os-pending">{{ $response_data[$order->order_id]['status'] }}</span>
                                                            @endif
                                                        @elseif ($response_data[$order->order_id]['status'] == 'In progress')
                                                            @if (session('locale') == 'ar')
                                                                <span class="order-status os-iprogress">قيد التقدم</span>
                                                            @else
                                                                <span
                                                                    class="order-status os-iprogress">{{ $response_data[$order->order_id]['status'] }}</span>
                                                            @endif
                                                        @elseif ($response_data[$order->order_id]['status'] == 'Processing')
                                                            @if (session('locale') == 'ar')
                                                                <span class="order-status os-processing">جارٍ
                                                                    المعالجة</span>
                                                            @else
                                                                <span
                                                                    class="order-status os-processing">{{ $response_data[$order->order_id]['status'] }}</span>
                                                            @endif
                                                        @else
                                                            <span
                                                                class="order-status">{{ $response_data[$order->order_id]['status'] }}</span>
                                                        @endif


                                                    </td>

                                                    <td>
                                                        <div class="order-actions">
                                                        </div>
                                                    </td>
                                                </tr>

                                            @empty
                                                <h2> @lang('messages.Dont Have Any Orders')</h2>
                                            @endforelse
                                        </tbody>


                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>
    <!-- User Status Modal Start -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog acStatusModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Account Status
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="important_info mb-3">
                        <p>
                            * = You may purchase a VIP status for a month from our services under the VIP section. <br>
                            ** = 5% Bonus on Payments made with Perfect Money, Western Union, Bitcoins, Altcoins or
                            Payoneer. <br>
                            *** = Each month we will pick 1 random Frequent, Elite, VIP or Master user to win $500 to be
                            used on the panel! <br>
                            **** = You will get a FREE SMM Panel like ours with a FREE domain aswell! <br>
                            Please contact us via <a href="/tickets">tickets</a> for more information!
                        </p>
                    </div>
                    <div class="showing_status">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="status_card">
                                    <div class="status_head">
                                        <div class="text_status">
                                            <div class="text_big">NEW</div>
                                            <p class="text_info">YOU HAVE SPEN LESS THAN</p>
                                        </div>
                                        <div class="amount_status">
                                            $100
                                        </div>
                                    </div>
                                    <div class="status_body">
                                        <ul class="pl-2 mt-3">
                                            <li>24/7 TICKETS SUPPORT</li>
                                            <li>5% PAYMENTS BONUS</li>
                                            <li><strike>Automatic charging via Paypal</strike></li>
                                            <li><strike>500$ Montly Lottery***</strike></li>
                                            <li><strike>Free SMM Panel****</strike></li>
                                            <li><strike>Priority Ticket Support</strike></li>
                                            <li><strike>Custom Services </strike></li>
                                            <li><strike>Early Notification On New Services</strike></li>
                                            <li><strike>Support Handled By The Admins</strike></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="status_card">
                                    <div class="status_head">
                                        <div class="text_status">
                                            <div class="text_big">JUNIOR</div>
                                            <p class="text_info">YOU HAVE SPEN MORE THAN</p>
                                        </div>
                                        <div class="amount_status">
                                            $100
                                        </div>
                                    </div>
                                    <div class="status_body">
                                        <ul class="pl-2 mt-3">
                                            <li>24/7 TICKETS SUPPORT</li>
                                            <li>5% PAYMENTS BONUS</li>
                                            <li>Automatic charging via Paypal</li>
                                            <li><strike>500$ Montly Lottery***</strike></li>
                                            <li><strike>Free SMM Panel****</strike></li>
                                            <li><strike>Priority Ticket Support</strike></li>
                                            <li><strike>Custom Services </strike></li>
                                            <li><strike>Early Notification On New Services</strike></li>
                                            <li><strike>Support Handled By The Admins</strike></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="status_card">
                                    <div class="status_head">
                                        <div class="text_status">
                                            <div class="text_big">FREQUENT</div>
                                            <p class="text_info">YOU HAVE SPEN MORE THAN</p>
                                        </div>
                                        <div class="amount_status">
                                            $1K
                                        </div>
                                    </div>
                                    <div class="status_body">
                                        <ul class="pl-2 mt-3">
                                            <li>24/7 TICKETS SUPPORT</li>
                                            <li>5% PAYMENTS BONUS</li>
                                            <li>Automatic charging via Paypal</li>
                                            <li>500$ Montly Lottery***</li>
                                            <li><strike>Free SMM Panel****</strike></li>
                                            <li><strike>Priority Ticket Support</strike></li>
                                            <li><strike>Custom Services </strike></li>
                                            <li><strike>Early Notification On New Services</strike></li>
                                            <li><strike>Support Handled By The Admins</strike></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row  mb-3">
                            <div class="col-md-4 mb-3">
                                <div class="status_card">
                                    <div class="status_head">
                                        <div class="text_status">
                                            <div class="text_big">ELITE</div>
                                            <p class="text_info">YOU HAVE SPEN MORE THAN</p>
                                        </div>
                                        <div class="amount_status">
                                            $2,5K
                                        </div>
                                    </div>
                                    <div class="status_body">
                                        <ul class="pl-2 mt-3">
                                            <li>24/7 TICKETS SUPPORT</li>
                                            <li>5% PAYMENTS BONUS</li>
                                            <li>Automatic charging via Paypal</li>
                                            <li>500$ Montly Lottery***</li>
                                            <li>Free SMM Panel****</li>
                                            <li><strike>Priority Ticket Support</strike></li>
                                            <li><strike>Custom Services </strike></li>
                                            <li><strike>Early Notification On New Services</strike></li>
                                            <li><strike>Support Handled By The Admins</strike></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="status_card">
                                    <div class="status_head">
                                        <div class="text_status">
                                            <div class="text_big">VIP</div>
                                            <p class="text_info">YOU HAVE SPEN MORE THAN</p>
                                        </div>
                                        <div class="amount_status">
                                            $15K
                                        </div>
                                    </div>
                                    <div class="status_body">
                                        <ul class="pl-2 mt-3">
                                            <li>24/7 TICKETS SUPPORT</li>
                                            <li>5% PAYMENTS BONUS</li>
                                            <li>Automatic charging via Paypal</li>
                                            <li>500$ Montly Lottery***</li>
                                            <li>Free SMM Panel****</li>
                                            <li>Priority Ticket Support</li>
                                            <li><strike>Custom Services </strike></li>
                                            <li><strike>Early Notification On New Services</strike></li>
                                            <li><strike>Support Handled By The Admins</strike></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="status_card">
                                    <div class="status_head">
                                        <div class="text_status">
                                            <div class="text_big">MASTER</div>
                                            <p class="text_info">YOU HAVE SPEN MORE THAN</p>
                                        </div>
                                        <div class="amount_status">
                                            $50K
                                        </div>
                                    </div>
                                    <div class="status_body">
                                        <ul class="pl-2 mt-3">
                                            <li>24/7 TICKETS SUPPORT</li>
                                            <li>5% PAYMENTS BONUS</li>
                                            <li>Automatic charging via Paypal</li>
                                            <li>500$ Montly Lottery***</li>
                                            <li>Free SMM Panel****</li>
                                            <li>Priority Ticket Support</li>
                                            <li>Custom Services </li>
                                            <li>Early Notification On New Services</li>
                                            <li>Support Handled By The Admins</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- User Status Modal End -->





    </body>

    </html>
@endsection
