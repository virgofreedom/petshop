<!DOCTYPE html >
<!--  Website template by freewebsitetemplates.com  -->
<html>

<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="img/logo.gif">
	
	<!--[if IE 6]>
		<link href="css/ie6.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />  
	<![endif]-->
</head>

<body>	  
			<div id="header">
	           		<a href="index.html" id="logo"><img src="img/logo.gif" width="310" height="114" alt="" title=""></a>
					<ul class="navigation">
						<?=makeLinks($nav1,'<li>','</li>','<li class"active">')?>
					</ul>
			</div>
			
			<div id="body">
				<div id="content">
					<div class="content my-top">