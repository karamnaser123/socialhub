<nav class="mob-nav">
    <ul class="mob-nav-link">

        <li>
            <a href="{{ route('main') }}">
                <i class="fal fa-edit"></i>
                <span> @lang('messages.New Order')</span>
            </a>
        </li>
        <li>
            <a href="{{ route('orders') }}">
                <i class="far fa-box-heart m-icon"></i>
                <span> @lang('messages.Orders')</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tickets') }}">
                <i class="far fa-headset m-icon"></i>
                <span> @lang('messages.Tickets')</span>
            </a>
        </li>
        <li>
            <a href="{{ route('payment') }}">
                <i class="far fa-wallet m-icon"></i>
                <span> @lang('messages.Payment')</span>
            </a>
        </li>

    </ul>
</nav>
