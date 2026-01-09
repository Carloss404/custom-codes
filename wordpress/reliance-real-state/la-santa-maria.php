<?php get_header() ?>
<?php
$post = get_post();
$post_id = $post->ID;
$propertyTitleOne = get_field('property_title_one');
$propertyTitleTwo = get_field('property_title_two');
$imageProperty = get_field('property_asset');
$propertyLocation = get_field('property_location');
$shortDescription = get_field('short_description');
$propertyPrice = get_field('property_price');
$askForPrice = get_field('ask_for_price');
$appointmentText = get_field('appointment_text');
$propertyDescription = get_field('property_description');
$propertyPhotoGallery = get_field('property_photo_gallery');
$propertyAmenities = get_field('property_amenities');
$propertyUnitDescription = get_field('unit_description');
$propertyLatitude = get_field('property_location_latitude');
$propertyLongitude = get_field('property_location_longitude');
$activeSectionPayments = get_field('active_section_payments');
$activeSectionRoi = get_field('active_section_roi');
$activeVideoYoutube = get_field('active_video_youtube');
$urlYoutubeVideo = get_field('url_youtube_video');

// Seller info
$author_id = get_post_meta(get_the_ID(), 'autor_seleccionado', true);
$sellerName = get_the_title($author_id);
$sellerPicture = get_field('seller_picture', $author_id);
$thumbnail_url = get_the_post_thumbnail_url($author_id, 'medium');
$sellerCharge = get_field('seller_charge', $author_id);
$sellerPhoneNumber = get_field('cellphone_number', $author_id);
$sellerWhatsappNumber = get_field('whatsapp_number', $author_id);
$sellerEmailAddress = get_field('email_address', $author_id);
$sellerContactLink = get_field('contact_link', $author_id);
$sellerBussinessCard = get_field('business_card', $author_id);

//Property status
$status_property = get_post_meta(get_the_ID(), 'status_property', true);
$propertyName = get_the_title();

//info faqs
$titleSectionFaqs = get_field('title_section');
$descriptionFaqs = get_field('description_section');
$faqsItems = get_field('questions_info');
?>


