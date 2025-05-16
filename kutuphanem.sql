-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3307
-- Üretim Zamanı: 16 May 2025, 17:42:29
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphanem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_photo` varchar(255) DEFAULT NULL,
  `author_bio` text DEFAULT NULL,
  `author_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `author_photo`, `author_bio`, `author_title`) VALUES
(1, 'Ömer Gürdal', '1743209213_1743208866_omer-gurdal.jpeg', '1973 yılında Afyonkarahisar ili Dinar ilçesine bağlı Göçerli köyünde doğdu. 1992 yılında Jandarma Astsubay Okulundan mezun olarak kıt\'a görevine başladı. İç güvenlik ve Komando birliklerinde çeşitli görevlerde bulundu.', 'Ast Subay'),
(2, 'Mehmet Saray', '1743208897_varsayilan.webp', '1942 yılında Afyonkarahisar\'ın Dinar ilçesinde doğmuştur. Ortaöğrenimini Isparta\'da gerçekleştiren Saray, 1966 yılında İstanbul Üniversitesi, Edebiyat Fakültesi Tarih bölümünden mezun olmuştur. 1978 yılında İngiltere\'de \"The Turkmens in the Age of Imperialism\" adlı tezi ile doktorasını gerçekleştirmiştir. 1978 yılında mezun olduğu üniversitede öğretmenlik yapan Saray, 1988 yılında da \"Afganistan ve Türkler\" adlı tezi ile profesör unvanını taşımaya hak kazanmıştır. 2006 yılında Atatürk Araştırma Merkezi Başkanlığı görevinde de bulunmuştur.[5] Yirmiden fazla kitabı ve yüz elliden fazla da makalesi vardır.', 'Prof.Dr'),
(4, 'Faruk Sümer', 'faruk-sumer.jpg', 'Babası Türk Milli Mücadelesi\'nde yer almış Mehmed Zeki Efendi\'dir. Annesi Zeliha Hanım\'dan eski yazı üzerine ilk derslerini aldı, aynı devirde Kur\'an dersleri alıyor ve kendi çabasıyla Fransızca öğrenmeye çalışıyordu. 1943 yılında İstanbul Haydarpaşa Öğretmen Okulu\'ndaki mezuniyetini takiben İstanbul Üniversitesi Edebiyat Fakültesi Tarih Bölümü\'nden 1948\'de mezun oldu. Lisans derecesini 15 ve 16. Asır Türk boyları üzerineydi. Aynı yıl Millî Eğitim Bakanlığı bursuyla Ankara Üniversitesi Dil ve Tarih-Coğrafya Fakültesi\'nde Orta Çağ tarihi Kürsüsü’nde doktora çalışmalarına başlayacaktı. İki yıl sonra lisans tezini genişleterek edebiyat doktorunu unvanını aldı. Süleymaniye Yazma Eser Kütüphanesi\'nde kısa süre çalıştı, akademik kariyerini 1950-63 arasında DTCF\'de şekillendirdi. Selçuklu Tarih ve Medeniyeti Enstitüsü’nün kurucu üyesiydi (1966). Misafir öğretim üyesi sıfatıyla Londra Üniversitesi (1970) Frankfurt kentinde bulunan Goethe Enstitüsü (1974) Türk-İslâm tarihi ve medeniyeti, Türk dili dersleri verdi. Ülke içinde aldığı akademik idari görevler haricinde 1993 yılında Türkmenistan İlimler Akademisi\'ne seçildi. Makaleleri ağırlıkla Folklor Postası, Belleten, Dil ve Tarih-Coğrafya Fakültesi Dergisi, İktisat Fakültesi Mecmuası, Resimli Tarih Mecmuası, Selçuklu Araştırmaları Mecmuası, Selçuklu Araştırmaları Dergisi, Türk Dünyası Araştırmaları, Türk Dünyası Tarih Dergisi ve Türk Edebiyatı ve Türk Kültürü gibi dergilerde yayımlandı. Bazı tercümelerde de bulundu. 1982\'de emekliye ayrıldı.', 'Prof.Dr.'),
(10, 'Mustafa Kemal ATATÜRK', '1746313853_Atatürk.webp', 'Mustafa Kemal Atatürk[d] (1881,[e] Selanik - 10 Kasım 1938, İstanbul), Türk mareşal, devlet adamı, yazar, Türk Kurtuluş Savaşı\'nın başkomutanı, Türkiye Cumhuriyeti\'nin kurucusu ve ilk cumhurbaşkanıdır. Türkiye\'yi laik, sanayileşen bir ulusa dönüştüren kapsamlı ilerici reformlar üstlenmiştir.[6] İdeolojik olarak sekülarist ve milliyetçi politikaları ve sosyo-politik teorileri Kemalizm olarak tanınmıştır.[6]\r\n\r\nI. Dünya Savaşı sırasında Osmanlı ordusunda görev yapan Atatürk, Çanakkale Cephesi\'nde miralaylığa, Sina ve Filistin Cephesi\'nde ise Yıldırım Ordular Grubu komutanlığına atandı. Savaşın sonunda, Osmanlı İmparatorluğu\'nun yenilgisini izleyen Kurtuluş Savaşı ile simgelenen Anadolu Hareketi\'ne öncülük ve önderlik etti. Türk Kurtuluş Savaşı sürecinde Ankara Hükûmeti\'ni kurdu, Türk Orduları Başkomutanı olarak Sakarya Meydan Muharebesi\'ndeki başarısından dolayı 19 Eylül 1921 tarihinde \"gazi\" sanını aldı ve mareşallik rütbesine yükseldi. Askerî ve siyasal eylemleriyle İtilaf Devletleri ve destekçilerine karşı yengi kazandı. Savaşın ardından Cumhuriyet Halk Partisini \"Halk Fırkası\" adıyla kurdu ve ilk genel başkanı oldu. 29 Ekim 1923\'te cumhuriyetin ilan edilmesinin ardından cumhurbaşkanı seçildi. 1938\'deki ölümüne dek dört dönem bu görevi yürütmüş olup günümüze kadar Türkiye\'de en uzun süre cumhurbaşkanlığı yapmış kişidir.', 'Gazi'),
(11, 'Namık Kemal', '1746630367_Namık_Kemal-3.2_a.jpg', 'Namık Kemal (Osmanlıca: نامق كمال, romanize: Nâmıḳ Kemâl) (21 Aralık 1840; Tekirdağ - 2 Aralık 1888; Sakız Adası), Türk milliyetçiliğine esin kaynağı olmuş, Genç Osmanlı hareketine bağlı Türk yazar, gazeteci, devlet adamı ve şairdir.\r\n\r\nYurtseverlik, özgürlük, ulus kavramlarına bağlı bir Tanzimat aydınıdır. Bu kavramları Türk düşün hayatına ve edebiyatına sokan kişi kabul edilir. Heyecanlı, kavgacı kişiliği, akıcı ve parlak biçemi nedeniyle döneminin diğer yazarlarından daha fazla tanındı. “Vatan Şairi” ve “Hürriyet Şairi” olarak anılan Namık Kemal, şiirin yanı sıra eleştiri, yaşam öyküsü, tiyatro, roman, tarih ve makale türlerinde eserler verdi. Özellikle Türk edebiyatının ilk edebî romanı olan \"İntibah\" ve Türk edebiyatının sahnelenen Batılı tarzdaki ilk tiyatro eserlerinden olan \"Vatan yahut Silistre \"eserleriyle ünlüdür. Türkiye Cumhuriyeti\'nin kurucusu Mustafa Kemal Atatürk’ü eserleri ve düşünceleriyle etkiledi .Atatürk Namık Kemal\'i Türk dünyasının modernleşme açısından en üst noktası olarak kabul eder ve onun Türk dünyasına bırakmış olduğu mirası da benimser. Bu benimsemeyi Atatürk\'ün Namık Kemal\'in ünlü beyitlerinden birine yapmış olduğu karşılığı şu şekilde betimlenmiştir. Namık Kemal\'in \"Vatanın bağrına düşman dayadı hançerini/Yoğimiş kurtaracak bahtı kara maderini \" mısralarını Atatürk şu şekilde betimlemiştir.\"Vatanın barına düşman dayasın hançerini/Bulunur kurtaracak bahtı kara maderini\" bu ifade kalıpları o dönemde ki halk mücadelesinin mühim bir parolası olmuştur.', 'Vatan Şairi'),
(12, 'Asım KORKMAZ', '1746985595_asım-korkmaz.png', '1984 yılında Ordu\'nun Gürgentepe ilçesinde doğdu. İlkokulu 1996\'da, ortaokulu 1999\'da ve liseyi de 2002\'de Gürgentepe\'de bitirdi. 2010 yılında Orta Doğu Teknik Üniversitesi, Fen-Edebiyat Fakültesi, Tarih Bölümü\'nden mezun oldu. Bir süreliğine Çankırı Karatekin Üniversitesi\'nde araştırma görevliliği yaptı. 18 Nisan 2012\'de Öğretim Üyesi Yetiştirme Programı (ÖYP) kapsamında naklen atamayla Trakya Üniversitesi, Edebiyat Fakültesi, Tarih Bölümü, Genel Türk Tarihi Ana Bilim Dalı\'nda araştırma görevlisi olarak göreve başladı. 2014 yılında yüksek lisans eğitimini Trakya Üniversitesi, Sosyal Bilimler Enstitüsü, Tarih Ana Bilim Dalı\'nda \"Doğu Avrupa\'da Bir Türk Kavmi: Kuman-Kıpçaklar\" başlıklı tez konusuyla ve 2021 yılında da doktora eğitimini Trakya Üniversitesi, Sosyal Bilimler Enstitüsü, Tarih Ana Bilim Dalı\'nda \"20. Yüzyılın İlk Yarısında Besarabya\'da Gagauz Türklerinin Tarihi ve Kimliği\" başlıklı tez çalışmasıyla tamamladı. Evli ve iki çocuk babasıdır.', 'Arş. Gör. Dr.'),
(13, 'Saparmurat Niyazov', '1747157546_Saparmurat_Niyazov_in_2002.jpg', 'Türkmenistanın ilk Cumhurbaşkanı', 'Cumhurbaşkan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `published_year` year(4) DEFAULT NULL,
  `total_copies` int(11) DEFAULT 1,
  `available_copies` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `cover_image`, `category_id`, `isbn`, `published_year`, `total_copies`, `available_copies`) VALUES
