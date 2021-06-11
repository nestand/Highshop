@extends('layouts.main')

@section('title', 'Checkout')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/cart.css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_responsive.css">
@endsection

@section('custom_js')
    <script src="js/cart.js"></script>
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/images/cart.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li>Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <h1>Оформление заказа</h1>
    <p>Здесь будет форма оформления</p>
  
@endsection
