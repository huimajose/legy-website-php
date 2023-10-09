<?php
require('config/db.php');

// Busque os banners do banco de dados usando a função DB::buscarBanners()
// Criar uma instância da classe DB
$db = new DB();



$banners = DB::buscarBanners();

?>

<section class="slider_section">
    <div id="carouselExampleIndicators" class="carousel slide vert" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($banners); $i++): ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? 'class="active"' : ''; ?>></li>
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($banners as $i => $banner): ?>
                <div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
                    <div class="slider_box">
                        <!-- Defina a imagem como plano de fundo usando CSS -->
                        <img class="slider_image" src="legy/<?php echo $banner['nome']; ?>" alt="Banner Image" />


                        <div class="fixed_company-detail">
                            <p>
                            <?php echo $banner['descricao']; ?>
                            </p>
                        </div>
                        <div class="slider-detail">
                            <div class="slider_detail-heading">
                                <h2>
                                 
                                </h2>
                                <h1>
                                    <?php //echo $banner['descricao']; ?>
                                </h1>
                            </div>
                            <div class="slider_detail-text">
                                <p>
                                   
                                </p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Proximo</span>
        </a>
    </div>
</section>
