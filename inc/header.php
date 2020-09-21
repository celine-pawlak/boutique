<header>
    <?php        
        if(Session::getInstance()->hasFlashes())
            {
                foreach(Session::getInstance()->getFlashes() as $type => $message)
                    {
                        ?>
                        <section class="alert-<?= $type ?>">
                            <?= $message ?>
                        </section>
                        <?php
                    }
            }        
    ?>
</header>