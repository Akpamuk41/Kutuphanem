<?php
include "classes/db.class.php";
include "classes/books.class.php";
include "classes/authors.class.php";
include "classes/category.class.php";
include "classes/users.class.php";
include "classes/loans.class.php";




// Yeni Kitap Ekleme
if (isset($_POST["submit_book"])) {
    $title = trim($_POST["book_title"]);
    $description = trim($_POST["book_description"]);
    $book_category = isset($_POST["book_category"]) ? trim($_POST["book_category"]) : ''; 
    $isbn = isset($_POST["isbn"]) ? trim($_POST["isbn"]) : ''; 
    $published_year = isset($_POST["published_year"]) ? trim($_POST["published_year"]) : '';

    // Resim yükleme işlemi
    $cover_image = uploadImage("cover_image");

    // Post nesnesi oluştur ve kaydet
    $book = new Books();
    $total_copies = 1;  // Varsayılan değer
    $available_copies = 1;  // Varsayılan değer
    if ($book->createBook($title, $description, $cover_image, $book_category, $isbn, $published_year, $total_copies, $available_copies)) { 
        // Başarılı ekleme sonrası yönlendirme
        header("Location: kitaplar.php");
        exit;
    } else {
        echo "İçerik oluşturma hatası.";
    }
}

// Yeni Yazar Ekleme
if (isset($_POST["submit_author"])) {
    $author_title = trim($_POST["author_title"]);
    $author_name = trim($_POST["author_name"]);
    $author_bio = isset($_POST["author_bio"]) ? trim($_POST["author_bio"]) : ''; 

    // Resim yükleme işlemi
    $author_photo = uploadImage("author_photo");

    // Post nesnesi oluştur ve kaydet
    $authors = new Authors();

    if ($authors->createAuthor($author_name, $author_photo, $author_bio, $author_title)) { 
        // Başarılı ekleme sonrası yönlendirme
        header("Location: yazarlar.php");
        exit;
    } else {
        echo "İçerik oluşturma hatası.";
    }
}


// Mevcut Kitap Güncelle
if (isset($_POST["books_edit"])) {
    $id = intval($_POST["post_id"]); // Kitap ID'si
    $title = trim($_POST["book_title"]);
    $description = trim($_POST["book_description"]);
    $category_id = isset($_POST["category_id"]) ? trim($_POST["category_id"]) : null;
    $isbn = isset($_POST["isbn"]) ? trim($_POST["isbn"]) : null;
    $published_year = isset($_POST["published_year"]) ? trim($_POST["published_year"]) : null;

    // Resim yükleme
    if (!empty($_FILES["cover_image"]["name"])) {
        $cover_image = uploadImage("cover_image");
    } else {
        $book = new Books();
        $existingBook = $book->getBookById($id);
        $cover_image = $existingBook->cover_image;
    }

    // Kitap bilgilerini güncelle
    $book = new Books();
    $total_copies = 1;
    $available_copies = 1;

    $updated = $book->editBook($id, $title, $description, $cover_image, $category_id, $isbn, $published_year, $total_copies, $available_copies);

    if ($updated) {
        // Yazar ilişkilerini güncelle
        $selectedAuthors = isset($_POST["authors"]) ? $_POST["authors"] : [];

        $relation = new BookAuthor();
        $relation->deleteRelationsByBook($id); // Önce eski ilişkileri sil

        foreach ($selectedAuthors as $author_id) {
            $relation->addRelation($id, $author_id); // Yeni yazarları ekle
        }

        header("Location: kitaplar.php");
        exit;
    } else {
        echo "Hata: Kitap güncellenemedi.";
    }
}

//Kullanııc güncelle
if (isset($_POST["author_edit"])) {
    $id = intval($_POST["author_id"]); 
    $author_name = trim($_POST["author_name"]);
    $author_bio = isset($_POST["author_bio"]) ? trim($_POST["author_bio"]) : ''; 
    $author_title = isset($_POST["author_title"]) ? trim($_POST["author_title"]) : ''; 

    // Resim yükleme işlemi 
    if (!empty($_FILES["author_photo"]["name"])) {
        $author_photo = uploadImage("author_photo");  // Yeni resim yüklenmişse, fotoğrafı yükle
    } else {
        // Kullanıcı yeni bir resim yüklemediyse, mevcut resmi al
        $author = new Authors();
        $existingAuthor = $author->getAuthorById($id);
        $author_photo = $existingAuthor ? $existingAuthor->author_photo : '';  // Eski fotoğrafı koru
    }

    // Güncelleme işlemi
    $author = new Authors();

    if ($author->editAuthor($id, $author_name, $author_photo, $author_bio, $author_title)) {
        header("Location: yazarlar.php");
        exit;
    } else {
        echo "Hata: Yazar güncellenemedi.";
    }
}


