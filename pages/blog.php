<?php
require "header.php";
require "../fonctions/fonctions_articles_blog.php";
require "../fonctions/fonctions_images.php";

@$id_article = htmlspecialchars($_POST["id_article"]);

// var_dump($id_article);


$recup_des_articles = recup_all_article_blog();
$recup_pictures = recup_all_picture_article($id_article);

// var_dump($recup_des_articles);
?>
 
<!-- <h4 class="titre_blog"> Le jardin vivrier </h4>

    <div class="row mr-0 mx-0 row_blog">
   
   <?php foreach ($recup_des_articles as $row) { ?>


   <div class="col-lg-3 col-md-6 col-12">
       <div class=" corps_card">
           <div class=" blog_index">
           <?php $picture = recup_picture_article(@$row->id_article);?>
           <div class="zoom">
           <a href="article.php?id_article=<?php echo $row->id_article ?>&id=<?php echo $row->id_category_article?>"><img src="../uploads/<?php echo @$picture->title_picture_article ?>" alt=""><i class="far fa-arrow-alt-circle-right"></i></a>
           </div>
           <div class="blog_desc">
               <h5 class="blog_title"><?php echo $row->title_article ?></h5>
               <p class="blog_text"><?php echo frdate($row->create_article); ?></p>
               </div>
              
           </div>

       </div>
   </div>
   <?php } ?>
   </div> -->

   <div class="row mr-0 mx-0 row_blog">
   
   <?php foreach ($recup_des_articles as $row) { ?>


   <div class="col-lg-3 col-md-6 col-12">
  
   <section class="grid">
  
  <div class="item">
    <div class="image">
    <?php $picture = recup_picture_article(@$row->id_article);?> 
      <a href="article.php?id_article=<?php echo $row->id_article ?>&id=<?php echo $row->id_category_article?>">
      <img src="../uploads/<?php echo @$picture->title_picture_article ?>" alt="">
      </a>
    </div>
    <div class="text">
      <figcaption> 
      <?php $picture = recup_picture_article(@$row->id_article);?> 
        <a href="article.php?id_article=<?php echo $row->id_article ?>&id=<?php echo $row->id_category_article?>" class="author">
        <img src="../uploads/<?php echo @$picture->title_picture_article ?>" alt="">
        </a>
        <h3><a href=""><?php echo $row->title_article ?></a></h3>
        <p><?php echo $row->short_article?></p>
        <p class="blog_text"><?php echo frdate($row->create_article); ?></p>
        
      </figcaption>
    </div>
  </div>
  
</section>
</div>
<?php } ?>
  </div>
