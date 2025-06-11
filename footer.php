<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gutenberg-starter-theme
 */

if (get_field('show_popup_new_popup', 'options') && is_front_page()) {
?>

    <section class="subscribe-popup mainPopup">

        <div class="footer-popup">
            <button class="close-popup"><i class="fa-solid fa-circle-xmark"></i></button>
            <h2 style="font-size: 1.8em;"><?php echo get_field('title_new_popup', 'options'); ?></h2>
            <?php echo get_field('content_new_popup', 'options'); ?>
            <div class="is-layout-flex wp-block-buttons">
                <div class="wp-block-button is-style-fill">
                    <a class="wp-block-button__link wp-element-button" href="<?php echo get_field('button_new_popup', 'options')['url']; ?>" target="<?php echo get_field('button_new_popup', 'options')['target']; ?>"><?php echo get_field('button_new_popup', 'options')['title']; ?></a>
                </div>
            </div>
        </div>

    </section>

<?php } ?>

<section class="subscribe-popup newsletter">

    <div class="footer-popup">
        <button class="close-popup"><i class="fa-solid fa-circle-xmark"></i></button>
        <h2><?php echo get_field('title_form', 'options'); ?></h2>
        <?php echo get_field('form_content', 'options'); ?>
        <?php echo do_shortcode('[contact-form-7 id="' . get_field('form_footer', 'options') . '"]'); ?>
    </div>

</section>

<section class="subscribe-popup application">

    <div class="footer-popup">
        <button class="close-popup"><i class="fa-solid fa-circle-xmark"></i></button>
        <?php echo get_field('popup_content_b', 'options'); ?>
        <?php echo do_shortcode('[contact-form-7 id="' . get_field('contact_form_b', 'options') . '"]'); ?>
    </div>

</section>

<footer id="colophon" class="site-footer">

    <section class="footer">
        <div class="wrap">
            <div class="allFooter">
                <div class="footerTop">
                    <div class="footerTopLeft">
                        <div class="footerLogo">
                            <?php echo get_field('logo', 'options'); ?>
                        </div>
                        <div class="footerTopLeftInfo">
                            <?php echo get_field('content_footer', 'options'); ?>
                        </div>
                    </div>
                    <div class="footerTopRight">
                        <h2>
                            <?php echo get_field('title_form', 'options'); ?>
                        </h2>
                        <?php echo get_field('form_content', 'options'); ?>
                        <?php echo do_shortcode('[contact-form-7 id="' . get_field('form_footer', 'options') . '"]'); ?>
                    </div>
                </div>
                <div class="footerBottom">
                    <div class="footerBottomLeft">
                        <p>
                            <?php echo get_field('copyright_left', 'options'); ?>
                        </p>
                    </div>
                    <div class="footerBottomRight">
                        <p>
                            <?php echo get_field('copyright_right', 'options'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</footer><!-- #colophon -->
</div><!-- #page -->
</div>

<?php wp_footer(); ?>

<script>
    const menuVars = {
        closed: "<?php echo get_field('menu_toggle_closed_text', 'options'); ?>",
        open: "<?php echo get_field('menu_toggle_open_text', 'options'); ?>"
    }

    const subscribeIDs = {
        en: "aW0afaMQnUYWvsn87f9WkKRspvA3Gbr8WJa4CyDW_2fpuMpyAVqutVXg_3d_3d",
        fr: "aW0afaMQnUYWvsn87f9WkKRspvA3Gbr8L1ul7gk4A3Ed7WtK_2fFqKog_3d_3d"
    }

    const currentLanguage = "<?php echo apply_filters('wpml_current_language', NULL); ?>";

    var xmlhttp;

    function loadXMLDoc(url, cfunc) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = cfunc;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }

    function myFunction(inputs) {

        var path = "https://www.solutions-emailing.com/scripts/scripts.aspx?Type=subscribe&subscribeHidden=1&Lan=" + currentLanguage + "&selist=9055";

        path += "&subscribeName=" + inputs[0].value;
        path += "&subscribeNom=" + inputs[1].value;
        path += "&subscribeEmail=" + inputs[2].value;
        path += "&Id=" + subscribeIDs[currentLanguage];

        loadXMLDoc(path, function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
            }
        });
    }

    document.addEventListener('wpcf7submit', function(event) {
        if ('121' == event.detail.contactFormId || '1510' == event.detail.contactFormId) {
            if (event.detail.status != "spam") {
                myFunction(event.detail.inputs);
            }
        }
    }, false);
</script>
<script>
    (function() {
        var s = document.createElement('script');
        var h = document.querySelector('head') || document.body;
        s.src = 'https://acsbapp.com/apps/app/dist/js/app.js';
        s.async = true;
        s.onload = function() {
            acsbJS.init({
                statementLink: '',
                footerHtml: '',
                hideMobile: false,
                hideTrigger: false,
                disableBgProcess: false,
                language: '<?php echo apply_filters('wpml_current_language', NULL); ?>',
                position: 'left',
                leadColor: '#f0c3dc',
                triggerColor: '#f0c3dc',
                triggerRadius: '50%',
                triggerPositionX: 'left',
                triggerPositionY: 'bottom',
                triggerIcon: 'people',
                triggerSize: 'medium',
                triggerOffsetX: 15,
                triggerOffsetY: 70,
                mobile: {
                    triggerSize: 'small',
                    triggerPositionX: 'right',
                    triggerPositionY: 'bottom',
                    triggerOffsetX: 10,
                    triggerOffsetY: 10,
                    triggerRadius: '50%'
                }
            });
        };
        h.appendChild(s);
    })();
</script>
</body>

</html>