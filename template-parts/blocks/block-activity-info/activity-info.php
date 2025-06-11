<?php


$classes = ['activity-info'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';


?>

<?php
// $eventDay = get_the_terms_orderby_termorder('event_date');
$eventDay = get_the_terms(get_the_ID(), 'event_date');
// $totalDays = count($eventDay);
$totalDays = is_array($eventDay) ? count($eventDay) : 0;

$availableDays = wp_count_terms(array('taxonomy' => 'event_date'));
// $eventScene = get_the_terms($post->ID, 'event_scene');
// $eventStyle = get_the_terms($post->ID, 'event_style');
// Ricardo fix -->
$eventScene = get_the_terms(get_the_ID(), 'event_scene');
$eventStyle = get_the_terms(get_the_ID(), 'event_style');
$i = 0;
?>

<div class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

    <div class="contentInfo">

        <?php if ($eventDay) { ?>

            <div class="time">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="34" height="32" version="1.1" viewBox="0 0 100 100">
                        <path d="m85.398 11.102h-8.3008v-3c0-2.5-2.1016-4.6016-4.6016-4.6016h-3.3008c-2.5 0-4.6016 2.1016-4.6016 4.6016v3h-29.293v-3c0-2.5-2.1016-4.6016-4.6016-4.6016h-3.3008c-2.5 0-4.6016 2.1016-4.6016 4.6016v3h-8.1992c-6.6992 0-12.102 5.3984-12.102 12.102v61.199c0 6.6992 5.3984 12.102 12.102 12.102h46.898c5.6992 0 11.102-2.1992 15.199-6.3008l14.5-14.5c4.1016-4.1016 6.3008-9.5 6.3008-15.199v-37.301c0.003906-6.6016-5.3945-12.102-12.098-12.102zm-75.398 73.297v-48.898h80v24.398h-19.301c-5.3984 0-9.8008 4.3984-9.8008 9.8008v19.301h-46.301c-2.4961 0-4.5977-2.1016-4.5977-4.6016zm61.398 0.5c-0.89844 0.89844-1.8984 1.6016-3 2.1992v-17.398c0-1.3008 1-2.3008 2.3008-2.3008h17.398c-0.60156 1.1016-1.3008 2.1016-2.1992 3z" />
                    </svg>
                </div>
                <h3>
                    <?php if ($totalDays < $availableDays) {
                        foreach ($eventDay as $day) {
                            $i++;
                            echo ($i > 1 ? ', ' . $day->name : $day->name);
                        }
                    } else {
                        echo __('Tous les soirs', 'utopian');
                    } ?>
                    <?php if (get_field('time', get_the_ID())) { ?>
                        <span>|</span>
                    <?php echo get_field('time', get_the_ID());
                    } ?>
                </h3>
            </div>

        <?php }
        if ($eventStyle[0]->name) { ?>

            <div class="time">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="30" height="30" version="1.1" viewBox="0 0 100 100">
                        <path d="m59.375 42.906v14.188c0 1.293-1.0508 2.3438-2.3438 2.3438h-14.125c-1.293 0-2.3438-1.0508-2.3438-2.3438v-14.188c0-1.293 1.0508-2.3438 2.3438-2.3438h14.188c1.2695 0.035156 2.2812 1.0742 2.2812 2.3438zm-26.766-2.2812h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.188c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.25c-0.035156-1.2695-1.0742-2.2812-2.3438-2.2812zm48.969-25h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.203c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.25c-0.027344-1.2773-1.0664-2.2969-2.3438-2.2969zm0 25h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.188c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.25c-0.035156-1.2695-1.0742-2.2812-2.3438-2.2812zm0 25h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.203c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.297c0-1.293-1.0508-2.3438-2.3438-2.3438zm-24.484-50h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.203c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.25c-0.027344-1.2773-1.0664-2.2969-2.3438-2.2969zm-24.484 0h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.203c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.25c-0.027344-1.2773-1.0664-2.2969-2.3438-2.2969zm0 50h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.203c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.297c0-1.293-1.0508-2.3438-2.3438-2.3438zm24.484 0h-14.188c-1.293 0-2.3438 1.0508-2.3438 2.3438v14.203c0 1.293 1.0508 2.3438 2.3438 2.3438h14.188c1.293 0 2.3438-1.0508 2.3438-2.3438v-14.297c0-1.293-1.0508-2.3438-2.3438-2.3438z" />
                    </svg>
                </div>
                <h3><?php echo $eventStyle[0]->name ?></h3>
            </div>

        <?php } ?>

        <?php if ($eventScene[0]->name) { ?>

            <div class="location">
                <i class="fa-thin fa-location-dot"></i>
                <h3><?php echo $eventScene[0]->name ?></h3>
            </div>

        <?php } ?>

    </div>

</div>