<?php include('header.php'); ?>

	<?php if( !empty($data['id']) ): ?>

		<br />Welcome <?= $data['email']; ?> 
		<br /><br />You are successfully logged in!
		<br /><br />
		<a href="logout.php">Logout?</a>

	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="/login">Login</a> or
		<a href="/register">Register</a>

	<?php endif; ?>

<?php include('footer.php'); ?>