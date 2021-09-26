<?php

namespace App\Contracts;



interface Parser
{
    public function getParsedList(string $url) : array;

    public function storeParsedNews(int $categoryId);
}