@extends('layouts.app')
@section('body')

    <body class="dashboard-body">

        <div class="app-container">
            @include('layouts.navigation')
            @include('layouts.header')
            <!-- header -->
            @include('layouts.mobile-nav')

            <!-- Main variables *content* -->
            <div class="app-content">
                <div class="container-fluid">
                    <div class="d-card dc-dash">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="py-3 px-5">
                                    <div class="dch-title">
                                        @lang('messages.Support Tickets')
                                    </div>
                                    <div class="dch-text">
                                        @lang('messages.someqution')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section id="nav_tabs_for_ticket">
                        <div class="row">
                            <div class="col-lg-7 col-12 mb-5 mb-lg-0">
                                <div class="d-card mb-3">
                                    <div class="d-card-body" id="dc-body">
                                        <div class="ticket_navs">
                                            <div>
                                                <ul class="nav nav-pills mb-3 ticketTabs" id="pills-tab" role="tablist">
                                                    <!-- Create Ticket Tabs 1 -->
                                                    <li class="nav-item">
                                                        <a class="nav-link active " id="pills-home-tab" data-toggle="pill"
                                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                                            aria-selected="true">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icon far fa-comment-alt-plus me-3"></i>
                                                                <span class="ml-sm-3 ml-sm-1"> @lang('messages.Create Tickets')</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- // Create Ticket Tabs 1 -->
                                                    <!-- Create Ticket Tabs 2 -->
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                            href="#pills-profile" role="tab"
                                                            aria-controls="pills-profile" aria-selected="false">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icon far fa-ticket-alt me-3"></i>
                                                                <span class="ml-sm-3 ml-sm-1"> @lang('messages.Tickets History')</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- //Create Ticket Tabs 2 -->
                                                </ul>
                                            </div>
                                            <div>
                                                <form action="{{ route('ticket.search') }}" method="get"
                                                    id="history-search">
                                                    <div class="app-search">
                                                        <input type="text" name="search" value="" id="serv-inp"
                                                            class="app-input" placeholder=" @lang('messages.Search')" />
                                                        <button type="submit" class="app-ord-submit">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </form>

                                                <!-- //Search Ticket Tabs 3 -->
                                            </div>
                                        </div>

                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- Create Ticket Tabs Content 1 -->
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <form method="post" action="{{ route('createticket') }}" id="ticketsend">
                                                    @csrf
                                                    <div class="alert alert-dismissible alert-danger ticket-danger "
                                                        style="display: none">
                                                        <button type="button" class="close">&times;</button>
                                                        <div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subject" class="control-label">
                                                            @lang('messages.Subjects')</label>
                                                        <div id="subjectSeter" style="display:none;">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-icon">
                                                                    <i class="far fa-ballot"></i>
                                                                </div>
                                                                <select class="form-control" id="subject" name="subject"
                                                                    onchange="handleOrderType(this)">
                                                                    <option value="Orders - New"> @lang('messages.Orders')</option>
                                                                    {{-- <option value="Payments - New">Payment</option> --}}
                                                                    {{-- <option value="VIP Membership - New">VIP Membership</option> --}}
                                                                    <option value="Others - New"> @lang('messages.Others')</option>
                                                                    {{-- <option value="Sell your own services on socialhub.com - New">Sell your own services on socialhub.com</option> --}}
                                                                    {{-- <option value="Others - New">Others</option> --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="order-group">
                                                        <label> @lang('messages.Order Id')</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-icon">
                                                                    <i class="far fa-hashtag"></i>
                                                                </div>
                                                                <input type="text" name="order_id" class="form-control"
                                                                    id="orderid">
                                                            </div>
                                                        </div>
                                                        <label style="margin-top:15px"> @lang('messages.Request')</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-icon">
                                                                    <i class="far fa-book-reader"></i>
                                                                </div>
                                                                <select class="form-control" name="request" id="want">
                                                                    <option value="Refill" selected="">
                                                                        @lang('messages.Refill')</option>
                                                                    <option value="Cancel"> @lang('messages.Cancel')</option>
                                                                    <option value="Speed Up"> @lang('messages.Speed Up')</option>
                                                                    <option value="Other"> @lang('messages.Other')</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="payment-group">
                                                        <label> @lang('messages.Payment Method')</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-icon">
                                                                    <i class="far fa-university"></i>
                                                                </div>
                                                                <select class="form-control" id="payment">
                                                                    <option value="Zain Cash">Zain Cash</option>
                                                                    <option value="Vodafone Cash">Vodafone Cash</option>
                                                                    <option value="Credit Card" selected="">Credit Card
                                                                    </option>
                                                                    <option value="Skrill">Skrill</option>
                                                                    <option value="PayOp">PayOp</option>
                                                                    <option value="Payoneer">Payoneer</option>
                                                                    <option value="Paypal">Paypal</option>
                                                                    <option value="Perfect Money">Perfect Money</option>
                                                                    <option value="Western Union">Western Union</option>
                                                                    <option value="Bitcoin">Bitcoin</option>
                                                                    <option value="Wise/Bank Transfer">Wise/Bank Transfer
                                                                    </option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label style="margin-top:15px">Transaction Id</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-icon">
                                                                    <i class="far fa-user-alt"></i>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    name="Transaction[ID]" id="PaymentID">
                                                            </div>
                                                        </div>
                                                        <label style="margin-top:15px">Amount</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-icon">
                                                                    <i class="far fa-database"></i>
                                                                </div>
                                                                <input type="number" class="form-control"
                                                                    name="addamount[ID]" id="addamount">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group" id="Sell your own services on socialhub.com-group">
                                 <label>Sell your own services on socialhub.com</label>
                                 <div class="form-group">
                                    <div class="input-group">
                                       <div class="input-group-icon">
                                          <i class="far fa-database"></i>
                                       </div>
                                       <select class="form-control" id="Sell your own services on socialhub.com">
                                          <option value="API User">API User</option>
                                          <option value="Question">How can I sell my own services on socialhub.com ?</option>
                                          <option value="Others">Others</option>
                                       </select>
                                    </div>
                                 </div>
                              </div> --}}
                                                    <div class="form-group message">
                                                        <label for="message" class="control-label"> @lang('messages.Messages')
                                                        </label>
                                                        <textarea class="form-control" rows="7" id="message" name="message" style="height:150px!important">{{ old('message') }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        @lang('messages.Submit Tickets')</button>
                                                </form>
                                                <script>
                                                    var element2 = document.getElementById("payment-group").style = "display:none";

                                                    function handleOrderType(selectObject) {
                                                        var element = document.getElementById("order-group");
                                                        var element2 = document.getElementById("payment-group");
                                                        var element3 = document.getElementById("Sell your own services on socialhub.com-group");
                                                        var optional = document.getElementById("optional");

                                                        if (selectObject.value == "Orders - New" || selectObject.value == "Orders - Junior" || selectObject.value ==
                                                            "Orders - Frequent" || selectObject.value == "Orders - Elite" || selectObject.value == "Orders - VIP" ||
                                                            selectObject.value == "Orders - Master") {
                                                            element.style.display = "block";
                                                            element2.style.display = "none";
                                                            element3.style.display = "none";
                                                            optional.style.display = "inline";
                                                        } else if (selectObject.value == "Payments - New" || selectObject.value == "Payments - Junior" || selectObject
                                                            .value == "Payments - Frequent" || selectObject.value == "Payments - Elite" || selectObject.value ==
                                                            "Payments - VIP" || selectObject.value == "Payments - Master") {
                                                            element.style.display = "none";
                                                            element2.style.display = "block";
                                                            element3.style.display = "none";
                                                            optional.style.display = "none";
                                                        } else if (selectObject.value == "Others - New" || selectObject.value == "Child Panel - Junior" || selectObject
                                                            .value == "Child Panel - Frequent" || selectObject.value == "Child Panel - Elite" || selectObject.value ==
                                                            "Child Panel - VIP" || selectObject.value == "Child Panel - Master") {
                                                            element.style.display = "none";
                                                            element2.style.display = "none";
                                                            element3.style.display = "none";
                                                            optional.style.display = "none";
                                                        } else if (selectObject.value == "VIP Membership - New" || selectObject.value == "VIP Membership  - Junior" ||
                                                            selectObject.value == "VIP Membership - Frequent" || selectObject.value == "VIP Membership - Elite" ||
                                                            selectObject.value == "VIP Membership - VIP" || selectObject.value == "VIP Membership - Master") {
                                                            element.style.display = "none";
                                                            element2.style.display = "none";
                                                            element3.style.display = "none";
                                                            optional.style.display = "none";
                                                        } else if (selectObject.value == "Other - New" || selectObject.value == "Other - Junior" || selectObject
                                                            .value == "Other - Frequent" || selectObject.value == "Other - Elite" || selectObject.value ==
                                                            "Other - VIP" || selectObject.value == "Other - Master") {
                                                            element.style.display = "none";
                                                            element2.style.display = "none";
                                                            element3.style.display = "none";
                                                            optional.style.display = "none";
                                                        } else if (selectObject.value == "Sell your own services on socialhub.com - New" || selectObject.value ==
                                                            "Sell your own services on socialhub.com - Junior" || selectObject.value ==
                                                            "Sell your own services on socialhub.com - Frequent" || selectObject.value ==
                                                            "Sell your own services on socialhub.com - Elite" || selectObject.value ==
                                                            "Sell your own services on socialhub.com - VIP" || selectObject.value ==
                                                            "Sell your own services on socialhub.com - Master") {
                                                            element.style.display = "none";
                                                            element2.style.display = "none";
                                                            element3.style.display = "block";
                                                            optional.style.display = "none";
                                                        }

                                                    }

                                                    function createTicket(e) {
                                                        if (e.preventDefault) e.preventDefault();

                                                        var subject = document.getElementById("subject").value;
                                                        var message = "";



                                                        if (subject == "Orders - New" || subject == "Orders - Junior" || subject == "Orders - Frequent" || subject ==
                                                            "Orders - Elite" || subject == "Orders - VIP" || subject == "Orders - Master") {
                                                            message = "Orders Id: " + document.getElementById("orderid").value + "\n" + "Request: " + document
                                                                .getElementById("want").value + "\n" + document.getElementById("message").value;
                                                        } else if (subject == "Payments - New" || subject == "Payments - Junior" || subject == "Payments - Frequent" ||
                                                            subject == "Payments - Elite" || subject == "Payments - VIP" || subject == "Payments - Master") {
                                                            message = "Payment: " + document.getElementById("payment").value + "\n  Transaction Id : " + document
                                                                .getElementById("PaymentID").value + "\n Amount: " + document.getElementById("addamount").value + "\n" +
                                                                document.getElementById("message").value;

                                                        } else if (subject == "Sell your own services on socialhub.com - New" || subject ==
                                                            "Sell your own services on socialhub.com - Junior" || subject ==
                                                            "Sell your own services on socialhub.com - Frequent" || subject ==
                                                            "Sell your own services on socialhub.com - Elite" || subject ==
                                                            "Sell your own services on socialhub.com - VIP" || subject ==
                                                            "Sell your own services on socialhub.com - Master") {
                                                            message = "Sell your own services on socialhub.com: " + document.getElementById(
                                                                "Sell your own services on socialhub.com").value + "\n" + document.getElementById("message").value;

                                                        } else {
                                                            message = document.getElementById("message").value;
                                                        }


                                                        document.getElementById("hmessage").value = message;

                                                        return true;
                                                    }

                                                    //    var form = document.getElementById("ticketsend");
                                                    //    if (form.attachEvent) {
                                                    //    form.attachEvent("submit", createTicket);
                                                    //    } else {
                                                    //    form.addEventListener("submit", createTicket);
                                                    //    }
                                                </script>
                                            </div>
                                            <!-- // Create Ticket Tabs Content 1 -->
                                            <!-- Create Ticket Tabs Content 2 -->
                                            <div class="tab-pane fade " id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">

                                                <div class="table-responsive table_scroller">
                                                    <table class="table">
                                                        <thead class="white">
                                                            <tr>
                                                                <th> @lang('messages.ID')</th>
                                                                <th> @lang('messages.Subjects')</th>
                                                                <th> @lang('messages.Status')</th>
                                                                <th> @lang('messages.Last Updates')</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>



                                                            @forelse ($tickets as $ticket)
                                                                <tr>
                                                                    <td>{{ $ticket->id }}</td>
                                                                    <td><a
                                                                            href="{{ route('viewticket', ['id' => $ticket->id]) }}">
                                                                            @if (session('locale') == 'ar')
                                                                                @if ($ticket->subject == 'Orders - New')
                                                                                    الطلبات - جديد
                                                                                @elseif($ticket->subject == 'Others - New')
                                                                                    أخرى - جديد
                                                                                @endif
                                                                            @else
                                                                                {{ $ticket->subject }}
                                                                            @endif
                                                                        </a></td>
                                                                    <td>
                                                                        @if ($ticket->status == 'answered')
                                                                            <span class="order-status">
                                                                                @lang('messages.Answered')</span>
                                                                        @elseif($ticket->status == 'closed')
                                                                            <span class="order-status os-cancel">
                                                                                @lang('messages.Closed')</span>
                                                                        @elseif($ticket->status == 'pending')
                                                                            <span class="order-status os-pending">
                                                                                @lang('messages.Pending')</span>
                                                                        @endif
                                                                    </td>
                                                                    <td><span
                                                                            class="nowrap">{{ $ticket->updated_at }}</span>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                            @endforelse


                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Ticket Page Pagination Start -->

                                                <!-- //Ticket Page Pagination End -->
                                            </div>
                                            <!-- // Create Ticket Tabs Content 2 -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12 mb-5 mb-lg-0">
                                <div class="d-card">
                                    <div class="d-card-head">
                                        <div class="dch-body">
                                            <i class="icon fas fa-question me-3"></i>
                                            <span class="ml-3"> @lang('messages.Frequently FAQs')</span>
                                        </div>
                                    </div>
                                    <div class="d-card-body">
                                        <div class="dash-sss">
                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>- @lang('messages.Why was my refill request rejected')</h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content">
                                                    @if (session('locale') == 'ar')
                                                        <p>يمكن رفض إعادة التعبئة لأسباب متنوعة مثل:<br>
                                                            1. انخفاض عدد الطلبات دون العدد الأولي للطلب الأصلي، في هذه
                                                            الحالة يجب زيادة العدد بشكل طبيعي أو من خلال طلب خدمة سريعة
                                                            جديدة بحيث يمكن للنظام إعادة تعبئة الطلب الأصلي.<br>
                                                            2. انتهاء فترة إعادة التعبئة المحددة في وصف الطلب الآن.<br>
                                                            3. الخدمة لا تقدم إعادة التعبئة.<br>
                                                            4. تم إجراء طلب جديد لنفس الرابط وهناك تداخل.<br>
                                                            إذا لم تكن أيًا من هذه الأسباب تنطبق عليك، يرجى فتح تذكرة مع
                                                            فريق الدعم للحصول على مساعدة أو توضيح إضافي.</p>
                                                    @else
                                                        <p>A refill can be rejected for a variety of reasons such as:<br>
                                                            1. The order has dropped below the start count of the original
                                                            order, in this case the number must be brought up organically or
                                                            through a new quick service order so that the system can refill
                                                            the
                                                            original order.<br> 2. The refill period outlined in the
                                                            description
                                                            of the order has now ended. <br> 3. The service does not offer
                                                            refill.<br>4.A new order has been made for the same link and
                                                            there
                                                            is overlap.<br> If none of these reasons apply to you, please
                                                            open a
                                                            ticket with the support team for further assistance or
                                                            clarification.
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>- @lang('messages.Why was my order canceled')</h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content">
                                                    @if (session('locale') == 'ar')
                                                        <p>سيتم إلغاء طلباتك لأحد الأسباب التالية:<br>
                                                            1. وضع طلبين أو أكثر لنفس الرابط في نفس الوقت دون الانتظار
                                                            لاكتماله. <br>
                                                            2. تنسيق الرابط غير صحيح أو لا يتبع التعليمات المقدمة في وصف
                                                            الخدمة. <br>
                                                            3. الخدمة تحت التحديث حاليًا أو في وضع الصيانة. <br>
                                                            4. في بعض الحالات، لم يكن الكمية بزيادات قدرها 100 أو 1000.</p>
                                                    @else
                                                        <p>Your orders will be canceled for one of the following
                                                            reasons:<br> 1.
                                                            Placing two or more orders for the same link at the same time
                                                            without waiting for completion. <br> 2. The link format is
                                                            incorrect
                                                            or does not follow the instructions provided in the service
                                                            description. <br> 3. The service is currently being updated or
                                                            under
                                                            service.<br> 4. In some cases, the quantity was not in
                                                            increments of
                                                            100's or 1000's.
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>- @lang('messages.Is it possible for the quantity ordered to decrease')</h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content">
                                                    @if (session('locale') == 'ar')
                                                        <p>الانخفاض طبيعي، ولهذا السبب يقدم معظم الخدمات ضمان إعادة
                                                            التعبئة. يمكن أن يتوقف الانخفاض على العديد من العوامل مثل
                                                            التحديث الذي تقوم به منصة وسائل التواصل الاجتماعي، أو على جودة
                                                            الخدمة المختارة. تأكد دائمًا من قراءة وصف الخدمة بعناية للتأكد
                                                            من أنك تقوم بطلب الخدمة الصحيحة لاحتياجاتك.</p>
                                                    @else
                                                        <p> A drop is normal, that is why most services offer a refill
                                                            guarantee. A drop can depend on many factors such as an update
                                                            made
                                                            by the social media platform, or on the quality of service
                                                            chosen.
                                                            Always make sure to read the service descriptions carefully to
                                                            ensure you are making the correct order for your needs. </p>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>
                                                                - @lang('messages.Can I get a refund to my original method of payment')
                                                            </h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content">
                                                    @if (session('locale') == 'ar')
                                                        <p>
                                                            للأسف، لا يوجد طريقة لاسترداد الرصيد إلى طريقة الدفع الأصلية.
                                                            عند الدفع، قمت بالموافقة على الشروط والأحكام للموقع، التي تنص
                                                            على
                                                            عدم وجود طريقة لاسترداد الأموال. هذه المدفوعات مقابل خدمات وغير
                                                            قابلة للاسترداد.
                                                        </p>
                                                    @else
                                                        <p>
                                                            Unfortunately, there is no way to return the balance to the
                                                            original
                                                            payment method.Upon payment, you have agreed to the <a
                                                                href="/terms" class="link-faq">terms and conditions</a>
                                                            of
                                                            the site, that there is no way to get the money back. These
                                                            payments
                                                            are for services and not refundable.
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>


                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>
                                                                - @lang('messages.How many tickets can I open')
                                                            </h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content" style="">
                                                    @if (session('locale') == 'ar')
                                                        <p>
                                                            يجب عليك فتح تذكرة واحدة فقط لجميع طلباتك حتى نتمكن من مساعدتك
                                                            بشكل أفضل. بعد تقديم الطلب أو حل المشكلة، سيتم إغلاق التذكرة.
                                                            بعد ذلك، يجب عليك فتح تذكرة جديدة للطلبات الجديدة. الحد الأقصى
                                                            لعدد التذاكر الغير المحلولة هو 3. يجب على فريق الدعم الرد لكي
                                                            يمكن فتح تذكرة جديدة.
                                                        </p>
                                                    @else
                                                        <p>
                                                            You must open only one ticket for all your orders so we can help
                                                            you
                                                            better. After the request has been submitted or the issue has
                                                            been
                                                            solved, the ticket will be closed. Only then should you open a
                                                            new
                                                            ticket for new orders. The maximum limit for pending tickets is
                                                            3. A
                                                            response must be made by the support team to be able to open a
                                                            new
                                                            ticket.
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>- @lang('messages.Why is my order not completed yet')</h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content" style="">
                                                    @if (session('locale') == 'ar')
                                                        <p>
                                                            قم بالتحقق من حالة طلبك من علامة التبويب "الطلبات" في لوحة
                                                            التحكم الخاصة بالمستخدم قبل فتح تذكرة. لمعرفة سرعة الطلبات، يرجى
                                                            الرجوع إلى وصف الخدمة. في حالة الحدوث النادر أن تكون حالة طلبك
                                                            قد أصبحت مكتملة ولكن لم يتم تقديم الخدمة، يرجى فتح تذكرة
                                                            وإخبارنا بذلك للتحقق من الطلب بالنسبة لك.
                                                        </p>
                                                    @else
                                                        <p>
                                                            Check the status of your order from the orders tab in your user
                                                            dashboard before opening a ticket.To know the speed of the
                                                            orders
                                                            please refer to the service description. In the rare event that
                                                            the
                                                            status of your order has become complete but the service was not
                                                            delivered, please open a ticket and tell us so to check the
                                                            order
                                                            for you.
                                                        </p>
                                                    @endif

                                                    <p>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>- @lang('messages.How often can I refill my order')</h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content" style="">
                                                    @if (session('locale') == 'ar')
                                                        <p>
                                                            يمكنك طلب إعادة التعبئة مرة واحدة كل 24 ساعة وفقط إذا كان هناك
                                                            انخفاض في الكمية المقدمة. تذكر أن طلبك يجب أن يكون لا يزال في
                                                            فترة التعبئة. بالإضافة إلى ذلك، في حالة الطلبات التي يتم تغذيتها
                                                            تدريجيًا، يمكنك طلب إعادة التعبئة للطلب الأخير فقط. لأنه في هذه
                                                            الحالة، سيتم رفض باقي طلبات إعادة التعبئة.
                                                        </p>
                                                    @else
                                                        <p>
                                                            You can request a refill once every 24 hours and only if there
                                                            is a
                                                            drop in the quantity delivered. Remember that your order must be
                                                            still in the refill period.<br>Also, in the case of drip feed
                                                            orders, you can request to refill only the last
                                                            order.<br>Because in
                                                            this case, the rest of the refill requests will be rejected.
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>
                                                                - @lang('messages.How can I send a screenshot to you')
                                                            </h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content" style="">
                                                    @if (session('locale') == 'ar')
                                                        <p>
                                                            يمكنك إرسال لنا لقطة شاشة باستخدام هذا الموقع: <a
                                                                href="https://prnt.sc"
                                                                class="link-faq">https://imgur.com/upload</a>
                                                            <br>
                                                        </p>
                                                    @else
                                                        <p>
                                                            يمكنك إرسال لنا لقطة شاشة باستخدام هذا الموقع : <a
                                                                href="https://prnt.sc" target="_blank"
                                                                class="link-faq">https://imgur.com/upload</a>
                                                            <br>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="sss-tab">
                                                <div class="sss-htab">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>- @lang('messages.Do you have any other questions')</h5>
                                                        </div>
                                                        <div class="col-auto align-self-center right-p">
                                                            <i class="far fa-chevron-double-up"></i>
                                                            <i class="far fa-chevron-double-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ss-tab-content" style="">
                                                    @if (session('locale') == 'ar')
                                                        <p>
                                                            لا تتردد في فتح تذكرة جديدة إذا كنت ترغب في الحصول على معلومات
                                                            إضافية.
                                                        </p>
                                                    @else
                                                        <p>
                                                            Feel free to open a new ticket if you would like additional
                                                            information.
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </section>
            </div>
        </div>
        </div>


        <!-- User Status Modal Start -->

        <!-- User Status Modal End -->
    @endsection
