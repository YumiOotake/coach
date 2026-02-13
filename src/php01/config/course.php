<?php

$company = htmlspecialchars($_GET['company'], ENT_QUOTES, 'utf-8');
echo '会社名は' . $company . 'ですね';
