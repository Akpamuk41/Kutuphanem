<?php
include "include/admin-navbar.php";
include "classes/users.class.php";
?>
<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Üye Ekle</h1>
    </section>

    <div class="container my-3">
        <a href="users-list.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Üyeler</a>
        <hr>
        <div class="row">
            <form action="functions.php"  method="post" enctype="multipart/form-data">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="username">Üye Adı:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Üye Email:</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Üye Telefon:</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="address">Üye Adresi:</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div> 

                    <button type="submit" name="user_submit" class="btn btn-primary">Üye Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>
