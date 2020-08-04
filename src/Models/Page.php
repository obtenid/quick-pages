<?php

namespace Obtenid\QuickPages\Models;

use Obtenid\QuickPages\Contracts\PageInterface;
use Illuminate\Database\Eloquent\Model;
use Obtenid\QuickPages\Casts\Json;

/**
 * Class Page
 * @package App
 * @property string $category
 * @property integer $parent_id
 * @property string $slug
 * @property string $lang
 * @property string $name
 * @property string $status
 * @property string $images
 * @property string $intro_title
 * @property string $intro_text
 * @property string $intro_link
 * @property string $title
 * @property string $page_title
 * @property string $keywords
 * @property string $description
 * @property array $content
 * @property string $json_ld
 * @property string $priority
 * @property string $change_freq
 * @property string $published_at
 * @property string $created_at
 * @property string $updated_at
 */
abstract class Page extends Model implements PageInterface
{
    const CATEGORY_DEFAULT = 'default';

    const STATUS_READY = 'ready';
    const STATUS_DRAFT = 'draft';
    const STATUS_HIDE = 'hide';

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'content' => Json::class,
        'images' => Json::class,
    ];

    protected $fillable = [
        'category',
        'parent_id',
        'status',
        'lang',
        'name',
        'slug',
        'title',
        'page_title',
        'keywords',
        'description',
        'json_ld',
        'intro_title',
        'intro_text',
        'intro_link',
        'content',
        'published_at',
        'created_at',
        'priority',
        'change_freq',
    ];

    public function parent() {
        return $this->hasOne(static::class, 'id', 'parent_id');
    }
    
    public static function getCategories() {
        return [
            static::CATEGORY_DEFAULT => static::CATEGORY_DEFAULT
        ];
    }
    
    public static function getStatuses() {
        return [
            static::STATUS_READY => static::STATUS_READY,
            static::STATUS_DRAFT => static::STATUS_DRAFT,
            static::STATUS_HIDE => static::STATUS_HIDE,
        ];
    }    

    public function getUrl($addHost = false) {
        if (!$addHost) {
            return $this->slug;
        }
        
        return config('app.url') . $this->slug;
    }

    /**
     * @return array
     */
    public function getBreadcrumbs() {
        $breadcrumbs = [$this->getUrl() => $this->getName()];

        $page = $this;
        while (!empty($page->parent_id)) {
            $page = $page->parent()->get()[0];
            $breadcrumbs[$page->getUrl()] = $page->getName();
        }

        return array_reverse($breadcrumbs);
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPageTitle() {
        return $this->page_title;
    }
    
    public function getKeywords() {
        return $this->keywords;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getContent() {
        return $this->content;
    }    
    
    public function getJsonLD() {
        return $this->json_ld;
    }
    
    public function getImages() {
        return $this->images;
    }
    
    public function getIntroTitle() {
        return $this->intro_title;
    }
    
    public function getIntroText() {
        return $this->intro_text;
    }
    
    public function getIntroLink() {
        return $this->intro_link;
    }

    public function getOgTags() {
        return [];
    }
    
    public function getPriority() {
        return $this->priority;
    }
    
    public function getChangeFreq() {
        return $this->change_freq;
    }
}
