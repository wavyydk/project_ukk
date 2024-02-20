<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
	<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/login/css/style.css') ?>" rel="stylesheet" type="text/css">
	<style type="text/css">
		img{
    	width: 100%;
		}
		.login {
		height: 1000px;
		width: 100%;
		background-repeat: no-repeat;
		background-size: cover;
		position: relative;
		}
		.login_box {
		width: 1050px;
		height: 600px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		background: #fff;
		border-radius: 10px;
		box-shadow: 1px 4px 22px -8px #0004;
		display: flex;
		overflow: hidden;
		}
		.login_box .left{
		width: 50%;
		height: 100%;
		padding: 25px 25px;

		}
		.login_box .right{
		width: 75%;
		height: 100%;
		}
		.left .top_link a {
		color: #452A5A;
		font-weight: 400;
		}
		.left .top_link{
		height: 20px
		}
		.left .contact{
		display: flex;
		align-items: center;
		justify-content: center;
		align-self: center;
		height: 100%;
		width: 73%;
		margin: auto;
		}
		.left h3{
		text-align: center;
		margin-bottom: 40px;
		}
		.left input {
		border: none;
		width: 80%;
		margin: 15px 0px;
		border-bottom: 1px solid black;
		padding: 7px 9px;
		width: 100%;
		overflow: hidden;
		background: transparent;
		font-weight: 600;
		font-size: 14px;
		}
		.left{
		background: linear-gradient(-45deg, #dcd7e0, #fff);
		}
		.submit {
		border: none;
		padding: 15px 70px;
		border-radius: 8px;
		display: block;
		margin: auto;
		margin-top: 12px;
		background: #ff2222;
		color: #fff;
		font-weight: bold;
		-webkit-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
		-moz-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
		box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
		}
		.right {
		background: url("assets/login/2.gif");
		color: mediumspringgreen;
		position: relative;
		}
		.text {
		color: lightgreen;
		position: relative;
		}

		.right .right-text{
		height: 100%;
		position: relative;
		transform: translate(0%, 45%);
		}
		.right-text h2{
		display: block;
		width: 100%;
		text-align: center;
		font-size: 50px;
		font-weight: 500;
		}
		.right-text h5{
		display: block;	
		width: 100%;
		text-align: center;
		font-size: 19px;
		font-weight: 400;
		}

		.right .right-inductor{
		position: absolute;
		width: 70px;
		height: 7px;
		background: #fff0;
		left: 50%;
		bottom: 70px;
		transform: translate(-50%, 0%);
		}
		.top_link img {
		width: 28px;
		padding-right: 7px;
		margin-top: -3px;
		}

	</style>
</head>
<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="contact">
					<form method="post" action="<?= base_url("proses_register")?>">
					<?php
						if(session()->getFlashdata('pesan')){
							?>
							<div class="alert alert-info">
								<?= session()->getFlashdata('pesan')?>
							</div>
							<?php
						}
						?>
						<input type="text" placeholder="username" name="username">
						<input type="password" placeholder="password" name="password">
						<input type="text" placeholder="nama" name="nama">
						<input type="text" placeholder="E-mail" name="email">
						<input type="id" placeholder="no_telp" name="no_telp">
						<input type="text" placeholder="alamat" name="alamat">
						<button class="submit" type="submit">LOG IN</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
				</div>
			</div>
		</div>
	</section>
	<footer class="py-3 my-4 boder-top my-5">
		<div class="container">
			<p class="col-md-4 mb-0 text-dark">
				&copy; <?= date("d-m-Y") ?> DZIKRI
			</p>
		</div>
	</footer>
</body>
</html>