<?php

$question = "ya";
$answer	 = "yes";
$qs = "[{'{$question}': 'test','answer': 'answer'},{'question': 'test1','answer': 'answer2'}]";
echo $qs;
$qs = json_encode(	$qs);

//print_r(	$qs);

echo "test\""


?>