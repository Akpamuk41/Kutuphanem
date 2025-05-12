<?php
include "classes/db.class.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Fontawesome CSS -->
  <script src="https://kit.fontawesome.com/63f5e64855.js" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Niramit:ital,wght@1,300&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="css/admin.css">
  <!-- Jquery JS -->
  <script src="/TorpidoMakina/js/script.js"></script>
  <link rel="icon" type="image/x-icon" href="">
  <!-- -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
  <title>Admin Panel</title>
</head>
<body>
  <nav class="sidebar close">
    <header>
      <figure class="image">
        <img class="navbar-image" src="img/varsayilan.webp" alt="profile picture">
        <figcaption>
          <p class="name text">
            Yönetici
          </p>
        </figcaption>
        <div class="toggle">
          <i class="fas fa-arrow-right"></i>
        </div>
      </figure>
        <div class="mt-3 mb-3">
          <form action="search.php" method="GET" >
          <input type="search" name="q" class="form-control" placeholder="Ara">
          </form>
        </div>

      
    </header>
    <div class="main-content">
      <ul>
        <li>
          <a href="index.php">
            <i class="fa-solid fa-house"></i>
            <span class="text">Arayüz</span>
          </a>
        </li>
        <li>
          <a href="kitaplar.php">
            <i class="fa-solid fa-book"></i>
            <span class="text">Kitaplar</span>
          </a>
        </li>
        <li class="dropdown-parent">
          <a href="yazarlar.php">
            <i class="fa-solid fa-user-tie"></i>
            <span class="text">Yazarlar</span>
          </a>
        </li>
        <li class="dropdown-parent">
          <a href="loans.php">
          <i class="fa-solid fa-book-open-reader"></i>
          <span class="text">Kitap Ver</span>
          </a>
        </li>
        <li>
          <a href="kategoriler.php">
          <i class="fa-solid fa-list"></i>
          <span class="text">Kategoriler</span>
          </a>
        </li>
        <li>
          <a href="users-list.php">
          <i class="fa-solid fa-people-group"></i>
            <span class="text">Üyeler</span>
          </a>
        </li>
        
      </ul>

    </div>
    <span class="line"></span>


  </nav>  
  <script>
  const sidebar = document.querySelector(".sidebar");
  const toggle = document.querySelector(".toggle");
  const searchBox = document.querySelector(".search-box");
  const dropdownParents = document.querySelectorAll(".dropdown-parent");

  toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  });

  searchBox.addEventListener("click", () => {
    sidebar.classList.remove("close");
  });

  dropdownParents.forEach(parent => {
    parent.addEventListener("mouseenter", () => {
      parent.querySelector(".dropdown").style.display = "flex";
    });

    parent.addEventListener("mouseleave", () => {
      parent.querySelector(".dropdown").style.display = "none";
    });
  });
</script>

