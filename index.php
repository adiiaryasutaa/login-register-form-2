<?php

require_once('util.php');
require_once('controller.php');

Utillities::redirectIfNotAuthenticated();

if ( isset($_POST['sign-up']) ) Logout::start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="dist/css/output.css">

	<title>Home Page</title>
</head>
<body>
	<main class="w-full h-screen flex justify-center items-center bg-gray-200">

		<div class="container shadow-md flex flex-col items-center p-4 bg-slate-100 w-auto rounded space-y-4">
			<img class="w-96 h-96 rounded" src="dist/img/ronaldo.jpg" alt="welcome-image">
			<h1 class="font-medium text-2xl ">Hello, <?= Utillities::getUser()->getUsername() ?></h1>
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				<button name="sign-up" class="px-4 py-2 rounded bg-purple-600 text-slate-100 hover:bg-purple-700 active:ring active:ring-purple-400" type="submit">Sign Out</button>
			</form>
		</div>

	</main>
</body>
</html>