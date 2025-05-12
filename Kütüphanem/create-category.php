<?php
include "include/admin-navbar.php";
include "classes/category.class.php";
?>

<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Kategori Ekle</h1>
    </section>

    <div class="container my-3">
        <a href="kategoriler.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Kategori Listesi</a>
        <hr>
        <div class="row">
            <div class="col-6">
                <form action="functions.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="category_title">Kategroi Adı:</label>
                            <input type="text" name="category_title" id="category_title" class="form-control" required>
                        </div>

                        <button type="submit" name="submit_category" class="btn btn-primary">Kategori Ekle</button>


                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>