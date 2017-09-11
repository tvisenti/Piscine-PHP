<?php
	include 'initdata.php';

?>
<header>
	<div id="header">
		<img id="logo" src="http://img15.hostingpics.net/pics/660371kwamashoplogo2.png" width="50%" height="auto">
		<div id="login">
			<form action="session.php" method="POST">
				<!-- <input type="text" name="username" placeholder="Username">
				<br>
				<input type="password" name="password" placeholder="Password">
				<br>
				<input type="submit" value="LOGIN"> -->
				<input type="submit" name="LOGOUT" value="LOGOUT">
				<input type="submit" name="DELETE_ACCOUNT" value="DELETE_ACCOUNT">
				<button class="button button-success">Buy</button>
			</form>
				<?php
				session_start();
				if ($_SESSION["user_lvl"] == 2)
				{
				?>
				<form action="admin.php" method="POST">
					<input type="submit" name="ADMIN" value="ADMIN">
				</form>
				<?php
				}
				?>
		</div>
		<div id="cart">
			<img src="http://www.huruguen.fr/site/wp-content/uploads/2015/02/Logo-Panier.png" width="20%" height="auto">
			<br>
			<small>
			<?php echo $_SESSION["log_user"]?>
				<br>
			You have <?php echo($_SESSION["money"] ? $_SESSION["money"] : 0) ?> &euro;
				<br>
			You have <?php echo gettab_box("box", $_SESSION['log_user']); ?> items
				<br>
				Total : <?php echo gettab_box_total("box", $_SESSION['log_user']);?> &euro;
				<a href="callme.php?action=emptycart">EMPTY</a>
			</small>
		</div>
			<div id="cart">
	<form action="add_money.php" method="POST">
		<input type="number" min="0" name="add" placeholder="ADD" required>
		<input type="submit" name="add_money" value="OK">
	</form>
	</div>
</div>
</header>
