<!DOCTYPE html>
<!-- templates/layouts/application.php -->
<html>
<head>
    <title><?=$this->e($title, 'full_title')?></title>
    <link rel="stylesheet" type="text/css" href="app.css">
    <?=$this->fetch('layouts/shim')?>
</head>
<body>
<?=$this->fetch('layouts/header')?>
<div class="container">
    <?=$this->section('content')?>
    <?=$this->fetch('layouts/footer')?>
</div>
</body>
</html>
