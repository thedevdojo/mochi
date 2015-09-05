<?php include('partials/header.php'); ?>

	<?php if( $user ): ?>

		<br />Welcome <?= $user['email']; ?> 
		<br /><br />You are successfully logged in!
		<br /><br />
		<a href="logout">Logout?</a>

	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="/login">Login</a> or
		<a href="/register">Register</a>

	<?php endif; ?>

<?php include('partials/footer.php'); ?>