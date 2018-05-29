<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, links, icons">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>
			GSB - Galaxy Swiss Bourdin
		</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/default.css">
        <script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
    </head>
        <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6 index">
                    <h1>Galaxy Swiss bourdin</h1>
                    <img src="css/image/gsb.png" alt="GSB" title="GSB">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 index">
                    <form action="php/connexion.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="login" placeholder="Login" name="login" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pwd" placeholder="Mot de passe" name="pwd" /><img id="voir" class="imgPwd" src="css/image/voir.png" alt="imgPwd" title="imgPwd"></img>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Se connecter" />
                        
                    </form>
                </div>
            </div>
        </div>
        <script>
            i = 0;
            $('#voir').on('click',function(){
                i++;
                if(i%2 == 0) {
                    $('#pwd').attr('type','password');
                    $('#voir').attr('src', 'css/image/voir.png');
                } else {
                    $('#pwd').attr('type','text');
                    $('#voir').attr('src', 'css/image/non_voir.png');
                }
            });
        </script>
    </body>
</html>