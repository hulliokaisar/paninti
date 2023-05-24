@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="filter-form">Keranjang</h1>
        @if(count($cartItems) > 0)
            <table class="filter-form">
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                @foreach($cartItems as $index => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', ['index' => $index]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total Harga:</td>
                    <td>Rp {{ $totalPrice }}</td>
                </tr>
            </table>
            <form action="{{ route('checkout.index') }}" method="get">
                <button type="submit" class="checkout-button">Checkout</button>
            </form>
        @else
            <p>Keranjang Anda kosong.</p>
        @endif
    </div>
@endsection
