<?php 

require_once('../util.php');
require_once('../controller.php');

Utillities::redirectIfAuthenticated();

if ( isset($_POST['submit']) )
	Login::authenticate($_POST['email-or-username'], $_POST['password']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../dist/css/output.css">

	<title>Sign In</title>
</head>

<body>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<section class="flex justify-center items-center bg-gray-200 w-screen h-screen">
			<div class="w-96">
				<div class="text-4xl text-center font-medium mb-10">
					Welcome Back!!
				</div>

				<div class="container shadow-md flex flex-col items-center p-4 bg-slate-100 rounded space-y-4">

				<?php 
				if ( isset(Login::$error['error']) ) 
					echo (
						"<div class=\"flex items-center space-x-2 px-4 py-2 bg-red-600 font-medium text-sm text-slate-100 w-full rounded\">
							<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-5 w-5\" viewBox=\"0 0 20 20\" fill=\"currentColor\">
								<path fill-rule=\"evenodd\" d=\"M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z\" clip-rule=\"evenodd\" />
							</svg>
							<span> " . Login::$error['error'] .	"</span>
						</div>");
				?>

					<!-- ========== Email or Username Input ========== -->
					<div class="w-full">
						<label for="email-or-username" class="block mb-2 text-sm font-medium text-slate-500 select-none">Email or Username</label>
						<div class="relative mt-1">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-slate-600" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
								</svg>
							</div>
							<input type="text" name="email-or-username" id="email-or-username" class="font-medium bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded focus:outline-none focus:ring-purple-500 focus:border-purple-500 block pl-10 p-2.5 w-full" placeholder="Email or Username" require>
						</div>
					</div>
					<!-- ========== Email or Username Input ========== -->

					<!-- ========== Password Input ========== -->
					<div class="w-full">
						<label for="password" class="block mb-2 text-sm font-medium text-slate-500 select-none">Password</label>
						<div class="relative mt-1">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-slate-600" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
								</svg>
							</div>
							<input type="password" name="password" id="password" class="font-medium bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded focus:outline-none focus:ring-purple-500 focus:border-purple-500 block pl-10 p-2.5 w-full" placeholder="Password" require>
						</div>
					</div>
					<!-- ========== Password Input ========== -->

					<!-- ========== Remember Me Checkbox =========w= -->
					<div class="w-full">
						<div class="flex items-center">
							<input id="remember-me" aria-describedby="remember-me" type="checkbox" class="w-4 h-4 bg-slate-50 rounded border border-slate-300 outline-none focus:outline-none accent-purple-600 cursor-pointer">
							<label for="remember-me" class="ml-3 text-sm font-medium text-slate-500 cursor-pointer select-none">Remember me</label>
						</div>
					</div>
					<!-- ========== Remember Me Checkbox ========== -->

					<button class="w-full text-slate-100 bg-purple-600 rounded p-2.5 hover:bg-purple-700 focus:ring focus:ring-purple-400"  name="submit" type="submit">Sign In</button>
					
				</div>

				<div class="flex justify-center w-full mt-4">
					<a class="space-x-4 text-slate-900 text-center px-4 py-2 hover:text-purple-600 hover:underline underline-offset-4" href="../register">Sign Up</a>
				</div>

			</div>
		</section>

	</form>
</body>

</html>