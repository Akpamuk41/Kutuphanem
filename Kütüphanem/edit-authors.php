<?php
include "include/admin-navbar.php";
include "classes/authors.class.php";

// Bu sayfada post ID'yi alarak mevcut verileri alıyoruz.
$id = $_GET['id'];
$authors = new Authors();
$item = $authors->getAuthorById($id); // Post ID ile ilgili veriyi alıyoruz.
$books = $authors->getBooksByAuthor($id);


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Geçersiz yazar ID');
}

$authorId = (int) $_GET['id'];

$authorObj = new Authors();
$author = $authorObj->getAuthorById($authorId);

?>
<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Yazar Bilgileri Düzenle</h1>
    </section>
    <div class="container my-3">
        <a href="yazarlar.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Yazarlar</a>
        <div class="card card-body">
            <form action="functions.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <input type="hidden" name="author_id" value="<?php echo $item->id; ?>">

                        </div>

                        <div class="mb-3">
                            <label for="author_photo">Yazar Fotoğrafı</label> <br><br>
                            <img src="img/<?php echo $item->author_photo; ?>" alt="author_photo" style="max-width:100%; margin-top:15px;">
                            <br><br>
                            <input type="file" name="author_photo" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-8">

                        <div class="mb-3">
                            <label for="author_title">Yazar Ünvan</label>
                            <input type="text" name="author_title" id="author_title" class="form-control" value="<?php echo $item->author_title; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="author_name">Yazar Adı</label>
                            <input type="text" name="author_name" id="author_name" class="form-control" value="<?php echo $item->author_name; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="author_bio">Yazar Hakkında</label>
                            <textarea name="author_bio" id="author_bio" class="form-control" rows="14"><?php echo $item->author_bio; ?></textarea>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="author_id" value="<?php echo $item->id; ?>">
                <button type="submit" name="author_edit" class="btn btn-primary">Güncelle</button>
            </form>
        </div>


        <div class="card card-body mt-4">
            <div class="row">
                <div class="col-12">
                    <h3>Kitapları</h3>
                    <div class="row">
                        <?php if ($books): ?>
                            <?php foreach ($books as $book): ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <!-- Kitap Kapak Görseli -->
                                        <img src="img/<?php echo htmlspecialchars($book->cover_image); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($book->title); ?>">

                                        <div class="card-body">
                                            <!-- Kitap Başlığı Bağlantı Olarak, CSS ile özel stil ekledik -->
                                            <h5 class="card-title">
                                                <a href="edit-books.php?id=<?php echo $book->id; ?>" class="book-link"><?php echo htmlspecialchars($book->title); ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Bu yazara ait kitap bulunamadı.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>
