<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Section;
use App\Models\Banner;
use App\Models\User;
use Carbon\Carbon;
class WebsiteComposer
{

    public function __construct()
    {

        $this->model = 0;
        
        $this->sections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })
        ->whereHas('menuTypes', function($q){
            $q->where('menu_type_id', 1);
        })
		->whereHas('translations', function($q){
			$q->where('active', 1);
		})->with(array('children' => function($query) {
            $query->whereHas('menuTypes', function($q){
                $q->where('menu_type_id', 1);
            })
            ->orderBy('order', 'asc');
		}))
        ->with(['translations', 'menuTypes'])
				->where('parent_id', null)
<<<<<<< HEAD
        ->orderBy('order', 'asc')
=======
        ->orderBy('order', 'asc')->orderBy('created_at', 'desc')
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
        ->get();


        $this->footerSections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })->whereHas('menuTypes', function($q) {
            $q->where('menu_type_id', 2);
        
        })        ->with(['translations', 'menuTypes', 'children'])
        ->orderBy('order', 'asc')
        ->limit(12)->get();
        // $this->footerSections = Section::whereHas('translations', function($q) {
        //     $q->where('active' , 1)->whereLocale(app()->getLocale());
        // })->orderBy('order', 'asc')->limit(6)->get();
       

            $this->mainBanner = Banner::whereHas('translations', function($q) {
                $q->where('active' ,1)->whereLocale(app()->getLocale());
            })->orderBy('date', 'asc')->get();
            
	

    }
    public function compose(View $view)
    {
        $view->with([
			'sections' => $this->sections,
			'footerSections' => $this->footerSections,
			'mainBanner' => $this->mainBanner,
			'sidebar_menu' => $this->footerSections,
		]);
    }
}
