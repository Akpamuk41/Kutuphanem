# Kütüphane Otomasyon Sistemi

## Özet

Bu proje, kütüphanelerdeki işlemleri dijital ortamda daha hızlı ve düzenli bir şekilde yönetmeyi amaçlayan kapsamlı bir kütüphane otomasyon sistemidir. 
Uygulama içerisinde yazar, kitap ve kategori ekleme, silme ve güncelleme gibi temel yönetim işlemleri yer almaktadır. 
Ayrıca kullanıcılara, sistem üzerinden kitap ödünç verme ve iade etme işlemleri gerçekleştirilebilmektedir.
Sistemin önemli özelliklerinden biri, geç iade edilen kitaplara karşı ceza puanı uygulamasıdır.
Kullanıcılar kitapları zamanında teslim etmediklerinde sistem yöneticisi tarafından ceza puanı verilir.
Bu puanlar birikerek belirli bir eşiğe ulaştığında, kullanıcı 'cezalı' rolüne geçirilir ve sistem yöneticisi bazı işlemleri yapmalarını kısıtlar.
Bu sayede kitapların zamanında teslim edilmesi teşvik edilerek kaynakların verimli kullanımı sağlanır.

**Anahtar Kelimeler:** Kütüphane otomasyonu, ceza sistemi, PHP, MySQL, kitap yönetimi, kullanıcı takibi

## Geliştirme Ortamı

* **PHP:** Sunucu taraflı programlama dili olarak kullanılmıştır.
* **MySQL:** Veritabanı sistemi olarak tercih edilmiştir.
* **HTML, CSS ve Bootstrap:** Arayüz tasarımı için kullanılmıştır.

## Projenin Yüklenmesi ve Çalışır Hale Getirilmesi

1.  Veritabanı kurulumu için MySQL veritabanı oluşturun ve gerekli tabloları içe aktarın. (Veritabanı şeması dokümanda mevcuttur)
2.  PHP dosyalarını bir web sunucusuna (örn. Apache) yerleştirin.
3.  Veritabanı bağlantı ayarlarını PHP dosyalarında yapılandırın.
4.  Web tarayıcısı üzerinden uygulamaya erişin.

## Arayüzün Örnek Görseli

(Eklenecek.)

## Sistem Özellikleri

Sistem, kütüphane yöneticilerinin aşağıdaki işlemleri gerçekleştirmesine olanak tanımaktadır:
* Yazar Yönetimi
* Kitap Yönetimi 
* Kategori Yönetimi 
* Kitap Ödünç Alma ve İade Etme 
* Ceza Puanı Sistemi 

## Veritabanı Tasarımı

Uygulama, ilişkisel bir veritabanı modeli kullanmaktadır. (Veritabanı ilişkileri şeması belgede detaylı olarak verilmiştir)

## Ceza Puanı Sistemi

* Kitap geç iade edilirse kullanıcıya ceza puanı eklenir.
* Ceza puanı eşiği aşıldığında kullanıcı "cezalı" rolüne geçirilir.
* Cezalı kullanıcılar yeni kitap ödünç alamaz.
* Ceza ödemesi yapıldıktan sonra kullanıcı normal rolüne döner.

## Kaynaklar

* PHP - [https://www.php.net](https://www.php.net) 
* MySQL Dökümasyonu - [https://dev.mysql.com](https://dev.mysql.com)
* Bootstrap Kütüphanesi - [https://getbootstrap.com](https://getbootstrap.com) 
