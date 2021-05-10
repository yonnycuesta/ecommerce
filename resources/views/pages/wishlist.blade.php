@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Wishlist Your Products</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($product as $row)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image text-center"><br><img src="{{ asset($row->image_one) }}" style="height: 70px; width:70px;" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $row->product_name }}</div>
                                    </div>
                                    @if ($row->product_color == NULL)
                                        
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text">{{ $row->product_color }}</div>
                                    </div>
                                    @endif
                                    

                                    @if ($row->product_size == NULL)
                                        
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Size</div>
                                        <div class="cart_item_text">{{ $row->product_size }}</div>
                                    </div>
                                    @endif

                                    
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Action</div><br>
                                        <a href="#" class="btn btn-sm btn-danger">Add to cart</a>
                                    </div>
                                   
                                   
                                </div>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                    
                    <!-- Order Total -->
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>


@endsection