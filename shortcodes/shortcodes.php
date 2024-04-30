<?php

/* --- --- --- --- --- --- --- P A G E - D' A C C U E I L --- --- --- --- --- --- --- */

/** ** ** ** ** ** * bloc titre principal  ** ** ** ** ** **/
function accueil_bloc_titre($atts)          //* Affichage bloc superieur page  accueil_bloc_titre
{
    $atts = shortcode_atts(                 // Récupérer les attributs sasis sur le shortcode				
        array(
            'src' => ' ',
        ),
        $atts,
        'titre-et-image'
    );

    ob_start();                             // Sauvegarde en mémoire de données (vars et/ou txt) qui suivent
    if ($atts['src'] != "") {
    ?>
        <div class="titre-et-image">
            <img src=" <?= $atts['src'] ?>)" alt="Canette Planty">
        </div>
    <?php
    }
    $output = ob_get_contents();            // Récupération des données sauvegardées dans la var $output	
    ob_end_clean();

    return $output;
}

add_shortcode('titre-et-image', 'accueil_bloc_titre');


/** ** ** ** ** bloc paragraphe developpement ** ** ** ** **/
function accueil_bloc2_developpement($atts)     // 'Energie des plantes + pargraphe
{
    $atts = shortcode_atts(
        array(
            'titre' => '',
            'parag' => ''
        ),
        $atts,
        'titre-et-paragraphe-1'
    );

    ob_start();
    ?>
        <div id="accueil-presentation">
            <h2 class="accueil-presentation-h2"> <?= $atts['titre'] ?> </h2>
            <p class="accueil-presentation-p"> <?= $atts['parag'] ?> </p>
        </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('titre-et-paragraphe-1', 'accueil_bloc2_developpement');


/** ** bloc présentation produits - image et titre ** ** **/
function accueil_carte_produit($atts)       // Affichage des cartes des fruits
{
    $atts = shortcode_atts(
        array(
            'src' => '',
            'nom-produit' => ''
        ),
        $atts,
        'carte-produit'
    );

    ob_start();
    if ($atts['src'] != "") {
    ?>
        <div class="image-produit" style="background-image: url(<?= $atts['src'] ?>)">
            <h2 class="nom-produit"><?= $atts['nom-produit'] ?></h2>
        </div>
    <?php
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('carte-produit', 'accueil_carte_produit');


/** ** ** ** ** ** ** ** ** C T A ** ** ** ** ** ** ** ** **/
function buttons($atts)
{
    $atts = shortcode_atts(
        array(
            'label' => ''
        ),
        $atts,
        'btn'
    );

    ob_start();
    ?>
        <div class="button-box">
            <p class="button-text"><?= $atts['label'] ?></p>
        </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('btn', 'buttons');


/** ** ** ** ** ** *** bloc bas de page ** ** ** ** ** ** **/
function bloc_bas_de_page($atts)
{
    $atts = shortcode_atts(
        array(
            'src' => ''
        ),
        $atts,
        'section-inferieure'
    );

    ob_start();
    if ($atts['src'] != "") {
    ?>
        <div class="image-canettes" style="background-image: url(<?= $atts['src'] ?>)">
        </div>
    <?php
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('section-inferieure', 'bloc_bas_de_page');


/** ** ** ** ** ** ** ** * Feedbacks ** ** ** ** ** ** ** **/
function retour_d_experience($atts)
{
    $atts = shortcode_atts(
        array(
            'src' => '',
            'the-name' => '',
            'the-comment' => ''
        ),
        $atts,
        'feedback'
    );

    ob_start();
    if ($atts['src'] != "") {
    ?>
        <div class="feedback-box">
            <img class="feed-img" src="<?= $atts['src'] ?>" alt="Témoignage">
            <div class="retour">
                <h3 class="customer-name"><?= $atts['the-name'] ?></h3>
                <p class="feed-text"><?= $atts['the-comment'] ?></p>
            </div>
        </div>
    <?php
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('feedback', 'retour_d_experience');


/* ** ** ** ** ** P A G E - NOUS - RENCONTRER ** ** ** ** **/

/** ** ** ** ** ** ** ** ** L'équipe ** ** ** ** ** ** ** **/
function lequipe($atts)
{
    $atts = shortcode_atts(
        array(
            'src' => '',
            'member-name' => '',
            'member-duty' => ''
        ),
        $atts,
        'the-staff'
    );

    ob_start();
    if ($atts['src'] != "") {
    ?>
        <div id="member-box">
            <img class="member-img" src="<?= $atts['src'] ?>" alt="Image de membre">
            <p class="member-name"><?= $atts['member-name'] ?></p>
            <p><?= $atts['member-duty'] ?></p>
        </div>
    <?php
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('the-staff', 'lequipe');


/* ** ** ** ** ** ** P A G E - COMMANDER * ** ** ** ** ** **/

/** ** ** ** ** ** ** ** ** * Caddey ** ** ** ** ** ** ** **/
function corbeille($atts)
{
    $atts = shortcode_atts(
        array(
            'nom-produit' => ''
        ),
        $atts,
        'caddey'
    );

    ob_start();
    if ($atts['nom-produit'] != "") {
    ?>
        <div class="le-caddey">
            <div class="choix-cadre">
                <div class="affichage-quantite-cadre">
                    <p class="affichage-quantite-typo"> 0 </p>
                </div>
                <div class="plus-moins-cadre">
                    <p class="plus-moins-typo"> + </p>
                    <hr class="plus-moins-separateur">
                    <p class="plus-moins-typo"> - </p>
                </div>
            </div>
            <div id="<?= $atts['nom-produit'] ?>" class="validation-cadre">
                <p class="validation-typo"> OK </p>
            </div>
        </div>
    <?php
    }
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('caddey', 'corbeille');
