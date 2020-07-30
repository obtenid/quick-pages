<?php

namespace Obtenid\QuickPages\Contracts;

interface PageInterface
{
    public function getUrl($addHost = false);
    
    public function getBreadcrumbs();
    
    public function getName();
    public function getTitle();
    public function getPageTitle();
    public function getKeywords();
    public function getDescription();
    public function getContent();
    public function getJsonLD();
    public function getImages();
    public function getIntroTitle();
    public function getIntroText();
    public function getIntroLink();
    public function getOgTags();
    public function getPriority();
    public function getChangeFreq();
}
