<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ asset('image/logohub.png') }}" />
    <title>Social Hub</title>
    {{-- <link rel="shortcut icon" type="image/ico" href="https://cdn.mypanel.link/7o9f2j/o0xcc9707h4ws7iw.png"> --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-179027971-2"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-179027971-2');
    </script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/fontawesome.min.js"
        integrity="sha512-PoFg70xtc+rAkD9xsjaZwIMkhkgbl1TkoaRrgucfsct7SVy9KvTj5LtECit+ZjQ3ts+7xWzgfHOGzdolfWEgrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/7o9f2j/p815mj75x8emy7k5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/7o9f2j/yo6rcmtm2t0gjsiy.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.mypanel.link/libs/bootstrap-datetimepicker/4.17.47/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/css/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/global/tp2jssyocan4ndm1.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>


    <style>
        .files-wrapper {
            display: flex;
            flex-direction: column;
            line-height: 29px;
        }

        .files-item {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            line-height: 29px;
        }

        .files-item:last-child {
            margin-bottom: 0px;
        }

        .files-loader {
            margin: 0 0.2em 0 0;
            padding: 0;
            line-height: 0;
            vertical-align: middle;
            font-size: 24px;
            display: flex;
            align-items: center;
            min-height: 29px;

        }

        .files-loader__svg {
            display: block;
            width: 1em;
            height: 1em;
            fill: transparent;
            transform: rotate(180deg);
            margin: 0px 8px;
        }

        .files-loader__svg-circle {
            fill: transparent;
        }

        .files-loader__svg-progress {
            transition: all 0.4s;
        }
    </style>


    <style>
        .success-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 999;
            opacity: 0;
            animation: slideIn 0.5s forwards;
        }

        .success-error {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: red;
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 999;
            opacity: 0;
            animation: slideIn 0.5s forwards;
        }

        .close-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Define the opening animation */
        @keyframes slideIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>


</head>

<body class="dashboard-body" data-new-gr-c-s-check-loaded="14.1155.0" data-gr-ext-installed="">


    @if (session('success'))
        <div class="success-message" id="successMessage">
            <span>{{ session('success') }}</span>
            <button class="close-button">close</button>
        </div>
    @endif

    @if (session('error'))
        <div class="success-error" id="successMessage">
            <span>{{ session('error') }}</span>
            <button class="close-button">close</button>
        </div>
    @endif
    @if ($errors->any())
        <div class="success-error" id="successMessage">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span><br>
            @endforeach
            <button class="close-button">close</button>
        </div>
    @endif

    <script>
        const successMessage = document.getElementById('successMessage');
        const closeButton = successMessage.querySelector('.close-button');

        // Function to close the success message
        function closeSuccessMessage() {
            successMessage.style.animation = 'slideOut 0.5s';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 500); // Delay hiding for the duration of the slideOut animation
        }

        closeButton.addEventListener('click', closeSuccessMessage);

        // Automatically close the message after a few seconds (optional)
        setTimeout(closeSuccessMessage, 4000); // Close after 5 seconds (adjust as needed)
    </script>

    <script>
        var app = document.getElementsByTagName("BODY")[0];
        if (localStorage.lightMode == "dark") {
            app.setAttribute("class", "dark");
        }
    </script>
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            @yield('body')
        </div>
    </body>

</html>


<script type="text/javascript" src="https://cdn.mypanel.link/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/global/cflcci28nes0yhln.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/global/t3u8bszy7ju8y8or.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/global/oor0gfnm6a7rec3u.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/global/fl30lzzomp4w0yk2.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/global/x8eo1d0qmu03i9qb.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/7o9f2j/uk61wee6rlsamd3t.js"></script>
<script type="text/javascript" src="https://cdn.mypanel.link/7o9f2j/5o3pnem47xy64u1z.js"></script>



<script type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-player/1.4.3/lottie-player.js"></script>

<script>
    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1));
        var sURLVariables = sPageURL.split('&');
        var sParameterName;
        var i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    }

    var select_service_id = getUrlParameter("service");

    if (select_service_id) {
        var selectSerCatID = window.modules.siteOrder.services[select_service_id].cid;
        let orderCat = document.getElementById('orderform-category');
        let orderSer = document.getElementById('orderform-service');
        console.log("demo123" + selectSerCatID);

        $(function() {
            orderCat.querySelector('[selected]').removeAttribute('selected');
            console.log(selectSerCatID);
            orderCat.querySelector('[value="' + selectSerCatID + '"]').setAttribute('selected', 'selected');
            orderCat.value = selectSerCatID;

            var event = document.createEvent('HTMLEvents');
            event.initEvent('change', true, false);
            orderCat.dispatchEvent(event);

            setTimeout(() => {
                let controlSel = orderSer.querySelector('[selected]')
                if (controlSel) {
                    controlSel.removeAttribute('selected');
                }
                console.log(select_service_id);
                orderSer.querySelector('[value="' + select_service_id + '"]').setAttribute('selected',
                    'selected');
                orderSer.value = select_service_id;
                orderSer.dispatchEvent(event);
            }, 500);
        });

    }
</script>

<script>
    function searchServices() {
        var searchTerm = $("#serv-inp").val();
        var listItem = $('#service-table tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {
            'containsi': function(elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "")
                    .toLowerCase()) >= 0;
            }
        });

        $("#service-table tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
            $(this).addClass('hidden');
        });

        $("#service-table thead").not(":containsi('" + searchSplit + "')").each(function(e) {
            $(this).addClass('hidden');
        });

        $("#service-table tbody tr:containsi('" + searchSplit + "')").each(function(e) {
            $(this).removeClass('hidden');
        });
        $("#service-table thead:containsi('" + searchSplit + "')").each(function(e) {
            $(this).removeClass('hidden');
        });

        $("tr.separator:first-child, tr.separator:last-child").each(function(e) {
            $(this).removeClass('hidden');
        });
    }
</script>
<script>
    $("#serv-inp").keyup(function() {
        searchServices();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#testimonials_wrap').slick({
        dots: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>
<script>
    function showLang() {
        const lang = document.getElementById('drop_lang');
        lang.classList.toggle('active');
    }
</script>
