<?php
include_once('templates/header.php');
include_once('function.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data User</h1>

<?php
// jika ada tombol simpan
if (isset($_POST['simpan'])) {
    if (tambah_tamu($_POST) > 0) {
?>
        <div class="alert alert-success" role="alert">
            Data berhasil disimpan!
        </div>
<?php
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Data gagal disimpan!
        </div>
<?php
    }
}
?>



<!-- DataTales Example -->
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-primary btn-icon-split"
                            data-toggle="modal" data-target="#tambahModal">
                                <span class="icon text-white-50">
                                    <li class="fas fa-plus"></li>
                                </span>
                                <span class="text">Data User</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>User Role</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php
    // penomoran auto-increment
    $no = 1;

    // Query untuk memanggil semua data dari tabel users
    $users = query("SELECT * FROM users");
    foreach ($users as $user) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['user_role']; ?></td>
            <td>
                <a class="btn btn-success" href="edit-user.php?id=<?= $user['id_user'] ?>">Ubah</a>
                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"
                    href="hapus-user.php?id=<?= $user['id_user'] ?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
<?php
include_once('templates/footer.php');
?>

<div class="modal-body">
    <form method="post" action="">
        <input type="hidden" name="id_user" id="id_user" value="<?= $kodeuser ?>">
        <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
            <div class="col-sm-8">
                <select class="form-control" id="user_role" name="user_role">
                    <option value="admin">Administrator</option>
                    <option value="operator">Operator</option>
                </select>
            </div>
        </div>
    </form>
</div>