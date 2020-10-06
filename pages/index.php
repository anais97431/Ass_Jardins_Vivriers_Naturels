<?php
require "header.php";
require "bandeau_entete_index.php";
require "../fonctions/fonctions_articles_blog.php";
require "../fonctions/fonctions_images.php";




$recup_des_articles = recup_articles();




?>



<!------------------Div avec rotation sur l'axe y--------------------------->


<!-- <div class="row mr-0 mx-0 index-flip">
  <div class="col-lg-3 col-md-6 col-12">
    <div class="scene">
      <div class="flip">
        <div class="avant">
          <p>Groupement d'achat </p>
          <p><i class="fas fa-reply"></i></p>
        </div>
        <div class="arriere">
          <p>Pour en savoir plus c'est par ici !</p>
          <button class="envoiPage" type="submit" name="envoiProduct" value="Voir le produit" aria-expanded="false"><a href="emplettes_solidaires.php">J'y vais !
            </a></button>
        </div>

      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-12">
    <div class="scene">
      <div class="flip">
        <div class="avant">
          <p>Envie d'une activité en famille ? </p>
          <p><i class="fas fa-reply"></i></p>
        </div>
        <div class="arriere">
          <p>Nos activités pour petits et grands !</p>
          <button class="envoiPage" type="submit" name="envoiProduct" value="Voir le produit" aria-expanded="false"><a href="les_cherubins.php"> Super on fonce !
            </a></button>
        </div>

      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-12">
    <div class="scene">
      <div class="flip">
        <div class="avant">
          <p>Les grands aussi on le droit de se former !</p>
          <p><i class="fas fa-reply"></i></p>
        </div>
        <div class="arriere">
          <p>Nos ateliers et formations !</p>
          <button class="envoiPage" type="submit" name="envoiProduct" value="Voir le produit" aria-expanded="false"><a href="">Top c'est pour moi !
            </a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-12">
    <div class="scene">
      <div class="flip">
        <div class="avant">
          <p>Devenir bénévole </p>
          <p><i class="fas fa-reply"></i></p>
        </div>
        <div class="arriere">
          <p>Tout le monde à le droit de participer !</p>
          <button class="envoiPage" type="submit" name="envoiProduct" value="Voir le produit" aria-expanded="false"><a href="benevoles_chantiers.php"> Chouette !
            </a></button>
        </div>

      </div>
    </div>
  </div>
</div>  -->

<div class="row mr-0 mx-0 bandeau_text_corps">
  <div class="col-lg-2 col-md-2 col-12">
  </div>
  <div class="col-lg-4 col-md-4 col-12">
    <div class="text_entete">
      <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3><br>
      <p>Libero doloribus tenetur vel est eligendi non repudiandae voluptas deserunt vitae nulla quis aspernatur magnam, quisquam corporis quidem provident, eveniet quibusdam enim!
        Libero doloribus tenetur vel est eligendi non repudiandae voluptas deserunt vitae nulla quis aspernatur magnam, quisquam corporis quidem provident, eveniet quibusdam enim!
      </p><br>
      <button class="leVivrier" type="submit" value="" aria-expanded="false"><a href="">Le vivrier c'est quoi ?</a></button>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-12">
    <div class="bandeau_index_corps_feuilles">
      <img class="img_petale" src="../photos/icons/feuilles-blanches.png" alt="petites-feuilles">
    </div>
    <div class="bandeau_index_corps">

      <img class="img_bourdon" src="../photos/jvb_photos/bourdon-sur-pissenlit-avril-2018.jpg" alt="bourdon-sur-pissenlit">


    </div>
  </div>

  <div class="col-lg-2 col-md-2 col-12">
  </div>
</div>

<div class="row mr-0 mx-0 bandeau_text_corps2">
  <div class="col-lg-2 col-md-2 col-12">
  </div>

  <div class="col-lg-4 col-md-4 col-12">
    <div class="bandeau_index_corps_feuilles2">
      <img class="img_petale" src="../photos/icons/feuilles-jaunes.png" alt="petites-feuilles">
    </div>
    <div class="bandeau_index_corps2">

      <img class="img_fleurs" src="../photos/images_retouche/jardin_ serre.jpg" alt="fleurs-roses">


    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-12">
    <div class="text_entete2">
      <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3><br>
      <p>Libero doloribus tenetur vel est eligendi non repudiandae voluptas deserunt vitae nulla quis aspernatur magnam, quisquam corporis quidem provident, eveniet quibusdam enim!
        Libero doloribus tenetur vel est eligendi non repudiandae voluptas deserunt vitae nulla quis aspernatur magnam, quisquam corporis quidem provident, eveniet quibusdam enim!
      </p><br>
      <button class="seFaireDuBien" type="submit" value="" aria-expanded="false"><a href="">Se faire du bien</a></button>
    </div>
  </div>


  <div class="col-lg-2 col-md-2 col-12">
  </div>
