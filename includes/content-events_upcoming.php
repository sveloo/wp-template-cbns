<!-- UPCOMING EVENTS -->
<div class="section section-white-gradient-reverse events">
    <div class="container">

        <h2 class="section-title text-center">Upcoming Events</h2>

        <div class="row">


        <?php

            $now = date('Y-m-d H:i:s');

            $args = array(
                'post_type'         => 'events',
                'posts_per_page'    => -1,
                'meta_query'        => array(
                    'relation'      => 'OR',
                    'date_upcoming_clause'   => array(
                        'key'       => 'event_start_date',
                        'compare'   => '>=',
                        'value'     => $now,
                        'type'      => 'DATETIME'
                    ),
                    array(
                        'relation'      => 'AND',
                        'date_started_clause'   => array(
                            'key'       => 'event_start_date',
                            'compare'   => '<=',
                            'value'     => $now,
                            'type'      => 'DATETIME'
                        ),
                        'date_end_clause'   => array(
                            'key'       => 'event_end_date',
                            'compare'   => '>=',
                            'value'     => $now,
                            'type'      => 'DATETIME'
                        ),
                    ),
                ),
                'orderby' => array(
                    'date_started_clause' => 'ASC',
                    'date_end_clause' => 'ASC',
                    'date_upcoming_clause' => 'ASC',
                ),
            );

            $the_query = new WP_Query($args);

        ?>

        <?php if (have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

        <?php $date = strtotime(get_field('event_start_date')); ?>

        <!-- A single event -->
        <div class="col-md-12">
            <div class="card card-horizontal card-events">
                <div class="row">
                    <div class="col-md-2">
                        <div class="date">
                            <ul>
                                <!-- GET ACF DATES -->
                                <?php $the_date = get_field('event_start_date', false, false);
                                    $the_date = new DateTime($the_date);
                                ?>

                                <li class="day"><?php echo $the_date->format('j'); ?></li>
                                <li class="month"><?php echo $the_date->format('F'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content">
                           <p class="category">

                                <!-- GET ACF TAXONOMY -->

                                <?php

                                    $terms = get_field('event_category');

                                    if( $terms ):
                                    $cats = '';
                                    foreach( $terms as $term ):

                                        // echo $term->name . ', ';
                                        $cats .= $term->name . ', ';

                                     endforeach;

                                        echo rtrim($cats, ', ');

                                endif; ?>

                           </p>
                            <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="subtitle">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field('venue'); ?><br />
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $the_date->format('g:i a'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; endif; ?>

     </div>
</div>
</div>