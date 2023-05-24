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
        <div class="row">
            <div class="col-md-6">
                <div class="gallery-item">
                    <img src="{{ $image }}" alt="{{ $name }}" class="gallery-image">
                    <h2 class="gallery-name">{{ $name }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="gallery-description">
                    <h3 class="description-title">Deskripsi</h3>
                    <p class="description-text">{{ $description }}</p>
                    <p class="price">Harga: Rp {{ rand(1, 10) * 5000 }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
