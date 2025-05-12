<?php
include "include/admin-navbar.php";
include "classes/books.class.php";
include "classes/category.class.php";
?>

<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Kitap Ekle</h1>
    </section>

    <div class="container my-3">
        <a href="kitaplar.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Kitap Listesi</a>
        <hr>
        <div class="row">
            <div class="col-6">
                <form action="functions.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="book_title">Kitap Adı:</label>
                            <input type="text" name="book_title" id="book_title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="book_description">Kitap Açıklaması:</label>
                            <textarea name="book_description" id="book_description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cover_image">Kitap Kapak Görseli:</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control-file" required>
                        </div>

                        <div class="mb-3">
                            <label for="book_category">Kitap Kategorisi:</label>
                            <select name="book_category" id="book_category" class="form-control" required>
                                <option value="">Kategori Seçiniz</option>
                                <?php
                                $kategori = new Categories();
                                $kategoriler = $kategori->getCategories();
                                if ($kategoriler):
                                    foreach ($kategoriler as $item): ?>
                                        <option value="<?= $item->id ?>"><?= htmlspecialchars($item->category_name) ?></option>
                                    <?php endforeach;
                                else: ?>
                                    <option value="">Kategori bulunamadı</option>
                                <?php endif; ?>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="isbn">ISBN Numarası:</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="published_year">Yayın Yılı:</label>
                            <input type="text" name="published_year" id="published_year" class="form-control" required>
                        </div>
                        

                        <button type="submit" name="submit_book" class="btn btn-primary">Kitap Ekle</button>


                </form>
            </div>
            
            <div class="col-6"> 
                
                <div class="mb-3">
                    <h4>ISBN Numarası</h4>
                    <small>ISBN Numarası Kitaba özel numara kodudur.</small>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>