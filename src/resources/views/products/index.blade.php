@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
  <div class="products">
    {{-- 左サイドバー --}}
    <aside class="products__sidebar">
      <h2 class="products__title">商品一覧</h2>

      <form class="search-box" method="GET" action="{{ route('products.index') }}">
        {{-- キーワード検索 --}}
        <div class="search-box__field">
          <p class="search-box__label">キーワードで検索</p>
          <input
            class="search-box__input"
            type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="商品名で検索">
        </div>

        {{-- 値段順 --}}
        <div class="search-box__field">
          <p class="search-box__label">価格順で表示</p>
          <select class="search-box__select" name="sort">
            <option value="">選択してください</option>
            <option value="price_asc"  @selected(request('sort') === 'price_asc')>安い順</option>
            <option value="price_desc" @selected(request('sort') === 'price_desc')>高い順</option>
          </select>
        </div>

        <div class="search-box__field" style="text-align:center; margin-top:20px;">
          <button class="btn btn--primary" type="submit">検索</button>
        </div>
      </form>
    </aside>

    {{-- 右メイン --}}
    <section class="products__main">
      <div class="products__header">
  <p class="products__count"></p>

  <a href="{{ route('products.create') }}"
     class="btn btn--primary add-btn">
    ＋ 商品を追加
  </a>
</div>


          <ul class="card-list">
        @foreach ($products as $product)
          <li class="card">
            {{-- カード全体をクリックで編集ページへ --}}
            <a href="{{ route('products.edit', $product) }}">
             <div class="card__img">
  @if ($product->image_path)
    <img
      src="{{ asset('storage/' . $product->image_path) }}"
      alt="{{ $product->name }}">
  @else
    <div class="card__img--noimage">
      画像なし
    </div>
  @endif
</div>

              <div class="card__body">
                <div class="card__row">
                  <span class="card__name">{{ $product->name }}</span>
                  <span class="card__price">¥{{ number_format($product->price) }}</span>
                </div>
              </div>
            </a>
          </li>
        @endforeach
      </ul>


      <div class="pagination">
      {{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
      </div>
    </section>
  </div>
@endsection
