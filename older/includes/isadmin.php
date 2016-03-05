<?php
session_start();
if($_SESSION["isadmin"]=="0"||$_SESSION["isadmin"]=="")
{exit();}
?>