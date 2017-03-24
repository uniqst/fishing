<li>
    <a href="">
        <?= $category['name']?>
        <?php if( isset($category['childs']) ): ?>
            <span class="badge pull-right"><i class="glyphicon glyphicon-plus"></i></span>
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>