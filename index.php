<!DOCTYPE html>
<?php
include('conn/koneksi.php');
$conn = new Connection();
$conn->connOpen();
?>
<html>
<head>
	<title>Telegram</title>
</head>
<body>
			<form action="aksi_database.php?aksi=kritik" method="POST">
				<textarea rows="2" name="kritik" placeholder="Isi Pesan Anda ..." required ></textarea>
				<br>
				<input type="submit" value="Send"/>
			</form>
		</div>
	</div>
</body>
</html>
