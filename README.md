# Php basit ayar class'i


## Kullanim

Yapılandırma çok basit ve kullanımı kolay olacak şekilde tasarlanmıştır. Kullanim methodlari set , get , load , has .


### Dosya Tanimlama

`Config` classi statik olarak `load()` fonksiyonu ile yuklenebilir , ya da direk Config classi olusturulabilir.

```php
use TheYkk\Config;

// Tekli Dosya Yukleme
$conf = Config::load('config.php');
$conf = new Config('config.php');

// Coklu dosya yukleme
$conf = new Config(['config.php', 'config.php']);

```
### Deger alma

`get()` methodu kullanarak alma:

```php
// Key kullanarak deger alma
$db_user = $conf->get('database.user');

```




### Deger atama

`set()` ile yapilabilir : 

```php
$conf = Config::load('config.php');

$conf->set('genel.durum','oldu');
```
