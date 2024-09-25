# LTBlog（聖地巡礼アプリ）

## 概要
聖地巡礼の情報を投稿するブログです。
アニメ・漫画・小説・ドラマ・映画などの聖地（ロケ地）巡りの情報は、X・Instagram・Youtubeなどの各種SNSやブログに散らばっていて、情報収集がしにくい状態となっています。
そのため、聖地巡礼に関する情報が集まるブログサイトが必要だと感じました。

## 使用技術
- PHP 8.2.21
- Laravel 10.48.20
- HTML
- CSS
- JavaScript
- Bootstrap 5.0.2
- Google Maps API
- AWS
- Breeze
- Heroku

## URL・テストユーザー
URL:seitijunrei-e7caafaf0e25.herokuapp.com<br>
テストユーザー（一般）
- name:test_general
- email:test_general@gmail.com
- password:test_general
テストユーザー（権限付与）
- name:test_authorized
- email:test_authorized@gmail.com
- password:test_authorized

## 機能
- 投稿・タグ周りのCRUD
- ブックマーク機能
- コメント機能
- 検索機能
- 画像投稿
- ユーザー新規登録・ログイン機能

## 工夫した点
- 投稿を見つけやすいように、検索・ブックマーク機能をつけただけではなく、ユーザー別・タグ別など、様々な形で投稿を見つけられるようにしています
- 全体に見やすく、かつ統一感のあるデザインを施し、ユーザビリティに配慮しています

## 今後の展望
- ブックマーク機能などに非同期処理を実装したいと考えています

## ER図
![聖地巡礼アプリER drawio](https://github.com/user-attachments/assets/26079835-4b66-49a8-9d43-69993f89309a)

