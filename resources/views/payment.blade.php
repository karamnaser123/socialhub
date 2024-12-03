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
                        <div class="col-lg-7 col-12 mb-5 mb-lg-0">
                            <div class="d-card mb-3">

                                <div class="d-card-head">
                                    <div class="dch-body">
                                        <i class="icon far fa-credit-card me-3"></i>
                                        <span class="ml-3"> @lang('messages.Add Fund')</span>
                                    </div>
                                </div>

                                <div class="d-card-body" id="dc-body">

                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="method" class="control-label"> @lang('messages.Method')</label>
                                            <select class="form-control" id="method" name="AddFoundsForm[type]">

                                                <option id="zaincash" value=""> @lang('messages.ZainCash')</option>
                                                <option id="orangemoney" value=""> @lang('messages.OrangeMoney')
                                                </option>
                                                <option id="click" value="">@lang('messages.Click')</option>

                                            </select>
                                        </div>
                                        <div class="form-group instruction" id="instruction_instruction">
                                            <label class="control-label">Instruction</label>
                                            <div class="panel-body border-solid border-rounded text-center">
                                                <p>- <a href="{{ route('tickets') }}" target="_blank"> @lang('messages.Open Ticket')</a>
                                                    @lang('messages.to get our Zain Cash number')</p>
                                                <p>- @lang('messages.The Minimum payment is $5 USD')</p>
                                                <p>- @lang('messages.And then provide us with your phone number and the amount sent')</p>
                                            </div>
                                        </div>

                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                        <!--<button type="button" class="btn btn-secondary btn-block mt-3" data-toggle="modal" data-target="#papara">Papara ile Öde</button>-->
                                    </form>

                                    <script>
                                        // Function to display instructions
                                        function showInstructions(instructions) {
                                            const instructionDiv = document.getElementById('instruction_instruction');
                                            instructionDiv.innerHTML = `
                                                <label class="control-label">Instruction</label>
                                                <div class="panel-body border-solid border-rounded text-center">
                                                    <p>${instructions}</p>
                                                </div>
                                            `;
                                        }

                                        // Assuming you have the select element with id="method"
                                        const selectElement = document.getElementById('method');

                                        // Add event listener to detect changes in the select element
                                        selectElement.addEventListener('change', function() {
                                            // Get the selected option
                                            const selectedOption = selectElement.options[selectElement.selectedIndex];

                                            // Get the ID of the selected option
                                            const selectedOptionId = selectedOption.id;

                                            // Make an AJAX request to fetch session locale
                                            $.ajax({
                                                url: '/get-session-locale',
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function(data) {
                                                    var locale = data.locale;

                                                    switch (selectedOptionId) {
                                                        case 'zaincash':
                                                            if (locale === 'ar') {
                                                                showInstructions(
                                                                    "- <a href='/tickets' target='_blank'>افتح تذكرة</a> للحصول على رقم زين كاش<br>- الحد الأدنى لشحن هو 5 دولارات <br>- ثم تزويدنا برقم هاتفك والمبلغ المرسلة."
                                                                );
                                                            } else {
                                                                showInstructions(
                                                                    "- <a href='/tickets' target='_blank'>Open a ticket</a> to get our Zain Cash number.<br>- The Minimum payment is $5 USD<br>- And then provide us with your phone number and the amount sent."
                                                                );
                                                            }
                                                            break;
                                                        case 'orangemoney':
                                                            if (locale === 'ar') {
                                                                showInstructions(
                                                                    "- <a href='/tickets' target='_blank'>افتح تذكرة</a> Orange Money للحصول على رقم<br>- الحد الأدنى لشحن هو 5 دولارات <br>- ثم تزويدنا برقم هاتفك والمبلغ المرسلة."
                                                                );
                                                            } else {
                                                                showInstructions(
                                                                    "- <a href='/tickets' target='_blank'>Open a ticket</a> to get our  Orange Money.<br>- The Minimum payment is $5 USD<br>- And then provide us with your phone number and the amount sent."
                                                                );
                                                            }
                                                            break;
                                                        case 'click':
                                                            if (locale === 'ar') {
                                                                showInstructions(
                                                                    "- <a href='/tickets' target='_blank'>افتح تذكرة</a> للحصول على رقم كليك<br>- الحد الأدنى لشحن هو 5 دولارات <br>- ثم تزويدنا برقم هاتفك والمبلغ المرسلة."
                                                                );
                                                            } else {
                                                                showInstructions(
                                                                    "- <a href='/tickets' target='_blank'>Open a ticket</a> to get our Click.<br>- The Minimum payment is $5 USD<br>- And then provide us with your phone number and the amount sent."
                                                                );
                                                            }
                                                            break;
                                                        default:
                                                            // Handle other cases if necessary
                                                            break;
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error:', error);
                                                }
                                            });
                                        });
                                    </script>


                                </div>
                            </div>
                            <div class="d-card">
                                <div class="d-card-head">
                                    <div class="dch-body">
                                        <i class="icon far fa-comment-dollar me-3"></i>
                                        <span class="ml-3"> @lang('messages.Fund History')</span>
                                    </div>
                                </div>
                                <div class="d-card-body">
                                    <div class="table-responsive fundTableScrollable">
                                        <table class="table">
                                            <thead class="white">
                                                <tr>
                                                    <th> @lang('messages.ID')</th>
                                                    <th> @lang('messages.History')</th>
                                                    <th> @lang('messages.Payment Methods')</th>
                                                    <th> @lang('messages.Amount')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orderssss as $ordersss)
                                                    <tr>
                                                        <td>{{ $ordersss->id }}</td>
                                                        <td><span class="nowrap">{{ $ordersss->created_at }}</span></td>
                                                        <td> @lang('messages.Fee')</td>
                                                        <td><strong> -{{ $ordersss->price }}
                                                            </strong></td>
                                                    </tr>
                                                @empty
                                                    {{-- <td>
                                                    <h5>you dont have any order</h5>

                                                </td> --}}
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 mb-5 mb-lg-0">
                            <div class="d-card">
                                <div class="d-card-head">
                                    <div class="dch-body">
                                        <i class="icon fas fa-question me-3"></i>
                                        <span class="ml-3"> @lang('messages.Payment Methods FAQs')</span>
                                    </div>
                                </div>
                                <div class="d-card-body">
                                    <div class="dash-sss">
                                        {{-- 
                                        <div class="sss-tab">
                                            <div class="sss-htab">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5> Credit Card</h5>
                                                    </div>
                                                    <div class="col-auto align-self-center right-p">
                                                        <i class="far fa-chevron-double-up"></i>
                                                        <i class="far fa-chevron-double-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ss-tab-content">
                                                <p>
                                                    We have more than 10 automatic payment methods via credit card, so
                                                    please if you encounter any problem with paying through the methods
                                                    currently available to you, do not hesitate to <a href="/tickets"
                                                        class="link-faq">ask us </a> to enable other methods for you.</p>
                                            </div>
                                        </div> --}}



                                        {{-- <div class="sss-tab">
                                            <div class="sss-htab">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>Crypto Currency</h5>
                                                    </div>
                                                    <div class="col-auto align-self-center right-p">
                                                        <i class="far fa-chevron-double-up"></i>
                                                        <i class="far fa-chevron-double-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ss-tab-content">
                                                <p>You can send your Crypto currency through <a target="_blank"
                                                        href="https://accounts.binance.com/en/register?ref=321979772"
                                                        style="color: #F0B90B !important">Binance</a> Manually, We accept a
                                                    variety of Cryptocurrencies such as USDT, BNB, BTC, ETH... Please <a
                                                        href="/tickets" class="link-faq">open a ticket</a> for addresses.
                                                    or you can use coinbase wallet automatically.
                                                    <br>
                                                    <br>
                                                    - Binance payments are manually approved for everyone!
                                                    <br>
                                                    - $10 USD Minimum Payment!
                                                    <br>
                                                    - 2% to 10% Random Bonus on Binance payments when you pay $1000+
                                                    <br>
                                                    <br>
                                                    NOTE: THIS PAYMENT IS FOR SERVICES AND IS NOT REFUNDABLE.
                                                    <br>

                                                </p>
                                            </div>
                                        </div> --}}


                                        <div class="sss-tab">
                                            <div class="sss-htab">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5> @lang('messages.namePayPal')</h5>
                                                    </div>
                                                    <div class="col-auto align-self-center right-p">
                                                        <i class="far fa-chevron-double-up"></i>
                                                        <i class="far fa-chevron-double-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ss-tab-content">
                                                @lang('messages.PayPal')

                                            </div>
                                        </div>

                                        <div class="sss-tab">
                                            <div class="sss-htab">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5> @lang('messages.Other')</h5>
                                                    </div>
                                                    <div class="col-auto align-self-center right-p">
                                                        <i class="far fa-chevron-double-up"></i>
                                                        <i class="far fa-chevron-double-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ss-tab-content">

                                                {{-- 
                                                🇨🇦 𝘾𝙖𝙣𝙖𝙙𝙞𝙖𝙣 users You can pay via <font color="#ebab1f">Interac‡
                                                    e-Transfer.</font><br>
                                                🇵🇰 𝙋𝙖𝙠𝙞𝙨𝙩𝙖𝙣𝙞 users you can pay via <font color="#ebab1f">
                                                    Cashmaal.</font><br>
                                                🇮🇳 𝙄𝙣𝙙𝙞𝙖𝙣 users you can pay via <font color="#075d96">Pay</font>
                                                <font color="#00baf2">Tm.</font><br>
                                                🇲🇦 𝙈𝙤𝙧𝙤𝙘𝙘𝙖𝙣 users you can pay via <font color="#075d96">Pay
                                                </font>
                                                <font color="#00baf2">Op.</font><br> --}}
                                                {{-- 🇹🇷 𝙏𝙪𝙧𝙠𝙞𝙨𝙝 users You can pay via <font color="#FF0000">Papara.
                                                </font><br> --}}
                                                @if (session('locale') == 'ar')
                                                    🇯🇴 المستخدمين الاردنين يمكنك الدفع عن طريق <font color="#8cc63f">زين
                                                        كاش</font><br>
                                                    🇯🇴 المستخدمين الاردنين يمكنك الدفع عن طريق <font color="#FFA500">
                                                        Orange
                                                        Money.</font><br>
                                                    🇯🇴 المستخدمين الاردنين يمكنك الدفع عن طريق <font color="#FF0000">
                                                        كليك
                                                    </font><br>
                                                @else
                                                    🇯🇴 𝙅𝙤𝙧𝙙𝙖𝙣𝙞𝙖𝙣 users You can pay via <font color="#8cc63f">Zain
                                                        Cash.</font><br>
                                                    🇯🇴 𝙅𝙤𝙧𝙙𝙖𝙣𝙞𝙖𝙣 users You can pay via <font color="#FFA500">
                                                        Orange
                                                        Money.</font><br>
                                                    🇯🇴 𝙅𝙤𝙧𝙙𝙖𝙣𝙞𝙖𝙣 users You can pay via <font color="#FF0000">
                                                        Click
                                                    </font><br>
                                                @endif




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





    <!-- User Status Modal End -->
@endsection
