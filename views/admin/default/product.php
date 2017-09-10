<?php require __DIR__ . '/../header.php'; ?>

    <section class="container clearfix">
        <div class="path">
            <span>
                <a href="/admin">Главная</a>
            </span>
            <span>
                <a href="/admin/<?php echo $page->name; ?>"><?php echo $page->title; ?></a>
            </span>
            <span>
                <?php echo !empty($item->title) ? $item->title . ' - Редактирование ' : 'Добавление '; ?>
            </span>
        </div>
        <main class="wide">
            <h1><?php echo !empty($item->title) ? $item->title . ' - Редактирование ' : 'Добавление '; ?></h1>

            <div class="panel">
                <div id="tabs_wrapper">
                    <div class="sort clearfix">
                        <span data-id="1" class="tabs current"><a class="tabs" id="tab1" href="#">Основные</a></span>
                        <span data-id="2" class="tabs"><a class="tabs" id="tab2" href="#">Характеристики</a></span>
                        <span data-id="3" class="tabs"><a class="tabs active" id="tab3" href="#">Торговые</a></span>
                        <span data-id="4" class="tabs"><a class="tabs" id="tab4" href="#">Изображения</a></span>
                    </div>


                        <div class="tabs con_tab active" id="con_tab1">
                            <?php include __DIR__ . '/tabMain.php'; ?>
                        </div>
                        <div class="tabs con_tab" id="con_tab2">
                            <?php include __DIR__ . '/tabFeatures.php'; ?>
                        </div>
                        <div class="tabs con_tab" id="con_tab3">
                            <?php include __DIR__ . '/tabTrade.php'; ?>
                        </div>


                    <div class="tabs con_tab" id="con_tab4">
                        <?php include __DIR__ . '/tabImages.php'; ?>
                    </div>


                </div>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';
