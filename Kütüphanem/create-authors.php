<?php
include "include/admin-navbar.php";
include "classes/authors.class.php";
include "classes/category.class.php";
?>

<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Yazar Ekle</h1>
    </section>

    <div class="container my-3">
        <a href="yazarlar.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Yazarlar Listesi</a>
        <hr>
  
                <form action="functions.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="author_photo">Yazar Fotoğrafı:</label>
                                    <input type="file" name="author_photo" id="author_photo" class="form-control-file" required>
                                </div>

                            </div>

                            <div class="col-6"> 
                                <div class="mb-3">
                                    <label for="author_title">Yazar Ünvanı:</label>
                                    <input type="text" name="author_title" id="author_title" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="author_name">Yazar Adı:</label>
                                    <input type="text" name="author_name" id="author_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="author_bio">Yazar Hakkında:</label>
                                    <textarea name="author_bio" id="author_bio" class="form-control" rows="4" required></textarea>
                                </div>

                                <button type="submit" name="submit_author" class="btn btn-primary">Yazar Ekle</button>
                             </div>

                             
                            </div>
                        </div>
                       
                        


                </form>
    </div>
</div>

</body>
</html>