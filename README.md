<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

---
## Cara Menjalankan
- Buat Database laravelapi
- Jalankan perintah dibawah ini
```properties
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
php artisan serve
```  

## API ENDPOINT
---
**Menampilkan Produk**
----
  Mengembalikan data produk

* **URL**

  /api/product

* **Method:**

  `GET`
  

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** ` {
        "id": 1,
        "name": "Barang Pertama",
        "harga": "10000.00",
        "stock": 100,
        "keterangan": "Ini adalah barang pertama",
        "created_at": "2022-09-03T09:14:23.000000Z",
        "updated_at": "2022-09-03T09:14:23.000000Z"
    }`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/api/product",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
----
  **Detail Produk**
----
  Mengembalikan detail product yang dicari.

* **URL**

  /api/product/:id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`


* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{"id": 1,
    "name": "Barang Pertama",
    "harga": "10000.00",
    "stock": 100,
    "keterangan": "Ini adalah barang pertama",
    "created_at": "2022-09-03T09:14:23.000000Z",
    "updated_at": "2022-09-03T09:14:23.000000Z"
}`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ message: "Product not found." }`
* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/api/product/1",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
---
  **Membuat Produk**
----
  Membuat produk baru.

* **URL**

  /api/product

* **Method:**

  `POST`

* **Data Params**

   `name[string]`
   `harga[number]`
   `stock[number]`
   `keterangan[sting]`


* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ "product": {
        "name": "Barang Kedua",
        "harga": "10000",
        "stock": "100",
        "keterangan": "Ini adalah barang pertama"
    },
    "message": "Product has been create"     }`
}`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** ` "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name has already been taken."
        ]
    }`

  OR

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{
    "message": "Unauthenticated."
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/api/product",
      dataType: "json",
      type : "POST",
      data : {
        name,
        harga,
        stock,
        keterangan
      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'BEARERTOKEN');
    },
      success : function(r) {
        console.log(r);
      }
    });
  ```
  ---
**Merubah Produk**
----
  Merubah produk yang sudah ada.

* **URL**

  /api/product/:id

* **Method:**

  `PUT` | `PATCH`

*  **URL Params**

   **Required:**
 
   `id=[integer]`
* **Data Params**

   `name[string]`
   `harga[number]`
   `stock[number]`
   `keterangan[sting]`


* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ "product": {
        "name": "Barang Pertama",
        "harga": "12345",
        "stock": "123",
        "keterangan": "update"
    },
    "message": "Product has been updated" }`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** ` "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name has already been taken."
        ]
    }`

  OR

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{
    "message": "Unauthenticated."
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/api/product/:id",
      dataType: "json",
      type : "PUT|PATCH",
      data : {
        name,
        harga,
        stock,
        keterangan
      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'BEARERTOKEN');
    },
      success : function(r) {
        console.log(r);
      }
    });
  ```
  ---
**Menghapus Produk**
----
  Menghapus produk yang sudah ada.

* **URL**

  /api/product/:id

* **Method:**

  `DELETE`

*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ "message": "Product <nama product> has been deleted." }`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** ` "message": "Product Not Found." }`

  OR

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{
    "message": "Unauthenticated." }`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/api/product/1",
      dataType: "json",
      type : "DELETE",
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'BEARERTOKEN');
    },
      success : function(r) {
        console.log(r);
      }
    });
  ```
  ---
**Generate Token**
----
  Memasukan credential untuk meminta token.

* **URL**

  /api/token

* **Method:**

  `POST`

* **Data Params**

   `email[string]`
   `password[string]`
   
* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{"token": "2|SUM13lLNbsRiDqhTQtd2uaXCGshXAsbvmJlSfCUg"}`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** ` "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The provided credentials are incorrect."
        ]
    }`


* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/api/token",
      dataType: "json",
      type : "POST",
      data : {
        email, 
        password
      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'BEARERTOKEN');
    },
      success : function(r) {
        console.log(r);
      }
    });
  ```
  ---