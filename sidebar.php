<?php
include_once("dreamBoard.php");
include_once("images.php");
class Sidebar{ 
var $dreamBoards;
var $actual;//dreamBoard Actual
var $user;
function __construct($page) {

    $this->user=$page->user;

        $ssql = "SELECT * FROM db_boards WHERE id_user='".$this->user->id."'";
        $rs=Config::sql($ssql);
        if (!$rs){
                echo mysql_error();
        }else{
	$i=0;
        while($dB=mysql_fetch_assoc($rs)) {
		$this->dreamBoards[$i]=new DreamBoard($dB);
        }//end while

}
}

function show_dreamBoards(){
foreach ($this->dreamBoards as $board){
 echo "<h2>$board->title</h2>";
}
}


}
?>
