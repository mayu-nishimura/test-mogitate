@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<form class="form__product-edit" action="/products" method="post">
    @csrf
    <div class="form__product-edit">
        <div class="form__product-edit">
            <span class="form__product-title">商品一覧</span>
            <span class="form__product-mark>">">"</span>
            <span class="form__product-name"> {{ $product->name }}</span>
        </div>
        <div class="product-edit__info">
            <div class="product-edit__image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="product-details__image-select">ファイルを選択</div>
            </div>
            <div class="form__product-edit">
                <div class="form__product-details">
                    <div>商品名</div>
                    <input type="text" name="name" placeholder="{{ $product->name }}" value="{{ old('name') }}" />   
                    </div>
                    <div class="form__error">
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form__product-details">
                    <div>値段</div>
                    <input type="number" name="price" placeholder="{{ $product->price }}" value="{{ old('price') }}" />   
                    </div>
                    <div class="form__error">
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form__product-details">
                    <div>季節</div>
                    <div class="form__input--checkbox">
                        <input type="checkbox" name="season[]" id="spring" value="春" {{ in_array('春', old('season', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="spring">春</label>
                        <input type="checkbox" name="season[]" id="summer" value="夏" {{ in_array('夏', old('season', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="summer">夏</label>
                        <input type="checkbox" name="season[]" id="autumn" value="秋" {{ in_array('秋', old('season', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="autumn">秋</label>
                        <input type="checkbox" name="season[]" id="winter" value="冬" {{ in_array('冬', old('season', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="winter">冬</label>
                    </div>
                    <div class="form__error">
                        @error('season')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details__content">
        <div>商品説明</div>
        <div class="form__input--text">
                <textarea name="detail" placeholder="{{ $product->description }}">{{ old('description') }}</textarea>
        </div>
        <div class="form__error">
            @error('description')
            <span>{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="button" onclick="history.back()">戻る</button>
        <button class="form__button-submit" type="submit">登録</button>
    </div>
</div>
@endsection