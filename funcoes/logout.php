<?php

session_start();
session_destroy();
header("location:/bilheteria/index.php");
