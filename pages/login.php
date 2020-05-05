<?php 
include 'includes/config.php';

if(isset($_SESSION['playername']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
	exit;
}

if(isset($_POST['pname']) && isset($_POST['ppass']))
{
	if(!isset($_SESSION['playername']))
	{
		$query = $con->prepare("SELECT `admin`, `nick`, `uid` from `users` where `nick` = ? and `password` = ?");
		$query->execute(array($_POST['pname'], strtoupper(hash("whirlpool", $_POST['ppass']))));
		if($query->rowCount() > 0)
		{
			$data = $query->fetch();
			
			$_SESSION['playername'] = $data['nick'];
			$_SESSION['playeradmin'] = $data['admin'];
            $_SESSION['uid'] = $data['uid'];
            $gData['uid'] = $data['uid'];
			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
			exit;
			
			
		}
		else
		{
			$err = 'Wrong username or password';
		}
	}
}
 
include 'includes/header.php';
?>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
									</div>
									<form class="user" action="login.php" method="POST">

                                    <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="pname" name="pname" class="form-control form-control-user" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="ppass" name="ppass" class="form-control form-control-user" placeholder="Password">
                                    </div>
                                    <?php if(isset($err)): ?>
                                    <b class="help-block" style="color: red;"><?=$err?></b>
                                    <?php endif; ?>

                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>	

<?php
include 'includes/footer.php'; 
?>