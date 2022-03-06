<?php

require_once('../util.php');
require_once('../controller.php');

Utillities::redirectIfAuthenticated();

if ( isset($_POST['submit']) ) 
	Register::store($_POST['email'], $_POST['username'], $_POST['password'], $_POST['repeat-password']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../dist/css/output.css">

	<title>Sign Up</title>
</head>

<body>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<section class="flex justify-center items-center bg-gray-200 w-screen h-screen">
			<div class="w-96">
				<div class="text-4xl text-center font-medium mb-10">
					Join Us
				</div>

				<div class="container shadow-md flex flex-col items-center p-4 bg-slate-100 rounded space-y-4">

					<!-- ========== Email ========== -->
					<div class="w-full">
						<label for="email" class="block mb-2 text-sm font-medium text-slate-500 select-none">Email</label>
						<div class="">
							<div class="relative mt-1">
								<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= isset(Register::$error['email']) ? 'fill-red-600' : 'fill-slate-600' ?>" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
									</svg>
								</div>
								<input name="email" type="email" id="email" class="font-medium bg-slate-50 border <?= isset(Register::$error['email']) ? 'border-red-600' : 'border-slate-300' ?>  text-slate-900 text-sm rounded focus:outline-none focus:ring-purple-500 focus:border-purple-500 block pl-10 p-2.5 w-full" placeholder="Email" require>
							</div>
						</div>
						<?= isset(Register::$error['email']) ? '<label for="email" class="block text-sm font-medium text-red-600 select-none">' . Register::$error['email'] . '</label>' : '' ?>
					</div>
					<!-- ========== Email ========== -->

					<!-- ========== Username ========== -->
					<div class="w-full">
						<label for="username" class="block mb-2 text-sm font-medium text-slate-500 select-none">Username</label>
						<div class="relative mt-1">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= isset(Register::$error['username']) ? 'fill-red-600' : 'fill-slate-600' ?>" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
								</svg>
							</div>
							<input name="username" type="text" id="username" class="font-medium bg-slate-50 border <?= isset(Register::$error['username']) ? 'border-red-600' : 'border-slate-300' ?> text-slate-900 text-sm rounded focus:outline-none focus:ring-purple-500 focus:border-purple-500 block pl-10 p-2.5 w-full" placeholder="Username" require>
						</div>
						<?= isset(Register::$error['username']) ? '<label for="username" class="block text-sm font-medium text-red-600 select-none">' . Register::$error['username'] . '</label>' : '' ?>
					</div>
					<!-- ========== Username ========== -->

					<!-- ========== Password Input ========== -->
					<div class="w-full">
						<label for="password" class="block mb-2 text-sm font-medium text-slate-500 select-none">Password</label>
						<div class="relative mt-1">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= isset(Register::$error['password']) ? 'fill-red-600' : 'fill-slate-600' ?>" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
								</svg>
							</div>
							<input name="password" type="password" id="password" class="font-medium bg-slate-50 border <?= isset(Register::$error['password']) ? 'border-red-600' : 'border-slate-300' ?> text-slate-900 text-sm rounded focus:outline-none focus:ring-purple-500 focus:border-purple-500 block pl-10 p-2.5 w-full" placeholder="Password" require>
						</div>
						<?= isset(Register::$error['password']) ? '<label for="password" class="block text-sm font-medium text-red-600 select-none">' . Register::$error['password'] . '</label>' : '' ?>
					</div>
					<!-- ========== Password Input ========== -->

					<!-- ========== Confirm Password Input ========== -->
					<div class="w-full">
						<label for="confirm_password" class="block mb-2 text-sm font-medium text-slate-500 select-none">Repeat Password</label>
						<div class="relative mt-1">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= isset(Register::$error['repeat_password']) ? 'fill-red-600' : 'fill-slate-600' ?>" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
								</svg>
							</div>
							<input name="repeat-password" type="password" id="confirm_password" class="font-medium bg-slate-50 border <?= isset(Register::$error['repeat_password']) ? 'border-red-600' : 'border-slate-300' ?> text-slate-900 text-sm rounded focus:outline-none focus:ring-purple-500 focus:border-purple-500 block pl-10 p-2.5 w-full" placeholder="Repeat Password" require>
						</div>
						<?= isset(Register::$error['repeat_password']) ? '<label for="confirm_password" class="block text-sm font-medium text-red-600 select-none">' . Register::$error['repeat_password'] . '</label>' : '' ?>
					</div>
					<!-- ========== Confirm Password Input ========== -->

					<button class="w-full text-slate-100 bg-purple-600 rounded p-2.5 hover:bg-purple-700 focus:ring focus:ring-purple-400" name="submit" type="submit">Sign Up</button>
					
				</div>

				<div class="flex justify-center w-full mt-4">
					<a class="space-x-4 text-slate-900 text-center px-4 py-2 hover:text-purple-600 hover:underline underline-offset-4" href="../login">Sign In</a>
				</div>

			</div>
		</section>

	</form>
</body>

</html>