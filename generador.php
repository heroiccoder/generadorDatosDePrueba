<?php
$nombres = file_get_contents("nombres.txt");
$nombresList = explode("\n", $nombres);
$apellidos = file_get_contents("apellidos.txt");
$apellidosList = explode("\n", $apellidos);
$minFriends = 200;
$maxFriends = 2000;
$friendLists = 22;
$postsListSize = 200;
for($x = 20 ; $x < $friendLists; $x++)
{
	mkdir("".$x);
	$friendListSize = rand($minFriends, $maxFriends);
	$friends = "";
	for($i = 0; $i < $friendListSize; $i++)
	{
		$friends = $friends.$i."|".$nombresList[rand(0, sizeof($nombresList)-1)]." ".$apellidosList[rand(0, sizeof($apellidosList)-1)]."\n";
	}
	$posts = "";
	for($i = 0; $i < $postsListSize; $i++)
	{
		$val= mt_rand(1262055681,1362055681);
		$fecha = date("Y-m-d H:i:s",$val);
		$post = json_decode(file_get_contents("http://ron-swanson-quotes.herokuapp.com/quotes", true));
		$posts = $posts.rand(0, $friendListSize)."|".$post->quote."|".$fecha."\n";
	}
	file_put_contents($x."/amigos.csv", $friends);
	file_put_contents($x."/posts.csv", $posts);
}
?>