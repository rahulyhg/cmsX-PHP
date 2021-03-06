<?php

return [
    'entities' => [
        // 'articles' => '\Article' for simple sorting (entityName => entityModel) or
        // 'articles' => ['entity' => '\Article', 'relation' => 'tags'] for many to many or many to many polymorphic relation sorting
        'logos' => '\App\Model\Logo',
        'offer' => '\App\Model\Offer',
        'sliders' => '\App\Model\Slider',
        'realizations' => '\App\Model\Realization',
        'technologies' => '\App\Model\Technology',
    ],
];
