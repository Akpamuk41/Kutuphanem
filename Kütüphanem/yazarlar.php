<?php 
include "include/admin-navbar.php";
include "classes/authors.class.php";
?>


    <div class="content">
    <section class="page-image page-image-admin section-box">
    <h1 class="page-title">Yazarlar</h1>
</section>
    <div class="container my-3">
        <a href="create-authors.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Yeni Yazar Ekle</a>
        <hr>
    
            <?php $authors = new Authors(); ?>

            <?php if($authors->getAuthors()): ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Yazar Fotoğrafı</th>
                            <th>Ünvanı</th>
                            <th>Yazar Adı</th>
                            <th>Yazar Hakkında</th>
                            <th></th>
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php foreach($authors->getAuthors() as $item): ?>

                        <tr>
                            <td><img src="img/<?php echo $item->author_photo ?>" alt="" style="width:130px; height:190px;"></td>
                            <td style="width:100px;"><?php echo $item->author_title ?></td>
                            <td style="width:200px;"><h5><?php echo $item->author_name ?></h5></td>
                            <td><?php echo substr($item->author_bio, 0, 670); ?>...</td>
                            <td style="width:150px;">
                                <a href="edit-authors.php?id=<?php echo $item->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                                <form action="delete-author.php" method="post" style="display: inline;">
                                    <input type="hidden" name="authorId" value="<?php echo $item->id ?>">
                                    <button type="submit" name="deleteAuthor" class="btn btn-danger btn-sm">Sil</button>
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




   