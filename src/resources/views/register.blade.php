@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="product-index">
    <div class="product-index__title">
        <h2>商品登録</h2>
    </div>

    <form class="form" action="/products" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__group">
          <div class="form__group-content">
            <div class="form__label">
              <span class="form__label--item">商品名</span>
              <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-input">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                </div>
                <div class="form__error">
                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
          </div>
          <div class="form__group-content">
            <div class="form__label">
              <span class="form__label--item">値段</span>
              <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-input">
                <div class="form__input--text">
                    <input type="number" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
                </div>
                <div class="form__error">
                    @error('price')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
          </div>
          <div class="form__group-content">
            <div class="form__group-title">
              <span class="form__label--item">商品画像</span>
              <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-input">
                <div class="form__input--text">
                    <input type="file" name="image" placeholder="ファイルを選択" value="{{ old('image') }}" />
                </div>
                <div class="form__error">
                    @error('image')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
          </div>
          <div class="form__group-content">
            <div class="form__group-title">
              <span class="form__label--item">季節</span>
              <span class="form__label--required">必須</span>
              <span class="form__label--complement">複数選択可</span>
            </div>
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
          <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品説明</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                </div>
                <div class="form__error">
                  @error('description')
                  <span>{{ $message }}</span>
                  @enderror
                </div>
            </div>
          </div>

        <div class="form__button">
          <button class="form__button-submit" type="button" onclick="history.back()">戻る</button>
          <button class="form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection