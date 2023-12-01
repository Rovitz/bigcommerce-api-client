<?php

namespace Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Tree\TreeCategory;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class TreeCategory extends ResourceModel
{
    public $tree_id;
    public $category_id;
    public $parent_id;
    public $name;
    public $description;
    public $views;
    public $sort_order;
    public $page_title;
    public $meta_keywords;
    public $meta_description;
    public $layout_file;
    public $image_url;
    public $is_visible;
    public $search_keywords;
    public $default_product_sort;
    public $url;
}
