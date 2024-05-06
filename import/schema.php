<?php

function get_schema(){
    return [
        'contributor' => [ // prispevatele
            'post_title' => ['fieldlist/field' => ['@index', 'prijmeni','#text']], // find, match, pick
            'post_content' => ['fieldlist/field' => ['@index', 'bio', '#text']], 
            'meta_input' => [
                'uid' => ['fieldlist/field' => ['@index', 'uid', '#text']],
                'pid' => ['fieldlist/field' => ['@index', 'pid', '#text']],
                'hidden' => ['fieldlist/field' => ['@index', 'hidden', '#text']],
                'name' => ['fieldlist/field' => ['@index', 'jmeno', '#text']],
                'surname' => ['fieldlist/field' => ['@index', 'prijmeni', '#text']],
                'email' => ['fieldlist/field' => ['@index', 'email', '#text']],
                'phone' => ['fieldlist/field' => ['@index', 'telefon', '#text']],
                'confidential_note' => ['fieldlist/field' => ['@index', 'poznamka', '#text']],
            ]
        ],
        'keywords' => [ // datastore
            'post_title' => ['fieldlist/field' => ['@index', 'title', '#text']],
            'post_content' => ['fieldlist/field' => ['@index', 'info', '#text']],
            'meta_input' => [
                'uid' => ['fieldlist/field' => ['@index', 'uid', '#text']], 
                'pid' => ['fieldlist/field' => ['@index', 'pid', '#text']], 
                'hidden' => ['fieldlist/field' => ['@index', 'hidden', '#text']],
                'language_reference' => ['fieldlist/field' => ['@index', 'l10n_parent', '#text']],
                'artwork' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_dilo', 'id']],
                'artist' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_umelec', 'id']],
                'group' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_skupina', 'id']],
                'event' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_akce', 'id']],
                'video' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_video', 'id']],
            ]
        ],
        'spaces' => [ // prostory
            'post_title' => ['fieldlist/field' => ['@index', 'title', '#text']],
            'post_content' => ['fieldlist/field' => ['@index', 'info', '#text']],
            'meta_input' => [
                'uid' => ['fieldlist/field' => ['@index', 'uid', '#text']], 
                'pid' => ['fieldlist/field' => ['@index', 'pid', '#text']], 
                'hidden' => ['fieldlist/field' => ['@index', 'hidden', '#text']],
                'language_reference' => ['fieldlist/field' => ['@index', 'l10n_parent', '#text']],
                'sys_language' => ['related/field/relations/element' => ['table', 'sys_language', 'id']], // 1 == en
                'files' => ['related/field/relations/element' => ['table', 'sys_file', 'id']],
                'sys_file_reference' => ['related/field/relations/element' => ['table', 'sys_file_reference', 'id']],
                'video' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_video', 'id']],
            ]
        ],
        'theorists' => [ // teoretici
            'post_title' => ['fieldlist/field' => ['@index', 'prijmeni','#text']], // find, match, pick
            'post_content' => ['fieldlist/field' => ['@index', 'info', '#text']],
            'meta_input' => [
                'uid' => ['fieldlist/field' => ['@index', 'uid', '#text']], 
                'pid' => ['fieldlist/field' => ['@index', 'pid', '#text']], 
                'language_reference' => ['fieldlist/field' => ['@index', 'l10n_parent', '#text']],
                'hidden'    => ['fieldlist/field' => ['@index', 'hidden', '#text']],
                'surname'   => ['fieldlist/field' => ['@index', 'prijmeni', '#text']],
                'nicknames' => ['fieldlist/field' => ['@index', 'pseudonymy', '#text']],
                'born_date' => ['fieldlist/field' => ['@index', 'narozen', '#text']],
                'born_place' => ['fieldlist/field' => ['@index', 'mistonarozeni', '#text']],
                'died' => ['fieldlist/field' => ['@index', 'umrti', '#text']],
                'lives_works_place' => ['fieldlist/field' => ['@index', 'zijeapracuje', '#text']],
                'worked_place' => ['fieldlist/field' => ['@index', 'zilapracoval', '#text']],
                'address' => ['fieldlist/field' => ['@index', 'adresa', '#text']],
                'email' => ['fieldlist/field' => ['@index', 'email', '#text']],
                'web' => ['fieldlist/field' => ['@index', 'web', '#text']],
                'info' => ['fieldlist/field' => ['@index', 'info', '#text']],
                'phone' => ['fieldlist/field' => ['@index', 'telefon', '#text']],
                'profesnizivotopis' => ['fieldlist/field' => ['@index', 'profesnizivotopis', '#text']],
                'clenstvivnezarazenych' => ['fieldlist/field' => ['@index', 'clenstvivnezarazenych', '#text']],
                'samvysnezarazene' => ['fieldlist/field' => ['@index', 'samvysnezarazene', '#text']],
                'skuvysnezarazene' => ['fieldlist/field' => ['@index', 'skuvysnezarazene', '#text']],
                'dalsirealizace' => ['fieldlist/field' => ['@index', 'dalsirealizace', '#text']],
                'sbirky' => ['fieldlist/field' => ['@index', 'sbirky', '#text']],
                'monografie' => ['fieldlist/field' => ['@index', 'monografie', '#text']],
                'clanky' => ['fieldlist/field' => ['@index', 'clanky', '#text']],
                'jinekriticketextynez' => ['fieldlist/field' => ['@index', 'jinekriticketextynez', '#text']],
                'vlastnitextynez' => ['fieldlist/field' => ['@index', 'vlastnitextynez', '#text']],
                'poznamky' => ['fieldlist/field' => ['@index', 'poznamky', '#text']],
                'autoranotace' => ['fieldlist/field' => ['@index', 'autoranotace', '#text']],
                'clenstviveskup' => ['fieldlist/field' => ['@index', 'clenstviveskup', '#text']],
                'samovystavy' => ['fieldlist/field' => ['@index', 'samovystavy', '#text']],
                'krittexty' => ['fieldlist/field' => ['@index', 'krittexty', '#text']],
                'vlasttexty' => ['fieldlist/field' => ['@index', 'vlasttexty', '#text']],
                'vystavyvdb' => ['fieldlist/field' => ['@index', 'vystavyvdb', '#text']],
                'textyvdb' => ['fieldlist/field' => ['@index', 'textyvdb', '#text']],
                'vystavynezarazene' => ['fieldlist/field' => ['@index', 'vystavynezarazene', '#text']],
                'vzdelanigrantystipendia' => ['fieldlist/field' => ['@index', 'vzdelanigrantystipendia', '#text']],
                'praxe' => ['fieldlist/field' => ['@index', 'praxe', '#text']],
                'bibliografie' => ['fieldlist/field' => ['@index', 'bibliografie', '#text']],
                'textynezarazene' => ['fieldlist/field' => ['@index', 'textynezarazene', '#text']],
                'datumanotace' => ['fieldlist/field' => ['@index', 'datumanotace', '#text']],
                'anotace' => ['fieldlist/field' => ['@index', 'anotace', '#text']],
                'language_reference' => ['fieldlist/field' => ['@index', 'l10n_parent', '#text']],
                'sys_language' => ['related/field/relations/element' => ['table', 'sys_language', 'id']], // 1 == en
                'dila' => ['fieldlist/field' => ['@index', 'dila', '#text']],
                'videa' => ['fieldlist/field' => ['@index', 'videa', '#text']],
                'theorists' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_teoretik', 'id']],
                'contributors' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_spolupracovnik', 'id']],
            ]
        ],
    ];
}