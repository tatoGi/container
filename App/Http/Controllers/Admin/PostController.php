<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\MenuSection;
use App\Models\Post;
use App\Models\PostFile;
use Illuminate\Support\Facades\Validator;
use App\Models\PostTranslation;
use App\Models\Product;
use App\Models\SectionTranslation;
use App\Models\Slug;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index($sec){
        $section = Section::where('id', $sec)->with('translations')->first();

        if (isset($section->type) && $section->type['type'] === 3) {
            $post = Post::where('section_id', $sec)->with(['translations', 'slugs'])->first();
            if (isset($post) && $post !== null) {
                return Redirect::route('post.edit', [app()->getLocale(), $post->id,]);
            }
            return Redirect::route('post.create', [app()->getLocale(), $sec,]);

        }
<<<<<<< HEAD
        
=======
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
        $posts = Post::where('section_id', $sec)->orderBy('date', 'desc')->orderBy('created_at', 'asc')
		->join('post_translations', 'posts.id', '=', 'post_translations.post_id')
		->where('post_translations.locale', '=', app()->getLocale())
        
		->select('posts.*', 'post_translations.text', 'post_translations.desc', 'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug');
       
		$posts = $posts->with(['translations', 'slugs'])->paginate(settings('Paginate'));
        return view('admin.posts.list', compact(['section', 'posts']));
    }

    public function create($sec){
        $section = Section::where('id', $sec)->with('translations')->first();

        return view('admin.posts.add', compact(['section']));
    }



    public function store($sec, Request $request){
<<<<<<< HEAD
       
       
        $section = Section::where('id', $sec)->with('translations')->first();
        $values = $request->all();
       
=======


        $section = Section::where('id', $sec)->with('translations')->first();
        $values = $request->all();
        // dd($values);
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
        $values['section_id'] = $sec;
        $values['author_id'] = auth()->user()->id;
        $postFillable = (new Post)->getFillable();
        
       
        $postTransFillable = (new PostTranslation)->getFillable();
       
        if(isset($values['icon']) && ($values['icon'] != '')){
            $newiconName = uniqid() . "." . $values['icon']->getClientOriginalExtension();
            $values['icon']->move(config('config.file_path'), $newiconName );
            $values['icon'] = '';
            $values['icon'] = $newiconName;
        }elseif(isset($values['old_icon'])){
            $values['icon'] = $values['old_icon'];
        }
        if(isset($values['cover']) && ($values['cover'] != '')){
            $newcoverName = uniqid() . "." . $values['cover']->getClientOriginalExtension();
            $values['cover']->move(config('config.file_path'), $newcoverName );
            $values['cover'] = '';
            $values['cover'] = $newcoverName;
        }elseif(isset($values['old_cover'])){
            $values['cover'] = $values['old_cover'];
        }
<<<<<<< HEAD
       

        $values['additional'] = getAdditional($values, array_diff(array_keys($section->fields['nonTrans']) , $postFillable) );


       

=======
        $values['additional'] = getAdditional($values, array_diff(array_keys($section->fields['nonTrans']), $postFillable) );
		
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
        foreach(config('app.locales') as $locale){
            if($values[$locale]['slug'] != ''){
                $values[$locale]['slug'] = SlugService::createSlug(PostTranslation::class, 'slug', $values[$locale]['slug']);
            }else{
                $values[$locale]['slug'] = SlugService::createSlug(PostTranslation::class, 'slug', $values[$locale]['title']);
            }

            $values[$locale]['locale_additional'] = getAdditional($values[$locale], array_diff(array_keys($section->fields['trans']), $postTransFillable) );   
        }
        $post = Post::create($values);
        
        foreach(config('app.locales') as $locale){
            $post->slugs()->create([
                'fullSlug' => $locale.'/'.$post->translate($locale)->slug,
                'locale' => $locale
            ]);
        }
<<<<<<< HEAD
        

        if (isset($values['invoice']) && (count($values['invoice']) > 0)) {

            foreach ($values['invoice'] as $key => $invoice) {
               
                $product = new Product;
              
                $product->Size = $invoice['Size'];
                $product->Weight = $invoice['Weight'];
                $product->Price = $invoice['Price'];
                $product->Color = $invoice['Color'];
                $product->sort = $key;
                $product->post_id = $post->id;
               
                
                $product->save();
                

                
               
                
            }
        }
        




=======
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
        if (isset($values['files']) && count($values['files']) > 0) {
			
            foreach($values['files'] as $key => $files){
				foreach($files['file'] as $k => $file){
					$postFile = new PostFile;
					$postFile->type = $key;
					$postFile->file = $file;
					$postFile->title = $values['files'][$key]['desc'][$k];
					$postFile->post_id = $post->id;
					$postFile->save();
				}
            }
        }
        
        return Redirect::route('post.list', [app()->getLocale(), $section->id,]);
    }




    public function edit($id){
       
        $post = Post::where('id', $id)->with(['translations', 'files'])->first();
        $product = Product::where('post_id', $post->id)->get();
        
        $section = Section::where('id', $post->section_id)->with('translations')->first();
        return view('admin.posts.edit', compact('section','product', 'post'));
    }


 
    public function update($id, Request $request){
       
        $post = Post::where('id', $id)->with('translations')->first();
        
        $product = Product::where('post_id', $post->id)->get();

        $section = Section::where('id', $post->section_id)->with('translations')->first();

        Post::find($id)->slugs()->delete();

        $values = $request->all();
        if(isset($values['invoice_dfile']) && $values['invoice_dfile']){
            foreach($values['invoice_dfile'] as $key => $invoice){
    
                $product = Product::whereId($invoice['porduct_id'])->first();
                if($product != ''){
                   $product->size =  $invoice['size'];
                   $product->weight =  $invoice['weight'];
                   $product->price =  $invoice['price'];
                   $product->color =  $invoice['color'];
                   $product->update();
                }else{
                    $product = new Product;
                          
                            $product->size = $invoice['size'];
                            $product->weight = $invoice['weight'];
                            $product->price = $invoice['price'];
                            $product->color = $invoice['color'];
                            $product->sort = $key;
                            $product->post_id = $post->id;
                           
                            
                            $product->save();
                }
               }

        }
       
        $postFillable = (new Post)->getFillable();
        $postTransFillable = (new PostTranslation)->getFillable();
        if(isset($values['icon']) && ($values['icon'] != '')){

            $newiconName = uniqid() . "." . $values['icon']->getClientOriginalExtension();
            $values['icon']->move(config('config.file_path'), $newiconName );
            $values['icon'] = '';
            $values['icon'] = $newiconName;
        }elseif(isset($values['old_icon'])){
            $values['icon'] = $values['old_icon'];
        }

        if(isset($values['cover']) && ($values['cover'] != '')){

            $newcoverName = uniqid() . "." . $values['cover']->getClientOriginalExtension();
            $values['cover']->move(config('config.file_path'), $newcoverName );
            $values['cover'] = '';
            $values['cover'] = $newcoverName;
        }elseif(isset($values['old_cover'])){
            $values['cover'] = $values['old_cover'];
        }
        $values['additional'] = getAdditional($values, array_diff(array_keys($section->fields['nonTrans']), $postFillable) );

       
        foreach(config('app.locales') as $locale){

            if($values[$locale]['slug'] != $post[$locale]->slug){

                $values[$locale]['slug'] = SlugService::createSlug(PostTranslation::class, 'slug', $values[$locale]['slug']);

            }
           
				$post->slugs()->create([
					'fullSlug' => $locale.'/'.$post->translate($locale)->slug,
					'locale' => $locale
				]);
               
			
<<<<<<< HEAD
           
=======
            // dd($values);
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
            if(isset($values[$locale]['file']) && ($values[$locale]['file'] != '')){
               
                $newfileName = uniqid() . "." . $values[$locale]['file']->getClientOriginalExtension();
                $values[$locale]['file']->move(config('config.file_path'), $newfileName );
                $values[$locale]['file'] = '';
                $values[$locale]['file'] = $newfileName;
            }elseif(isset($values[$locale]['old_file'])){
                $values[$locale]['file'] = $values[$locale]['old_file'];
            }
            $values[$locale]['locale_additional'] = getAdditional($values[$locale], array_diff(array_keys($section->fields['trans']), $postTransFillable) );
        }

        $allOldFiles = PostFile::where('post_id', $post->id)->get();
       
        foreach ($allOldFiles as $key => $fil) {
            if(isset($values['old_file']) && count($values['old_file']) > 0) {
            if(!in_array($fil->id, array_keys($values['old_file']))){
                $fil->delete();
            }
            }else{
                $fil->delete();
            }
        }

       
        Post::find($post->id)->update($values);
       
     
        
        return Redirect::route('post.list', [app()->getLocale(), $section->id,]);
    }

    public function destroy($id){

        $post = Post::where('id', $id)->first();
        // foreach (Post::find($id)->slugs()->get() as $slug) {

        //     // Post::find($id)->delete();
        // }
        $section = Section::where('id', $post->section_id)->with('translations')->first();

        $files = PostFile::where('post_id', $post->id)->get();
        foreach($files as $file){
           
            if(file_exists(config('config.image_path').$file->file)){
                unlink(config('config.image_path').$file->file);
                }else{
                dd('File does not exists.');
                }
                if(file_exists(config('config.image_path').'thumb/'.$file->file)){
                    unlink(config('config.image_path').'thumb/'.$file->file);
                    }else{
                    dd('File does not exists.');
                    }
            $file->delete();
        }

        PostTranslation::where('post_id', $post->id)->delete();

        Post::find($id)->slugs()->delete();
        $post->delete();


        return Redirect::route('post.list', [app()->getLocale(), $section->id,]);
    }






<<<<<<< HEAD
    // public function DeleteFile($que) {
    //     $post = Post::where('id', $que)->first();
    //     if($post->cover != ''){
    //         unlink(config('config.file_path').$post->cover);
    //     }
    //     $post->cover = '';
    //     $User_Update = Post::where("id", $que)->update(["cover" => null]);

    //     return response()->json(['success' => 'File Deleted']);
    // }

    public function DeleteProduct($que){
=======
    public function DeleteFile($que) {
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
        $post = Post::where('id', $que)->first();
        if($post->product != ''){
        $post->product->delete();
         }
         $post->product = '';

     return response()->json(['success' => 'File Deleted']);

}
}