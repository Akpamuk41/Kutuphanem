<?php
include "classes/loans.class.php";

if (isset($_GET['id'])) {
    $loan_id = intval($_GET['id']);

    // Loans sınıfını çağır
    $loan = new Loans();

    // Önce loan bilgilerini al ki user_id'yi öğrenelim
    $loanInfo = $loan->getLoanById($loan_id);

    if ($loanInfo) {
        $user_id = $loanInfo->user_id;

        // İade işlemini gerçekleştir
        $loan->returnLoan($loan_id, date('Y-m-d'));

        // İlgili kullanıcı düzenleme sayfasına geri dön
        header("Location: edit-users.php?id=" . $user_id);
        exit;
    } else {
        echo "Geçersiz işlem.";
    }
} else {
    echo "Eksik parametre.";
}
