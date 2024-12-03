<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Social Hub</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/logohub.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />


    <style>
        .success-message {
            position: fixed;
            bottom: 10px;
            left: 10px;
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
            bottom: 10px;
            left: 10px;
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
                bottom: -50px;
                opacity: 0;
            }

            to {
                bottom: 10px;
                opacity: 1;
            }
        }
    </style>
    
</head>

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

<body>
    @include('admin.layouts.nav')

    @yield('body')
</body>
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>

</html>
