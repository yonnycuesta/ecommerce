@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($cart as $ct)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image text-center"><br><img src="{{ asset($ct->options->image) }}" style="height: 70px; width:70px;" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $ct->name }}</div>
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text">{{ $ct->options->color }}</div>
                                    </div>

                                    @if ($ct->options->size == NULL)
                                        
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Size</div>
                                        <div class="cart_item_text">{{ $ct->options->size }}</div>
                                    </div>
                                    @endif

                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div><br>
                                        <form method="POST" action="{{ route('update.cartitem') }}">
                                            @csrf
                                            <input type="hidden" name="productid" value="{{ $ct->rowId }}">
                                            <input type="number" name="qty" value="{{ $ct->qty }}" style="width: 50px;">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check-square"></i></button>
                                        </form>
                                        
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">${{ $ct->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">${{ $ct->qty*$ct->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div><br>
                                       <a href="{{ url('remove/cart/'.$ct->rowId) }}" class="btn btn-danger btn-sm">x</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                    
                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">${{ Cart::total() }}</div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <button type="button" class="button cart_button_clear">All Cancel</button>
                        <button type="button" class="button cart_button_checkout">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
@endsection