<?php
function InitGame () : void
{
	for( $i = 0; $i < 6 ; $i++)
	{
		for( $j = 0 ; $j < 7 ; $j++)
		{
			$_SESSION['board'][$i][$j] = 2;
		}
	}
	$_SESSION['currentPlayer'] = $_SESSION['player1'];
}


function horizontal($i , $j) : bool
{
	
	$cpt = 1;
	
	$column = $j;
	while($column > 0 && $i>=0  &&  $_SESSION['board'][$i][$j] == $_SESSION['board'][$i][$column-1])
	{
		++$cpt;
		--$column;
	}
	$column = $j;
	while($column < 6 && $i>=0 && $_SESSION['board'][$i][$j] == $_SESSION['board'][$i][$column+1])
	{
		++$cpt;
		++$column;
	}
	
	return $cpt >= 4;
}

function vertical($i , $j) : bool  
{
	$cpt = 1;
	
	$line = $i;
	while($line >0   && $i>=0&& $_SESSION['board'][$i][$j] == $_SESSION['board'][$line-1][$j])
	{
		++$cpt;
		--$line;
	}
	
	$line = $i;
	while($line < 5  && $i>=0&& $line >=0 && $_SESSION['board'][$i][$j] == $_SESSION['board'][$line+1][$j])
	{
		++$cpt;
		++$line;
	}
	return $cpt >= 4;
}

function diagonal1($i , $j) : bool
{
	$cpt = 1;
	
	$line = $i;
	$column = $j;
	while($line >0 && $i>=0  && $column >0 &&  $line < 5 && $column < 6  && $_SESSION['board'][$i][$j] == $_SESSION['board'][$line-1][$column+1])
	{
		++$cpt;
		--$line;
		++$column;
	}
	
	$line = $i;
	$column = $j;
	while($line >=0 && $i>=0 && $column >0 &&  $line < 5 && $column < 6  && $_SESSION['board'][$i][$j] == $_SESSION['board'][$line+1][$column-1])
	{
		++$cpt;
		++$line;
		--$column;
	}
	
	return $cpt >= 4;
}

function diagonal2($i , $j) : bool
{
	$cpt = 1;
	
	$line = $i;
	$column = $j;
	while($line >0 && $i>=0 && $column >0 &&  $line < 5 && $column < 6  && $_SESSION['board'][$i][$j] == $_SESSION['board'][$line-1][$column-1])
	{
		++$cpt;
		--$line;
		--$column;
	}
	
	$line = $i;
	$column = $j;
	while($line >=0  && $i>=0 && $column >=0 &&  $line < 5 && $column < 6  && $_SESSION['board'][$i][$j] == $_SESSION['board'][$line+1][$column+1])
	{
		++$cpt;
		++$line;
		++$column;
	}
	
	return $cpt >= 4;
}

function YouWin($i , $j) : bool
{
	if(horizontal($i , $j) ||vertical($i , $j) || diagonal1($i , $j) || diagonal2($i , $j))
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

function dropPiece($column) 
{

  $board = $_SESSION['board'];
  $player = $_SESSION['currentPlayer'];
 
  if($player == $_SESSION['player1'])
  {
	  if($_SESSION['color1'] == 'Red')
	  {
		  $piece = 3;
	  }
	  else
	  {
		  $piece = 4;
	  }
  }
  else  if($player == $_SESSION['player2'])
  {
	  if($_SESSION['color2'] == 'Red')
	  {
		  $piece = 3;
	  }
	  else
	  {
		  $piece = 4;
	  }
  }
  

  if ($board[0][$column] != 2) 
  {
    echo "<span class = 'colonnePleine'>The column is full. Choose another column.</span><br>";
    return -1;
  }
  else
  { 
	$line = 0;
    while ($line < 6 && $board[$line][$column] == 2) 
	{
       ++$line;
    } 
	--$line;
	
    $board[$line][$column] = $piece;	
	
	$_SESSION['board'] = $board;
	$_SESSION['currentPlayer'] = ($player == $_SESSION['player1']) ? $_SESSION['player2'] : $_SESSION['player1'];
	
	return $line;
	  
  }
}

function gameOver() : bool
{
	for($j=0; $j < 7 ; ++$j)
	{
		if( $_SESSION['board'][0][$j] == 2 )
		{
			return false;
		}
	}	
	return true;
}


?>