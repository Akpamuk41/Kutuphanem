<?php 
include "include/admin-navbar.php";
include "classes/category.class.php";
?>


    <div class="content">
    <section class="page-image page-image-admin section-box">
    <h1 class="page-title">Kayıtlı Kategoriler</h1>
</section>
    <div class="container my-3">
        <a href="create-category.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Yeni Kategori Ekle</a>
        <hr>
    
            <?php $category = new Categories(); ?>

            <?php if($category->getCategories()): ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kategroi Adı</th>
                            <th></th>
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php foreach($category->getCategories() as $item): ?>

                        <tr>
                            <td style="height:80%;"><h5><?php echo $item->category_name ?></h5></td>
                            <td style="width:150px;">
                                <a href="edit-category.php?id=<?php echo $item->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                                <form action="delete-category.php" method="post" style="display: inline;">
                                    <input type="hidden" name="categoryId" value="<?php echo $item->id ?>">
                                    <button type="submit" name="deletecategory" class="btn btn-danger btn-sm">Sil</button>
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




   