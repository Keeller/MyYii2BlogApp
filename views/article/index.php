<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'My Blog application';
?>


                <?php foreach ($articles as $article):?>

                <article class="post" id="PostHead">
                    <div class="post-thumb" >
                        <a href="javascript:void();" onclick="ViewPost(<?=$article->id?>)"><img src="<?php echo $article->getImage(); ?>" alt=""></a>

                        <a href="javascript:void();" onclick="ViewPost(<?=$article->id?>)" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center" >View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="javascript:void();"> <?php echo $article->category->title; ?></a></h6>

                            <h1 class="entry-title"><a href="javascript:void();" onclick="ViewPost(<?=$article->id?>)"><?php echo $article->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                                <?php echo $article->description; ?>
                            </p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="javascript:void();" onclick="ViewPost(<?=$article->id?>)" class="more-link">Continue Reading</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">By <a href="#">Rubel</a> On <?php echo $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?php echo (int)$article->viewed; ?>
                            </ul>
                        </div>
                    </div>


                    <?php endforeach; ?>


                <?php try {
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                } catch (Exception $e) {
                } ?>
            </article>