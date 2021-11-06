<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = "seo";
    protected $fillable = ['meta_title', 'meta_author', 'meta_description', 'google_analytics', 'bing_analytics'];
}
