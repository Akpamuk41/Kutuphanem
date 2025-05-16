<?php
include "include/admin-navbar.php";
include "classes/books.class.php";
include "classes/category.class.php";
include "classes/users.class.php";
include "classes/fines.class.php";
include "classes/loans.class.php";

$books = new Books();
$categories = new Categories();
$users = new Users();

$bookCount = $books->getBookCount();
$categoryCount = $categories->getCategoryCount();
$userCount = $users->getUserCount();
$penalizedCount = $users->getPenalizedUserCount();

?>

    

<style>
.dashboard {
  display: flex;
  gap: 20px;
  justify-content: space-between;
  margin-top: 70px;
  flex-wrap: wrap;
}

.box {
  flex: 1;
  padding: 20px;
  border-radius: 10px;
  background-color: #f0f0f0;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.box i {
  font-size: 24px;
  margin-bottom: 10px;
}

.count {
  font-size: 32px;
  font-weight: bold;
  text-align: center;
}

.label {
  font-size: 14px;
  color: #666;
}

p {
    text-align: center;
}

@media (max-width: 768px) {
  .dashboard {
    justify-content: center;
  }

  .box {
    flex: 0 1 calc(50% - 10px);
    max-width: calc(50% - 10px);
    margin-bottom: 20px;
  }
}
</style>

<section class="page-image page-image-admin section-box">
    <h1 class="page-title">Kütüphanem</h1>
</section>
<div class="container my-3">
<div class="dashboard">
  <div class="box">
      <i class="fa-solid fa-book"></i>      
      <p class="count"><?= $bookCount ?></p>
      <a class="index-a" href="kitaplar.php">Kayıtlı Kitaplar</a>
  </div>
    <div class="box">
      <i class="fa-solid fa-layer-group"></i>
      <p class="count"><?= $categoryCount ?></p>
      <a class="index-a" href="kategoriler.php">Kayıtlı Kategoriler</a>
    </div>

    <div class="box">
      <i class="fa-solid fa-users"></i>
      <p class="count"><?= $userCount ?></p>
      <a class="index-a" href="users-list.php">Kayıtlı Üyeler</a>
    </div>
    <div class="box">
      <i class="fas fa-user-times"></i> 
      <p class="count"><?= $penalizedCount ?></p>
      <a class="index-a" href="#">Cezalı Üyeler</a>
    </div>

</div>

<!-- Grafik alanı -->
<div class="container my-5">
    <h2 style="text-align:center;">Kitap Ara</h2> <br><br>
    <form action="search.php" method="GET" style="text-align: center;">
        <input type="search" name="q" class="form-control mb-3" placeholder="Kitap veya Yazar Ara" style="max-width:100%; margin:auto;">
        <button type="submit" class="btn btn-primary">Ara</button>
    </form>
</div>


</div>




