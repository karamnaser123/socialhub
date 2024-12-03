<div class="app-header">
    <div class="container-fluid">
        <div class="row row-80">
            <div class="col-auto align-self-center">
                <div class="dash-menu-btn" onclick="dashMenuToggle()">
                    <i class="fal fa-bars"></i>
                </div>
            </div>
            <div class="col d-inline-block d-md-none align-self-center text-center">
                <div class="app-logo">
                    <img style="width: 100px; height: 80px" src="{{ asset('image/logohub.png') }}" alt="Social Hub.COM"
                        title="Social Hub.COM">
                </div>
            </div>

            <div class="col col-100 d-none d-md-inline-block align-self-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="cursor_help" data-toggle="modal" data-target="#exampleModal">
                        {{-- <h4 class="user_infos">Account Status: <strong> New
                            </strong>
                        </h4> --}}
                    </div>
                    <div>
                        <h4 class="user_infos">
                            @lang('messages.Total Customer Balance'): ${{ $userbalancesum }}
                        </h4>
                    </div>
                    <div class="cursor_help" data-toggle="modal" data-target="#pointsModal">
                        <h4 class="user_infos">
                            {{-- Points: <span id="data_points">0.000</span> ≈ $<span id="data_balance">N/A</span> --}}
                            @lang('messages.Cost Orders'): {{ $totalpriceformypayment }}
                        </h4>
                    </div>
                    <div class="cursor_help" data-toggle="modal" data-target="#pointsModal">
                        <h4 class="user_infos">
                            @lang('messages.Points'): <span id="data_points">0.000</span> ≈ $<span id="data_balance">N/A</span>
                        </h4>
                    </div>
                    <div>
                        <h4 class="user_infos">
                            @lang('messages.Total Orders'): {{ $orderscount }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-auto align-self-center">
                {{-- <a href="https://t.me/Social Hub" class="telegram_icon_top" target="_blank">
             <i class="fab fa-telegram"></i>
             </a> --}}
                {{-- <button class="darkmode" onclick="change_mode()">
                    <i class="fal fa-sun"></i>
                    <i class="fal fa-moon"></i>
                </button> --}}
                {{-- <li class="dropdown dropdown-currencies currency_converter">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-usd-circle"></i>
                </a>
                <ul class="dropdown-menu" id="currencies-list">
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="BRL" data-rate-symbol="R$">BRL R$</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="CNY" data-rate-symbol="¥">CNY ¥</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="EGP" data-rate-symbol="£">EGP £</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="EUR" data-rate-symbol="€">EUR €</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="INR" data-rate-symbol="₹">INR ₹</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="KRW" data-rate-symbol="₩">KRW ₩</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="KWD" data-rate-symbol="KD">KWD KD</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="NGN" data-rate-symbol="₦">NGN ₦</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="PKR" data-rate-symbol="Rs">PKR Rs</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="RUB" data-rate-symbol="₽">RUB ₽</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="SAR" data-rate-symbol="ر.س">SAR ر.س</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="THB" data-rate-symbol="฿">THB ฿</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="TRY" data-rate-symbol="₺">TRY ₺</a>
                   </li>
                                           <li>
                      <a href="#" id="currencies-item" data-rate-key="VND" data-rate-symbol="₫">VND ₫</a>
                   </li>
                                        </ul>
             </li> --}}
                <li class="flag_lang">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa-solid fa-earth-asia"></i>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('lang.en') }}">ENG</a>
                            </li>
                            <li>
                                <a href="{{ route('lang.ar') }}">العربية</a>
                            </li>

                        </ul>
                    </a>
                </li>
            </div>
        </div>
        <!-- row -->
    </div>
</div>
