<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="action.css">	 
  <title>Results</title>
</head>
<body>
	<?php 
	$BEGIN_MS = microtime(true);
	date_default_timezone_set("Europe/Moscow");
	if (array_key_exists("offset", $_GET)) {
		$OFFSET = $_GET["offset"];
	} else $OFFSET = 0;
	if (isset($_GET["x"])){
		$x = $_GET["x"];
	}
	if (isset($_GET["Y"])){
		$Y = $_GET['Y']; 
	}
	if(isset($_GET['buttonvalue'])){
		$R=$_GET['buttonvalue'];
	}
	?>
 <div id="Wrapper">
 <div id="header">Лабораторная работа №1. Щербаков В.Ю. P3214. <span class="variant"> Вариант 214023.</span></div>
 <div id="leftsidebar"></div>
 <div id="Top">
 РЕЗУЛЬТАТЫ ВЫЧИСЛЕНИЙ.
 </div>
 <div id="rightsidebar">
 <span id="dummy2"><img src="graphh.png" alt="Здесь должен быть график" class="graph" onclick="playSound()"></span>
 </div>
 <div id="main">
 Дата: <?= date("d.m.Y, G:i:s", $BEGIN_MS - $OFFSET / 60 * 3600) ?> GMT+3</br>
 <?php
	if (array_key_exists("x", $_GET) and array_key_exists("Y", $_GET) and array_key_exists("buttonvalue", $_GET)
	and (float)$Y >= -3 and (float)$Y <= 3 and ((float)$R == 1 or (float)$R == 1.5 or 
	(float)$R == 2 or (float)$R == 2.5 or (float)$R == 3)){
		echo "<table id=\"result-table\">
		<tr><th>X</th><th>Y</th><th>R</th><th>Попаданиe?</th></tr>";
		$success="";
		foreach ($x as $X){
			if ((string)$X === "-4" or (string)$X === "-3" or (string)$X === "-2" or (string)$X === "-1" 
			or (string)$X === "0" or (string)$X === "1" or (string)$X === "2" or (string)$X === "3" or (string)$X === "4"){
				$success="Не попадание";
				if ($X*$X + $Y*$Y <= $R*$R/4 and $X<=0 and $Y>=0) {
					$success="Попадание";
				}
				if ($X >= 0 and $Y >= 0 and $X + $Y <= $R / 2) {
					$success="Попадание";
				}
				if ($X <= $R and $X >= 0 and $Y <= 0 and $Y >= -$R) {
					$success="Попадание";
				}
				echo "<tr><td>$X</td><td>$Y</td><td>$R</td><td>$success</td></tr>";
			}
			else{
				echo "<tr><td>Некорректное число</td><td>$Y</td><td>$R</td><td>-</td></tr>"; 
			}
		}
			echo "</table>";
	}
	else {
		echo "Введены некорректные значения.";
	}
	?> </br>
Скрипт проработал ровно <?php printf("%2.3f", (microtime(true) - $BEGIN_MS) * 1000) ?> миллисекунд </br>
    <a href="index.html">
        <button class="retry">Попробовать ещё раз!</button>
    </a>
 </div>
 </div>
 <div id="footer">Copyright &copy;ItmoLabs all rights were broken</div>
	
</body>
</html>