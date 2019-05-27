<?php session_start(); if(empty($_SESSION['id_control'])){ header('location:log'); }
else {header('location:main');} ?>