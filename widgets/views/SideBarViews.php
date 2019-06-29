<?php use \yii\helpers\Url;?>
<div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">

                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>

                        <?php foreach ($popular as $pop):?>

                        <div class="popular-post">


                            <a href="<?=Url::toRoute(['/site/view','id'=>$pop->id])?>" class="popular-img"><img src="<?php echo $pop->getImage(); ?>" alt="">

                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="#" class="text-uppercase"><?php echo $pop->title; ?></a>
                                <span class="p-date"><?php echo $pop->getDate(); ?></span>

                            </div>
                        </div>
                        <?php endforeach; ?>

                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                        <?php foreach ($resent as $rec): ?>
                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="<?php echo $rec->getImage(); ?>" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase"><?php echo $rec->title; ?></a>
                                    <span class="p-date"><?php echo $rec->getDate();?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </aside>
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Categories</h3>
                        <ul>
                            <?php foreach ($categories as $cat):?>
                            <li>
                                <a href="#"><?php echo $cat->title;?></a>
                                <span class="post-count pull-right"> <?php echo $cat->getCategoryCount();?></span>
                            </li>
                            <?php endforeach; ?>

                        </ul>
                    </aside>
                </div>
            </div>