@extends('layouts.app')
@section('body')
    <div class="app-container">
        @include('layouts.navigation')
        @include('layouts.header')


        <div class="app-content">
            <div class="container-fluid">


                <section class="neworder">

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="order-side">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                                        <div class="d-card dc-blue">
                                            <div class="d-card-body" id="dc-body">
                                                <div class="form-group mb-4">
                                                    <label style="color: #fff"> @lang('messages.Name')</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text"
                                                            value="{{ auth()->user()->name }}" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label style="color: #fff"> @lang('messages.Email Address')</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text"
                                                            value="{{ auth()->user()->email }}" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- d-card end -->
                                        <div class="d-card mt-4">
                                            <div class="d-card-body" id="dc-body">
                                                <form method="post" action="{{ route('password.update') }}">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group mb-4">
                                                        <label> @lang('messages.Current Password')</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="password" id="current"
                                                                name="current_password">
                                                        </div>
                                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"
                                                            style="color: red" />

                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label> @lang('messages.New Password')</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="password" id="new"
                                                                name="password">
                                                        </div>
                                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"
                                                            style="color: red" />

                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label> @lang('messages.Repeat New Password')</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="password" id="confirm"
                                                                name="password_confirmation">
                                                        </div>
                                                        <x-input-error :messages="$errors->updatePassword->get(
                                                            'password_confirmation',
                                                        )" class="mt-2"
                                                            style="color: red" />

                                                    </div>

                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        @lang('messages.Save Changes')</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- d-card end -->
                                    </div>
                                    <!-- col item end-->
                                    {{-- <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                                        <div class="d-card dc-dblue">
                                            <div class="d-card-body">
                                                <form method="post" action="">
                                                    <div class="form-group mb-4">
                                                        <label for="language" class="control-label">Website User
                                                            Language</label>
                                                        <select class="form-control" id="language"
                                                            name="SettingsFrom[lang]">
                                                            <option value="en" selected="">ENG</option>
                                                            <option value="ar">العربية</option>
                                                            <option value="es">Spanish</option>
                                                            <option value="ru">Russian</option>
                                                            <option value="tr">Turkish</option>
                                                            <option value="bp">Portuguese (Brazil)</option>
                                                            <option value="ko">Korean</option>
                                                            <option value="af">Afrikaans</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="_csrf"
                                                        value="sV6mdWG213g-rSEG-yJ1DXR4akjm-wuCQiYFhookv4DwGsE3KeejL1fGTVyIci9-RiEsfYirR-MrR0zZ_1XR7Q==">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="d-card dc-dblue mt-4">
                                            <div class="d-card-body">
                                                <form action="" method="post">
                                                    <div class="form-group mb-4">
                                                        <label for="language" class="control-label">Time Zone</label>
                                                        <select name="SettingsFrom[timezone]" id="timezone"
                                                            class="form-control">
                                                            <option value="-43200">(UTC -12:00) Baker/Howland Island
                                                            </option>
                                                            <option value="-39600">(UTC -11:00) Niue</option>
                                                            <option value="-36000">(UTC -10:00) Hawaii-Aleutian Standard
                                                                Time, Cook Islands, Tahiti</option>
                                                            <option value="-34200">(UTC -9:30) Marquesas Islands</option>
                                                            <option value="-32400">(UTC -9:00) Alaska Standard Time,
                                                                Gambier Islands</option>
                                                            <option value="-28800">(UTC -8:00) Pacific Standard Time,
                                                                Clipperton Island</option>
                                                            <option value="-25200">(UTC -7:00) Mountain Standard Time
                                                            </option>
                                                            <option value="-21600">(UTC -6:00) Central Standard Time
                                                            </option>
                                                            <option value="-18000" selected="">(UTC -5:00) Eastern
                                                                Standard Time, Western Caribbean Standard Time</option>
                                                            <option value="-16200">(UTC -4:30) Venezuelan Standard Time
                                                            </option>
                                                            <option value="-14400">(UTC -4:00) Atlantic Standard Time,
                                                                Eastern Caribbean Standard Time</option>
                                                            <option value="-12600">(UTC -3:30) Newfoundland Standard Time
                                                            </option>
                                                            <option value="-10800">(UTC -3:00) Argentina, Brazil, French
                                                                Guiana, Uruguay</option>
                                                            <option value="-7200">(UTC -2:00) South Georgia/South Sandwich
                                                                Islands</option>
                                                            <option value="-3600">(UTC -1:00) Azores, Cape Verde Islands
                                                            </option>
                                                            <option value="0">(UTC) Greenwich Mean Time, Western
                                                                European Time</option>
                                                            <option value="3600">(UTC +1:00) Central European Time, West
                                                                Africa Time</option>
                                                            <option value="7200">(UTC +2:00) Central Africa Time, Eastern
                                                                European Time, Kaliningrad Time</option>
                                                            <option value="10800">(UTC +3:00) Moscow Time, East Africa
                                                                Time, Arabia Standard Time</option>
                                                            <option value="12600">(UTC +3:30) Iran Standard Time</option>
                                                            <option value="14400">(UTC +4:00) Azerbaijan Standard Time,
                                                                Samara Time</option>
                                                            <option value="16200">(UTC +4:30) Afghanistan</option>
                                                            <option value="18000">(UTC +5:00) Pakistan Standard Time,
                                                                Yekaterinburg Time</option>
                                                            <option value="19800">(UTC +5:30) Indian Standard Time, Sri
                                                                Lanka Time</option>
                                                            <option value="20700">(UTC +5:45) Nepal Time</option>
                                                            <option value="21600">(UTC +6:00) Bangladesh Standard Time,
                                                                Bhutan Time, Omsk Time</option>
                                                            <option value="23400">(UTC +6:30) Cocos Islands, Myanmar
                                                            </option>
                                                            <option value="25200">(UTC +7:00) Krasnoyarsk Time, Cambodia,
                                                                Laos, Thailand, Vietnam</option>
                                                            <option value="28800">(UTC +8:00) Australian Western Standard
                                                                Time, Beijing Time, Irkutsk Time</option>
                                                            <option value="31500">(UTC +8:45) Australian Central Western
                                                                Standard Time</option>
                                                            <option value="32400">(UTC +9:00) Japan Standard Time, Korea
                                                                Standard Time, Yakutsk Time</option>
                                                            <option value="34200">(UTC +9:30) Australian Central Standard
                                                                Time</option>
                                                            <option value="36000">(UTC +10:00) Australian Eastern Standard
                                                                Time, Vladivostok Time</option>
                                                            <option value="37800">(UTC +10:30) Lord Howe Island</option>
                                                            <option value="39600">(UTC +11:00) Srednekolymsk Time, Solomon
                                                                Islands, Vanuatu</option>
                                                            <option value="41400">(UTC +11:30) Norfolk Island</option>
                                                            <option value="43200">(UTC +12:00) Fiji, Gilbert Islands,
                                                                Kamchatka Time, New Zealand Standard Time</option>
                                                            <option value="45900">(UTC +12:45) Chatham Islands Standard
                                                                Time</option>
                                                            <option value="46800">(UTC +13:00) Samoa Time Zone, Phoenix
                                                                Islands Time, Tonga</option>
                                                            <option value="50400">(UTC +14:00) Line Islands</option>
                                                        </select>
                                                    </div>
                                                   
                                                    <button type="submit"
                                                        class="btn btn-primary btn-lg btn-block my-4">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="d-card dc-orange mt-4">
                                            <div class="d-card-body">
                                                <form action="/account/newkey" method="post">
                                                    <div class="form-group mb-4">
                                                        <label for="language" style="color: #fff"
                                                            class="control-label">API Key</label>
                                                        <input class="form-control" type="text" id="api_key"
                                                            value="********************************" readonly=""
                                                            data-original-title="" title="">
                                                    </div>
                                                    <input type="hidden" name="_csrf"
                                                        value="sV6mdWG213g-rSEG-yJ1DXR4akjm-wuCQiYFhookv4DwGsE3KeejL1fGTVyIci9-RiEsfYirR-MrR0zZ_1XR7Q==">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-lg btn-block my-4">Genarate New API
                                                        Key</button>

                                                    <div class="alert alert-secondary" role="alert">
                                                        By Clicking "Genrate New API Key" it will changed your present api
                                                        key and it will genrate new key. If you already connected using api
                                                        please make sure you change api key after genarate new api key.
                                                        Thank you.
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </section>
                        </div>
                        {{-- <div class="col-lg-6 col-md-8 col-12">
                            <div class="d-card dc-orange mt-4">
                                <div class="d-card-body">
                                    <div id="2fa-approve-error-block" style=" display: none; "
                                        class="alert alert-dismissible alert-danger ">
                                        <button type="button" class="close">×</button>
                                        <span id="2fa-error-text"></span>
                                    </div>

                                    <label class="control-label">
                                        Two-factor authentication
                                    </label>

                                    <!-- 2FA Form generate code -->
                                    <form id="2fa-generate-form" method="post" action="/account/2fa/generate"
                                        style=" display: block; ">
                                        <p>Email-based option to add an extra layer of protection to your account. When
                                            signing in you’ll need to enter a code that will be sent to your email address.
                                        </p>
                                        <input type="hidden" name="enabled" value="1">
                                        <input type="hidden" name="_csrf"
                                            value="sV6mdWG213g-rSEG-yJ1DXR4akjm-wuCQiYFhookv4DwGsE3KeejL1fGTVyIci9-RiEsfYirR-MrR0zZ_1XR7Q==">
                                        <button id="2fa-generate" type="submit" class="btn btn-primary">
                                            Enable
                                        </button>
                                    </form>

                                    <!-- 2FA Form approve code -->
                                    <form id="2fa-approve-form" method="post" action="/account/2fa/approve"
                                        style=" display: none; ">
                                        <p>Please check your email and enter the code below.</p>
                                        <div class="form-group">
                                            <label for="code" class="control-label">Code</label>
                                            <input type="text" id="code" name="code" class="form-control">
                                        </div>
                                        <input type="hidden" name="enabled" value="1">
                                        <input type="hidden" name="_csrf"
                                            value="sV6mdWG213g-rSEG-yJ1DXR4akjm-wuCQiYFhookv4DwGsE3KeejL1fGTVyIci9-RiEsfYirR-MrR0zZ_1XR7Q==">
                                        <button id="2fa-approve" type="submit" class="btn btn-primary">
                                            Enable
                                        </button>
                                    </form>
                                </div>


                            </div>
                        </div> --}}
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
                                                * = You may purchase a VIP status for a month from our services under the
                                                VIP section. <br>
                                                ** = 5% Bonus on Payments made with Perfect Money, Western Union, Bitcoins,
                                                Altcoins or Payoneer. <br>
                                                *** = Each month we will pick 1 random Frequent, Elite, VIP or Master user
                                                to win $500 to be used on the panel! <br>
                                                **** = You will get a FREE SMM Panel like ours with a FREE domain aswell!
                                                <br>
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







                    </div>
                </section>
            </div>
        </div>
    </div>
    </body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

    </html>
@endsection