</div>
<div class="row mr-0 mx-0 bandeau_text_corps3">
  <div class="col-lg-2 col-md-2 col-12">
  </div>
  <div class="col-lg-4 col-md-4 col-12">
    <div class="text_entete3">
      <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3><br>
      <p>Libero doloribus tenetur vel est eligendi non repudiandae voluptas deserunt vitae nulla quis aspernatur magnam, quisquam corporis quidem provident, eveniet quibusdam enim!
        Libero doloribus tenetur vel est eligendi non repudiandae voluptas deserunt vitae nulla quis aspernatur magnam, quisquam corporis quidem provident, eveniet quibusdam enim!
      </p><br>
      <button class="quiFaitDuBien" type="submit" value="" aria-expanded="false"><a href="">Qui vous fait du bien ?</a></button>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-12">
    <div class="bandeau_index_corps_feuilles3">
      <img class="img_petale" src="../photos/icons/feuilles-blanches.png" alt="petites-feuilles">
    </div>
    <div class="bandeau_index_corps3">

      <img class="img_plantation" src="../photos/jvb_photos/Plantation-arbres-fruitiers-Novembre-2016_1.JPG" alt="plantation">


    </div>
  </div>

  <div class="col-lg-2 col-md-2 col-12">
  </div>
</div>


<div class="container titre_ligne">
  <div class="title">
    <h2><span class="actualites">Les actualités</span>
      <span class="dubien"> qui font du bien </span></h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores aliquid repellendus aspernatur fuga amet quos omnis, minima natus.</p>
  </div>
</div>


<!-- <div id="galery">
    <div class="carousel">
      <div class="carousel__container">
        <div class="carousel__item"> -->

<!-- <div class="suiv"><span><i class="fas fa-chevron-right"></span></div> -->
<!-- <div class="prec"><span><i class="fas fa-chevron-left"></span></div> -->
<!-- <div class="prec"><svg width="10em" height="10em" viewBox="0 0 16 16" class="bi bi-chevron-compact-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z" />
      </svg> </div> -->
<!-- <?php foreach ($recup_des_articles as $row) { ?>
            <div class="item">
              <div class="item__image">
                <?php $picture = recup_picture_article(@$row->id_article); ?>
                <a href="article.php?id_article=<?php echo $row->id_article ?>&id=<?php echo $row->id_category_article ?>"><img class="photo" width="500" data-src="../uploads/<?php echo @$picture->title_picture_article ?>" alt="blog_jardin"></a>
              </div>
              <div class="item__body">
                
                <div class="text-article">
                <div class="item__date">
                  <p class="card-text"><?php echo frdate($row->create_article); ?></p>
                </div>-->
<!-- <img class="feuille" width="50" height="80" src="../photos/icons/feuilles-blanches.png" alt="feuille_article"> -->


<!-- <h5 class="card-title"><?php echo $row->title_article ?></h5>

                </div>


              </div>
            </div>

          <?php } ?>
        </div>  -->
<!-- <div class="suiv"><svg width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
      </svg></div> -->
<!-- </div>
    </div>
  </div> -->

<div class="container glide__container">

  <div class="glide">
    <div class="glide__track" data-glide-el="track">

      <ul class="glide__slides">
        <?php foreach ($recup_des_articles as $row) { ?>
          <li class="glide__slide">
            <div class="items">

              <div class="item__image">
                <?php $picture = recup_picture_article(@$row->id_article); ?>
                <a href="article.php?id_article=<?php echo $row->id_article ?>&id=<?php echo $row->id_category_article ?>"><img class="photo" data-src="../uploads/<?php echo @$picture->title_picture_article ?>" alt="blog_jardin"></a>

              </div>


              <a href="article.php?id_article=<?php echo $row->id_article ?>&id=<?php echo $row->id_category_article ?>">
                <div class="item__text">
                  <div class="col-4">
                    <img class="feuille" width="50" height="80" src="../photos/icons/feuille-blanche.png" alt="feuille_article">
                  </div>
                  <div class="col-8">

                    <p class="card-text"><?php echo frdate($row->create_article); ?></p>



                    <h5 class="card-title"><?php echo $row->title_article ?></h5>
                  </div>
                </div>
              </a>
            </div>




          </li>
        <?php } ?>
        <!-- <li class="glide__slide">1</li>
          <li class="glide__slide">2</li> -->
      </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">&#x27E8;</button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">&rsaquo;</button>
    </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@15.1.1/dist/lazyload.min.js">
</script>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

<script>
  const config = {
    type: "carousel",
    startAt: 0,
    perView: 2,

    breakpoints: {
      1199: {
        perView: 1
      }
    }
  };
  new Glide('.glide', config).mount()
</script>
<script>
  const myLazyLoad = new LazyLoad({
    elements_selector: ".photo"
  });
</script>


<?php require "footer.php"; ?>