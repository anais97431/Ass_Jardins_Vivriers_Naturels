

<?php  

$id_category_page = htmlspecialchars(@$_GET["id"]);


$categoryMenu = select_category_navbar($id_category_page);

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav_navbar">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav justify-content-center lien_ul_navbar">
    
    <?php  foreach ($categoryMenu as $row) { ?> 
<?php $categoryPage = select_category_pages($id_category_page); ?>
<?php //var_dump($categoryPage);?>
   <?php foreach ($categoryPage as $row1) { ?>  
      <li class="nav-item lien_li_navbar">
      <?php //if($categoryPage->id_category_page == )?>
           <a class="nav-link lien_navbar" href="<?php echo @$row1->url_page.".php" ?>?id=<?php echo @$row->id_category_page ?>&id_page=<?php echo @$row1->id_page?>"><?php echo @$row1->title_page ?></a>
            <?php
                 } ?> 
               
      </li>
      <?php } ?>
     
    </ul>
  </div>
</nav>
  

