<?php
$data = json_decode($_POST['data'],1);
$name = $data['name'] ?? '';
$desc = $data['description'] ?? '';

