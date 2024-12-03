@extends('layouts.app')

@section('body')
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <div class="app-container">
            @include('layouts.navigation')
            @include('layouts.header')

            <!-- header -->
            @include('layouts.mobile-nav')
            <!-- Main variables *content* -->
            <style>
                .gizli {
                    display: none !important;
                    opacity: 0 !important;
                    overflow: hidden !important;
                }
            </style>
            <div class="app-content">
                <div class="container-fluid">



                    {{--                
        <div class="alert alert-success" role="alert">
Join our VIP community to get a discount of up to&nbsp;<b>30%</b>&nbsp;on all our services, up to <b>20%</b> bonus on payments and more for only <b>$49</b>/month, ➜ <a href="https://www.Social Hub.vip/" style="
 color: #0056b3" target="_blank"><b>【 WWW.Social Hub.VIP 】</b></a>
</div>      --}}



                    <div class="smmiconss">
                        <ul>
                            <li><a href="javascript:void(0)" onclick="start('everything')"
                                    class="filter_item brand-category" data-id="everything"> <span class="icons"> <i
                                            class="fab fa-gitter"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('instagram')" class="filter_item brand-category"
                                    data-id="instagram"> <span class="icons"> <i class="fab fa-instagram"></i> </span></a>
                            </li>

                            <li><a href="javascript:void(0)" onclick="start('facebook')" class="filter_item brand-category">
                                    <span class="icons" data-id="facebook"> <i class="fab fa-facebook"></i> </span></a>
                            </li>

                            <li><a href="javascript:void(0)" onclick="start('youtube')" class="filter_item brand-category">
                                    <span class="icons" data-id="youtube"> <i class="fab fa-youtube"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('twitter')" class="filter_item brand-category">
                                    <span class="icons" data-id="twitter"> <i class="fab fa-twitter"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('tiktok')" class="filter_item brand-category">
                                    <span class="icons" data-id="tiktok"> <i class="fab fa-tiktok"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('telegram')" class="filter_item brand-category"
                                    data-id="telegram"> <span class="icons"> <i class="fab fa-telegram"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('behance')" class="filter_item brand-category"
                                    data-id="behance"> <span class="icons"> <i class="fab fa-behance"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('spotify')" class="filter_item brand-category"
                                    data-id="spotify"> <span class="icons"> <i class="fab fa-spotify"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('linkedin')" class="filter_item brand-category"
                                    data-id="linkedin"> <span class="icons"> <i class="fab fa-linkedin"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('map')" class="filter_item brand-category"
                                    data-id="map"> <span class="icons"> <i class="fab fa-google"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('snapchat')" class="filter_item brand-category"
                                    data-id="snapchat"> <span class="icons"> <i class="fab fa-snapchat"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('twitch')" class="filter_item brand-category"
                                    data-id="twitch"> <span class="icons"> <i class="fab fa-twitch"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('discord')" class="filter_item brand-category"
                                    data-id="discord"> <span class="icons"> <i class="fab fa-discord"></i>
                                    </span></a></li>

                            <li><a href="javascript:void(0)" onclick="start('traffic')" class="filter_item brand-category"
                                    data-id="traffic"> <span class="icons"> <i class="fas fa-globe"></i>
                                    </span></a></li>


                        </ul>
                    </div>



                    <section class="neworder">
                        <div class="row">
                            <div class="col-lg-7 col-12 mb-5 mb-lg-0">
                                <div class="d-card">
                                    <div class="d-card-body" id="dc-body">

                                        <ul class="nav nav-pills mb-3 ticketTabs" id="pills-tab1" role="tablist">
                                            <!-- Category All Tabs 1 -->
                                            {{-- <li class="nav-item">
                                                <a class="nav-link active " id="pills-new-order-tab" data-toggle="pill"
                                                    href="#pills-new-order" role="tab"
                                                    aria-controls="pills-new-order" aria-selected="true">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icon fas fa-list me-3"></i>
                                                        <span class="ml-sm-3 ml-sm-1">All Categories</span>
                                                    </div>
                                                </a>
                                            </li> --}}
                                            <!-- // Category All  Tabs 1 -->
                                            <!-- Favorite Tabs 2 -->
                                            {{-- <li class="nav-item">
                             <a class="nav-link  tab-head" id="pills-fav-tab" data-toggle="pill" href="#pills-fav" role="tab" aria-controls="pills-fav" aria-selected="false">
                                 <div class="d-flex align-items-center">
                                   <i class="icon fas fa-star me-3"></i>
                                   <span class="ml-sm-3 ml-sm-1">My Favorite</span>
                                 </div>
                             </a>
                           </li> --}}
                                            <!-- //Favorite Tabs 2 -->
                                        </ul>

                                        <div class="tab-content" id="pills-tab1Content">
                                            <div class="tab-pane fade active in show" id="pills-new-order"
                                                role="tabpanel" aria-labelledby="pills-new-order-tab">
                                                <div class="form-area neworderx">
                                                    <form action="{{ route('neworder') }}" method="post"
                                                        id="order-form">
                                                        @csrf <div class="form-group mb-4 mt-3">


                                                        </div>


                                                        <div class="form-group mb-4">
                                                            <label for="service" class="control-label">
                                                                @lang('messages.Service')</label>
                                                            <select id="orderform-service" class="form-control optmain"
                                                                name="service" style="display: none;">

                                                                {{-- <option  value="4901"> Instagram Followers | Low Drop 0-5% - Old Accounts - 25k/day $2 per 1000</option>
                                 <option  value="39">Instagram Followers | 60 days refill - Non Drop - Premium quality $3 per 1000</option>
                                 <option  value="4963">Instagram Video Views + IGTV - Reels - Fast - 100M/Day $1 per 1000</option>
                                 <option  value="4789">Instagram Likes | No Refill - Bots - 5K/Day - Max 20K $1 per 1000</option>
                                 <option  value="43">Instagram Likes | 30 Days Refill - Very Fast speed - 100K/Minute $1 per 1000</option>
                                 <option  value="7937">Facebook Page Followers | Non Drop - 30 Days Refill - 500K/Day $3 per 1000</option>
                                 <option  value="5087">Facebook Page Likes | No Refill - Max 100K - 200/Day $3 per 1000</option>
                                 <option  value="11688">Facebook Followers [ profile/page ] 30 Days Refill - No Drop - 10K/Day $3 per 1000</option>
                                 <option  value="5829">Facebook Post/Photo Likes - No Refill - 5K/Day - Max 10K $2 per 1000</option>
                                 <option  value="9869">Facebook Post Likes Emoticons [Like React 👍] No Refill - Bots $2 per 1000</option>
                                 <option  value="9872">Facebook Post Likes Emoticons [Love React ❤️] No Refill - Bots $2 per 1000</option>
                                 <option  value="9873">Facebook Post Likes Emoticons [Haha React 😂] No Refill - Bots - Bots $2 per 1000</option>
                                 <option  value="9874">Facebook Post Likes Emoticons [Wow React 😮] No Refill - Bots $2 per 1000</option>
                                 <option value="9240">TikTok Followers | No Refill - Real - 30K - 1K/Day $4 per 1000</option>
                                 <option  value="9242">TikTok Followers | 30 Days Refill - Real - 50K - 5K/Day $5 per 1000</option>
                                 <option  value="9318">TikTok Followers | Non Drop - High Quality - 20K - 5K/Day $7 per 1000</option>
                                 <option  value="5717">TikTok Followers | No Drop - Max 1M - 5K/Day $7 per 1000</option>
                                 <option  value="12396">TikTok Views | Max 100M - 1M/Hour [Super Fast] $2 per 1000</option>
                                 <option  value="1000">TikTok Views | Instant Start - Max 10M - 1M/Day $1 per 1000</option>
                                 <option  value="5720">TikTok Comments | Real - Random - Max 10K - Speed 3K/Day $10 per 1000</option>
                                 <option  value="5091">Youtube Subscribers | 30 Days Refill - Non Drop - Max 100K - 200/day $15 per 1000</option>
                                 <option  value="5080">Youtube Subscribers | Lifetime Refill - Max 100k - 3k/day $30 per 1000</option>
                                 <option  value="7432">Youtube Subscribers | Real - No Refill - Max 20k | Arab Mix $70 per 1000</option>
                                 <option value="7442">Youtube Video Likes | Refill 30 Days - Max 100K - 5k/Day ♻️ $5 per 1000</option>
                                 <option  value="9808">Youtube Likes [ No Refill ] $3 per 1000</option>
                                 <option  value="8791">Youtube Views + 2-3% Likes - Lifetime Refill - Non Drop - 2K/Day $5 per 1000</option>
                                 <option  value="5254">Youtube Views | Lifetime Refill - No Drop - 10K/Day $8 per 1000</option> --}}

                                                                @forelse ($product as $products)
                                                                    @if (session('locale') == 'ar')
                                                                        <option value="{{ $products->value }}">
                                                                            {{ $products->ar_name }}</option>
                                                                    @else
                                                                        <option value="{{ $products->value }}">
                                                                            {{ $products->name }}</option>
                                                                    @endif
                                                                @empty
                                                                    <h2> @lang('messages.sorry we dont have product')</h2>
                                                                @endforelse
                                                            </select>
                                                            <div class="dropdown">
                                                                <button class="form-control text-left" type="button"
                                                                    id="order-dd" data-toggle="dropdown"
                                                                    aria-haspopup="false" aria-expanded="false">
                                                                    <span id="order-services"><span class="ico-ig"><i
                                                                                class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span> Instagram
                                                                        Followers | Low Drop 0-5% - Old Accounts - 25k/day
                                                                        $2 per 1000</span>
                                                                    <i class="fa fa-caret-down ml-auto"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="order-dd"
                                                                    id="orders-drop"><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(4963)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>4963 -
                                                                        Instagram Video Views + IGTV - Reels - Fast -
                                                                        100M/Day - $0.029 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(4901)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>4901 -
                                                                        Instagram Followers | Low Drop 0-5% - Old Accounts -
                                                                        25k/day ⚡⛔ - $0.214 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(7472)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>7472 -
                                                                        Instagram Followers | 365 Days Refill Button - Real
                                                                        - 20K/Day ⚡♻️⛔ - $0.276 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(9991)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>9991 -
                                                                        Instagram Followers | 365 Days Refill Button - Real
                                                                        - 50K/Day ⚡♻️⛔ - $0.284 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(7022)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>7022 -
                                                                        Instagram Followers | 365 Days Refill - Real with
                                                                        Posts - 200K/Day ⚡♻️⛔ - $0.334 per
                                                                        1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(4864)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>4864 -
                                                                        Instagram Followers | 365 Days Refill - Old Real
                                                                        Accounts - 500K/Day ⚡♻️⛔ - $0.344 per
                                                                        1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(4789)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>4789 -
                                                                        Instagram Likes | No Refill - Bots - 5K/Day - Max
                                                                        20K - $0.014 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(43)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>43 -
                                                                        Instagram Likes | 30 Days Refill - Very Fast speed -
                                                                        100K/Minute ⚡♻️⛔ - $0.022 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(5699)"><span
                                                                            class="ico-tic"><i class="fab fa-tiktok"
                                                                                aria-hidden="true"></i> </span>5699 -
                                                                        TikTok Likes | No Drop - Real - Max 100K - 10k/Day -
                                                                        Fast - $0.125 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(1200)"><span
                                                                            class="ico-tic"><i class="fab fa-tiktok"
                                                                                aria-hidden="true"></i> </span>1200 -
                                                                        TikTok Followers | 30 Days Refill - Cancel Button -
                                                                        Max 1M - 5K/Day - $0.786 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(5647)"><span
                                                                            class="ico-tele"><i
                                                                                class="fab fa-telegram-plane"
                                                                                aria-hidden="true"></i> </span>5647 -
                                                                        Telegram Post Views | Working After Update [2024] -
                                                                        $0.021 per 1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(5649)"><span
                                                                            class="ico-tele"><i
                                                                                class="fab fa-telegram-plane"
                                                                                aria-hidden="true"></i> </span>5649 -
                                                                        Telegram Post Views | Working After Update [2024] -
                                                                        $0.009 per 1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(7514)"><span
                                                                            class="ico-tele"><i
                                                                                class="fab fa-telegram-plane"
                                                                                aria-hidden="true"></i> </span>7514 -
                                                                        Telegram Members | 90 Days Refill - Cancel Button -
                                                                        100K - 10K/Day - $0.495 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(5070)"><span
                                                                            class="ico-fb"><i
                                                                                class="fab fa-facebook-square"
                                                                                aria-hidden="true"></i> </span>5070 -
                                                                        Facebook Followers [ 𝐀𝐧𝐲 𝐓𝐲𝐩𝐞 ] Lifetime
                                                                        Refill - 500K/Day - Instant - $0.415 per
                                                                        1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(5176)"><span
                                                                            class="ico-fb"><i
                                                                                class="fab fa-facebook-square"
                                                                                aria-hidden="true"></i> </span>5176 -
                                                                        Facebook Post Likes | No Drop - Max 100K - 25K/Day -
                                                                        Instant - $0.071 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(1212)"><span
                                                                            class="ico-fb"><i
                                                                                class="fab fa-facebook-square"
                                                                                aria-hidden="true"></i> </span>1212 -
                                                                        Facebook Reels Short Video [Views] No Refill - 10M -
                                                                        10K/Day - $0.0075 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(9779)"><span
                                                                            class="ico-fb"><i
                                                                                class="fab fa-facebook-square"
                                                                                aria-hidden="true"></i> </span>9779 -
                                                                        Facebook Post Shares | No Drop - Max 1M - 10K/Day -
                                                                        $0.323 per 1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(5091)"><span
                                                                            class="ico-yt"><i class="fab fa-youtube"
                                                                                aria-hidden="true"></i> </span>5091 -
                                                                        Youtube Subscribers | 30 Days Refill - Non Drop -
                                                                        Max 100K - 200/day - $2.10 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(1150)"><span
                                                                            class="ico-yt"><i class="fab fa-youtube"
                                                                                aria-hidden="true"></i> </span>1150 -
                                                                        Youtube Views | Lifetime Refill Button - Source: Mix
                                                                        - Max 500K - 3K/Day ♻️ - $0.67 per
                                                                        1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(11335)"><span
                                                                            class="ico-yt"><i class="fab fa-youtube"
                                                                                aria-hidden="true"></i> </span>11335 -
                                                                        YouTube Views | Lifetime Refill - No Drop - 15K/Day
                                                                        - Extra Likes - $0.896 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(39)"><span
                                                                            class="ico-ig"><i class="fab fa-instagram"
                                                                                aria-hidden="true"></i> </span>39 -
                                                                        Instagram Followers | 60 days refill - Non Drop -
                                                                        Premium quality - $0.69 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(5669)"><span
                                                                            class="ico-tw"><i class="fab fa-twitter"
                                                                                aria-hidden="true"></i> </span>5669 -
                                                                        Twitter Followers | No Refill - Max 1M - 25k/Day -
                                                                        Instant - $0.436 per 1000</button><button
                                                                        id="order-sItem" class="dropdown-item"
                                                                        type="button" onclick="selectOrder(4895)"><span
                                                                            class="fs-"><i class="fas fa-arrow-right"
                                                                                aria-hidden="true"></i> </span>4895 -
                                                                        WhatsApp Channel Members - $5.327 per
                                                                        1000</button><button id="order-sItem"
                                                                        class="dropdown-item" type="button"
                                                                        onclick="selectOrder(1222)"><span
                                                                            class="fs-"><i class="fas fa-arrow-right"
                                                                                aria-hidden="true"></i> </span>1222 - 🔍
                                                                        WorldWide Traffic from Google.com [Organic] [Custom
                                                                        Keywords] - $0.015 per 1000</button></div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group mb-4">

                             <label for="service" class="control-label">Service:</label>
                             <select  class="form-control optmain" name="service" id="service">
                              <option id="4901" value="4901"> i Instagram Followers | Low Drop 0-5% - Old Accounts - 25k/day $2 per 1000</option>
                              <option id="39" value="39">Instagram Followers | 60 days refill - Non Drop - Premium quality $3 per 1000</option>
                              <option id="4963" value="4963">Instagram Video Views + IGTV - Reels - Fast - 100M/Day $1 per 1000</option>
                              <option id="4789" value="4789">Instagram Likes | No Refill - Bots - 5K/Day - Max 20K $1 per 1000</option>
                              <option id="43" value="43">Instagram Likes | 30 Days Refill - Very Fast speed - 100K/Minute $1 per 1000</option>
                              <option id="7937" value="7937">Facebook Page Followers | Non Drop - 30 Days Refill - 500K/Day $3 per 1000</option>
                              <option id="5087" value="5087">Facebook Page Likes | No Refill - Max 100K - 200/Day $3 per 1000</option>
                              <option id="11688" value="11688">Facebook Followers [ profile/page ] 30 Days Refill - No Drop - 10K/Day $3 per 1000</option>
                              <option id="5829" value="5829">Facebook Post/Photo Likes - No Refill - 5K/Day - Max 10K $2 per 1000</option>
                              <option id="9869" value="9869">Facebook Post Likes Emoticons [Like React 👍] No Refill - Bots $2 per 1000</option>
                              <option id="9872" value="9872">Facebook Post Likes Emoticons [Love React ❤️] No Refill - Bots $2 per 1000</option>
                              <option id="9873" value="9873">Facebook Post Likes Emoticons [Haha React 😂] No Refill - Bots - Bots $2 per 1000</option>
                              <option id="9874" value="9874">Facebook Post Likes Emoticons [Wow React 😮] No Refill - Bots $2 per 1000</option>
                              <option id="9240" value="9240">TikTok Followers | No Refill - Real - 30K - 1K/Day $4 per 1000</option>
                              <option id="9242" value="9242">TikTok Followers | 30 Days Refill - Real - 50K - 5K/Day $5 per 1000</option>
                              <option id="9318" value="9318">TikTok Followers | Non Drop - High Quality - 20K - 5K/Day $7 per 1000</option>
                              <option id="5717" value="5717">TikTok Followers | No Drop - Max 1M - 5K/Day $7 per 1000</option>
                              <option id="12396" value="12396">TikTok Views | Max 100M - 1M/Hour [Super Fast] $2 per 1000</option>
                              <option id="1000" value="1000">TikTok Views | Instant Start - Max 10M - 1M/Day $1 per 1000</option>
                              <option id="5720" value="5720">TikTok Comments | Real - Random - Max 10K - Speed 3K/Day $10 per 1000</option>
                              <option id="5091" value="5091">Youtube Subscribers | 30 Days Refill - Non Drop - Max 100K - 200/day $15 per 1000</option>
                              <option id="5080" value="5080">Youtube Subscribers | Lifetime Refill - Max 100k - 3k/day $30 per 1000</option>
                              <option id="7432" value="7432">Youtube Subscribers | Real - No Refill - Max 20k | Arab Mix $70 per 1000</option>
                              <option id="7442" value="7442">Youtube Video Likes | Refill 30 Days - Max 100K - 5k/Day ♻️ $5 per 1000</option>
                              <option id="9808" value="9808">Youtube Likes [ No Refill ] $3 per 1000</option>
                              <option id="8791" value="8791">Youtube Views + 2-3% Likes - Lifetime Refill - Non Drop - 2K/Day $5 per 1000</option>
                              <option id="5254" value="5254">Youtube Views | Lifetime Refill - No Drop - 10K/Day $8 per 1000</option>
                             </select>
                             </div> --}}

                                                        <!-- form-group end -->

                                                        <!-- form-group end -->

                                                        <!-- form-group end -->
                                                        <div id="fields">
                                                            <div class="form-group fields" id="order_link">
                                                                <label class="control-label"
                                                                    for="field-orderform-fields-link">
                                                                    @lang('messages.Link')</label>
                                                                <input value="{{ old('link') }}" class="form-control"
                                                                    name="link" value="" type="text"
                                                                    id="field-orderform-fields-link">
                                                            </div>
                                                            <div class="form-group fields" id="order_quantity">
                                                                <label class="control-label"
                                                                    for="field-orderform-fields-quantity">
                                                                    @lang('messages.Quantity')</label>
                                                                <input class="form-control" name="quantity"
                                                                    value='{{ old('quantity') }}' id="quantity"
                                                                    value="" type="text"
                                                                    id="field-orderform-fields-quantity"><small
                                                                    class="help-block min-max"> @lang('messages.Min'): 100 -
                                                                    @lang('messages.Max'):
                                                                    100000000</small>
                                                            </div>

                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label> @lang('messages.Charge')</label>

                                                            <input class="form-control" type="text" id="charge"
                                                                value="" readonly="">
                                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    var selectElement = $('#orderform-service');
                                                                    var chargeInput = $('#charge');
                                                                    var quantityInput = $('#quantity');

                                                                    // Store the initial value of selectElement
                                                                    var initialSelectValue = selectElement.val();

                                                                    // Event listener for selectElement change
                                                                    selectElement.change(function() {
                                                                        // If selectElement's value has changed
                                                                        if (selectElement.val() !== initialSelectValue) {
                                                                            // Set charge input to empty
                                                                            chargeInput.val('');
                                                                        }
                                                                        // Update price
                                                                        updatePrice();
                                                                    });

                                                                    // Event listener for quantityInput input
                                                                    quantityInput.on('input', updatePrice);

                                                                    // Function to update price
                                                                    function updatePrice() {
                                                                        // Get selected option
                                                                        var selectedOption = selectElement.find('option:selected');
                                                                        // Parse quantity as an integer
                                                                        var quantity = parseInt(quantityInput.val());
                                                                        // Get price text
                                                                        var priceText = getPriceFromOption(selectedOption, quantity);
                                                                        // Set charge input value
                                                                        chargeInput.val(priceText);
                                                                    }

                                                                    // Function to get price from option and quantity
                                                                    function getPriceFromOption(option, quantity) {
                                                                        // Get option text
                                                                        var optionText = option.text();
                                                                        // Match price in option text
                                                                        var match = optionText.match(/\$\d+(\.\d+)?/);
                                                                        // If match found and quantity is valid
                                                                        if (match && !isNaN(quantity)) {
                                                                            // Extract price per 1000
                                                                            var pricePerThousand = parseFloat(match[0].substring(1));
                                                                            // Calculate total price based on quantity
                                                                            var totalPrice = pricePerThousand * (quantity / 1000);
                                                                            // Return total price rounded to 2 decimal places
                                                                            return totalPrice.toFixed(2);
                                                                        } else {
                                                                            // Return "N/A" if price or quantity is invalid
                                                                            return "N/A";
                                                                        }
                                                                    }
                                                                });
                                                            </script>



                                                        </div>
                                                        <!-- form-group end -->
                                                        <button type="submit" class="btn btn-primary btn-block"> @lang('messages.Submit Order')</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-fav" role="tabpanel"
                                                aria-labelledby="pills-fav-tab">
                                                <div class="favoriler gizli form-area"></div>
                                                <div class="alert uyarifav alert-warning mt-3">You have not added any
                                                    services to favourites. You can add the desired service to your
                                                    favourites, using the <a href="/services">Price List</a>.</div>
                                                <span id="secili_favoriler"></span>

                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                            {{-- <script>
             var categories = [                                         
                            {id:587, name: 'VIP' },
                                     ];
          </script> --}}
                            <div class="col-lg-5 col-12 mb-5 mb-lg-0">
                                <div class="d-card">
                                    <div class="d-card-head">
                                        <div class="dch-body">
                                            <i class="icon far fa-bell-on me-3"></i>
                                            <span class="ml-3"> @lang('messages.Recent Update')</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    @endsection
