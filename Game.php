<link href="assets/css/Style.css" rel="stylesheet">
<?php

session_start();

if( !isset($_SESSION['player1']) or !isset($_SESSION['player2'])){
    die('<p style="color:white">Connect you!</p>');
}
include("Functions.php");

	echo "<center><div class='formbouton'>";
	echo("<form method='post'> ");
	for($i= 0; $i < 7  ; ++$i)
	{
		echo("<input name='1' type='submit' value=$i class='bouton'>");
	}
	echo("</form>");
	echo("</div>");

    if(isset($_POST[1]))
	{
      for($j=0 ; $j < 7  ; ++$j)
      {
          if($_POST[1] == $j && !isset($_SESSION['gameOver']))
          {
              $i = dropPiece($j);
			  if(youWin($i , $j))
			  {
				  $_SESSION['gameOver'] = true;
				  
			  }
			  else if(gameOver()==true)
			  {
				$_SESSION['gameDraw'] = true;  
			  }
          }
      }
    }
	echo "<center><div class='puissance4'>";
	foreach($_SESSION['board'] as $column)
	{
		foreach($column as $case)
		{
			if($case == 3)
			{
				echo "<span class = 'rouge'>";
				echo("<img src='assets/img/Red.png' style='width:10%;'></img>");
				echo "</span>";
			}
			else if($case == 4)
			{
				echo "<span class = 'jaune'>";
				echo("<img src='assets/img/Yellow.png' style='width:10%;'></img>");
				echo "</span>";
			}
			else 
			{
				echo("<img src='assets/img/Empty.png' style='width:10%;'></img>");
			}
			echo "   ";
		}
	
	}
	echo "</div></center>";
	
	echo "<center><div class='tour'>";
	if($_SESSION['currentPlayer'] == $_SESSION['player1']  && !isset($_SESSION['gameOver']) && !isset($_SESSION['gameDraw']))
	{
		echo("<p><strong> Current player : </strong><em> " . $_SESSION['player1'] ."</em></p");
	}
	else if(!isset($_SESSION['gameOver']) && !isset($_SESSION['gameDraw']))
	{
		echo("<p><strong> Current player : </strong><em> " . $_SESSION['player2'] ."</em></p");
	}
	else
	{
	   if($_SESSION['currentPlayer'] == $_SESSION['player1']  )
	   {
		echo("<p><strong> Current player : </strong><em> " . $_SESSION['player2'] ."</em></p");
	   }
	   else 
	   {
		echo("<p><strong> Current player : </strong><em> " . $_SESSION['player1'] ."</em></p");
	  }
	}
		
    echo "/<div></center>";
	
	echo "<center>";

	if(isset($_SESSION['gameOver']))
	{
		if($_SESSION['currentPlayer'] == $_SESSION['player1'])
		{
		  echo "<span class='texteVictoire'><br>===========> Victory of player : ". $_SESSION['player2'] . " <===========</span>";
	      $_SESSION['winner'] = $_SESSION['player2'];
		 
	    }
	    else
		{
		  echo "<span class='texteVictoire'><br>===========> Victory of player : ". $_SESSION['player1'] . " <===========</span>";
		  $_SESSION['winner'] = $_SESSION['player1'];
		  
		}
		
	}
	else if(isset($_SESSION['gameDraw']))
	{
	      echo "<span class='texteVictoire'><br>===========> No winner <===========</span>"; 
		  
		  
	}
	
	echo "</center>";

?>
