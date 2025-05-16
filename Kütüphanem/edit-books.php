<?php
include "include/admin-navbar.php";
include "classes/books.class.php";
include "classes/users.class.php";
include "classes/loans.class.php"; 
include "classes/category.class.php"; 



$id = $_GET['id'];
$books = new Books();
$loans = new Loans();
$item = $books->getBookById($id); // Kitap verilerini alıyoruz
$authors = $books->getAuthorsByBookId($id); // Kitap yazarlarını alıyoruz
$loanInfo = $loans->getLoansByBookId($id); // Kitap ödünç verildi mi kontrol ediyoruz
$categories = new Categories();
$kategoriler = $categories->getCategories(); 

?>

<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Kitabı Düzenle</h1>
    </section>
    <div class="container my-3">
        <a href="kitaplar.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Kitaplar</a>
        <div class="card card-body">
            <form action="functions.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <input type="hidden" name="post_id" value="<?php echo $item->id; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cover_image">Kitap Görseli</label> <br><br>
                            <img src="img/<?php echo $item->cover_image; ?>" alt="cover_image" style="max-width:100%; margin-top:15px;">
                            <br><br>
                            <input type="file" name="cover_image" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="book_title">Kitap Adı</label>
                            <input type="text" name="book_title" id="book_title" class="form-control" value="<?php echo $item->title; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="book_description">Kitap Açıklama</label>
                            <textarea name="book_description" id="book_description" class="form-control" rows="14"><?php echo $item->description; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category_id">Kitap Kategorisi</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Kategori Seçiniz</option>
                                <?php if ($kategoriler): ?>
                                    <?php foreach ($kategoriler as $kat): ?>
                                        <option value="<?= $kat->id ?>" <?= $kat->id == $item->category_id ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($kat->category_name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">Kategori bulunamadı</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="isbn">ISBN Numarası</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="<?php echo $item->isbn; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="published_year">Yayın Yılı</label>
                            <input type="text" name="published_year" id="published_year" class="form-control" value="<?php echo $item->published_year; ?>">
                        </div>
                        <?php
                            // Yazarları al
                            $books2 = new Books();

                            $authorsList = $books2->getAllAuthors();
                            ?>
                        <div class="mb-3">
                            <label for="authors">Kitap Yazarları</label>
                            <select class="form-select" name="authors[]" id="authors" multiple>
                                <?php foreach ($authorsList as $author): ?>
                                    <option value="<?php echo $author->id; ?>" 
                                        <?php echo in_array($author->id, array_column($authors, 'id')) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($author->author_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-muted">Ctrl (Windows) veya Cmd (Mac) tuşu ile çoklu seçim yapabilirsiniz.</small>
                        </div>

                        
                    </div>
                </div>
                <input type="hidden" name="post_id" value="<?php echo $item->id; ?>">
                <button type="submit" name="books_edit" class="btn btn-primary">Güncelle</button>
            </form>
        </div>

        <!--Yazar Alanı-->
        <div class="card card-body mt-4">
            <div class="row">
                <div class="col-12">
                    <br><h3 style="text-align:center;">Kitap Yazarı</h3> <br><br>
                    <div class="row">
                        <?php if ($authors): ?>
                            <?php foreach ($authors as $author): ?>
                                <div class="col-12 mb-3">
                                    <div class=" h-100">
                                        <div class="row no-gutters">
                                            <!-- Author Image -->
                                            <div class="col-md-3">
                                                <img src="img/<?php echo htmlspecialchars($author->author_photo); ?>" class="card-img" alt="<?php echo htmlspecialchars($author->author_name); ?>" style="object-fit: cover; width: 100%; height: 100%; max-height: 500px;">
                                            </div>

                                            <!-- Author Information -->
                                            <div class="col-md-9">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo htmlspecialchars($author->author_name); ?></h5>
                                                    <p class="card-text"><?php echo htmlspecialchars($author->author_bio); ?></p>
                                                    <a href="edit-authors.php?id=<?php echo $author->id; ?>" class="btn btn-sm btn-info">Yazarı Görüntüle</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Bu kitaba ait yazar bulunamadı.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Ödünç Bilgisi -->
        <div class="card card-body mt-4">
    <h3 style="text-align:center;">Kitap Ödünç Geçmişi</h3>
    <?php 
        $loanHistory = $loans->getAllLoansByBookId($id); 
        if ($loanHistory): 
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ödünç Alan Kullanıcı</th>
                <th>Ödünç Alınan Tarih</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loanHistory as $index => $loan): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($loan->name) ?></td>
                    <td><?= htmlspecialchars($loan->loan_date) ?></td>
                    <td>
                        <a href="edit-users.php?id=<?= $loan->user_id ?>" class="btn btn-sm btn-info">
                            Kullanıcıyı Görüntüle
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Bu kitapla ilgili ödünç alma kaydı bulunamadı.</p>
    <?php endif; ?>
</div>

    </div>
</div>
