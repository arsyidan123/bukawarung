<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		 echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Bukawarung</a></h1>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="data-kategori.php">Data Kategori</a></li>
			<li><a href="data-produk.php">Data Produk</a></li>
			<li><a href="Keluar.php">Keluar</a></li>
		</ul>
	</div>
	</header>

	<!-- content -->
	<div class="section">	
		<div class="container">	
			<h3>Data Produk</h3>
			<div class="box">
				<p><a href="tambah-produk.php">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC");
							while($row = mysqli_fetch_array($produk)) {
					
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td><?php echo $row['product_price'] ?></td>
							<td><?php echo $row['product_description'] ?></td>
							<td><img src="produk/<?php echo $row['product_image'] ?>"></td>
							<td><?php echo $row['product_status'] ?></td>
							<td>
								<a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php 	} ?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>	
			Copyright &copy; 2020 - Bukawarung.</small>
		</div>	
	</footer>
</body>
</html>