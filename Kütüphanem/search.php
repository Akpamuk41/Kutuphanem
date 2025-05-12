<?php
include 'include/admin-navbar.php';
include 'classes/books.class.php';
include 'classes/authors.class.php';
include 'classes/search.class.php';  // Arama sınıfını dahil et

// Arama terimini al
$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($searchTerm === '') {
    echo "<div class='container my-5'><div class='alert alert-warning'>Lütfen bir arama terimi girin.</div></div>";
    exit;
}

// Search sınıfından bir nesne oluşturun
$search = new Search(); 

// Arama sonuçlarını al
$results = $search->search($searchTerm); // search() fonksiyonunda arama yapıyoruz

?>

<div class="container my-5">
    <h2>Arama Sonuçları</h2>
    <div class="row">
        <?php if ($results): ?>
            <?php foreach ($results as $result): 
                $title = htmlspecialchars($result['title']);
                $desc = htmlspecialchars($result['description'] ?? '');
                $type = $result['type'];
                $image = $result['image'] ?? 'images/default.jpg';

                // Link oluştur
                if ($type === 'kitap') {
                    $link = "edit-books.php?id=" . $result['id'];
                } elseif ($type === 'yazar') {
                    $link = "edit-authors.php?id=" . $result['id'];
                } elseif ($type === 'uye') {
                    $link = "edit-users.php?id=" . $result['id'];
                }
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="img/<?php echo $image; ?>" class="card-img-top" style="height: 220px; object-fit: cover;" alt="<?php echo $title; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $title; ?></h5>
                        <p class="card-text"><?php echo $desc ?: ucfirst($type); ?></p>
                        <a href="<?php echo $link; ?>" class="btn btn-primary">Detaylara Git</a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Tür: <?php echo ucfirst($type); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-danger">Hiçbir sonuç bulunamadı.</div>
            </div>
        <?php endif; ?>
    </div>
</div>
