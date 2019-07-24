

<div class="col-md-3 col-sm-4 col-xs-12">
    <aside class="sidebar-left sidebar-shop">
        <?php include('catsearch-body-standard.php'); ?>
        <!-- End Widget -->
        <div class="widget widget-category">
            <h2 class="title18 title-widget font-bold">Categories de produits</h2>
            <ul class="list-none wg-list-cat">
                <?php
                if(!empty($this->tree)) :
                $catalog = $this->tree;
                foreach ($catalog as $item => $catnode):
                    $manager = \Aimeos\MShop\Factory::createManager( $this->context, 'catalog' );
                    //$manager2 = \Aimeos\MShop\Factory::createManager( $this->context, 'product' );
                    $tree=$manager->getTree($catnode->getId(),[],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();
                    $nbre = collect($tree)->count();

                    $url = route('agri_categories', ["id"=>$catnode->getId() , "code"=>$catnode->getCode(), "f_cat" => $catnode->getId(), "f_param" => "liste" ]);
                    $catItem = $manager->getItem($catnode->getId(),['media']);
                    $icon = collect($catItem->getRefItems("media"))->first()->getUrl();
                   // dd($icon);
                ?>

                <li><img src="<?= asset($icon) ; ?>" alt="" class="">  <a href="<?= $url ?>"><?= $catnode->getLabel() ;?></a><span class="color"><?= $nbre ?></span></li>
            <?php endforeach;
            else:
                endif;
            ?>

            </ul>
        </div>
        <!-- ENd Widget -->

        <!-- End Filter Price -->

        <div class="widget widget-tags" id="tags">
            <h2 class="title18 title-widget font-bold">Recherche par Tags</h2>
            <ul class="wg-list-tabs list-inline-block">
                <li><a href="<?=route('recherche', ['f_search' => "Tomates" , 'f_param' => 'nombre' ] ); ?>">Tomates</a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Banane", 'f_param' => 'nombre' ] ); ?>">Banane</a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Sorgho", 'f_param' => 'nombre' ] ); ?>">Sorgho</a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Organique", 'f_param' => 'nombre' ] ); ?>">Organique </a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Vert", 'f_param' => 'nombre']  ); ?>">Vert</a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Sec", 'f_param' => 'nombre']  ); ?>">Sec</a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Légumes", 'f_param' => 'nombre']  ); ?>">Légumes</a></li>
                <li><a href="<?=route('recherche', ['f_search' => "Naturel", 'f_param' => 'nombre']  ); ?>">Naturel </a></li>
            </ul>
        </div>
        <!-- End WIdget -->
    </aside>
</div>

