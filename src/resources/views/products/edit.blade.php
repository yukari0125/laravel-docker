@extends('layouts.app')

@section('title', '商品登録')

@section('css')
  <style>
    .product-form {
      background: #fff;
      border-radius: 8px;
      padding: 24px 20px 28px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .product-form .page-title {
      margin-bottom: 20px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 160px 1fr;
      align-items: flex-start;
      gap: 8px 16px;
      margin-bottom: 14px;
    }

    .form-row .label {
      font-size: 13px;
      font-weight: 600;
      padding-top: 6px;
    }

    .form-row .req {
      font-weight: 400;
    }

    .radios {
      display: flex;
      flex-wrap: wrap;
      gap: 12px 18px;
      padding-top: 4px;
    }

    .radios label {
      font-size: 14px;
    }

    .textarea {
      min-height: 96px;
    }

    .form-row .error {
      grid-column: 2 / 3;
    }

    .form-actions {
      margin-top: 20px;
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }

    .product-image-preview {
      display: inline-flex;
      padding: 4px;
      border: 1px solid #e0e0e0;
      border-radius: 6px;
      background: #fafafa;
    }

    .product-image-preview img {
      width: 160px;
      height: 120px;
      object-fit: cover;
    }

    .delete-form {
      margin-top: 16px;
      display: flex;
      justify-content: flex-end;
    }
  </style>
@endsection


@section('content')
<div class="product-form">
  <h1 class="page-title">商品編集</h1>

  <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- 商品名 --}}
    <div class="form-row">
      <label class="label">商品名 <span class="req">必須</span></label>
      <input type="text" name="name" class="input"
             value="{{ old('name', $product->name) }}">
      @error('name')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

    {{-- 値段 --}}
    <div class="form-row">
      <label class="label">値段 <span class="req">必須</span></label>
      <input type="number" name="price" class="input"
             value="{{ old('price', $product->price) }}">
      @error('price')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

    {{-- 現在の画像プレビュー --}}
    <div class="form-row">
      <label class="label">現在の商品画像</label>
      <div class="product-image-preview">
        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
      </div>
    </div>

    {{-- 画像差し替え --}}
    <div class="form-row">
      <label class="label">商品画像の変更</label>
      <input type="file" name="image" class="input-file">
      @error('image')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

   {{-- 季節 --}}
   <div class="form-row">
     <label class="label">季節 <span class="req">必須</span></label>
     @php
       $currentSeasons = explode(',', $product->season);

       $oldSeasons = old('season', $currentSeasons);
       if (!is_array($oldSeasons)) {
           $oldSeasons = [$oldSeasons];
       }
     @endphp
   <div class="radios">
     <label>
      <input type="checkbox" name="season[]" value="春"
        {{ in_array('春', $oldSeasons, true) ? 'checked' : '' }}>
      春
     </label>
     <label>
      <input type="checkbox" name="season[]" value="夏"
        {{ in_array('夏', $oldSeasons, true) ? 'checked' : '' }}>
      夏
     </label>
     <label>
      <input type="checkbox" name="season[]" value="秋"
        {{ in_array('秋', $oldSeasons, true) ? 'checked' : '' }}>
      秋
     </label>
     <label>
      <input type="checkbox" name="season[]" value="冬"
        {{ in_array('冬', $oldSeasons, true) ? 'checked' : '' }}>
      冬
     </label>
    </div>
     @error('season')
       <p class="error">{{ $message }}</p>
     @enderror
     @error('season.*')
       <p class="error">{{ $message }}</p>
     @enderror
    </div>


    {{-- 商品説明 --}}
    <div class="form-row">
      <label class="label">商品説明 <span class="req">必須</span></label>
      <textarea name="description" class="textarea" rows="4">{{ old('description', $product->description) }}</textarea>
      @error('description')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-actions">
      <a href="{{ route('products.index') }}" class="btn btn--ghost">戻る</a>
      <button type="submit" class="btn btn--primary">変更を保存</button>
    </div>
</form>
  {{-- 削除ボタン --}}
  <form action="{{ route('products.destroy', $product) }}" method="POST" class="delete-form"
      onsubmit="return confirm('本当に削除しますか？');">
  @csrf
  @method('DELETE')

  <button type="submit" class="trash-btn">
    <i class="fa-solid fa-trash"></i>
  </button>
</form>
</div>
@endsection
