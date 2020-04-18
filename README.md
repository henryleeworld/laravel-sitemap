# Laravel 7 網站地圖

引入 spatie 的 laravel-sitemap 套件來擴增實作網站地圖檔案，可以在其中提供網站上網頁、影片和其他檔案的相關資訊，並說明各個網頁和檔案之間的關係。Google 這類搜尋引擎會讀取網站地圖檔案，以更靈活的方式檢索網站。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行 __Artisan__ 指令的 __sitemap:generate__ 來直接執行產生網站地圖。
```sh
$ php artisan sitemap:generate
```

----

## 畫面截圖
![](https://i.imgur.com/9OgaMAf.png)
> 如果擁有多個網站地圖檔案，可以使用網站地圖索引檔一次提交所有檔案。網站地圖引檔的 XML 格式與網站地圖檔案的 XML 格式類似

![](https://i.imgur.com/B7kNeir.png)
> 不論採用何種格式，單一網站地圖的檔案大小上限為 50MB （未壓縮），且其中包含的網址數量最多為 50,000 個。如果你的檔案較大或網址數量較多，則必須將清單分割成數個網站地圖