//Yeni Kategori Ekleme
if (isset($_POST["submit_category"])) {
    $category_name = $_POST["category_title"];
    $category = new Categories();
    
    if ($category->createCategory($category_name)) { 
        // Başarılı ekleme sonrası yönlendirme
        header("Location: kategoriler.php");
        exit;
    } else {
        echo "İçerik oluşturma hatası.";
    }
}

//Kategori Güncelle

if(isset($_POST["edit_category"])){
    $id = intval($_POST["category_id"]); // Yazar ID'sini al
    $category_name = $_POST["category_title"];

    $category = new Categories();

    if($category->editCategory($id, $category_name)){
        header("Location: kategoriler.php");
        exit;
    } else {
        echo "İçerik oluşturma hatası.";
    }
    
}

//Üye Ekleme

if (isset($_POST["user_submit"])) {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"]; // "adress" yerine düzeltilmiş

    $user = new Users();
    
    if ($user->createUser($name, $email, $phone, $address)) { 
        // Başarılı ekleme sonrası yönlendirme
        header("Location: users-list.php");
        exit;
    } else {
        echo "Üye eklenirken hata oluştu.";
    }
}

//Üye Güncelle 

if(isset($_POST["userEdit_submit"])){
    $id = intval($_POST["user_id"]);
    $name = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $user = new Users();

    if($user->editUser($id, $name, $email, $phone, $address)){
        header("Location: users-list.php");
        exit;
    }

    else{
        echo "Üye güncellenirken hata oluştu";
    }
}


if (isset($_POST["loan_submit"])) {
    $user_id    = isset($_POST["user_id"]) ? intval($_POST["user_id"]) : 0;
    $book_id    = isset($_POST["book_id"]) ? intval($_POST["book_id"]) : 0;
    $loan_date  = $_POST["loan_date"] ?? '';
    $due_date   = $_POST["due_date"] ?? '';

    $loan = new Loans();

    // Kitap zaten ödünçte mi?
    if ($loan->isBookOnLoan($book_id)) {
        echo "<script>
            alert('Bu kitap şu anda zaten ödünçte.');
            window.location.href = 'loan-create.php';
        </script>";
        exit;
    }

    // Ödünç verme işlemi
    $created = $loan->createLoan($user_id, $book_id, $loan_date, $due_date);

    if ($created) {
        header("Location: loans.php");
        exit;
    } else {
        echo "<script>alert('Kitap ödünç verilirken hata oluştu.'); window.location.href = 'loan-create.php';</script>";
    }
}

//Manuel ceza puanı verme
if (isset($_POST['manual_fine_submit'])) {
    require_once 'classes/fines.class.php';
    $loan_id = $_POST['loan_id'];
    $user_id = $_POST['manual_fine_user_id'];

    $fines = new Fines();
    $msg = $fines->addFine($loan_id);

    header("Location: edit-users.php?id=$user_id");
    exit;
}

//Manuel ceza puanı sıfırlama
if (isset($_POST['fine_reset_submit'])) {
    $userId = $_POST['fine_reset_user_id'];

    require_once 'classes/fines.class.php';
    $fines = new Fines();
    $fines->resetFinesByUser($userId);

    header("Location: edit-users.php?id=" . $userId);
    exit;
}




// Resim yükleme fonksiyonu
function uploadImage($inputName) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/img";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $fileName = time() . "_" . basename($_FILES[$inputName]["name"]); // Benzersiz dosya adı
        $targetFile = $targetDir . "/" . $fileName;

        if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
            return $fileName; // Sadece dosya adını döndür
        } else {
            echo "Resim yükleme hatası: " . $inputName;
            return null;
        }
    }
    return null;
}





?>
