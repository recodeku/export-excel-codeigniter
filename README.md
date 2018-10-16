# Seri Tutorial CodeIgniter: Export Excel CodeIgniter Menggunakan Library PhpSpreadsheet
Repositori seri tutorial CodeIgniter: export excel codeigniter menggunakan library phpspreadsheet


## Install phpspreadsheet
Buka terminal, lalu masuk ke project ini (misal nama foldernya: codeigniter)
```sh
cd codeigniter
```

Masuk ke folder application:


```sh
cd application
```

install library phpspreadsheet dengan run command di bawah ini:

```sh
composer require phpoffice/phpspreadsheet
```

Buka application/config/config.php menggunakan text editor favorit kamu.

Ubah baris kode ini:

```php
$config['composer_autoload'] = FALSE;
```
Menjadi:
```php
$config['composer_autoload'] = TRUE;
```