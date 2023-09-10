<?php
/*
	Template Name: Commander
	Template Post Type: page
*/
?>

<?php get_header(); ?>

<main class="chekout-main">
    <?php if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="checkout-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <form method="post" action="<?php the_permalink(); ?>" class="global-checkout-form">
                    <div class="checkout">
                        <h2 class="checkout-form-title">Votre commande</h2>
                        <?php $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish', // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
                            'posts_per_page' => '-1',
                            'order' => 'ASC',
                        );
                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) : ?>
                            <div class="products">
                                <?php while ($the_query->have_posts()) :
                                    $the_query->the_post(); ?>
                                    <div class="product">
                                        <label for="<?php echo $post->post_name . '-quantity' ?>" id="<?php echo 'product-title-container-' . $post->post_name ?>" class="product-title-container" style=" background: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>'); background-size: cover">
                                            <h3 class="product-title"><?php the_title(); ?></h3>
                                        </label>
                                        <div class="cart-container">
                                            <input type="number" id="<?php echo $post->post_name . '-quantity' ?>" name="<?php echo $post->post_name . '-quantity' ?>" class="quantity-input" value="0" min="0" />
                                            <button type="button" class="cart-button">OK</button>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </div>
                    <div class="client-and-delivery">
                        <div class="client">
                            <h2 class="checkout-form-title">Vos informations</h2>
                            <div class="form-fields">
                                <div class="form-field">
                                    <label for="client-name">Nom</label>
                                    <input type="text" id="client-name" name="client-name" class="text-input">
                                </div>
                                <div class="form-field">
                                    <label for="client-surname">Prénom</label>
                                    <input type="text" id="client-surname" name="client-surname" class="text-input">
                                </div>
                                <div class="form-field">
                                    <label for="client-email">E-mail</label>
                                    <input type="email" id="client-email" name="client-email" class="text-input">
                                </div>
                            </div>
                        </div>
                        <div class="delivery">
                            <h2 class="checkout-form-title">Livraison</h2>
                            <div class="form-fields">
                                <div class="form-field">
                                    <label for="delivery-adress">Adresse de livraison</label>
                                    <input type="text" id="delivery-adress" name="delivery-adress" class="text-input">
                                </div>
                                <div class="form-field">
                                    <label for="delivery-postal-code">Code postal</label>
                                    <input type="text" id="delivery-postal-code" name="delivery-postal-code" class="text-input">
                                </div>
                                <div class="form-field">
                                    <label for="delivery-city">Ville</label>
                                    <input type="text" id="delivery-city" name="delivery-city" class="text-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="checkout-button">Commander</button>
                </form>

                <?php

                $chekouts = array();
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => '-1',
                    'order' => 'ASC',
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        $slug = $post->post_name;
                        $field = $slug . "-quantity";
                        if (!empty($_POST[$field])) :
                            $chekouts[$slug] = get_the_title() . " : " . esc_attr($_POST[$field]);
                        endif;
                    endwhile;
                endif;
                wp_reset_postdata();
                $chekout = "<ul><li>" . implode("</li><li>", $chekouts) . "</li></ul>";

                if (!empty($_POST['client-name'])) :
                    $client_name = esc_attr($_POST['client-name']);
                else :
                    $client_name = "";
                endif;
                if (!empty($_POST['client-surname'])) :
                    $client_surname = esc_attr($_POST['client-surname']);
                else :
                    $client_surname = "";
                endif;
                if (!empty($_POST['client-email'])) :
                    $client_email = esc_attr($_POST['client-email']);
                else :
                    $client_email = "";
                endif;

                if (!empty($_POST['delivery-adress'])) :
                    $delivery_adress = esc_attr($_POST['delivery-adress']);
                else :
                    $delivery_adress = "";
                endif;
                if (!empty($_POST['delivery-postal-code'])) :
                    $delivery_postal_code = esc_attr($_POST['delivery-postal-code']);
                else :
                    $delivery_postal_code = "";
                endif;
                if (!empty($_POST['delivery-city'])) :
                    $delivery_city = esc_attr($_POST['delivery-city']);
                else :
                    $delivery_city = "";
                endif;

                $email_to = 'planty.drinks@gmail.com';
                $email_from = $email_to;
                $email_subject = "Nouvelle commande";
                $email_body = "<p>Client : </p><p>" . $client_surname . " " . $client_name . "</p><p>" . $client_email . "</p>
                <p>Adresse de livraison :</p><p>" . $delivery_adress . "</p><p>" . $delivery_postal_code . " " . $delivery_city . "</p>
                <p>Commande :</p>" . $chekout;

                wp_mail($email_to, $email_subject, $email_body, array('From: ' . $email_from)); ?>

                <p><?php echo "From: " . $email_from ?></p>
                <p><?php echo "To: " . $email_to ?></p>
                <p><?php echo "Subject: " . $email_subject ?></p>
                <p><?php echo $email_body ?></p>

            </article>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>