<section class="container--single-property">
    <div class="image--property">
        <?php
        $file_extension = pathinfo($imageProperty, PATHINFO_EXTENSION);
        $video_extensions = ['mp4', 'webm', 'ogg'];

        if (in_array(strtolower($file_extension), $video_extensions)) : ?>
            <video autoplay muted loop playsinline class="video--section">
                <source src="<?php echo esc_url($imageProperty); ?>"
                    type="video/<?php echo esc_attr($file_extension); ?>">
                Your browser does not support the video tag.
            </video>
        <?php else : ?>
            <img src="<?php echo esc_url($imageProperty); ?>" alt="image property" class="image--section"
                mfdislazy="1">
        <?php endif; ?>
    </div>

    <div class="container--wrapper">

        <div class="information--property">

            <?php if ($propertyLocation): ?>
                <span class="location--property">
                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.49974 0.166656C3.82391 0.166656 0.833076 3.15749 0.833076 6.82916C0.808909 12.2 7.24641 16.6533 7.49974 16.8333C7.49974 16.8333 14.1906 12.2 14.1664 6.83332C14.1664 3.15749 11.1756 0.166656 7.49974 0.166656ZM7.49974 10.1667C5.65808 10.1667 4.16641 8.67499 4.16641 6.83332C4.16641 4.99166 5.65808 3.49999 7.49974 3.49999C9.34141 3.49999 10.8331 4.99166 10.8331 6.83332C10.8331 8.67499 9.34141 10.1667 7.49974 10.1667Z"
                            fill="#1BB3BC" />
                    </svg>
                    <?php echo $propertyLocation ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($propertyTitleOne && $propertyTitleTwo)): ?>
                <h1 class="name--property">
                    <?php if (!empty($propertyTitleOne)): ?>
                        <span><?php echo $propertyTitleOne ?></span>
                    <?php endif ?>

                    <?php if (!empty($propertyTitleTwo)): ?>
                        <span><?php echo $propertyTitleTwo ?></span>
                    <?php endif ?>
                </h1>
            <?php else: ?>
                <h1 class="name--property"><?php echo the_title() ?></h1>
            <?php endif; ?>

            <?php if ($shortDescription): ?>
                <div class="short--description-property"><?php echo $shortDescription ?></div>
            <?php endif; ?>

            <?php if ($propertyPrice): ?>
                <span class="property--price"
                    id="propertyPrice">$<?php echo number_format((float)$propertyPrice, 0, '.', ','); ?></span>
            <?php endif; ?>

            <?php if ($askForPrice): ?>
                <span class="ask--price"><?php echo $askForPrice ?></span>
            <?php endif; ?>


            <?php if ($appointmentText): ?>

                <button class="appointment--link" id="schedule--apointment">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_883_2685)">
                            <path d="M19.9617 4.61835L12.9467 11.6333C12.1645 12.4136 11.1048 12.8517 10 12.8517C8.89521 12.8517 7.83552 12.4136 7.05333 11.6333L0.0383333 4.61835C0.0266667 4.75001 0 4.86918 0 5.00001V15C0.00132321 16.1047 0.440735 17.1637 1.22185 17.9448C2.00296 18.7259 3.062 19.1654 4.16667 19.1667H15.8333C16.938 19.1654 17.997 18.7259 18.7782 17.9448C19.5593 17.1637 19.9987 16.1047 20 15V5.00001C20 4.86918 19.9733 4.75001 19.9617 4.61835Z"
                                fill="white" />
                            <path d="M11.7685 10.455L19.3801 2.84248C19.0114 2.23108 18.4913 1.72501 17.8701 1.37309C17.2489 1.02117 16.5474 0.835264 15.8335 0.833313H4.16678C3.4528 0.835264 2.75137 1.02117 2.13014 1.37309C1.50891 1.72501 0.988849 2.23108 0.620117 2.84248L8.23178 10.455C8.70143 10.9227 9.33727 11.1854 10.0001 11.1854C10.663 11.1854 11.2988 10.9227 11.7685 10.455Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_883_2685">
                                <rect width="20" height="20" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <?php echo $appointmentText ?>
                </button>
            <?php endif; ?>

            <div class="popup-overlay popup-schedule">
                <div class="popup-content">
                    <h1>Contact Me</h1>
                    <div>
                        <?php echo do_shortcode('[ninja_form id=2]'); ?>
                    </div>
                    <button class="close-popup">X</button>
                </div>
            </div>

        </div>


        <div class="description--property">

            <?php if ($propertyDescription): ?>
                <span class="title--description-property">Description</span>
                <hr>
                <div class="description--property-long">
                    <?php echo $propertyDescription ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(get_the_terms(get_the_ID(), 'property-tags'))): ?>
                <span class="title--interest-property">Features and Amenities</span>
                <hr>
                <div class="container--tags">
                    <ul>
                        <?php
                        $post_tags = get_the_terms(get_the_ID(), 'property-tags');
                        if ($post_tags && !is_wp_error($post_tags)) {
                            foreach ($post_tags as $tag) {
                                $tag_link = get_term_link($tag->term_id, 'property-tags');
                                $color = get_field('property_color_tag', 'term_' . $tag->term_id);
                                $style = $color ? 'style="border: 1px solid ' . esc_attr($color) . '; color: ' . esc_attr($color) . ';"' : '';
                                echo '<li><a href="' . esc_url($tag_link) . '" ' . $style . '>' . esc_html($tag->name) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            <?php endif ?>

        </div>


        <div class="details--property">
            <?php if ($propertyPhotoGallery): ?>

                <div class="photos--property">
                    <span class="title--details-property">Photo Gallery</span>
                    <hr>
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <?php foreach ($propertyPhotoGallery as $item): ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($item['property_image']); ?>" alt="property image"
                                        class="property--image">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($propertyPhotoGallery as $item): ?>
                                <div class="swiper-slide">
                                    <?php if (!empty($item['property_image'])): ?>
                                        <img src="<?php echo esc_url($item['property_image']); ?>"
                                            alt="property thumbnail" class="property--thumbnail">
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <?php if ($propertyUnitDescription || $propertyAmenities): ?>
                <div class="unit--property">
                    <span class="title--unit-property">Unit details</span>
                    <hr>

                    <?php if (!empty($propertyUnitDescription)): ?>
                        <div class="container--unit-description">
                            <?php echo $propertyUnitDescription; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($propertyAmenities)): ?>
                        <?php foreach ($propertyAmenities as $id => $amenity): ?>
                            <div class="amenities--property">
                                <div class="icon--amenity">
                                    <?php
                                    $icons = [
                                        'Property Type' => 'property-type.svg',
                                        'Property Size' => 'size.svg',
                                        'Bathrooms' => 'tina.svg',
                                        'Bedrooms' => 'bedrooms.svg',
                                        'Beds' => 'bed.svg',
                                        'Garage' => 'car.svg',
                                        'Gym' => 'gym.svg',
                                        'Internet' => 'wifi.svg',
                                        'Land size' => 'property-size.svg',
                                        'Jacuzzi' => 'jacuzzi.svg'
                                    ];

                                    $title = $amenity['property_amenities_title'];

                                    if (isset($icons[$title])): ?>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/icons/' . $icons[$title]; ?>"
                                            alt="">
                                    <?php endif; ?>
                                </div>


                                <div class="title--subtitle-amenity">
                                    <?php if (!empty($amenity['property_amenities_title'])): ?>
                                        <h4 class="title--amenity"><?php echo $amenity['property_amenities_title'] ?></h4>
                                    <?php endif ?>
                                    <?php if (!empty($amenity['property_amenities_subtitle'])): ?>
                                    <?php endif ?>
                                    <h5 class="subtitle--amenity"><?php echo $amenity['property_amenities_subtitle'] ?></h5>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>

        <?php if ($activeVideoYoutube): ?>
            <?php
            preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([^\&\?\/]+)/', $urlYoutubeVideo, $matches);
            $youtubeID = $matches[1] ?? null;
            ?>

            <?php if (!empty($youtubeID)): ?>
                <div class="container--video-youtube">
                    <h4 class="title--video-property">See more about the property: </h4>
                    <?php if ($youtubeID): ?>
                        <iframe width="100%"
                            src="https://www.youtube.com/embed/<?php echo esc_attr($youtubeID); ?>"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="iframe--youtube">
                        </iframe>
                    <?php else: ?>
                        <p>Video de YouTube no válido.</p>
                    <?php endif; ?>
                </div>
            <?php endif ?>

        <?php endif; ?>


        <div class="container--location-sales">
            <?php if ($propertyLatitude && $propertyLongitude): ?>
                <div class="map--property">
                    <span class="title--map-property">Location</span>
                    <hr>
                    <iframe
                        width="100%"
                        height="270"
                        style="border:0;"
                        loading="lazy"
                        src="https://www.openstreetmap.org/export/embed.html?bbox=<?php echo $propertyLongitude - 0.005 ?>,<?php echo $propertyLatitude - 0.005 ?>,<?php echo $propertyLongitude + 0.005 ?>,<?php echo $propertyLatitude + 0.005 ?>&marker=<?php echo $propertyLatitude ?>,<?php echo $propertyLongitude ?>&layers=ND">
                    </iframe>
                </div>
            <?php endif; ?>




            <?php if ($sellerPicture || $sellerName || $sellerCharge || $sellerPhoneNumber || $sellerEmailAddress || $sellerWhatsappNumber): ?>
                <div class="sales--person-info">
                    <div class="container--name-license">
                        <span class="title--sales-person">Real Estate Agent</span>
                        <span class="invur--license">INVUR LICENSE 0104-2025-A1</span>
                    </div>
                    <hr>

                    <div class="container--image-info">

                        <?php if (!empty($sellerPicture)): ?>
                            <div class="container--image-seller">
                                <img src="<?php echo $thumbnail_url ?>" alt="seller picture">
                            </div>
                        <?php endif; ?>

                        <div class="container--info-seller">
                            <?php if (!empty($sellerName)): ?>
                                <h4 class="name--seller"><?php echo $sellerName ?></h4>
                            <?php endif; ?>

                            <?php if (!empty($sellerCharge)): ?>
                                <h5 class="charge--seller"><?php echo $sellerCharge ?></h5>
                            <?php endif; ?>

                            <div class="container--contact-seller">
                                <ul>
                                    <?php if (!empty($sellerPhoneNumber)): ?>

                                        <li>
                                            <a href="tel:<?php echo $sellerPhoneNumber ?>">
                                                <svg width="18" height="28" viewBox="0 0 18 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.49046 0.439941C2.03619 0.439941 0.861328 1.63527 0.861328 3.06651V24.9777C0.861328 26.4266 2.0415 27.6077 3.49046 27.6077H14.5513C16.0003 27.6077 17.183 26.4266 17.183 24.9777V3.06651C17.183 1.61123 15.9875 0.439941 14.5513 0.439941H3.49046ZM3.49046 1.31632H14.5513C15.513 1.31632 16.3049 2.08738 16.3049 3.06651V3.46105V22.1055H3.35182C2.76742 22.1055 2.76742 22.9819 3.35182 22.9819H16.3049V24.9777C16.3049 25.9563 15.5299 26.7313 14.5513 26.7313H3.49046C2.51186 26.7313 1.73771 25.9563 1.73771 24.9777V4.73454H14.8817C15.4883 4.73454 15.4843 3.85816 14.8817 3.85816H1.73771V3.06651C1.73771 2.11434 2.51717 1.31632 3.49046 1.31632ZM6.62711 2.14734C6.04272 2.17748 6.08808 3.05476 6.67247 3.02457H11.395C11.9794 3.02457 11.9794 2.14734 11.395 2.14734H6.62711ZM9.02174 23.5159C8.28578 23.5159 7.67979 24.1185 7.67979 24.8544C7.67978 25.5904 8.28579 26.1972 9.02174 26.1972C9.75768 26.1972 10.3628 25.5904 10.3628 24.8544C10.3628 24.1185 9.7577 23.5159 9.02174 23.5159ZM9.02174 24.3889C9.28405 24.3889 9.48732 24.5921 9.48732 24.8544C9.48732 25.1168 9.28408 25.3209 9.02174 25.3209C8.75941 25.3209 8.55616 25.1167 8.55617 24.8544C8.55617 24.5921 8.75943 24.3889 9.02174 24.3889Z"
                                                        fill="#201F1E" />
                                                </svg>
                                                <?php echo $sellerPhoneNumber ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($sellerWhatsappNumber)): ?>

                                        <li>
                                            <a href="https://wa.me/<?php echo str_replace(' ', '', $sellerWhatsappNumber); ?>"
                                                target="_blank">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9998 0.800049C5.82387 0.800049 0.799805 5.82411 0.799805 12C0.799805 14.1069 1.38522 16.1522 2.49574 17.9283C2.05334 19.4782 1.25427 22.41 1.24565 22.4406C1.2043 22.5922 1.24867 22.7542 1.36196 22.8632C1.47525 22.9722 1.63894 23.0109 1.78799 22.9653L6.2275 21.5997C7.96651 22.6474 9.95796 23.2001 11.9998 23.2001C18.1757 23.2001 23.1998 18.176 23.1998 12C23.1998 5.82411 18.1757 0.800049 11.9998 0.800049ZM11.9998 22.3385C10.0532 22.3385 8.15691 21.7945 6.51568 20.7658C6.44633 20.7223 6.36664 20.7003 6.28694 20.7003C6.2443 20.7003 6.20165 20.7068 6.1603 20.7193L2.2838 21.9125C2.56854 20.873 3.0803 19.0138 3.3771 17.9796C3.41156 17.8598 3.39217 17.7306 3.32454 17.6259C2.23642 15.9515 1.66134 14.0061 1.66134 12C1.66134 6.29968 6.29944 1.66159 11.9998 1.66159C17.7002 1.66159 22.3383 6.29968 22.3383 12C22.3383 17.7004 17.7002 22.3385 11.9998 22.3385Z"
                                                        fill="#201F1E" />
                                                    <path d="M19.3167 14.6391C18.5215 14.1976 17.8444 13.7547 17.3503 13.4316C16.9729 13.1852 16.7002 13.0073 16.5004 12.907C15.9417 12.6283 15.5182 12.8251 15.3571 12.988C15.3369 13.0082 15.3188 13.0302 15.3033 13.0534C14.723 13.924 13.9653 14.7567 13.7434 14.8015C13.4871 14.7614 12.2874 14.0795 11.0951 13.0866C9.87772 12.0721 9.11181 11.1008 8.99938 10.4391C9.78037 9.63528 10.0617 9.12956 10.0617 8.55405C10.0617 7.96088 8.67803 5.48439 8.42775 5.23411C8.17661 4.9834 7.61101 4.9442 6.74646 5.11651C6.66332 5.13331 6.58664 5.17423 6.52634 5.23411C6.42166 5.33879 3.97231 7.83596 5.13624 10.8625C6.41391 14.1842 9.69335 18.0452 13.8744 18.6724C14.3495 18.7435 14.795 18.7788 15.2119 18.7788C17.6716 18.7788 19.1233 17.5412 19.5321 15.0862C19.5627 14.9066 19.4761 14.7274 19.3167 14.6391ZM14.0023 17.8203C9.58092 17.1574 6.796 12.7769 5.94049 10.5532C5.09187 8.34771 6.65686 6.38125 7.04972 5.93669C7.36935 5.88242 7.70578 5.85959 7.84621 5.88156C8.13957 6.28949 9.15532 8.20857 9.20012 8.55405C9.20012 8.7802 9.12646 9.09509 8.24941 9.97257C8.16843 10.0531 8.1232 10.1625 8.1232 10.2771C8.1232 12.5326 12.8806 15.6617 13.7232 15.6617C14.4559 15.6617 15.4114 14.4302 15.9554 13.6276C15.9869 13.6289 16.0399 13.6397 16.1153 13.6776C16.2703 13.7556 16.5391 13.9309 16.879 14.1532C17.3279 14.4465 17.9241 14.836 18.6279 15.2396C18.3083 16.7774 17.4149 18.3329 14.0023 17.8203Z"
                                                        fill="#201F1E" />
                                                </svg>
                                                <?php echo $sellerWhatsappNumber ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($sellerEmailAddress)): ?>
                                        <li><a href="mailto:<?php echo $sellerEmailAddress ?>">
                                                <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.2913 0.958252H4.70801C2.77501 0.958252 1.20801 2.52526 1.20801 4.45825V15.5416C1.20801 17.4746 2.77501 19.0416 4.70801 19.0416H19.2913C21.2243 19.0416 22.7913 17.4746 22.7913 15.5416V4.45825C22.7913 2.52526 21.2243 0.958252 19.2913 0.958252Z"
                                                        stroke="#201F1E" stroke-width="1.25"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M1.20801 5.33325L11.0255 9.84359C11.3311 9.98398 11.6634 10.0567 11.9997 10.0567C12.336 10.0567 12.6683 9.98398 12.9738 9.84359L22.7913 5.33325"
                                                        stroke="#201F1E" stroke-width="1.25"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                                <?php echo $sellerEmailAddress ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>
                        <div class="container--cta-seller">
                            <?php if ($sellerContactLink === "yes"): ?>
                                <button class="cta--seller-contact">Contact Now</button>

                                <div class="popup-overlay popup-contact">
                                    <div class="popup-content">
                                        <h1>Contact Me</h1>
                                        <div>
                                            <?php echo do_shortcode('[ninja_form id=3]'); ?>
                                        </div>
                                        <button class="close-popup">X</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($sellerBussinessCard)): ?>

                                <a href="<?php echo $sellerBussinessCard['url'] ?>" class="cta--seller-card">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_862_3511)">
                                            <path d="M18.4167 17.5H2.58333C1.435 17.5 0.5 16.565 0.5 15.4167V4.58333C0.5 3.435 1.435 2.5 2.58333 2.5H18.4167C19.565 2.5 20.5 3.435 20.5 4.58333V15.4167C20.5 16.565 19.565 17.5 18.4167 17.5ZM2.58333 3.33333C1.89417 3.33333 1.33333 3.89417 1.33333 4.58333V15.4167C1.33333 16.1058 1.89417 16.6667 2.58333 16.6667H18.4167C19.1058 16.6667 19.6667 16.1058 19.6667 15.4167V4.58333C19.6667 3.89417 19.1058 3.33333 18.4167 3.33333H2.58333Z"
                                                fill="#201F1E" />
                                            <path d="M6.75033 9.99992C5.60199 9.99992 4.66699 9.06492 4.66699 7.91659C4.66699 6.76825 5.60199 5.83325 6.75033 5.83325C7.89866 5.83325 8.83366 6.76825 8.83366 7.91659C8.83366 9.06492 7.89866 9.99992 6.75033 9.99992ZM6.75033 6.66659C6.06116 6.66659 5.50033 7.22742 5.50033 7.91659C5.50033 8.60575 6.06116 9.16659 6.75033 9.16659C7.43949 9.16659 8.00033 8.60575 8.00033 7.91659C8.00033 7.22742 7.43949 6.66659 6.75033 6.66659Z"
                                                fill="#201F1E" />
                                            <path d="M10.0833 14.1666C9.85333 14.1666 9.66667 13.9799 9.66667 13.7499V12.9166C9.66667 12.2274 9.10583 11.6666 8.41667 11.6666H5.08333C4.39417 11.6666 3.83333 12.2274 3.83333 12.9166V13.7499C3.83333 13.9799 3.64667 14.1666 3.41667 14.1666C3.18667 14.1666 3 13.9799 3 13.7499V12.9166C3 11.7683 3.935 10.8333 5.08333 10.8333H8.41667C9.565 10.8333 10.5 11.7683 10.5 12.9166V13.7499C10.5 13.9799 10.3133 14.1666 10.0833 14.1666Z"
                                                fill="#201F1E" />
                                            <path d="M17.5837 7.50008H12.5837C12.3537 7.50008 12.167 7.31341 12.167 7.08341C12.167 6.85341 12.3537 6.66675 12.5837 6.66675H17.5837C17.8137 6.66675 18.0003 6.85341 18.0003 7.08341C18.0003 7.31341 17.8137 7.50008 17.5837 7.50008Z"
                                                fill="#201F1E" />
                                            <path d="M17.5837 10.8333H12.5837C12.3537 10.8333 12.167 10.6467 12.167 10.4167C12.167 10.1867 12.3537 10 12.5837 10H17.5837C17.8137 10 18.0003 10.1867 18.0003 10.4167C18.0003 10.6467 17.8137 10.8333 17.5837 10.8333Z"
                                                fill="#201F1E" />
                                            <path d="M17.5837 14.1666H12.5837C12.3537 14.1666 12.167 13.9799 12.167 13.7499C12.167 13.5199 12.3537 13.3333 12.5837 13.3333H17.5837C17.8137 13.3333 18.0003 13.5199 18.0003 13.7499C18.0003 13.9799 17.8137 14.1666 17.5837 14.1666Z"
                                                fill="#201F1E" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_862_3511">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <?php echo $sellerBussinessCard['title'] ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($activeSectionPayments === 'yes'): ?>
            <div class="container--calculator-popup">
                <div class="title--calculator">
                    <h4>Estimate Your Payments Instantly!</h4>
                </div>

                <div class="button--calculator">
                    <button id="active-popup">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.042 0H3.95866C2.69449 0 1.66699 1.0275 1.66699 2.29167V17.7083C1.66699 18.9725 2.69449 20 3.95866 20H16.042C17.3062 20 18.3337 18.9725 18.3337 17.7083V2.29167C18.3337 1.0275 17.3062 0 16.042 0ZM8.15033 15.6C8.39449 15.8442 8.39449 16.24 8.15033 16.4842C8.02866 16.6058 7.86866 16.6667 7.70866 16.6667C7.54866 16.6667 7.38866 16.6058 7.26699 16.4833L6.66699 15.8842L6.06699 16.4842C5.94533 16.6058 5.78533 16.6667 5.62533 16.6667C5.46533 16.6667 5.30533 16.6058 5.18366 16.4833C4.93949 16.2392 4.93949 15.8433 5.18366 15.5992L5.78283 15L5.18283 14.4C4.93866 14.1558 4.93866 13.76 5.18283 13.5158C5.42699 13.2717 5.82283 13.2717 6.06699 13.5158L6.66699 14.1158L7.26699 13.5158C7.51116 13.2717 7.90699 13.2717 8.15116 13.5158C8.39533 13.76 8.39533 14.1558 8.15116 14.4L7.55116 15L8.15033 15.6ZM7.70866 10.625H7.29199V11.0417C7.29199 11.3867 7.01199 11.6667 6.66699 11.6667C6.32199 11.6667 6.04199 11.3867 6.04199 11.0417V10.625H5.62533C5.28033 10.625 5.00033 10.345 5.00033 10C5.00033 9.655 5.28033 9.375 5.62533 9.375H6.04199V8.95833C6.04199 8.61333 6.32199 8.33333 6.66699 8.33333C7.01199 8.33333 7.29199 8.61333 7.29199 8.95833V9.375H7.70866C8.05366 9.375 8.33366 9.655 8.33366 10C8.33366 10.345 8.05366 10.625 7.70866 10.625ZM14.3753 16.6667H12.292C11.947 16.6667 11.667 16.3867 11.667 16.0417C11.667 15.6967 11.947 15.4167 12.292 15.4167H14.3753C14.7203 15.4167 15.0003 15.6967 15.0003 16.0417C15.0003 16.3867 14.7203 16.6667 14.3753 16.6667ZM14.3753 14.5833H12.292C11.947 14.5833 11.667 14.3033 11.667 13.9583C11.667 13.6133 11.947 13.3333 12.292 13.3333H14.3753C14.7203 13.3333 15.0003 13.6133 15.0003 13.9583C15.0003 14.3033 14.7203 14.5833 14.3753 14.5833ZM14.3753 10.8333H12.292C11.947 10.8333 11.667 10.5533 11.667 10.2083C11.667 9.86333 11.947 9.58333 12.292 9.58333H14.3753C14.7203 9.58333 15.0003 9.86333 15.0003 10.2083C15.0003 10.5533 14.7203 10.8333 14.3753 10.8333ZM15.8337 5.20833C15.8337 6.0125 15.1795 6.66667 14.3753 6.66667H5.62533C4.82116 6.66667 4.16699 6.0125 4.16699 5.20833V3.95833C4.16699 3.15417 4.82116 2.5 5.62533 2.5H14.3753C15.1795 2.5 15.8337 3.15417 15.8337 3.95833V5.20833Z"
                                fill="#fff" />
                        </svg>
                        Use the Calculator Now
                    </button>
                </div>
            </div>

            <div class="popup-overlay popup-calculator-vue">
                <div class="popup-content" id="popup--vue-calculator">
                    <div>
                        <?php echo do_shortcode('[app_calculator]'); ?>
                    </div>
                    <button class="close-popup">X</button>
                </div>
            </div>
        <?php endif; ?>



        <?php if ($activeSectionRoi === 'yes'): ?>
            <div class="container--calculate-roi">
                <h4 class="title--roi">What’s Your ROI Timeline?</h4>
                <p class="description--roi">
                    Our ROI Assistant helps you evaluate the return on investment for any property by analyzing key
                    financial metrics like rental income, expenses, cash flow, and appreciation potential. Whether
                    you're a seasoned investor or just starting out, get personalized insights to make smarter,
                    data-driven decisions. </p>
                <button class="cta--roi">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0001 15.4897C13.0274 15.4897 15.4903 13.0268 15.4903 9.99943C15.4903 6.97209 13.0274 4.5092 10.0001 4.5092C6.97217 4.5092 4.50877 6.97213 4.50877 9.99943C4.50877 13.0267 6.97221 15.4897 10.0001 15.4897ZM9.41416 6.91838V6.63443C9.41416 6.47903 9.4759 6.32999 9.58578 6.22011C9.69567 6.11023 9.8447 6.04849 10.0001 6.04849C10.1555 6.04849 10.3045 6.11023 10.4144 6.22011C10.5243 6.32999 10.586 6.47903 10.586 6.63443V6.91959C11.1336 7.07127 11.5998 7.43002 11.8492 7.91728C11.92 8.05562 11.9329 8.21642 11.8852 8.3643C11.8374 8.51218 11.7328 8.63503 11.5945 8.70582C11.4562 8.77661 11.2954 8.78954 11.1475 8.74177C10.9996 8.69401 10.8768 8.58945 10.806 8.45111C10.6692 8.18412 10.3525 8.01162 9.99877 8.01162C9.52741 8.01162 9.12916 8.33263 9.12916 8.71259C9.12916 9.14724 9.26811 9.24736 10.1205 9.42666C10.5319 9.51322 10.9573 9.60271 11.3232 9.84388C11.7998 10.1581 12.0416 10.6434 12.0416 11.2863C12.0416 12.1319 11.4271 12.8481 10.586 13.0799V13.3645C10.586 13.5199 10.5243 13.6689 10.4144 13.7788C10.3045 13.8887 10.1555 13.9504 10.0001 13.9504C9.8447 13.9504 9.69567 13.8887 9.58578 13.7788C9.4759 13.6689 9.41416 13.5199 9.41416 13.3645V13.0799C8.8662 12.9286 8.3994 12.5695 8.14975 12.0816C8.07935 11.9433 8.06669 11.7827 8.11455 11.6351C8.16241 11.4875 8.26688 11.3649 8.40503 11.2942C8.54319 11.2235 8.70374 11.2105 8.85147 11.2581C8.99919 11.3056 9.12202 11.4098 9.19299 11.5478C9.32971 11.8148 9.64588 11.9873 9.99877 11.9873C10.479 11.9873 10.8699 11.6729 10.8699 11.2863C10.8699 10.8525 10.731 10.7526 9.87932 10.5734C9.46772 10.4868 9.04205 10.3973 8.6762 10.1559C8.19936 9.8415 7.95745 9.35588 7.95745 8.71259C7.95737 7.86623 8.57264 7.14959 9.41424 6.91838H9.41416ZM17.5371 13.669C16.7114 15.3655 15.3375 16.7338 13.6376 17.5525C11.9377 18.3712 10.0113 18.5925 8.17006 18.1805C6.32881 17.7685 4.6804 16.7474 3.49153 15.2823C2.30266 13.8172 1.64287 11.9938 1.61889 10.1072L1.31229 10.4138C1.2021 10.5222 1.05354 10.5826 0.898967 10.582C0.744395 10.5814 0.596335 10.5197 0.487037 10.4104C0.37774 10.3011 0.31606 10.153 0.315434 9.99845C0.314809 9.84387 0.375287 9.69532 0.483696 9.58513L1.78916 8.27959C1.89905 8.1697 2.04808 8.10797 2.20348 8.10797C2.35888 8.10797 2.50791 8.1697 2.6178 8.27959L3.92334 9.58513C4.03243 9.69518 4.09349 9.84396 4.09315 9.99892C4.09281 10.1539 4.0311 10.3024 3.92153 10.412C3.81196 10.5215 3.66345 10.5832 3.5085 10.5836C3.35354 10.5839 3.20476 10.5229 3.09471 10.4138L2.79084 10.1099C2.85014 14.0351 6.06038 17.2101 9.99897 17.2101C12.7794 17.2101 15.2642 15.6564 16.4838 13.1554C16.5173 13.0858 16.5642 13.0236 16.6218 12.9723C16.6795 12.921 16.7466 12.8815 16.8196 12.8562C16.8925 12.8309 16.9697 12.8203 17.0467 12.8249C17.1237 12.8295 17.1991 12.8493 17.2684 12.8831C17.3378 12.9169 17.3998 12.9641 17.4509 13.022C17.502 13.0798 17.5411 13.1472 17.5661 13.2202C17.591 13.2932 17.6013 13.3705 17.5964 13.4475C17.5914 13.5245 17.5713 13.5998 17.5371 13.669ZM19.5154 10.4138L18.2099 11.7193C18.1 11.8292 17.951 11.8909 17.7956 11.8909C17.6402 11.8909 17.4912 11.8292 17.3813 11.7193L16.0757 10.4138C16.0209 10.3594 15.9774 10.2948 15.9476 10.2236C15.9179 10.1524 15.9025 10.0761 15.9023 9.99892C15.9021 9.92176 15.9172 9.84532 15.9466 9.774C15.9761 9.70268 16.0193 9.63788 16.0739 9.58331C16.1285 9.52875 16.1933 9.48551 16.2646 9.45605C16.3359 9.4266 16.4123 9.41153 16.4895 9.4117C16.5667 9.41187 16.643 9.42728 16.7142 9.45704C16.7854 9.4868 16.85 9.53033 16.9044 9.58513L17.2082 9.889C17.1489 5.96443 13.938 2.7899 9.99897 2.7899C7.21889 2.7899 4.73448 4.34314 3.51526 6.84349C3.44672 6.98244 3.32593 7.08859 3.17933 7.13871C3.03273 7.18884 2.87224 7.17885 2.73297 7.11095C2.59371 7.04305 2.48701 6.92275 2.43622 6.77638C2.38543 6.63 2.39467 6.46947 2.46194 6.3299C3.28783 4.63362 4.66181 3.26556 6.36164 2.44701C8.06147 1.62845 9.98773 1.40726 11.8289 1.81923C13.67 2.2312 15.3183 3.25222 16.5072 4.71715C17.696 6.18208 18.356 8.00524 18.3802 9.89174L18.6868 9.58513C18.797 9.47673 18.9456 9.41626 19.1001 9.41689C19.2547 9.41752 19.4028 9.47921 19.5121 9.58851C19.6214 9.69782 19.6831 9.84588 19.6837 10.0005C19.6843 10.155 19.6238 10.3036 19.5154 10.4138Z"
                            fill="white" />
                    </svg>
                    GET YOUR ROI ANALYSIS
                </button>
            </div>

            <div class="popup-overlay popup-roi">
                <div class="popup-content">
                    <h1>Contact Me</h1>
                    <div>
                        <?php echo do_shortcode('[ninja_form id=4]'); ?>
                    </div>
                    <button class="close-popup">X</button>
                </div>
            </div>
        <?php endif; ?>

        <div class="container--faqs-section-property">
            <?php if (!empty($titleSectionFaqs) || !empty($descriptionFaqs)): ?>
                <div class="container--faqs-titles">
                    <?php if (!empty($titleSectionFaqs)): ?>
                        <h3 class="title--faq"><?php echo $titleSectionFaqs ?></h3>
                    <?php endif ?>

                    <?php if (!empty($descriptionFaqs)): ?>
                        <div class="description--faq"><?php echo $descriptionFaqs ?></div>
                    <?php endif ?>
                </div>
            <?php endif ?>


            <?php if (!empty($faqsItems)): ?>
                <div class="container--faqs-items">
                    <?php foreach ($faqsItems as $id => $item): ?>
                        <div class="faq--item" id="<?php echo $id ?>">
                            <div class="container--title-icon">
                                <?php if (!empty($item['title_question'])): ?>
                                    <h4 class="title--item"><?php echo $item['title_question'] ?></h4>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="inactive-svg">
                                        <path d="M5 13V12H11V6H12V12H18V13H12V19H11V13H5Z" fill="inherit" />
                                    </svg>

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="active-svg">
                                        <rect x="5" y="12" width="13" height="1" fill="white" />
                                    </svg>
                                <?php endif ?>
                            </div>
                            <?php if (!empty($item['description_question'])): ?>
                                <div class="answer--item">
                                    <?php echo $item['description_question'] ?>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif ?>
        </div>


        <div class="container--related-properties">

            <h4 class="title--related-property">Similar properties</h4>

            <div class="related--property-info">
                <?php
                $args = array(
                    'post_type' => 'property',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post__not_in' => array(get_the_ID()),
                );

                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()): $query->the_post();
                        $price = get_field('property_price');
                        $location = get_field('property_location');
                        $categories = get_the_terms(get_the_ID(), 'property-category');
                        $propertyTags = get_the_terms(get_the_ID(), 'property-tags');
                        $current_url = urlencode(get_permalink()); // Asegúrate de obtener la URL de la publicación actual y codificarla
                        $post_title = urlencode(get_the_title()); // Codifica el título para usarlo en las URL de compartir
                ?>

                        <article class="related--property">
                            <div class="container--image-property">
                                <a href="<?php the_permalink(); ?>" class="related--image-property">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                            alt="<?php the_title_attribute(); ?>">
                                    <?php endif; ?>
                                </a>

                                <?php
                                $statuses = get_post_meta(get_the_ID(), 'status_property', true);
                                if (!empty($statuses) && is_array($statuses)) {
                                    echo '<div class="property--statuses">';
                                    foreach ($statuses as $status) {
                                        $status_label = str_replace('_', ' ', $status);
                                        echo '<span class="property--status">' . esc_html($status_label) . '</span> ';
                                    }
                                    echo '</div>';
                                }
                                ?>

                                <div class="container--price-title">
                                    <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                                        <span class="related--property-category">
                                            <?php
                                            $category_names = array_map(function ($category) {
                                                return esc_html($category->name);
                                            }, $categories);
                                            echo implode(', ', $category_names);
                                            ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($price): ?>
                                        <span class="related--property-price">$
                                            <?php echo number_format((float)$price, 0, '.', ','); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="property--info">
                                <a href="<?php the_permalink(); ?>"
                                    class="related--property-info-title"><?php the_title(); ?></a>

                                <?php if ($location): ?>
                                    <span class="related--property-location"><?php echo esc_html($location); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($propertyTags) && is_array($propertyTags) && !is_wp_error($propertyTags)) : ?>

                                    <?php
                                    $total_tags = count($propertyTags);
                                    $max_visible = 5;

                                    if ($total_tags > $max_visible) {
                                        // Tomamos sólo los primeros 4
                                        $visible_tags = array_slice($propertyTags, 0, $max_visible - 1);
                                        $remaining = $total_tags - ($max_visible - 1);
                                    } else {
                                        // Mostramos todos
                                        $visible_tags = $propertyTags;
                                        $remaining = 0;
                                    }
                                    ?>

                                    <ul class="related--property-tags">

                                        <?php foreach ($visible_tags as $tag) :

                                            $tag_link = get_term_link($tag->term_id, 'property-tags');
                                            $color = get_field('property_color_tag', 'term_' . $tag->term_id);
                                            $style = $color
                                                ? 'style="border:1px solid ' . esc_attr($color) . '; color:' . esc_attr($color) . ';"'
                                                : '';
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url($tag_link); ?>" <?php echo $style; ?>>
                                                    <?php echo esc_html($tag->name); ?>
                                                </a>
                                            </li>

                                        <?php endforeach; ?>

                                        <?php if ($remaining > 0) : ?>
                                            <li>
                                                <span class="more-tags">
                                                    +<?php echo esc_html($remaining); ?>
                                                </span>
                                            </li>
                                        <?php endif; ?>

                                    </ul>

                                <?php endif; ?>


                                <a href="<?php the_permalink(); ?>" class="related--property-permalink">
                                    More details
                                </a>
                            </div>

                            <hr>

                            <div class="container--seller-share">
                                <div class="info--seller">
                                    <?php
                                    $seller_id = get_post_meta(get_the_ID(), 'autor_seleccionado', true);
                                    if ($seller_id) {
                                        $seller_name = get_the_title($seller_id);
                                        $seller_picture = get_field('seller_picture', $seller_id);
                                        if ($seller_picture) {
                                            echo '<img src="' . esc_url($seller_picture) . '" alt="' . esc_attr($seller_name) . '" class="seller--avatar">';
                                        }

                                        echo '<span class="seller--name">' . esc_html($seller_name) . '</span>';
                                    }
                                    ?>
                                </div>

                                <div class="info--share">
                                    <div class="btn--share">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="21px"
                                            height="21px">
                                            <path d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"
                                                fill="#000" />
                                        </svg>
                                    </div>

                                    <div class="container--tooltip-social">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>"
                                            target="_blank" rel="noopener" class="share-btn facebook">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                width="21px"
                                                height="21px">
                                                <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"
                                                    fill="#000" />
                                            </svg>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?text=<?php echo $post_title . '%20' . $current_url; ?>"
                                            target="_blank" rel="noopener" class="share-btn whatsapp">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                width="21px"
                                                height="21px">
                                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                                                    fill="#000" />
                                            </svg>
                                        </a>

                                        <a href="https://www.instagram.com/reliancerealtynicaragua/"
                                            target="_blank" rel="noopener" class="share-btn instagram">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                width="21px"
                                                height="21px">
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                                    fill="#000" />
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </article>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </div>

    </div>
