@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 20px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .col-md-6 {
        width: 50%;
        padding: 10px;
    }

    .gallery-item {
        text-align: center;
    }

    .gallery-image {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 8px;
    }

    .gallery-name {
        margin-top: 10px;
        font-size: 24px;
    }

    .gallery-description {
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 8px;
    }

    .description-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .description-text {
        font-size: 16px;
    }

    .add-to-cart {
        margin-top: 20px;
        font-size: 16px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .checkout {
        margin-top: 20px;
        font-size: 16px;
        padding: 10px 20px;
        background-color: #ff4838;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .price {
        margin-top: 10px;
        font-size: 16px;
    }
</style>
<div class="container">
    <h2>Checkout</h2>
    <div class="row">
        @foreach ($meals as $meal)
        <div class="col-md-6">
            <img src="{{ $meal['image'] }}" alt="{{ $meal['name'] }}" class="gallery-image">
            <h3>{{ $meal['name'] }}</h3>
            <span class="price">Harga: Rp {{ $meal['price'] }}</span>
        </div>
        @endforeach
    </div>
    <div class="checkout-total">
        <h4>Total Harga: Rp {{ $totalPrice }}</h4>
        <form action="{{ route('checkout.placeOrder') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Buat Pesanan</button>
        </form>
    </div>
</div>
@endsection