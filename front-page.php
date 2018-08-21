<?php get_header(); ?>

<section class="header">
    <header>
        <nav>
            <ul class="menu">
                <li><a href="#3">contact</a></li>
                <li><a href="#2">about</a></li>
                <li><a href="#1">portfolio</a></li>
            </ul>
        </nav>
    </header>






    <div class="wrapp">
        <div class="col-md-left">
            <img src="<?php bloginfo('template_url');?>/img/bg.png" alt="background"/>
            <div class="scrll-down">
                <p class="pulsate">
                    <span class="white">scroll</span>
                    <span class="black">down</span>
                </p>
            </div>
        </div>
        <div class="col-md-right">

            <div class="header-title">

                <h1 class="wow fadeIn"  data-wow-delay="0.3s">Madonna Harutyunyan</h1>
                <h3 class="wow fadeIn"  data-wow-delay="0.5s">stylist / tv host</h3>

                <ul class="wow fadeIn" data-wow-duration="1s">
                    <li class="button-1">
                        <div class="eff-1"></div>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="button-1">
                        <div class="eff-1"></div>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="button-1">
                        <div class="eff-1"></div>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="button-1">
                        <div class="eff-1"></div>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>

</section>


<div class="sections">
    <section class="populyar" id="1">
        <div class="populyar-wrapp content">
            <div class="popul-list">

                <div class="title wow fadeIn" data-wow-duration="1s">
                    <h3>portfolio</h3>
                    <span class="bor"></span>
                </div>
                <div class="rotate-text">
                    <p>highlighted</p>
                </div>
                <div class="inline">


                    <div class="populyar-block1">
