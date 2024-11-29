@extends('layouts.app') 

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="product-index">
    <div class="product-index__tag">
        <div class="product-index__title">{{ $message }}</div>
        <div class="button"> <a href="{{ route('products.create') }}">＋追加ボタン</a> </div>
    </div>

    <div class="product__index-search-form">
        <form action="/products/search" method="GET">
            <input type="text" name="query" placeholder="商品名で検索">
            <button type="submit" class="button product__index-search-form-button">検索</button>
        </form>
        <form action="/products/search" method="GET">
            <div class="product__search-sort">価格順で表示</div>
            <div class="product__index-search-form-pulldown">
                <select name="order">
                    <option value="" disabled selected>価格で並び替え</option>
                    <option value="asc">価格の安い順</option>
                    <option value="desc">価格の高い順</option>
                    <button type="submit" class="button product__index-search-form-button">▼</button>
                </select>
        </form>
    </div>     
    

    <div class="product__index-content">
        <button class="product-index__content" type="submit" action="/products/{:productld}">
        @foreach ($products as $product)
            <div class="product__index-content-detail">
                <a href="{{ route('products.edit', $product->id) }}">
                    <div class="product__index-img">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" />
                    </div>
                </a>
                <div class="product__index-content-information">
                    <div class="product__index-content-name">
                        {{ $product->name }}
                    </div>
                    <div class="product__index-content-price">
                        ¥{{ $product->price }}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="product__index-content-detail-pagination">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection