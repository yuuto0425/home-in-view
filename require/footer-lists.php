<?php 

$footer_lists = [
    [
        'title'=>'HOME',
        'link'=>'/',
        'current'=>'current',
        'page-current'=>is_front_page(),

    ],
    [
        'title'=>'ABOUT',
        'link'=>'about',
        'current'=>'current',
        'page-current'=>is_page('about'),

    ],
    [
        'title'=>'SERVICE',
        'link'=>'service',
        'current'=>'current',
        'page-current'=>is_page('service'),

    ],
    [
        'title'=>'LOCATION',
        'link'=>'location',
        'current'=>'current',
        'page-current'=>is_home()||is_date()||is_single()||is_category() ,

    ],
    [
        'title'=>'NEWS',
        'link'=>'news',
        'current'=>'current',
        'page-current'=>  is_post_type_archive('news')||is_tax('news_category')||is_singular('news'),

    ],
    [
        'title'=>'CONTACT',
        'link'=>'contact',
        'current'=>'current',
        'page-current'=>is_page('contact'),
    ],
]

;?>