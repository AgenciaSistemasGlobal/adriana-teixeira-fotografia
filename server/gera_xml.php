<?php
require_once('Url.class.php');
require_once('Albuns.class.php');
require_once('Servicos.class.php');

$Albuns    = new Albuns();
$Servicos   = new Servicos();

$albuns   = $Albuns->findAll();
$servicos = $Servicos->findAll();

$hoje     = date('Y-m-d');

header("Content-Type: application/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url>
    <loc>https://adrianateixeirafotografia.com.br</loc>
    <lastmod><?php echo $hoje;?></lastmod>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc>https://adrianateixeirafotografia.com.br/sobre</loc>
    <lastmod><?php echo $hoje;?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc>https://adrianateixeirafotografia.com.br/trabalhos-realizados</loc>
    <lastmod><?php echo $hoje;?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <?php
  for ($i=0; $i < count($albuns); $i++) {
    echo "<url>
      <loc>https://adrianateixeirafotografia.com.br/trabalhos-realizados/" . $albuns[$i]['id'] . '-' . URL::removeAcentos($albuns[$i]['titulo'], '_') . "</loc>
      <lastmod>".$hoje."</lastmod>
      <changefreq>daily</changefreq>
      <priority>0.8</priority>
    </url>";
  }
  ?>
  <url>
    <loc>https://adrianateixeirafotografia.com.br/servicos</loc>
    <lastmod><?php echo $hoje;?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <?php
  for ($j=0; $j < count($servicos); $j++) {
    echo "<url>
      <loc>https://adrianateixeirafotografia.com.br/servicos/" . $servicos[$j]['id'] . '-' . URL::removeAcentos($servicos[$j]['nome'], '_') . "</loc>
      <lastmod>".$hoje."</lastmod>
      <changefreq>daily</changefreq>
      <priority>0.8</priority>
    </url>";
  }
  ?>
  <url>
    <loc>https://adrianateixeirafotografia.com.br/citacoes</loc>
    <lastmod><?php echo $hoje;?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc>https://adrianateixeirafotografia.com.br/contato</loc>
    <lastmod><?php echo $hoje;?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
</urlset>