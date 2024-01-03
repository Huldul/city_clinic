<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Aboutimage;
use App\Models\Aboutpage;
use App\Models\Direction;
use App\Models\Indexpage;
use App\Models\Instagramimage;
use App\Models\News;
use App\Models\Serviceprice;
use App\Models\Subdirection;
use App\Models\Video;
use App\Models\Worker;
use App\Models\Indexswiper;
use App\Models\Seopage;

class PageController extends Controller
{

    public function changeRu($page  = null){
        
        if ($page === null) { 
            // Логика обработки, если параметр отсутствует
            return redirect("/kz/");
        } else {
            // Логика обработки, если параметр присутствует
            return redirect("/kz/".$page);
        }
        
    }
    public function changeKz($page  = null){
        
        if ($page === null) {
            // Логика обработки, если параметр отсутствует
            return redirect("/");
        } else {
            // Логика обработки, если параметр присутствует
            return redirect($page);
        }
        
        
    }
    public function changeRuOnEn($page  = null){
        $routeWithoutLanguage = str_replace('kz/', '', $page);
        // dd($routeWithoutLanguage . '  '.$page);
        if ($page === null) {
            // Логика обработки, если параметр отсутствует
            return redirect("/kz/");
        } else {
            // Логика обработки, если параметр присутствует
            return redirect("/kz/".$routeWithoutLanguage);
        }
        
    }
    public function changeEnOnEn($page  = null){
        $routeWithoutLanguage = str_replace('kz/', '', $page);
        // dd($routeWithoutLanguage. '  '.$page);
        if ($page === null) {
            // Логика обработки, если параметр отсутствует
            return redirect("/");
        } else {
            // Логика обработки, если параметр присутствует
            return redirect($routeWithoutLanguage);
        }
        
        
    }

    public function index(){
        $directions = Direction::All();
        $indexpage = Indexpage::firstOrFail();
        $instagrams = Instagramimage::All();
        $videos = Video::All();
        $indexswipers = Indexswiper::All();
        $directions_ind = Direction::paginate(4);
        $seo = Seopage::Where('page', 'main')->first();
        return view('index', [
            'directions'=>$directions,
            'directions_ind'=>$directions_ind,
            'indexpage'=>$indexpage,
            'instagrams'=>$instagrams,
            'videos'=>$videos,
            'indexswipers'=>$indexswipers,
            'seo'=>$seo,
        ]);
    }
    public function about(){
        $directions = Direction::All();
        $aboutpage = Aboutpage::firstOrFail();
        $images = Aboutimage::All();
        $seo = Seopage::Where('page', 'about')->first();
        return view('about', [
            'directions'=>$directions,
            'page'=>$aboutpage,
            'images'=>$images,
            'seo'=>$seo,
        ]);
    }
    public function blog_inner($id){
        $directions = Direction::All();
        $blog = News::Where('slug', $id)->first();
        $seo = (object)[];
    
        if ($blog instanceof News) {
            $seo = (object)[
                'title' => $blog->seo_title,
                'description' => $blog->seo_description,
                'keywords' => $blog->seo_keywords,
            ];
        }
        
        return view('blog-inner', [
            'directions'=>$directions,
            'blog'=>$blog,
            'seo'=>$seo,
        ]);
    }
    public function blog(){
        $directions = Direction::All();
        $news = News::paginate(9);
        $seo = Seopage::Where('page', 'blog')->first();
        return view('blog', [
            'directions'=>$directions,
            'news'=>$news,
            'seo'=>$seo,
        ]);
    }
    public function contacts(){
        $directions = Direction::All();
        $seo = Seopage::Where('page', 'contacts')->first();
        return view('contacts', [
            'directions'=>$directions,
            'seo'=>$seo,
        ]);
    }
    public function directions_inner($id){


        $directions = Direction::All();
        $direction = Direction::Where('slug',$id)->first();
        // dd($direction);
        $workers = Worker::paginate(8);
        $subdirections = $direction ? $direction->subdirections : collect();

        $seo = (object)[];
    
        if ($direction instanceof Direction) {
            $seo = (object)[
                'title' => $direction->seo_title,
                'description' => $direction->seo_description,
                'keywords' => $direction->seo_keywords,
            ];
        }
        
        return view('directions-inner', [
            'directions'=>$directions,
            'direction'=>$direction,
            'workers'=>$workers,
            'subdirections'=>$subdirections,
            'seo'=>$seo,
        ]);
    }
    public function directions(){
        $directions = Direction::All();
        $seo = Seopage::Where('page', 'directions')->first();
        return view('directions', [
            'directions'=>$directions,
            'seo'=>$seo,
        ]);
    }
    public function prices(){
        $directions = Direction::All();
        $services = Service::All();
        $seo = Seopage::Where('page', 'prices')->first();
        return view('prices', [
            'directions'=>$directions,
            'services'=>$services,
            'seo'=>$seo,
        ]);
    }
    public function services_inner($id){
        $directions = Direction::All();
        $subdirections = Subdirection::Where('slug', $id)->first();

        $seo = (object)[];
    
        if ($subdirections instanceof Subdirection) {
            $seo = (object)[
                'title' => $subdirections->seo_title,
                'description' => $subdirections->seo_description,
                'keywords' => $subdirections->seo_keywords,
            ];
        }
        return view('services-inner', [
            'directions'=>$directions,
            'subdirection'=>$subdirections,
            'seo'=>$seo,
        ]);
    }
    public function specialists_inner($id){
        $directions = Direction::All();
        $worker = Worker::Where('slug', $id)->first();
        $seo = Seopage::Where('page', 'specialists')->first();
        return view('specialists-inner', [
            'directions'=>$directions,
            'worker'=>$worker,
            'seo'=>$seo,
        ]);
    }
    public function specialists(){
        $directions = Direction::All();
        $workers = Worker::paginate(8);
        $seo = Seopage::Where('page', 'specialists')->first();  
        return view('specialists', [
            'workers'=>$workers,
            'directions'=>$directions,
            'seo'=>$seo,
        ]);
    }
}
