<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?=SERVER?>_public/css/bp/screen.css" rel="stylesheet" type="text/css" />
<link href="<?=SERVER?>_public/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?=URL?>css/impressao.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?=SERVER?>_public/jquery/jquery.js"></script>
<script type="text/javascript" src="<?=URL?>js/_impressao.js"></script>
<? if(isset($js)){echo '<script type="text/javascript" src="'.URL.'js/'.$js.'.js"></script>';}?>

<title><?=SIGLA?> - <?=$pagina?></title>
</head>

<body>
<div class="header">
		<div class="titulo">
        <h1>ETA Online</h1>
        <h2><? if (isset($titulo)) echo $titulo; ?></h2>
        <h3><? if (isset($subtitulo)) echo $subtitulo; ?></h3>
        </div>
       <div class="logo"><img src="<?=SERVER?>_public/img/logos/empresa/<?=$empresa?>.jpg" /></div>
</div>
<div class="content">
<?=$cont_impressao?>
</div>
</body>
</html>
