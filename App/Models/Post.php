<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Post extends Model
{
    use HasFactory;
    use Translatable;

    protected $casts = [
        'additional' => 'collection'
    ];


    protected $fillable = [
        'section_id',
        'additional',
        'thumb',
        'author_id',
        'date',
		'additional',
		'country',
        'active_on_home'
    ];
    public $translatedAttributes = [
        'title',
        'slug',
        'keywords',
        'desc',
        'text',
        'locale_additional',
        'active',
        'files'
    ];
    public function slugs(){
        return $this->morphMany(Slug::class, 'slugable');
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'post_id', 'id');
    }



    /**
     * Get the user associated with the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function parent() {
        return $this->belongsTo('App\Models\Section', 'section_id')->with('translations');
    }
    public function getFullSlug() {
		$slug = Slug::where('slugable_type', 'App\Models\Post')->where('slugable_id', $this->id)->where('locale', app()->getlocale())->first();

		if ($slug !== null) {
			return $slug->fullSlug;
		}
		return null;

    }

    public function section(){
        return Section::where('id', $this->section_id)->with('translations')->first();

    }
    /**
     * Get all of the files for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files($type = null)    {
		if ($type !== null) {
			return $this->hasMany(PostFile::class, 'post_id', 'id')->where('type', $type);
		}
        return $this->hasMany(PostFile::class, 'post_id', 'id');
    }


    public function getAttribute($key)
    {
        if (in_array($key, locales())) {

            return $this->translations->keyBy('locale')->get($key);

        }

        if (isset($this->attributes['additional']) && array_key_exists($key, json_decode($this->attributes['additional'], true))) {

            return json_decode($this->attributes['additional'], true)[$key];
        }

        return parent::getAttribute($key);
    }
    public function getTranslatedFullSlugs() {
        // $slugs = $this->post_section()->getTranslatedFullSlugs();
        $slugs['ka'] = 'ka';
        $slugs['en'] = 'en';

        $translations = $this->translations;
        foreach ($translations as $key => $value) {
            // dd($value->locale);
            $slugs[$value->locale] = $slugs[$value->locale] . '/' . $value->slug;
        }
        return $slugs;
    }

}
