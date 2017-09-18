
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!--<link href='//fonts.googleapis.com/css?family=Iceland' rel='stylesheet'>-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>crawl</title>
<link type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />

<!--<link type="text/css" href="styles/style.css" rel="stylesheet" media="all" /> -->

</head>
<body class="container">

<?php
 include_once('simple_html_dom.php');
 if(isset($_POST['search']))
 {
 	
	$target_url = $_POST['url'];

	$html = new simple_html_dom();
	$html->load_file($target_url);


	function forlinks()
	{
		global $html;
		global $target_url;
		if($_POST['option2'] == "links")
		{
		echo "<div class='row'>";
		echo "<div class='col-sm-12'>";
		echo"<table class = 'table'>";
		foreach($html->find('a') as $link){
			if(strpos($link->href , 'http://')!==false || strpos($link->href , 'https://')!==false)
				echo "<tr>"."<td>"."<a href=$link->href>$link->href</a>"."</td>"."</tr>";
		}
		echo "</table";
		}
		echo "</div>";
		echo "</div>";
	}

	function forimages()
	{
		global $html;
		global $target_url;
		if($_POST['option1'] == "image"){
		echo "<div class='row'>";
		echo "<div class='col-sm-12'>";
		foreach($html->find('img') as $link){
				if(strpos($link->src , 'http://')!==false || strpos($link->src , 'https://')!==false){
					echo "<div class='col-sm-3' style ='float:right'><img src=$link->src /></div>";

				}
		}
		echo "</div>";
		echo "</div>";
		}

	}

	
	if(isset($_POST['option2'])){
		forlinks();
	}
	if (isset($_POST['option1'])) {
		forimages();
	}





}


?>
 </div>
</body>
</html>