# Quick pages for Laravel 7

## Installation

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-pages
    ```

2. Add the service provider at **the end** of the `providers` array in `config/app.php`:

    ```php
    JeroenNoten\LaravelPages\ServiceProvider::class,
    ```

## Usage
`<?php

namespace App;

use Obtenid\QuickPages\Models\Page as QuickPage;

class Page extends QuickPage
{

}`