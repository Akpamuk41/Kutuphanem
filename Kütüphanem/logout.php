<?php
session_start();

// Tüm oturum verilerini sil
$_SESSION = array();

// Oturum çerezini de silmek istiyorsanız, zaman aşımını geçmiş bir zaman olarak ayarlayın
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Oturumu tamamen yok et
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendir
header("Location: http://localhost/TorpidoMakina/login.php");
exit;
?>