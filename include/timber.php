<?php 
// TIMBER related
Timber\Timber::init();

// set default *.twig location
Timber::$dirname = 'twig';

// add Timber helpers
function add_to_twig($twig) {
    /* this is where you can add your own fuctions to twig */
    $function = new Twig\TwigFunction('enqueue_script', function ($handle) {
        // register it elsewhere
        wp_enqueue_script( $handle);
    });
    $twig->addFunction($function);

    $function = new Twig\TwigFunction('enqueue_style', function ($handle) {
        // register it elsewhere
        wp_enqueue_style( $handle);
    });
    $twig->addFunction($function);
    
    return $twig;
}
add_filter('timber/twig', 'add_to_twig');


add_filter( 'timber/twig/filters', function( $filters ) {
    $filters['typo'] = [
        'callable' => 'fix_typo',
    ];

    return $filters;
} );



function fix_typo( $text ) {

    $strings = [
        // ve spojení neslabičných předložek k, s, v, z s následujícím slovem, např. k mostu, s bratrem, v Plzni, z nádraží,
        'k', 's', 'v', 'z',
        // ve spojení slabičných předložek o, u a spojek a, i s výrazem, který po nich následuje, např. u babičky, o páté,
        'o', 'u', 'a', 'i',
        // mezi číslem a zkratkou počítaného předmětu nebo písmennou značkou jednotek a měn, např. 5 str., 8 hod., s. 53, č. 9, obr. 1, tab. 3, ..
        'např.', 'str.', 's.', 'č.', 'obr.', 'tab',
        // mezi zkratkami typu tj., tzv., tzn. a výrazem, který za nimi bezprostředně následuje, např. tzv. klikání,
        'tj.', 'tzv.', 'tzn.',
        // mezi zkratkou titulu nebo hodnosti uváděnou před osobním jménem, např. p. Čečetková, mjr. Veselý, Ing. Poliaková 
        'p.', 'Mga.', 'MgA.', 'Ing.', 'mjr.', 'A.',  'art.', 'doc.', 'Ph.', 'Mgr.', 'arch.'
        ];

    for ($i=0; $i < count($strings); $i++) { 
        // replace multiple cases in one go
        $text = str_replace( [' ' . $strings[$i] . ' ', "\n" . $strings[$i] . ' ', ">" . $strings[$i] . ' '],
                             [' ' . $strings[$i] . '&nbsp;', "\n" . $strings[$i] . '&nbsp;', ">" . $strings[$i] . '&nbsp;'],
                             $text
                );
    }
    
    return $text;
}
