<?php
include "include/admin-navbar.php";
include "classes/category.class.php";

$id = $_GET['id'];
$category = new Categories();
$item = $category->getCategoryById($id);
?>
<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Kategori Düzenle</h1>
    </section>

    <div class="container my-3">
        <a href="kategoriler.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Kategori Listesi</a>
        <hr>
        <div class="row">
            <div class="col-6">
                <form action="functions.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="category_id" value="<?php echo $item->id; ?>">

                            <label for="category_title">Kategroi Adı:</label>
                            <input type="text" name="category_title" id="category_title" class="form-control" required value="<?php echo $item->category_name ?>">
                        </div>

                        <button type="submit" name="edit_category" class="btn btn-primary">Kategori Güncelle</button>


                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>