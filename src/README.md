## FashionablyLate（商品管理アプリ）

- フルーツ商品の登録・検索・編集・削除ができる商品管理アプリです。  
- Docker + Laravel + MySQL で構築しています。

---

##  機能一覧
- 商品登録
- 商品一覧
- 商品検索（キーワード + 季節）
- 商品編集
- 商品削除
- 画像アップロード
- Storage パスでの画像表示（storage:link）

---

##  使用技術（環境）
- PHP 8.4.x
- Laravel 12.x
- MySQL 8.x
- Nginx（Docker）
- phpMyAdmin

---

##  環境構築

1. Docker ビルド & 起動

```bash
git clone https://github.com/yukari0125/laravel-docker
cd laravel-docker
docker compose up -d --build
```

2. Laravel セットアップ
```bash
docker compose exec app bash
composer install
```

3. .env 作成
```bash
cp .env.example .env
```

4. DB 接続設定（Docker 用）
- 作成した .env ファイルに以下を設定します。
```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

5. アプリケーションキー生成
```bash
php artisan key:generate
```

6. マイグレーション & ダミーデータ投入
```bash
php artisan migrate:fresh --seed
```

※ ProductSeeder によりサンプル商品のデータが作成されます。

7. ストレージリンク作成（画像表示用）
```bash
php artisan storage:link
```

## URL（開発環境）

アプリ
- http://localhost/products

phpMyAdmin
- http://localhost:8080/


## ER 図
- docs/er_diagram.png に配置しています。