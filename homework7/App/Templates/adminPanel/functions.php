<?php

return [
    function ($article) {
        return $article->id;
    },
    function ($article) {
        return $article->content;
    },
    function ($article) {
        return $article->author->name ?? '';
    }
];

