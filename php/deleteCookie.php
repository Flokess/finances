<?php
setcookie('userName', $user[0]['name'], time() - 3600);
header('Location: /index.html');