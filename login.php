<!DOCTYPE html>
<?php require "resources/constants.php";?>
<html>
<head>
    <title>Brown Slackline | Login </title>    
    <?php require $frameworks;?>
    <?php require $resources;?>
</head>
<body>
    <?php require $navbar;?>
    <div id="background-login" class="background absolute-children">
        <div id="login">
            <?php if(loggedIn()) { ?>
                <div id="logged-in" class="well">
                    <h3 class="center">Successfully logged in as "<?php echo username(); ?>"</h3>
                </div>
            <?php } else { ?>
                <form action="authenticate.php" method="post" class="well form-horizontal">    
                    <input name="username" type="text" placeholder="Username"/>
                    <input name="password" type="password" placeholder="Password"/>
                    <button type="submit" class="btn">Login</button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>