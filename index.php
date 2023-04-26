<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="assets/css/Style.css" rel="stylesheet">
  <title>Connect 4</title>
</head>
<body>
  
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <input type="text" name="player1" required>
                        <label for="">Player 1</label>
						
						 <select name="color1">
                           <option value="Red">Red</option>
                          <option value="Yellow">Yellow</option>
                        </select>
						
                    </div>
		
                    <div class="inputbox">
                        <input type="text" name="player2" required>
                        <label for="">Player 2</label>
						
						<select name="color2">
                       <option value="Red">Red</option>
                       <option value="Yellow">Yellow</option>
                    </select>
                    </div>

                    <button type="submit" name="submit">Log in</button>
     
                </form>
            
       
   
    





<?php
include("Functions.php");
if(isset($_POST['submit']))
{  	
	session_start();
	session_destroy();
	session_start();
	
		if(!empty($_POST['player1']) && !empty($_POST['player2']) && $_POST['player1'] != $_POST['player2'] && $_POST['color1'] != $_POST['color2'] )
		{
			$_SESSION['player1'] = htmlspecialchars($_POST['player1']);
			$_SESSION['player2'] = htmlspecialchars($_POST['player2']);
			$_SESSION['color1'] = htmlspecialchars($_POST['color1']);
			$_SESSION['color2'] = htmlspecialchars($_POST['color2']);
			InitGame();
			header("Location: Game.php");
        }
        else 
        {
	      echo "<center><span class='erreur'>The names or colors are not correct.</span></center>"; 
		}
}	

?>
</div>
 </div>
</section>
</body>
</html>
