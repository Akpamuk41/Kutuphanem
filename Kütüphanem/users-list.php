<?php 
include "include/admin-navbar.php";
include "classes/users.class.php";
?>



<div class="content">
<section class="page-image page-image-admin section-box">
    <h1 class="page-title">Üyeler</h1>
</section>
<div class="container my-3">
    <a href="create-users.php" class="btn btn-primary" style="margin-top:15px; margin-bottom:25px;">Üye Ekle</a>
    <hr>
 
        <?php $users = new Users(); ?>

        <?php if($users->getUsers()): ?>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>İD</th>
                        <th>Kullanıcı Adı:</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th></th>
                    </tr>
                </thead>
            
                <tbody>
                <?php foreach($users->getUsers() as $item): ?>

                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->name ?></td>
                        <td><?php echo $item->email ?></td>
                        <td><?php echo $item->phone ?></td>
                        <td style="width:150px;">
                            <a href="edit-users.php?id=<?php echo $item->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                            <form action="delete-users.php" method="post" style="display: inline;">
                                <input type="hidden" name="userId" value="<?php echo $item->id ?>">
                                <button type="submit" name="deleteUser" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">Kullanıcı bulunamadı.</div>
        <?php endif; ?>
</div>
</div>


   