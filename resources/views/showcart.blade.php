<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <base href="/public">

    <style>
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="assets/images/klassy-logo.png" alt="Klassy Cafe HTML Template">
                        </a>

                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul style="right: 15%" class="nav">
                            <li class="scroll-to-section"><a href="{{ url('/') }}" class="active"><i class="fas fa-home"></i>
                                    Home</a></li>
                            <li class="scroll-to-section"><a href="#about"><i class="fas fa-info-circle"></i> About</a>
                            </li>

                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu"><i class="fas fa-book-open"></i> Menu</a>
                            </li>
                            <li class="scroll-to-section"><a href="#chefs"><i class="fa fa-coffee"
                                        aria-hidden="true"></i> Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;"><i class="fa fa-list" aria-hidden="true"></i></i> Features</a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-check-square" aria-hidden="true"></i> Features
                                            Page 1</a></li>
                                    <li><a href="#"><i class="fa fa-check-square" aria-hidden="true"></i> Features
                                            Page 2</a></li>
                                    <li><a href="#"><i class="fa fa-check-square" aria-hidden="true"></i> Features
                                            Page 3</a></li>
                                    <li><a href="#"><i class="fa fa-check-square" aria-hidden="true"></i> Features
                                            Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section">
                                <a href="#reservation">
                                    <i class="fa fa-address-book" aria-hidden="true"></i> Contact Us
                                </a>
                            </li>

                            <li class="scroll-to-section">
                                <a href="{{ url('/showcart', Auth::user()->id) }}">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    @auth
                                        Cart [{{ $count }}]
                                    @endauth
                                    @guest
                                        cart [0]
                                    @endguest
                                </a>
                            </li>


                            <li>
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                            <x-app-layout>

                                            </x-app-layout>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                in</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div id="top">
        <table class="table table-bordered">
            <thead class="bg-success">
                <tr>
                    <th><h3>Number Of Items</h3></th>
                    <th><h3>Food Name</h3></th>
                    <th><h3>Price</h3></th>
                    <th><h3>Quantity</h3></th>
                    <th><h3>Total Price</h3></th>
                    <th><h3>Actions</h3></th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows with dynamic data will go here -->
                @php
                    $totalAmount = 0; // Initialize the total amount variable
                @endphp

                <form action="{{ url('/orderconfirm') }}" method="POST">
                    @csrf
                @foreach ($data as $index => $item)
                <tr style="background: #B5C4BA">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->title }}
                        <input type="text" name="foodname[]" class="form-control" value="{{$item->title}}" hidden>
                    </td>
                    <td>Rs.{{ $item->price }}
                        <input type="text" name="price[]" class="form-control" value="{{$item->price}}" hidden>
                    </td>
                    <td>{{ $item->quantity }}
                        <input type="text" name="quantity[]" class="form-control" value="{{$item->quantity}}" hidden>
                    </td>
                    @php
                        $totalPrice = $item->price * $item->quantity; // Calculate the total price for each item
                        $totalAmount += $totalPrice; // Add the total price of the current item to the total amount
                    @endphp
                    <td>Rs.{{ $totalPrice }}</td>
                    <td>
                        <!-- Separate form for delete action -->


                            <a href="{{ '/removefromCart/'.$item->cart_id }}" class="btn btn-danger" style="background-color: #dc3545; color: white;" onsubmit="return confirm('Are you sure you want to remove this item?');">
                                <i class="fas fa-trash"></i> Remove
                            </a>

                    </td>

                </tr>
                @endforeach



                <!-- Add more rows as needed -->
                <tr style="background: #B5C4BA">
                    <td colspan="4"></td>
                    <td><b>Total Amount:</b></td>
                    <td><b>Rs.{{ $totalAmount }}</b></td>
                </tr>
            </tbody>
        </table>

        <div align="center" class="order-button-container">
            <button type="button" class="btn order-button text-white" type="button" id="order" style="background: #007bff"><b>Order Now</b></button>
        </div>


        <div id="appear" class="container" style="display: none">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name"><b>Name:</b></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone"><b>Phone Number:</b></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address"><b>Address:</b></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                    </div>
                </div>
            </div>

            <div align="center" class="order-button-container">
                <button type="submit" value="save" class="btn order-button text-white" style="background: #28a745"><b>Confirm Order</b></button>
                <button id="close" type="button" class="btn text-white" style="background: #D4403A">Close</button>
            </div>
        </form>
        </div>



    </div>

    <script type="text/javascript">

    $("#order").click(
        function()
        {
            $("#appear").show();
        }
    );

    $("#close").click(
        function()
        {
            $("#appear").hide();
        }
    );

    </script>
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>
</body>

</html>
