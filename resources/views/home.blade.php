@extends('layouts.app')

@section('content')

<div id="app">
  <header>
    <div class="slider">
      <div class="slide" style="background-image: url('{{ asset('assets/img/hero.png') }}')"></div>
      <div class="slide" style="background-image: url('{{ asset('assets/img/menu-1.jpg') }}')"></div>
      <div class="slide" style="background-image: url('{{ asset('assets/img/menu-2.jpg') }}')"></div>
    </div>
    <button class="prev-btn">&#10094;</button>
    <button class="next-btn">&#10095;</button>
  </header>

  <section id="menu">
    <div class="container">
      <form action="{{ route('meals.filter') }}" method="GET" class="filter-form">
        <label for="category">Pilih Kategori:</label>
        <select name="category" id="category">
          <option value="">Pilih Kategori</option>
          @if(isset($categories))
          @foreach ($categories as $category)
          <option value="{{ $category['strCategory'] }}">{{ $category['strCategory'] }}</option>
          @endforeach
          @endif
          @if(isset($error))
          <p>Error: {{ $error }}</p>
          @endif
        </select>
        <button type="submit">Filter</button>
      </form>
      <h2>Menu</h2>
      <div class="menu-items">
        @if(isset($meals))
        @foreach ($meals as $meal)
        <form action="{{ route('cart.add', ['id' => $meal['id']]) }}" method="post">
          @csrf
          <div class="menu-item">
            <a href="{{ route('galeri', ['id' => $meal['id']]) }}">
              <img src="{{ $meal['image'] }}" alt="{{ $meal['name'] }}">
            </a>
            <h3>{{ $meal['name'] }}</h3>
            <p>Description of {{ $meal['name'] }}</p>
            <span class="price">Harga: Rp {{ rand(1, 10) * 5000 }}</span>
            <br>
            <button type="submit" class="add-to-cart" id="addToCartBtn">Tambah ke Keranjang</button>
          </div>
        </form>
        @endforeach
        @endif
        @if(isset($error))
        <p>Error: {{ $error }}</p>
        @endif
      </div>
    </div>
  </section>
</div>

<script>
  new Vue({
    el: '#app',
    mounted() {
      var addToCartBtn = document.getElementById('addToCartBtn');
      addToCartBtn.addEventListener('click', function() {
        alert("Makanan sudah masuk ke dalam keranjang Anda");
      });
    }
  });
</script>

@endsection
