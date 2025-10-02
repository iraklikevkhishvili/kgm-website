<footer class="kgm-footer">
    <div class="footer_image_container">
        <!-- <img src="https://kgmwines.com/wp-content/uploads/Black-Wallpaper.jpg" class="footer_image"> -->
    </div>
    <nav class="footer-nav">
        <!--CONTACT INFO-->
        <div class="footer-section-1">
            <div class="footer-newsletter-wrapper">
                <div class="footer-newsletter-text-wrapper">
                    <h2>STAY UP TO DATE</h2>
                    <h4>SUBSCRIBE TO OUR NEWSLETTER</h4>
                </div>

                <?php // $kgm_lang = apply_filters('wpml_current_language', null);
                ?>

                <form id="kgm-footer-newsletter-form" class="footer-form" method="get" action="/newsletter/">
                    <div class="form-group">
                        <label for="footer-email" class="sr-only">Email Address</label>
                        <input type="email" id="footer-email" name="email" required autocomplete="email"
                            inputmode="email" maxlength="160" placeholder="'Type in your email address">
                    </div>

                    <!-- Honeypot -->
                    <div class="form-group honeypot"
                        style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
                        <label for="website">Website leave empty</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Current language for tagging -->
                    <input type="hidden" name="lang" value="<?php// echo esc_attr($kgm_lang); ?> ?>">

                    <div class="form-group button">
                        <button type="submit" class="footer-btn-submit" id="kgm-newsletter-submit">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer-columns-wrapper">
            <div class="footer-columns">
                <!-- COMPANY-->
                <div class="footer-column">
                    <button class="footer-heading" aria-expanded="false" aria-controls="company-links">
                        company
                        <span class="footer-heading-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <ul class="footer-links" id="company-links">
                        <li>
                            <a href="<?php// echo esc_url(home_url('/about/')); ?> ?>" class="footer_link">
                                about us
                            </a>
                        </li>
                        <li>
                            <a href="<?php// echo esc_url(home_url('/about/our-story/')); ?> ?>" class="footer_link">
                                our story
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/our-company/'));
                            ?>" class="footer_link">
                                our company
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/our-team/'));
                            ?>" class="footer_link">
                                our team
                            </a>
                        </li>
                        <li>
                            <a href="<?php // echo esc_url(home_url('/about/export-and-distribution/'));
                            ?>" class="footer_link">
                                export & distribution
                            </a>
                        </li>
                        <li>
                            <a href="<?php // echo esc_url(home_url('/about/careers/'));
                            ?>" class="footer_link">
                                careers
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/news/'));
                            ?>" class="footer_link">
                                news
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- WINEMAKING-->
                <div class="footer-column">
                    <button class="footer-heading" aria-expanded="false" aria-controls="winemaking-links">
                        winemaking
                        <span class="footer-heading-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <ul class="footer-links" id="winemaking-links">
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/winemaking/'));
                            ?>" class="footer_link">
                                winemaking
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/winemaking/our-winery/'));
                            ?>" class="footer_link">
                                our winery
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/winemaking/our-vineyards/'));
                            ?>" class="footer_link">
                                our vineyards
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/about/winemaking/awards/'));
                            ?>" class="footer_link">
                                awards
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- PRODUCTS-->
                <div class="footer-column">
                    <button class="footer-heading" aria-expanded="false" aria-controls="products-links">
                        products
                        <span class="footer-heading-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <ul class="footer-links" id="products-links">
                        <li>
                            <a href="<?php //echo esc_url(kgm_get_translated_page_url(216));
                            ?>" class="footer_link">
                                wine
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/products/spirits/'));
                            ?>" class="footer_link">
                                spirits
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/products/lines/winemakers-reserve/'));
                            ?>" class="footer_link">
                                Winemaker's Reserve
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/products/lines/annata/'));
                            ?>" class="footer_link">
                                ANNATA
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/products/lines/7-hands/'));
                            ?>" class="footer_link">
                                7 HANDS
                            </a>
                        </li>
                    </ul>
                </div>

                <!--CONTACT-->
                <div class="footer-column">
                    <button class="footer-heading" aria-expanded="false" aria-controls="contact-links">
                        contact
                        <span class="footer-heading-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <ul class="footer-links" id="contact-links">
                        <li>
                            <a href="<?php //echo esc_url(home_url('/contact/'));
                            ?>" class="footer_link">
                                contact
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/contact/faq/'));
                            ?>" class="footer_link">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>
                <!--LEGAL-->
                <div class="footer-column">
                    <button class="footer-heading" aria-expanded="false" aria-controls="legal-links">
                        legal
                        <span class="footer-heading-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <ul class="footer-links" id="legal-links">
                        <li>
                            <a href="<?php //echo esc_url(home_url('/legal/privacy-policy/'));
                            ?>" class="footer_link">
                                privacy policy
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/legal/terms-and-conditions/'));
                            ?>" class="footer_link">
                                terms & conditions
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/legal/cookie-policy/'));
                            ?>" class="footer_link">
                                cookie policy
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo esc_url(home_url('/legal/cookie-preferences/'));
                            ?>" class="footer_link">
                                cookie preferences
                            </a>
                        </li>
                    </ul>
                </div>
                <!--CONTACT INFO-->
                <div class="footer-column">
                    <button class="footer-heading" aria-expanded="false" aria-controls="contact-info-list">
                        contact info
                        <span class="footer-heading-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <ul class="footer-links" id="contact-info-links">
                        <li>
                            <span class="footer_link mail">
                                info@kgmwines.com
                            </span>
                        </li>
                        <li>
                            <span class="footer_link phone">
                                +995 322 47 40 50
                            </span>
                        </li>
                        <li>
                            <span class="footer_link">
                                Monday-Friday 10:00-18:00
                            </span>
                        </li>
                        <li>
                            <span class="footer_link">
                                Davit Gamrekeli Turn 4a, Tbilisi, Georgia
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="soc_media_container">
            <ul class="soc_media_icon_list">
                <li class="icon facebook">
                    <a href="https://www.facebook.com/KakhuriGvinisMarani/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="100" zoomAndPan="magnify" viewBox="0 0 75 74.999997" height="100"
                            preserveAspectRatio="xMidYMid meet" version="1.0">
                            <defs>
                                <clipPath id="7c7eba4ec1">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="1012e4d57f">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="cc9698adef">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="48b33671fa">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="03baac3e57">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                                <clipPath id="4fb50dadeb">
                                    <path
                                        d="M 20.617188 19.300781 L 54.382812 19.300781 L 54.382812 55.707031 L 20.617188 55.707031 Z M 20.617188 19.300781 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="2b492d800c">
                                    <path
                                        d="M 54.382812 20.800781 L 54.382812 54.199219 C 54.382812 54.597656 54.226562 54.976562 53.945312 55.257812 C 53.664062 55.539062 53.28125 55.699219 52.882812 55.699219 L 22.117188 55.699219 C 21.71875 55.699219 21.335938 55.539062 21.054688 55.257812 C 20.773438 54.976562 20.617188 54.597656 20.617188 54.199219 L 20.617188 20.800781 C 20.617188 20.402344 20.773438 20.023438 21.054688 19.742188 C 21.335938 19.460938 21.71875 19.300781 22.117188 19.300781 L 52.882812 19.300781 C 53.28125 19.300781 53.664062 19.460938 53.945312 19.742188 C 54.226562 20.023438 54.382812 20.402344 54.382812 20.800781 Z M 54.382812 20.800781 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="ed775b6dff">
                                    <path
                                        d="M 0.617188 0.300781 L 34.382812 0.300781 L 34.382812 36.707031 L 0.617188 36.707031 Z M 0.617188 0.300781 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="5210b5c8ec">
                                    <path
                                        d="M 34.382812 1.800781 L 34.382812 35.199219 C 34.382812 35.597656 34.226562 35.976562 33.945312 36.257812 C 33.664062 36.539062 33.28125 36.699219 32.882812 36.699219 L 2.117188 36.699219 C 1.71875 36.699219 1.335938 36.539062 1.054688 36.257812 C 0.773438 35.976562 0.617188 35.597656 0.617188 35.199219 L 0.617188 1.800781 C 0.617188 1.402344 0.773438 1.023438 1.054688 0.742188 C 1.335938 0.460938 1.71875 0.300781 2.117188 0.300781 L 32.882812 0.300781 C 33.28125 0.300781 33.664062 0.460938 33.945312 0.742188 C 34.226562 1.023438 34.382812 1.402344 34.382812 1.800781 Z M 34.382812 1.800781 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="50b8f37a09">
                                    <rect x="0" width="35" y="0" height="37" />
                                </clipPath>
                                <clipPath id="a3c9ca4c7c">
                                    <path
                                        d="M 34.507812 24.640625 L 49.855469 24.640625 L 49.855469 56.433594 L 34.507812 56.433594 Z M 34.507812 24.640625 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="cd62e8ee15">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                <g clip-path="url(#cd62e8ee15)">
                                    <g clip-path="url(#7c7eba4ec1)">
                                        <g clip-path="url(#1012e4d57f)">
                                            <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                                <g clip-path="url(#03baac3e57)">
                                                    <g clip-path="url(#cc9698adef)">
                                                        <g clip-path="url(#48b33671fa)">
                                                            <rect x="-27.3" width="129.6" fill="#3d3d3d"
                                                                y="-27.299999" height="129.599995" fill-opacity="1" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g clip-path="url(#4fb50dadeb)">
                                        <g clip-path="url(#2b492d800c)">
                                            <g transform="matrix(1, 0, 0, 1, 20, 19)">
                                                <g clip-path="url(#50b8f37a09)">
                                                    <g clip-path="url(#ed775b6dff)">
                                                        <g clip-path="url(#5210b5c8ec)">
                                                            <path fill="#ffffff"
                                                                d="M 0.617188 0.300781 L 34.382812 0.300781 L 34.382812 36.707031 L 0.617188 36.707031 Z M 0.617188 0.300781 "
                                                                fill-opacity="1" fill-rule="nonzero" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g clip-path="url(#a3c9ca4c7c)">
                                        <path fill="#3d3d3d"
                                            d="M 45.960938 29.875 L 49.394531 29.875 L 49.394531 24.695312 L 45.007812 24.695312 L 45.007812 24.714844 C 39.242188 24.925781 38.054688 28.15625 37.957031 31.570312 L 37.941406 31.570312 L 37.941406 35.164062 L 34.507812 35.164062 L 34.507812 40.347656 L 37.941406 40.347656 L 37.941406 56.105469 L 44.105469 56.105469 L 44.105469 40.347656 L 48.523438 40.347656 L 49.394531 35.164062 L 44.105469 35.164062 L 44.105469 31.945312 C 44.105469 30.804688 44.871094 29.875 45.960938 29.875 Z M 45.960938 29.875 "
                                            fill-opacity="1" fill-rule="nonzero" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="icon instagram">
                    <a href="https://www.instagram.com/kgm_wine/profilecard/?igsh=bHlmd2w4dW04aDl1" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" zoomAndPan="magnify"
                            viewBox="0 0 75 74.999997" height="100" preserveAspectRatio="xMidYMid meet"
                            version="1.0">
                            <defs>
                                <clipPath id="c1f3277d9f">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="5fb0c78e5f">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="6410128254">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="b48bd7ad56">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="b032c917b2">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                                <clipPath id="6c16edfc33">
                                    <path
                                        d="M 19.300781 19.300781 L 55.480469 19.300781 L 55.480469 55.480469 L 19.300781 55.480469 Z M 19.300781 19.300781 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="e183e33de0">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                <g clip-path="url(#e183e33de0)">
                                    <g clip-path="url(#c1f3277d9f)">
                                        <g clip-path="url(#5fb0c78e5f)">
                                            <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                                <g clip-path="url(#b032c917b2)">
                                                    <g clip-path="url(#6410128254)">
                                                        <g clip-path="url(#b48bd7ad56)">
                                                            <rect x="-27.3" width="129.6" fill="#3d3d3d"
                                                                y="-27.299999" height="129.599995" fill-opacity="1" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <path fill="#ffffff"
                                        d="M 37.492188 27.835938 C 32.167969 27.835938 27.835938 32.167969 27.835938 37.492188 C 27.835938 42.816406 32.167969 47.152344 37.492188 47.152344 C 42.820312 47.152344 47.152344 42.816406 47.152344 37.492188 C 47.152344 32.167969 42.820312 27.835938 37.492188 27.835938 Z M 37.492188 43.742188 C 34.046875 43.742188 31.246094 40.9375 31.246094 37.492188 C 31.246094 34.046875 34.046875 31.242188 37.492188 31.242188 C 40.9375 31.242188 43.742188 34.046875 43.742188 37.492188 C 43.742188 40.9375 40.9375 43.742188 37.492188 43.742188 Z M 37.492188 43.742188 "
                                        fill-opacity="1" fill-rule="nonzero" />
                                    <path fill="#ffffff"
                                        d="M 47.515625 25.519531 C 46.4375 25.519531 45.5625 26.390625 45.5625 27.46875 C 45.5625 28.550781 46.4375 29.421875 47.515625 29.421875 C 48.59375 29.421875 49.46875 28.550781 49.46875 27.46875 C 49.46875 26.390625 48.59375 25.519531 47.515625 25.519531 Z M 47.515625 25.519531 "
                                        fill-opacity="1" fill-rule="nonzero" />
                                    <g clip-path="url(#6c16edfc33)">
                                        <path fill="#ffffff"
                                            d="M 47.023438 19.300781 L 27.964844 19.300781 C 23.1875 19.300781 19.300781 23.1875 19.300781 27.964844 L 19.300781 47.019531 C 19.300781 51.796875 23.1875 55.683594 27.964844 55.683594 L 47.023438 55.683594 C 51.796875 55.683594 55.683594 51.796875 55.683594 47.019531 L 55.683594 27.964844 C 55.683594 23.1875 51.796875 19.300781 47.023438 19.300781 Z M 52.277344 47.019531 C 52.277344 49.917969 49.917969 52.277344 47.023438 52.277344 L 27.964844 52.277344 C 25.066406 52.277344 22.710938 49.917969 22.710938 47.019531 L 22.710938 27.964844 C 22.710938 25.066406 25.066406 22.710938 27.964844 22.710938 L 47.023438 22.710938 C 49.917969 22.710938 52.277344 25.066406 52.277344 27.964844 Z M 52.277344 47.019531 "
                                            fill-opacity="1" fill-rule="nonzero" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="icon youtube">
                    <a href="https://youtube.com/@kakhurigvinismarani3502?si=tRHLHdo6Wr01-BLB" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" zoomAndPan="magnify"
                            viewBox="0 0 75 74.999997" height="100" preserveAspectRatio="xMidYMid meet"
                            version="1.0">
                            <defs>
                                <clipPath id="3737d39cb9">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="392b8737fa">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="5e97060933">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="38777e655a">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="222adcb90c">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                                <clipPath id="a2983eb280">
                                    <path
                                        d="M 14.96875 22.714844 L 59.917969 22.714844 L 59.917969 52.316406 L 14.96875 52.316406 Z M 14.96875 22.714844 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="5e20c74e32">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                <g clip-path="url(#5e20c74e32)">
                                    <g clip-path="url(#3737d39cb9)">
                                        <g clip-path="url(#392b8737fa)">
                                            <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                                <g clip-path="url(#222adcb90c)">
                                                    <g clip-path="url(#5e97060933)">
                                                        <g clip-path="url(#38777e655a)">
                                                            <rect x="-27.3" width="129.6" fill="#3d3d3d"
                                                                y="-27.299999" height="129.599995" fill-opacity="1" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g clip-path="url(#a2983eb280)">
                                        <path fill="#ffffff"
                                            d="M 53.132812 22.714844 L 21.859375 22.714844 C 18.066406 22.714844 14.988281 25.792969 14.988281 29.585938 L 14.988281 45.410156 C 14.988281 49.203125 18.066406 52.28125 21.859375 52.28125 L 53.132812 52.28125 C 56.925781 52.28125 60.003906 49.203125 60.003906 45.410156 L 60.003906 29.585938 C 60.003906 25.792969 56.925781 22.714844 53.132812 22.714844 Z M 32.867188 45.519531 L 32.867188 29.484375 L 46.75 37.507812 L 32.867188 45.527344 Z M 32.867188 45.519531 "
                                            fill-opacity="1" fill-rule="nonzero" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="icon linkedin">
                    <a href="https://www.linkedin.com/company/kakhuri-gvinis-marani/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" zoomAndPan="magnify"
                            viewBox="0 0 75 74.999997" height="100" preserveAspectRatio="xMidYMid meet"
                            version="1.0">
                            <defs>
                                <clipPath id="967de6a019">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="9fca5327a0">
                                    <path d="M 0 0 L 75 0 L 75 75 L 0 75 Z M 0 0 " clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="71d909a3d6">
                                    <path
                                        d="M 37.5 0 C 16.789062 0 0 16.789062 0 37.5 C 0 58.210938 16.789062 75 37.5 75 C 58.210938 75 75 58.210938 75 37.5 C 75 16.789062 58.210938 0 37.5 0 Z M 37.5 0 "
                                        clip-rule="nonzero" />
                                </clipPath>
                                <clipPath id="d39ae720f5">
                                    <rect x="0" width="75" y="0" height="75" />
                                </clipPath>
                                <clipPath id="9acd57e1b3">
                                    <path
                                        d="M 18.289062 18.289062 L 56.539062 18.289062 L 56.539062 56.539062 L 18.289062 56.539062 Z M 18.289062 18.289062 "
                                        clip-rule="nonzero" />
                                </clipPath>
                            </defs>
                            <g clip-path="url(#967de6a019)">
                                <g transform="matrix(1, 0, 0, 1, 0, -0.000000000000001893)">
                                    <g clip-path="url(#d39ae720f5)">
                                        <g clip-path="url(#9fca5327a0)">
                                            <g clip-path="url(#71d909a3d6)">
                                                <rect x="-16.5" width="108" fill="#3d3d3d" height="107.999996"
                                                    y="-16.499999" fill-opacity="1" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <path fill="#ffffff"
                                d="M 27.246094 32.222656 L 30.085938 32.222656 C 30.238281 32.222656 30.363281 32.273438 30.472656 32.378906 C 30.578125 32.488281 30.632812 32.617188 30.632812 32.765625 L 30.632812 48.394531 C 30.632812 48.542969 30.578125 48.671875 30.472656 48.78125 C 30.363281 48.886719 30.238281 48.9375 30.085938 48.9375 L 27.246094 48.9375 C 27.09375 48.9375 26.964844 48.886719 26.859375 48.78125 C 26.753906 48.671875 26.699219 48.542969 26.699219 48.394531 L 26.699219 32.765625 C 26.699219 32.617188 26.753906 32.488281 26.859375 32.378906 C 26.964844 32.273438 27.09375 32.222656 27.246094 32.222656 Z M 27.246094 32.222656 "
                                fill-opacity="1" fill-rule="nonzero" />
                            <path fill="#ffffff"
                                d="M 30.953125 28.367188 C 30.949219 27.027344 29.988281 26.054688 28.664062 26.054688 C 27.34375 26.054688 26.34375 27.050781 26.34375 28.375 C 26.34375 28.992188 26.570312 29.5625 26.976562 29.988281 C 27.394531 30.421875 27.972656 30.664062 28.601562 30.664062 C 29.296875 30.664062 29.917969 30.417969 30.351562 29.96875 C 30.757812 29.550781 30.96875 28.984375 30.953125 28.375 C 30.953125 28.371094 30.953125 28.371094 30.953125 28.367188 Z M 30.953125 28.367188 "
                                fill-opacity="1" fill-rule="nonzero" />
                            <path fill="#ffffff"
                                d="M 46.515625 33.320312 C 45.101562 32.054688 43.445312 31.867188 42.582031 31.867188 C 41.292969 31.867188 40.066406 32.210938 39.03125 32.863281 C 38.578125 33.148438 38.167969 33.484375 37.804688 33.875 L 37.734375 32.730469 C 37.722656 32.585938 37.667969 32.464844 37.5625 32.367188 C 37.457031 32.269531 37.332031 32.21875 37.1875 32.21875 L 34.671875 32.21875 C 34.511719 32.21875 34.378906 32.277344 34.273438 32.394531 C 34.164062 32.511719 34.117188 32.648438 34.128906 32.804688 C 34.21875 34 34.253906 35.25 34.253906 36.996094 L 34.253906 48.394531 C 34.253906 48.542969 34.308594 48.671875 34.414062 48.78125 C 34.519531 48.886719 34.648438 48.9375 34.800781 48.9375 L 37.640625 48.9375 C 37.792969 48.9375 37.921875 48.886719 38.027344 48.78125 C 38.132812 48.671875 38.1875 48.542969 38.1875 48.394531 L 38.1875 38.996094 C 38.1875 38.554688 38.246094 38.140625 38.347656 37.859375 C 38.351562 37.851562 38.355469 37.84375 38.355469 37.832031 C 38.742188 36.578125 39.90625 35.3125 41.644531 35.3125 C 42.722656 35.3125 43.496094 35.679688 44.007812 36.4375 C 44.472656 37.121094 44.714844 38.140625 44.714844 39.386719 L 44.714844 48.394531 C 44.714844 48.542969 44.769531 48.671875 44.875 48.78125 C 44.980469 48.886719 45.109375 48.9375 45.261719 48.9375 L 48.101562 48.9375 C 48.253906 48.9375 48.382812 48.886719 48.488281 48.78125 C 48.59375 48.671875 48.648438 48.542969 48.648438 48.394531 L 48.648438 39.0625 C 48.648438 37.734375 48.445312 36.554688 48.050781 35.558594 C 47.695312 34.664062 47.179688 33.914062 46.515625 33.320312 Z M 46.515625 33.320312 "
                                fill-opacity="1" fill-rule="nonzero" />
                            <g clip-path="url(#9acd57e1b3)">
                                <path fill="#ffffff"
                                    d="M 51.703125 18.289062 L 23.289062 18.289062 C 20.53125 18.289062 18.289062 20.53125 18.289062 23.289062 L 18.289062 51.703125 C 18.289062 54.460938 20.53125 56.703125 23.289062 56.703125 L 51.703125 56.703125 C 54.460938 56.703125 56.703125 54.460938 56.703125 51.703125 L 56.703125 23.289062 C 56.703125 20.53125 54.460938 18.289062 51.703125 18.289062 Z M 53.191406 23.53125 L 53.191406 51.460938 C 53.191406 51.691406 53.148438 51.910156 53.058594 52.121094 C 52.972656 52.335938 52.847656 52.523438 52.683594 52.683594 C 52.523438 52.847656 52.335938 52.972656 52.121094 53.058594 C 51.910156 53.148438 51.691406 53.191406 51.460938 53.191406 L 23.53125 53.191406 C 23.304688 53.191406 23.082031 53.148438 22.871094 53.058594 C 22.65625 52.972656 22.472656 52.847656 22.308594 52.683594 C 22.144531 52.523438 22.019531 52.335938 21.933594 52.121094 C 21.84375 51.910156 21.800781 51.691406 21.800781 51.460938 L 21.800781 23.53125 C 21.800781 23.304688 21.84375 23.082031 21.933594 22.871094 C 22.019531 22.65625 22.144531 22.472656 22.308594 22.308594 C 22.472656 22.144531 22.65625 22.019531 22.871094 21.933594 C 23.082031 21.84375 23.304688 21.800781 23.53125 21.800781 L 51.460938 21.800781 C 51.691406 21.800781 51.910156 21.84375 52.121094 21.933594 C 52.335938 22.019531 52.523438 22.144531 52.683594 22.308594 C 52.847656 22.472656 52.972656 22.65625 53.058594 22.871094 C 53.148438 23.082031 53.191406 23.304688 53.191406 23.53125 Z M 53.191406 23.53125 "
                                    fill-opacity="1" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="right-reserved">
        <p>
            KGM 2025 ©. All rights reserved.
        </p>
    </div>
</footer>