<!--                        <div class="mt"></div>-->
                        <img src="<?php bloginfo('template_url');?>/img/populyar2.png" alt="img" />
                        <div class="block-title  wow fadeIn" data-wow-duration="1s">




                            <button type="button" class="btn btn-primary tbtn" data-toggle="modal" data-target="#exampleModal">
                                Diana Malenko
                            </button>
                            <p>styling/photoshoot</p>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><img src="<?php echo bloginfo('template_url');?>/img/cancel.svg" alt=""></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php bloginfo('template_url');?>/img/populyar2.png" alt="img" />
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="inline">
                    <div class="populyar-block2 ">
                        <img src="<?php bloginfo('template_url');?>/img/populyar1.png" alt="img" />
                        <div class="block-title  wow fadeIn" data-wow-duration="1s">
                            <!--                            <h4>Emma Hakobyan</h4>-->



                            <button type="button" class="btn btn-primary tbtn" data-toggle="modal" data-target="#exampleModal2">
                                Emma Hakobyan
                            </button>
                            <p>styling/photoshoot</p>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><img src="<?php echo bloginfo('template_url');?>/img/cancel.svg" alt=""></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php bloginfo('template_url');?>/img/populyar1.png" alt="img" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <section class="filterable">
        <div class="content">
            <div class="filter-category">
                <button class="filter-button" data-filter="all">all</button>
                <button class="filter-button" data-filter="styling">styling</button>
                <button class="filter-button" data-filter="shopping">shopping</button>
                <button class="filter-button" data-filter="commercial">commercial</button>
                <button class="filter-button" data-filter="photoshoot">photoshoot</button>
            </div>
            <br/>

            <!--           <div class="gallery-fily">-->
            <div class="filter-content">


                <?php
                $i =0;
                $args = array( 'post_type' => 'post', 'posts_per_page' => 10 );
                $the_query = new WP_Query( $args );
                global $post;


                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                        $galleryArray = get_post_gallery_ids($post->ID);
                        $postcat = get_the_category( $query->post->ID );
                        if($galleryArray) {?>

                            <div class="item gallery_product filter <?php  echo $postcat[0]->name; ?>" id="open-popup">
                                <a href="#gallery<?php echo $i;?>" class="open-gallery-link"> <?php the_post_thumbnail();?></a></p>

                                <div id="gallery<?php echo $i;?>" class="mfp-hide">


                                    <?php
                                    foreach ($galleryArray as $id) { ?>
                                        <div class="slide">
                                            <img src="<?php echo wp_get_attachment_url( $id ); ?>">
                                        </div>
                                    <?php }  ?>

                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="item gallery_product filter <?php  echo $postcat[0]->name; ?>">
                                <a class="image-popup-vertical-fit mfp-zoom-in" href="<?php the_post_thumbnail_url();?>">
                                    <?php the_post_thumbnail();?>
                                </a>
                            </div>
                        <?php }?>



                        <?php $i++;  ?>
                    <?php endwhile; endif;?>


                <!--               </div>-->
            </div>
        </div>


    </section>
    <section class="about" id="2">
        <div class="content">
            <div class="title  wow fadeIn" data-wow-duration="1s">
                <h3 >about</h3>
                <span class="bor"></span>
            </div>

            <div class="about-box1  wow fadeIn" data-wow-duration="1s">
                <p>
                    <span class="big">M</span>orem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchang.
                </p>
            </div>
            <div class="about-box1  wow fadeIn" data-wow-duration="1s">
                <p>
                    <span class="big">S</span>orem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchang.
                </p>
            </div>
        </div>
    </section>
    <section class="parallax">
        <div class="parallax-one" style="background-image: url('<?php bloginfo('template_url');?>/img/parallax.jpg');"></div>
    </section>
    <section class="contact" id="3">
        <div class="contact-wrapp content">

            <div class="contact-list">
                <div class="rotate-text inline">
                    <p class="wow fadeIn" data-wow-duration="1s">get in touch</p>
                </div>
                <div class="title">
                    <h3 class="wow fadeIn" data-wow-duration="1s">contact</h3>
                    <span class="bor"></span>
                </div>

                <div class="marg-list">
                    <div class="form">
                        <?php echo do_shortcode('[contact-form-7 id="53" title="Contact form 1"]'); ?>
                    </div>
                    <div class="bottom-footer">
                        <div class="box">
                            <div class="left-footer wow fadeIn" data-wow-duration="1s">
                                <ul class="wow fadeIn" data-wow-duration="1s">
                                    <li class="button-1">
                                        <div class="eff-1"></div>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="button-1">
                                        <div class="eff-1"></div>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="button-1">
                                        <div class="eff-1"></div>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                    <li class="button-1">
                                        <div class="eff-1"></div>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>


                                </ul>

                                <p>94madonna@gmail.com</p>
                                <!--                            <p>designd by gmj studio</p>-->
                                <p>2018 Madonna Harutyunyan. All rights reserved</p>
                            </div>
                        </div>

                        <div class="box">
                            <div class="right-footer wow fadeIn" data-wow-duration="1s">
                                <div class="insta">
                                    <p>@madonnaharutyunyan</p>
                                </div>

                                <div class="w50 frt">
                                    <a target="_blank" href="//www.instagram.com/madonnaharutyunyan/">
                                        <img src="<?php bloginfo('template_url'); ?>/img/insta/1.jpg"/>
                                    </a>
                                </div>
                                <div class="w50">

                                    <ul class="insta-img">
                                        <li><a target="_blank" href="//www.instagram.com/madonnaharutyunyan/"><img src="<?php bloginfo('template_url'); ?>/img/insta/2.jpg"
                                                                                                                   alt=""/></a></li>
                                        <li><a target="_blank" href="//www.instagram.com/madonnaharutyunyan/"><img src="<?php bloginfo('template_url'); ?>/img/insta/3.jpg"
                                                                                                                   alt=""/></a></li>
                                        <li><a target="_blank" href="//www.instagram.com/madonnaharutyunyan/"><img src="<?php bloginfo('template_url'); ?>/img/insta/4.jpg"
                                                                                                                   alt=""/></a></li>
                                        <li><a target="_blank" href="//www.instagram.com/madonnaharutyunyan/"><img src="<?php bloginfo('template_url'); ?>/img/insta/5.jpg"
                                                                                                                   alt=""/></a></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>

        </div>
    </section>




    <?php get_footer();?>
