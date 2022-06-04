<?php

session_start();
session_destroy();

echo "<script>Alert('Sessão terminada!')</script>";
header("Location: ../index.php");