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

class PageControllerKz extends Controller
{
    public function index(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');

        $indexpage = Indexpage::firstOrFail()->translate('kz');
        $instagrams = Instagramimage::All(); // предполагаем, что эти модели не требуют перевода
        $videos = Video::All(); // предполагаем, что эти модели не требуют перевода
        $indexswipers = Indexswiper::All(); // предполагаем, что эти модели не требуют перевода
        $directions_ind = Direction::paginate(4);
        $translatedDirectionsInd = $this->translateCollection($directions_ind, 'kz');

        $seo = Seopage::Where('page', 'main')->first()->translate('kz');
        return view('index', [
            'directions' => $translatedDirections,
            'directions_ind' => $translatedDirectionsInd,
            'indexpage' => $indexpage,
            'instagrams' => $instagrams,
            'videos' => $videos,
            'indexswipers' => $indexswipers,
            'seo' => $seo,
        ]);
    }
    public function about(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $aboutpage = Aboutpage::firstOrFail()->translate('kz');
        $images = Aboutimage::All(); // предполагаем, что эти модели не требуют перевода
        $seo = Seopage::Where('page', 'about')->first()->translate('kz');
    
        return view('about', [
            'directions' => $translatedDirections,
            'page' => $aboutpage,
            'images' => $images,
            'seo' => $seo,
        ]);
    }
    
    public function blog_inner($id){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $blog = News::Where('slug', $id)->first();
        if ($blog) {
            $blog = $blog->translate('kz');
            $seo = (object)[
                'title' => $blog->seo_title,
                'description' => $blog->seo_description,
                'keywords' => $blog->seo_keywords,
            ];
        } else {
            $seo = (object)[
                'title' => '',
                'description' => '',
                'keywords' => '',
            ];
        }
    
        return view('blog-inner', [
            'directions' => $translatedDirections,
            'blog' => $blog,
            'seo' => $seo,
        ]);
    }
    
    public function blog(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $news = News::paginate(9);
        $translatedNews = $news->map(function ($item) {
            return $item->translate('kz');
        });
    
        $seo = Seopage::Where('page', 'blog')->first()->translate('kz');
    
        return view('blog', [
            'directions' => $translatedDirections,
            'news' => $translatedNews,
            'seo' => $seo,
        ]);
    }
    
    public function contacts(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $seo = Seopage::Where('page', 'contacts')->first()->translate('kz');
    
        return view('contacts', [
            'directions' => $translatedDirections,
            'seo' => $seo,
        ]);
    }
    
    public function directions_inner($id){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $direction = Direction::Where('slug', $id)->first();
        if ($direction) {
            $direction = $direction->translate('kz');
            $subdirections = $direction->subdirections->map(function ($subdirection) {
                return $subdirection->translate('kz');
            });
        } else {
            $subdirections = collect();
        }
    
        $workers = Worker::paginate(8);
        $translatedWorkers = $workers->map(function ($worker) {
            return $worker->translate('kz');
        });
    
        $seo = (object)[];
        if ($direction instanceof Direction) {
            $seo = (object)[
                'title' => $direction->seo_title,
                'description' => $direction->seo_description,
                'keywords' => $direction->seo_keywords,
            ];
        }
    
        return view('directions-inner', [
            'directions' => $translatedDirections,
            'direction' => $direction,
            'workers' => $translatedWorkers,
            'subdirections' => $subdirections,
            'seo' => $seo,
        ]);
    }
    
    public function directions(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $seo = Seopage::Where('page', 'directions')->first()->translate('kz');
    
        return view('directions', [
            'directions' => $translatedDirections,
            'seo' => $seo,
        ]);
    }
    
    public function prices(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $services = Service::All();
        $translatedServices = $this->translateCollection($services, 'kz');
    
        $seo = Seopage::Where('page', 'prices')->first()->translate('kz');
    
        return view('prices', [
            'directions' => $translatedDirections,
            'services' => $translatedServices,
            'seo' => $seo,
        ]);
    }
    
    public function services_inner($id){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $subdirections = Subdirection::Where('slug', $id)->first();
        if ($subdirections) {
            $subdirections = $subdirections->translate('kz');
            $seo = (object)[
                'title' => $subdirections->seo_title,
                'description' => $subdirections->seo_description,
                'keywords' => $subdirections->seo_keywords,
            ];
        } else {
            $seo = (object)[
                'title' => '',
                'description' => '',
                'keywords' => '',
            ];
        }
    
        return view('services-inner', [
            'directions' => $translatedDirections,
            'subdirection' => $subdirections,
            'seo' => $seo,
        ]);
    }
    
    public function specialists_inner($id){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $worker = Worker::Where('slug', $id)->first();
        if ($worker) {
            $worker = $worker->translate('kz');
        }
    
        $seo = Seopage::Where('page', 'specialists')->first();
        if ($seo) {
            $seo = $seo->translate('kz');
        }
    
        return view('specialists-inner', [
            'directions' => $translatedDirections,
            'worker' => $worker,
            'seo' => $seo,
        ]);
    }
    
    public function specialists(){
        $directions = Direction::All();
        $translatedDirections = $this->translateCollection($directions, 'kz');
    
        $workers = Worker::paginate(8);
        $translatedWorkers = $workers->map(function ($worker) {
            return $worker->translate('kz');
        });
    
        $seo = Seopage::Where('page', 'specialists')->first();
        if ($seo) {
            $seo = $seo->translate('kz');
        }
    
        return view('specialists', [
            'directions' => $translatedDirections,
            'workers' => $translatedWorkers,
            'seo' => $seo,
        ]);
    }
    

    private function translateCollection($collection, $lang) {
        return $collection->map(function ($item) use ($lang) {
            return $item->translate($lang);
        });
    }
}
