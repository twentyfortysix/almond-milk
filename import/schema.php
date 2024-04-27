<?php

function get_schema(){
    return [
        'contributor' => [
            'post_title' => ['fieldlist/field' => ['@index', 'prijmeni','#text']], // find, match, pick
            'post_content' => ['fieldlist/field' => ['@index', 'bio', '#text']], 
            'meta_input' => [
                'uid' => ['fieldlist/field' => ['@index', 'uid', '#text']],
                'pid' => ['fieldlist/field' => ['@index', 'pid', '#text']],
                'name' => ['fieldlist/field' => ['@index', 'jmeno', '#text']],
                'surname' => ['fieldlist/field' => ['@index', 'prijmeni', '#text']],
                'email' => ['fieldlist/field' => ['@index', 'email', '#text']],
                'phone' => ['fieldlist/field' => ['@index', 'telefon', '#text']],
                'confidential_note' => ['fieldlist/field' => ['@index', 'poznamka', '#text']],
            ]
        ],
        'keywords' => [
            'type' => 'post',
            'post_title' => ['fieldlist/field' => ['@index', 'title', '#text']],
            'post_content' => ['fieldlist/field' => ['@index', 'info', '#text']],
            'meta_input' => [
                'uid' => ['fieldlist/field' => ['@index', 'uid', '#text']], 
                'pid' => ['fieldlist/field' => ['@index', 'pid', '#text']], 
                'subtitle' => ['fieldlist/field' => ['@index', 'subtitle', '#text']],
                // 'text_author' => ['autoranotace' => ['@index', 'autoranotace', '#text']], looks abandoned
                'language_reference' => ['related/field/relations/element' => ['table', 'sys_language', 'id']],
                'language_reference' => ['related/field/relations/element' => ['table', 'tx_artlist_domain_model_klicoveslovo', 'id']],
            ]
        ],
        // 'space' => [
        //     'type' => 'post',
        //     'post_title' => 'title',
        //     'post_content' => 'bio',
        //     'meta_input' => [
        //         'uid' => 'uid',
        //         'pid' => 'pid',
        //         'subtitle' => 'subtitle',
        //         'description' => 'description',
        //         'categories' => 'categories'
        //     ]
        // ],
        // dilo
        // 'artwork' => [
        //     'type' => 'post',
        //     'post_title' => 'title',
        //     'meta_input' => [
        //         'uid' => 'uid',
        //         'pid' => 'pid',
        //         'relations' => [
        //             'element' => ['id','table']
        //         ]
        //     ]
        // ]
        // Obrazy
    ];
}