(1, 'Ay Yıldız Ruhu', 'Kim yeşertti bu kini?!\r\nBin yıllık kardeşliğin arasına fitne tohumlarını kimler attı?!\r\nAyyıldızlı al bayrak kimlerin kanlarıyla boyandı?!\r\nKimler Galiçya’da üşüdü?!\r\nKimler Allahuekber Dağları’nda dondu?!\r\nHicaz ve Yemen çöllerinde kimler yandı?!\r\nÇanakkale’de kimler ‘ÖLÜMÜN ÖLDÜĞÜ GÜN DOĞDU?!’\r\nDoksan yıl önce; Kuzey’de Rumlara, Doğu’da ve Güney’de Ermenilere, Güneydoğu’da Fransızlara, Batı’da Yunanlılara karşı kimler ‘ÖLÜM KALIM SAVAŞI’ verdi?!\r\nAdalet ve hoşgörüyle dünyaya hükmetmiş bin yıldır İslam’ın sancaktarlığını yapan tarihin en şerefli milletini yok etmek isteyen sömürgecilere karşı kimler ‘DUR!..’ deyip göğsünü siper etti?!\r\nDün Osmanlı Devleti’ni parçalamak için Rumları ve Ermenileri piyon olarak kullananlar bu gün güçlü bir Türkiye’nin var olmaması için kimleri piyon olarak kullanmaktadırlar?!\r\nBu toprakları, 75 milyon insana kimler vatan yaptı?!\r\nVe!\r\nBU VATAN KİMİN?!\r\n\r\nKan baronlarının kanlı piyonlarına karşı yürütülen destansı bir mücadelenin romanı\r\n\r\n“TARİH İHTİYATSIZLAR İÇİN MERHAMETSİZDİR.”\r\nMustafa Kemal Atatürk', 'ay-yildiz-ruhu.jpeg', 1, '0-306-40615-2', '2013', 1, 1),
(4, 'Türkmenler ve Türkmenistan Cumhuriyet Tarihi', 'Türkmenler Sovyet hâkimiyetini en son kabul eden topluluk olmuştur. Rus işgaline uğrayan Türk ülkeleri ile Rus idaresinde yaşayan Türk halkları içinde Kazakistan halkı ile birlikte en çok acı çeken ve katliama uğrayan halkların başında Türkmenler gelir. Nitekim Rusların Türkmenistan’da uyguladıkları bu insanlık dışı ve yolsuzluklarla dolu idare şekli Rus kamuoyunun dikkatini dahi çekmiş ve Çar Hükümeti üç defa tahkikat komisyonu kurarak Türkmenistan’da ve diğer Türk ülkelerinde yapılan haksızlıkları ve yolsuzlukları inceletmek ihtiyacını duymuş, suçluların bir kısmını cezalandırmıştır. 70 yılı aşkın bir süre devam eden Sovyet yönetiminin, Türkmenlerin hayatına neler kattığı ve neler kaybettirdiği ilgili bölümde belgeleriyle açıklanmıştır. Elinizdeki kitapta Türkmenlerin tarihi, esaret altında şerefli yaşam mücadeleleri ve bağımsız Türkmenistan Cumhuriyeti’ne kadar giden istiklale kavuşma süreçleri ele alınmıştır.', '1743043260_turkmenistan.jpg', 2, '9786257698757', '2022', 1, 1),
(13, 'Oğuzlar (Türkmenler)', 'Bilhassa ticari münasebetler sebebi ile X. yüzyıldan itibaren aralarında yayılmaya başladığını bildiğimiz İslamlığın XI. yüzyılda, Oğuzlar\'dan ezici çoğunluğun dini haline geldiği görülür. Bunun sonunda Oğuzlar\'a XI. şüzyılda Türkmen adı verilmiştir ki, bu ad aşağı yukarı iki asır sonra her yerde Oğuz\'un yerini almış ve Oğuz sözü destanlar ile hatıraları yaşatılan ataların adı olarak Türkmenler arasında uzun müddet yaşamıştır...', '1743039005_oguzlar.jpeg', 2, '9789754982367', '2017', 1, 1),
(18, 'Nutuk', 'Nutuk Gazi Mustafa Kemal tarafınfan 1927(Ciltli, Kutu içinde, özel haritalarıyla beraber)Atatürk\'ün yakın tarihimiz açısından büyük önem taşıyan ünlü eseri Nutuk, yıllar sonra Arap harflerinden bir kez daha çevrildi. Uzun soluklu bu çeviri süreci, eserin 1934 baskısında var olan ve günümüze ulaşan çeşitli hataları da ortaya çıkardı.15-20 Ekim 1927 tarihleri arasında Cumhuriyet Halk Fırkası kongresinde bizzat Mustafa Kemal Paşa tarafından okunan büyük Nutuk, iki yıllık bir çalışma sonunda 1927 baskısından Latin harflerine aktarılarak Yapı Kredi Yayınları tarafından yayımlandı.Nutuk\'un Arap harfli ilk baskısının metni 627, belgeleri ise 303 sayfaydı. 1934 yılındaki ilk Latin harfli yayını belgeler dâhil üç cilt yapılmış, Milli Eğitim Bakanlığı daha sonraki baskılarda eseri çoğunlukla üç cilt halinde yayımlamıştı. Yapı Kredi Yayınları Delta Dizisi\'nden çıkan baskının tamamı tek cilt olarak 1197 sayfada toplandı ve orijinaldeki 10 renkli harita da eklendi. Yapı Kredi Yayınları tarafından yayımlanan Nutuk\'un çevirisi 1927 tarihli orijinal baskıdan yapıldı. Bu nedenle, eserin 1934\'teki ilk Latin harfli baskısında yer alan hatalı okumalar ve bu baskıya dayanarak daha sonraki baskılarda yapılan hatalar Yapı Kredi Yayınları\'nın bu yayınıyla düzeltilmiş oldu. Yapı Kredi Yayınları, bundan sonra araştırmacılar, bilimadamları ve her zaman Nutuk okuyacaklar için, ilerde \"Yapı Kredi Yayınları baskısı\" diye a nılacak bir yayın yapmış oluyor.\r\n\r\n', '1746314409_nutuk.jpg', 2, '9789750820038', '2011', 1, 1),
(23, 'Geometri - Bilim 1', 'Türk Dili Tetkik Cemiyeti\'nin 12 Temmuz 1932\'de kurulmasından sonra başlayan Dil Devrimi\'yle Türkçeyi sade bir dil haline getirme ve yabancı kökenli kelimelerden arındırma çalışmaları hız kazanır. Yabancı dillerden, özellikle Arapça ve Farsçadan alınan bilim, fen, sanat ve teknik terimlerin Türkçeleştirilmesi için komisyonlar kurulur. Son derece ağır Osmanlıca terimlerin kullanıldığı \"geometri\", eski deyişle \"hendese\" için ise bu çalışmayı bizzat Mustafa Kemal Atatürk yapar. Atatürk, 1936 yılında toplanan III. Türk Dil Kurultayı\'nın hemen ardından \"geometri öğretenlerle, bu konuda kitap yazacaklara kılavuz\" olması amacıyla Dolmabahçe Sarayı\'nda Geometri kitabını kaleme alır. Eğitime ve bilime verdiği önemi her zaman vurgulayan Mustafa Kemal Atatürk, ilk olarak 1937 yılında Kültür Bakanlığı tarafından basılan bu kitapla, kendisinin türettiği ve günümüzde kullanılan pek çok geometri terimini dilimize kazandırmıştır.', '1746315542_bilim-1.jpg', 3, '97897549823611', '2020', 1, 1),
(65, 'Hatırat Sayfaları', 'Atatürk, 1914-1919 dönemine ait anılarını, Hâkimiyeti Milliye gazetesinin başyazarı Falih Rıfkı (Atay) ile Milliyet gazetesinin başyazarı Mahmut (Soydan) Beylere anlatmış ve yazdırmıştır. Anılar, bu iki gazetede 13 Mart 1926-12 Nisan 1926 tarihleri arasında “Büyük Gazi\'nin Hatırat Sahifeleri” başlığıyla yazı dizisi olarak yayımlanmaya başlandıktan iki gün sonra Cumhuriyet gazetesinde de yer almıştır. Atatürk tarafından gözden geçirildikten sonra yapılan yayım içeride ve dışarıda yankılar uyandırır. Hükümetin ricası üzerine Atatürk birinci kısmın sonunda hatıralarını keser. Fakat gazeteciler, Samsun\'a çıkıncaya kadar geçen hadiseler hakkındaki notlarını tamamlamışlardır. Falih Rıfkı Atay, anıların sonraki bölümüne 1944\'te yayımladığı 19 Mayıs adlı kitapta yer verir.', '1746319854_hatırat-sayfalari.jpg', 3, '9786051820330', '2016', 1, 1),
(66, 'İntibah', 'Ali Bey, iyi eğitim görmüş, varlıklı bir ailenin çocuğudur. Öğrenimini ve üzerindeki ilgiye rağmen, hayat tecrübesinden tamamen yoksundur. Bir gün Çamlıca’da dolaşırken adı Mahpeyker olan çok güzel bir kadınla tanışır. Ali Bey, ilk karşılaşmada bile büyük ilgi duyduğu bu kadını derin bir aşkla sevmeye başlar.\r\nOysa kadının kirli bir geçmişi vardır ve kendisine duyulan bu sevgiye layık biri değildir. Durumun farkında olmayan ve onu da kendisi gibi temiz bir sevda içinde hayal kuran genç adam, kısa zamanda evini ve işini ihmal etmeye başlar. Durumun farkına varan aile büyükleri, onu bu durumundan kurtarmaya karar verirler.Düşündükleri çözüm ise, evlerine genç ve çok güzel bir cariye almaktır…', '1746630867_intibah.jpeg', 1, '9786054401093', '2018', 1, 1),
(67, 'Vatan Yahut Silistre', 'Vatan Yahut Silistre, Silistre Kalesi’ni korumak amacıyla gönüllü olarak Silistre’ye gelen İslam Bey ve tebdili kıyafetle dolaşan Zekiye’nin kahramanlık hikâyesidir. Tanzimat Dönemi’nin öncü isimlerinden Namık Kemal’in vatanperverlik ve özgürlük üzerine yükselen tiyatro eseri, yayımlandığı ve sahnelendiği ilk günden bu yana milli duyguları harekete geçiren özelliğiyle Türk okuyucularının en sevdiği eserlerin başında geliyor.', '1746631386_wi_800.jpeg', 1, '9786257300018', '2021', 1, 1),
(68, 'Akif Bey', 'Akif Bey, ahlak yönünden zayıf olan Dilruba ile evlenir ve Sinop\'a savaşa gider. Dilruba, Akif Bey\'in savaşta öldüğünü çeşitli yalanlar ile kanıtlar ve başka bir adamla evlenir. Bunu duyan Akif Bey şok geçirir ve Dilruba\'yı boşar. Savaş sonrası geri döner ve Dilruba\'nın evlendiği kişi ile çatışır ve ikisi de ölür. Akif Bey\'in babası ise Dilruba\'yı öldürür.', '1746686250_akif-bey.jpeg', 1, '9786059350587', '2016', 1, 1),
(69, 'Kuman Kıpçaklar', 'Kuman-Kıpçaklar: Orta Çağ Doğu Avrupası’nın Güçlü Cengâverleri başlıklı bu çalışmada Kuman-Kıpçakların Doğu Avrupa’nın Balkanlar ile Karadeniz’in kuzeyinde yer alan topraklarındaki varlıklarına değinilmiştir. Özellikle onların askeri ve siyasi yaşamları, daha çok bu eserin konusu olmuştur. Kuman-Kıpçakların tarih sahnesinde hayli aktif oldukları 11 ve 14. yüzyıllar arası, dönemin ana kaynakları temel alınarak irdelenmiştir. Orta Çağ boyunca anavatandan Karadeniz’in kuzeyindeki geniş düzlüklere göç eden son göçebe bozkır Türk halkı olan Kuman-Kıpçaklar, dönemin farklı kaynaklarında çeşitli adlarla tarihe not düşülmüştür. Karadeniz’in kuzeyindeki bozkırlarda kendilerine özgü bir yönetim tesis eden Kuman-Kıpçaklar, buranın, tarihi kaynaklarda Deşt-i Kıpçak adıyla anılmasını sağlamışlardır. Kuman-Kıpçaklar, 13. yüzyılda Moğol seferleri karşısında bir dizi yenilgi üzerine Batı Avrasya topraklarındaki hâkimiyetini Moğollara devretmek zorunda kalmışlardır. Moğolların egemenliğine girmek istemeyen çoğu Kuman-Kıpçak kabilesi, Tuna’yı aşıp Balkanlara göç etmiştir. Sürekli hareket halinde olan Kuman-Kıpçaklar, Doğu Avrupa’da değişik devletlerle özellikle Rus knezlikleri, Bizans imparatorluğu, II. Bulgar devleti ve Macar Krallığı’yla başta askeri ve siyasi ilişkiler kurmuşlardır. Zikredilen devletlerin ordularında askeri kabiliyetleriyle önemli konumlara yükselmişlerdir.', '1746985511_kıpçaklar.png', 2, '9786051558691', '2023', 1, 1),
(70, 'Ruhname', 'Ruhname, Türkmen halkının tarihini, kültürünü, geleneklerini, ahlaki değerlerini ve milli kimliğini anlatan bir eserdir. Aynı zamanda yazarın kendi düşüncelerini, dini ve felsefi yorumlarını da içerir. Kitap, halkı milli değerlere bağlı olmaya, geçmişine saygı duymaya ve ahlaklı bir yaşam sürmeye davet eder.', '1747157366_Ruhnama_cover.jpg', 2, '123456789633', '2000', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(1, 1),
(4, 2),
(13, 4),
(18, 10),
(23, 10),
(65, 10),
(66, 11),
(67, 11),
(68, 11),
(69, 12),
(70, 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(8, 'Çoçuk'),
(6, 'Din'),
(3, 'Makale'),
(1, 'Roman'),
(2, 'Tarih');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fines`
--

CREATE TABLE `fines` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `fine_amount` decimal(10,2) NOT NULL,
  `paid_status` enum('unpaid','paid') DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `loan_date` date DEFAULT curdate(),
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('borrowed','returned') DEFAULT 'borrowed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `loan_date`, `due_date`, `return_date`, `status`) VALUES
(1, 5, 4, '2025-05-04', '2025-05-05', '2025-05-03', 'returned'),
(3, 5, 1, '2025-05-04', '2025-05-08', '2025-05-03', 'returned'),
(4, 5, 18, '2025-05-06', '2025-05-07', '2025-05-10', 'returned'),
(5, 7, 66, '2025-05-07', '2025-05-15', '2025-05-08', 'returned'),
(6, 7, 68, '2020-05-08', '2025-05-09', '2025-05-08', 'returned'),
(7, 7, 4, '2020-05-08', '2025-05-09', '2025-05-08', 'returned'),
(8, 7, 18, '2025-05-08', '2025-05-10', '2025-05-08', 'returned'),
(9, 7, 13, '2025-05-08', '2025-05-09', '2025-05-11', 'returned'),
(10, 5, 23, '2025-05-11', '2025-05-15', '2025-05-11', 'returned'),
(11, 8, 4, '2025-05-11', '2025-05-25', '2025-05-13', 'returned'),
(12, 8, 13, '2025-11-23', '2025-12-23', NULL, 'borrowed'),
(13, 5, 70, '2025-11-18', '2025-12-18', NULL, 'borrowed');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `penalty_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `penalty_status`) VALUES
(5, 'Orazjemal Meredova', 'meredova@gmail.com', '0511 590 29 29 ', 'pamuk', '2025-04-20 18:53:19', 0),
(7, 'Emre Emir', 'emreemir352935@gmail.com', '5515902935', 'Kocaeli / İzmit', '2025-05-07 16:53:42', 1),
(8, 'Aygül Meredova', 'aygulmeredova@gmail.com', '0551 555 55 55', 'İstanbul / Pendik', '2025-05-11 16:07:03', 0),
(9, 'oya Paltabeyva', 'oyapaltabayeva@gmail.com', '555666888', 'Kayseri', '2025-05-13 17:26:10', 0),
(11, 'gulay soltanovaa', 'gulaysoltanova11@gmail.com', '05555555555', 'kocaeli', '2025-05-16 15:30:37', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `category_id` (`category_id`);

--
-- Tablo için indeksler `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Tablo için indeksler `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Tablo için indeksler `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
