<?php
include "include/admin-navbar.php";
include "classes/loans.class.php";
include "classes/books.class.php";
include "classes/users.class.php";

$users = new Users();
$userList = $users->getUsers(); // Tüm kullanıcıları çekiyoruz

$books = new Books();
$bookList = $books->getBooks(); // Tüm kitapları çekiyoruz
?>

<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Kitap Ödünç Ver</h1>
    </section>

    <div class="container my-3">
        <a href="loans-list.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Ödünç İşlemleri</a>
        <hr>
        <div class="row">
            <form action="functions.php" method="post">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id">Üye Seç:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <?php foreach ($userList as $user) { ?>
                                <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="book_id">Kitap Seç:</label>
                        <select name="book_id" id="book_id" class="form-control" required>
                            <?php foreach ($bookList as $book) { ?>
                                <option value="<?php echo $book->id; ?>"><?php echo $book->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="loan_date">Ödünç Tarihi:</label>
                        <input type="date" name="loan_date" id="loan_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="due_date">Son Teslim Tarihi:</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" required>
                    </div> 

                    <button type="submit" name="loan_submit" class="btn btn-primary">Kitabı Ödünç Ver</button>
                </div>
            </form>
        </div>
    </div>
</div>
