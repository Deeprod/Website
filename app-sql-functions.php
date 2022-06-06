<?php 

function Nb_to_Month($NbM) 
{
  if ($NbM == "12") { return "December"; 	}
  if ($NbM == "11") { return "November"; 	}
  if ($NbM == "10") { return "October"; 	}
  if ($NbM == "09") { return "September"; 	}
  if ($NbM == "08") { return "August"; 		}		
  if ($NbM == "07") { return "July"; 		}
  if ($NbM == "06") { return "June"; 		}
  if ($NbM == "05") { return "May"; 		}
  if ($NbM == "04") { return "April"; 		}
  if ($NbM == "03") { return "March"; 		}
  if ($NbM == "02") { return "February"; 	}
  if ($NbM == "01") { return "January"; 	}
  else { return "Watev"; }
}

function UpCaseFirstWords($Text) 
{
	//ucwords() - converts the first character of each word in a string to uppercase
	//strtoupper() - converts a string to uppercase
	//strtolower() - converts a string to lowercase

	return ucwords(strtolower($Text));
}

function RatingStyle($x) {

	if ($x == "11") { return "bg-lblue"; 	}
	if ($x == "10") { return "bg-pink"; 	}
	if ($x == "9")  { return "bg-nine"; 	}
	if ($x == "8")  { return "bg-eight"; 	}
	if ($x == "7")  { return "bg-seven"; 	}
	if ($x == "6")  { return "bg-six"; 	    }
	if ($x == "5")  { return "bg-five"; 	}
	if ($x == "4")  { return "bg-five"; 	}
	if ($x == "3")  { return "bg-five"; 	}
	if ($x == "2")  { return "bg-five"; 	}
	else            { return "bg-zero";     }

}

function NoRating($x) {
	
	if ($x == "") { return "-"; }
	else { return $x; }

}

function FlagToStyle($x) {
	
	if ($x == "T") { return "bg-success"; 	}
	if ($x == "A") { return "bg-danger"; 	}
	if ($x == "S") { return "bg-seven"; 	}
	if ($x == "W") { return "bg-nine"; 		}
	else { return "bg-zero"; }

}

?>