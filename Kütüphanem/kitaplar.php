<?php 
include "include/admin-navbar.php";
include "classes/books.class.php";
?>


    <div class="content">
    <section class="page-image page-image-admin section-box">
    <h1 class="page-title">Kayıtlı Kitaplar</h1>
</section>
    <div class="container my-3">
        <a href="create-book.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Yeni Kitap Ekle</a>
        <hr>
    
            <?php $books = new Books(); ?>

            <?php if($books->getbooks()): ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kitap Görseli</th>
                            <th>Kitap Adı</th>
                            <th>Kitap Açıklaması</th>
                            <th>Yayın Yılı</th>
                            <th></th>
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php foreach($books->getbooks() as $item): ?>

                        <tr>
                            <td><img src="img/<?php echo $item->cover_image ?>" alt="" style="width:130px; height:190px;"></td>
                            <td style="width:200px;"><h5><?php echo $item->title ?></h5></td>
                            <td><?php echo substr($item->description, 0, 670); ?>...</td>
                            <td style="width:100px;"><?php echo $item->published_year ?></td>
                            <td style="width:150px;">
                                <a href="edit-books.php?id=<?php echo $item->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                                <form action="delete-book.php" method="post" style="display: inline;">
                                    <input type="hidden" name="bookId" value="<?php echo $item->id ?>">
                                    <button type="submit" name="deleteBook" class="btn btn-danger btn-sm">Sil</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">Kitap Bulunamadı.</div>
            <?php endif; ?>
    </div>
    </div>




   