<?php
include "include/admin-navbar.php";
include "classes/users.class.php";
include "classes/loans.class.php";
include "classes/fines.class.php"; 

$id = $_GET['id'];
$user = new Users();
$item = $user->getUserById($id);

$loan = new Loans();
$loans = $loan->getLoansByUser($id);

$fines = new Fines(); // Ceza işlemleri sınıfını başlat
$totalFine = $fines->getTotalFineByUser($id);

// Ceza ekleme işlemi
foreach ($loans as $loan) {
    if (strtotime($loan->due_date) < time() && $loan->status == 'borrowed') {
        // Eğer teslim tarihi geçmiş ve kitap hala ödünç alınmışsa ceza ekle
        $fines->addFine($loan->id);
    }
}
?>

<div class="content">
    <section class="page-image page-image-admin section-box">
        <h1 class="page-title">Üye İşlemleri</h1>
    </section>

    <div class="container my-3">
        <a href="users-list.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Üyeler</a>
        <hr>
        <div class="row">
            <div class="col-6">
                <form action="functions.php" method="post" enctype="multipart/form-data">
                    
                        <div class="mb-3">
                            <input type="hidden" name="user_id" value="<?php echo $item->id; ?>">
                            <label for="username">Üye Adı:</label>
                            <input type="text" name="username" id="username" class="form-control" required value="<?php echo $item->name; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email">Üye Email:</label>
                            <input type="text" name="email" id="email" class="form-control" required value="<?php echo $item->email; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="phone">Üye Telefon:</label>
                            <input type="text" name="phone" id="phone" class="form-control" required value="<?php echo $item->phone ?>">
                        </div>

                        <div class="mb-3">
                            <label for="address">Üye Adresi:</label>
                            <input type="text" name="address" id="address" class="form-control" required value="<?php echo $item->address; ?>">
                        </div> 

                        <button type="submit" name="userEdit_submit" class="btn btn-primary">Güncelle</button>
                    
                    
                </form>
            </div>

            <div class="col-6">
                <form action="functions.php" method="post" class="mb-4">
                    <input type="hidden" name="manual_fine_user_id" value="<?php echo $item->id; ?>">
                    <div class="mb-3">
                        <p style="font-size:18px; color: red; margin-top: 10px;">
                            <strong>Toplam Ceza Puanı:</strong> <?php echo $totalFine; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="loan_id">İlgili Ödünç Seçin:</label>
                            <select name="loan_id" class="form-control" required>
                                <option value="">-- Ödünç Seçin --</option>
                                <?php foreach ($loans as $loan): ?>
                                    <option value="<?php echo $loan->id; ?>">
                                        <?php echo $loan->title . " | " . $loan->loan_date . " → " . $loan->due_date; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <button type="submit" name="manual_fine_submit" class="btn btn-danger">Ceza Ver</button>
                </form>

                
                <form action="functions.php" method="post" onsubmit="return confirm('Ceza puanlarını sıfırlamak istediğinizden emin misiniz?');">
                    <input type="hidden" name="fine_reset_user_id" value="<?php echo $item->id; ?>">
                    <button type="submit" name="fine_reset_submit" class="btn btn-warning">Ceza Puanını Sıfırla</button>
                </form>

            </div>
        </div>

        <?php if ($loans && count($loans) > 0): ?>
            <hr>
            <h4>Ödünç Alınan Kitaplar</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kitap Başlığı</th>
                        <th>Ödünç Tarihi</th>
                        <th>Son Teslim Tarihi</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loans as $loan): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($loan->title); ?></td>
                            <td><?php echo htmlspecialchars($loan->loan_date); ?></td>
                            <td><?php echo htmlspecialchars($loan->due_date); ?></td>
                            <td>
                                <?php
                                if ($loan->status === 'borrowed') {
                                    echo 'Aktif';
                                } elseif ($loan->status === 'returned') {
                                    echo 'İade Edildi';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($loan->status === 'borrowed'): ?>
                                    <a href="return-loan.php?id=<?php echo $loan->id; ?>" class="btn btn-sm btn-success">İade Et</a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Bu üyenin şu anda ödünç aldığı kitap bulunmamaktadır.</p>
        <?php endif; ?>
    </div>
</div>

       