<?php
use yii\helpers\Url;

?>

 <div class="col-md-<?=$options->size_md?> col-sm-<?=$options->size_sm?> col-xs-<?=$options->size_xs?>" style=" padding: 5px;">
 			

 			   				
               <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>">
				  <?php if ($prod->price_promo != 0){?>
 			  <span class="textimg text-danger"><span style="text-decoration: line-through; "><?=$prod->price?> грн</span><span class="text-success"> <?=$prod->price_promo?> грн</span></span>
 			<?php  } else {?>
 			  <span class="textimg text-success"><?=$prod->price?> грн</span>
 			<?php  }?>

				<p class="prod-name"><?=$prod->name?></p>
               <img class="qqq img-thumbnail" src="<?= '/web/'.$prod->photo;?>" style="width: 100%;"/>
               </a>
              
                   <a href="#" style="width: 100%; position: inline-block;" data-id="<?= $prod->id?>" class="btn btn-danger add-to-cart cart">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            В корзину
          </a>
          </div>