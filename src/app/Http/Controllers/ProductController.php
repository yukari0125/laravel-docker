<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    // 一覧
    public function index(Request $request)
    {
        $query = Product::query();

        // キーワード検索（商品名・説明）
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // ✅ ソート条件
        $sort = $request->input('sort');

        if ($sort === 'price_desc') {
            // 価格の高い順
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'price_asc') {
            // 価格の低い順
            $query->orderBy('price', 'asc');
        } else {
            // デフォルト：新着順
            $query->latest();
        }

        // ページネーション（クエリパラメータ維持）
        $products = $query->paginate(6)->withQueryString();

        return view('products.index', compact('products', 'sort'));
    }

    // 登録フォーム
    public function create()
    {
        return view('products.create');
    }

    // 登録処理
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        // season
        if (!empty($data['season']) && is_array($data['season'])) {
            $data['season'] = implode(',', $data['season']);
        }

        // 画像アップロード
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        // DBにない image カラムは削除
        unset($data['image']);

        Product::create($data);

        return redirect()->route('products.index')
            ->with('status', '商品を登録しました。');
    }

    // 編集フォーム
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 更新処理
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if (!empty($data['season']) && is_array($data['season'])) {
            $data['season'] = implode(',', $data['season']);
        }

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        unset($data['image']);

        $product->update($data);

        return redirect()->route('products.index')
            ->with('status', '商品を更新しました。');
    }

    // 詳細
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 削除
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('status', '商品を削除しました。');
    }
}