</section>


<script>
    var propertyPriceJs = <?php echo json_encode($propertyPrice); ?>;
    var propertyNameJs = <?php echo json_encode($propertyName); ?>;

    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });


        // Popup de la calculadora
        const popupCalculator = document.querySelector('.popup-calculator-vue');
        const activeCalculatorButton = document.getElementById('active-popup');
        const closeCalculatorButton = popupCalculator?.querySelector('.close-popup');

        if (popupCalculator && activeCalculatorButton && closeCalculatorButton) {
            activeCalculatorButton.addEventListener("click", function() {
                popupCalculator.style.display = "flex";
            });

            closeCalculatorButton.addEventListener("click", function() {
                popupCalculator.style.display = "none";
            });

            popupCalculator.addEventListener("click", function(e) {
                if (e.target === popupCalculator) {
                    popupCalculator.style.display = "none";
                }
            });
        } else {
            console.error("Elementos del popup de la calculadora no encontrados.");
        }

        // Popup de la cita
        const popupSchedule = document.querySelector('.popup-schedule');
        const scheduleAppointmentButton = document.getElementById('schedule--apointment');
        const closeScheduleButton = popupSchedule?.querySelector('.close-popup');

        if (popupSchedule && scheduleAppointmentButton && closeScheduleButton) {
            scheduleAppointmentButton.addEventListener("click", function() {
                popupSchedule.style.display = "flex";
            });

            closeScheduleButton.addEventListener("click", function() {
                popupSchedule.style.display = "none";
            });

            popupSchedule.addEventListener("click", function(e) {
                if (e.target === popupSchedule) {
                    popupSchedule.style.display = "none";
                }
            });
        } else {
            console.error("Elementos del popup de la cita no encontrados.");
        }

        // Nueva lógica para el botón .cta--seller-contact y popup .popup-contact
        const sellerContactButton = document.querySelector(".cta--seller-contact");
        const popupContact = document.querySelector(".popup-contact");
        const closePopupContact = popupContact?.querySelector(".close-popup");

        if (sellerContactButton && popupContact && closePopupContact) {
            sellerContactButton.addEventListener("click", function() {
                popupContact.style.display = "flex";
            });

            closePopupContact.addEventListener("click", function() {
                popupContact.style.display = "none";
            });

            popupContact.addEventListener("click", function(e) {
                if (e.target === popupContact) {
                    popupContact.style.display = "none";
                }
            });
        } else {
            console.error("Elementos del popup de contacto no encontrados.");
        }

        // Lógica para el botón .cta--roi y el popup .popup-roi
        const roiButton = document.querySelector('.cta--roi');
        const popupROI = document.querySelector(".popup-roi"); // Asegúrate de tener este popup en el HTML
        const closePopupROI = popupROI?.querySelector(".close-popup");

        if (roiButton && popupROI && closePopupROI) {
            roiButton.addEventListener("click", function() {
                popupROI.style.display = "flex";
            });

            closePopupROI.addEventListener("click", function() {
                popupROI.style.display = "none";
            });

            popupROI.addEventListener("click", function(e) {
                if (e.target === popupROI) {
                    popupROI.style.display = "none";
                }
            });
        } else {
            console.error("Elementos del popup de ROI no encontrados.");
        }

        const faqItems = document.querySelectorAll(".faq--item");
        const hash = window.location.hash.substring(1);

        faqItems.forEach(item => {
            const titleIcon = item;

            if (item.id === hash) {
                item.classList.add("active");
            }

            titleIcon.addEventListener("click", () => {
                faqItems.forEach(el => {
                    if (el !== item) {
                        el.classList.remove("active");
                    }
                });

                item.classList.toggle("active");
            });
        });
    });


    // llenar inputs hidden de forms

    function updateHiddenFields(priceFieldId, nameFieldId) {
        let priceField = document.getElementById(priceFieldId);
        let nameField = document.getElementById(nameFieldId);

        if (priceField) {
            priceField.value = propertyPriceJs;
            jQuery(priceField).trigger('change');
        }
        if (nameField) {
            nameField.value = propertyNameJs;
            jQuery(nameField).trigger('change');
        }
    }

    jQuery(document).on('nfFormReady', function(e, layoutView) {
        // Aquí puedes llamar la función tantas veces como formularios tengas
        updateHiddenFields('nf-field-9', 'nf-field-10'); // primer formulario
        updateHiddenFields('nf-field-16', 'nf-field-17'); // segundo formulario
        updateHiddenFields('nf-field-26', 'nf-field-27'); // tercer formulario
    });


    //     Tooltip
    const shareButtons = document.querySelectorAll('.btn--share');
    const socialContainers = document.querySelectorAll('.container--tooltip-social');

    shareButtons.forEach((shareButton, index) => {
        shareButton.addEventListener('click', () => {
            // Encuentra el contenedor de redes sociales correspondiente a este botón
            const currentSocialContainer = socialContainers[index];
            if (currentSocialContainer) {
                currentSocialContainer.classList.toggle('active');

                // Cierra cualquier otro contenedor de redes sociales activo
                socialContainers.forEach((container, i) => {
                    if (i !== index && container.classList.contains('active')) {
                        container.classList.remove('active');
                    }
                });
            }
        });
    });

    document.addEventListener('click', (event) => {
        socialContainers.forEach((container, index) => {
            const button = shareButtons[index];
            if (
                container.classList.contains('active') &&
                !container.contains(event.target) &&
                !button.contains(event.target)
            ) {
                container.classList.remove('active');
            }
        });
    });
</script>


<?php get_footer() ?>