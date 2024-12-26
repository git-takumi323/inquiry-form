# inquiry-form

## 環境構築
- Dockerのビルドからマイグレーション、シーディングまでを記述する
- docker-compose up -d --build
- docker-compose exec php bash
- composer create-project "laravel/laravel=8.*" . --prefer-dist
- php artisan make:migration create_products_table
- php artisan make:migration create_seasons_table
- php artisan make:migration create_product_season_table
- php artisan migrate
- php artisan make:seeder ProductsTableSeeder
- php artisan make:seeder SeasonsTableSeeder
- php artisan make:seeder ProductSeasonTableSeeder
- php artisan db:seed

## 使用技術(実行環境)
- 例) Laravel 8.x(言語やフレームワーク、バージョンなどが記載されていると良い)
- Laravel Framework 8.83.29
- PHP 7.4.9 (cli) (built: Sep  1 2020 02:33:08) ( NTS )
- Composer version 2.8.1 2024-10-04 11:31:01
- mysql  Ver 15.1 Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64) using readline 5.2
- ginx version: nginx/1.21.1

## ER図
< ![index drawio](https://github.com/user-attachments/assets/f723f3ae-2d99-400c-ae34-96b3fe55330a)
>

## URL
- 例) 開発環境：http://localhost/
