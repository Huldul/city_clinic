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

class PageController extends Controller
{
    public function index(){
        $directions = Direction::All();
        $indexpage = Indexpage::firstOrFail();
        $instagrams = Instagramimage::All();
        $videos = Video::All();
        $indexswipers = Indexswiper::All();
        $directions_ind = Direction::paginate(4);
        return view('index', [
            'directions'=>$directions,
            'directions_ind'=>$directions_ind,
            'indexpage'=>$indexpage,
            'instagrams'=>$instagrams,
            'videos'=>$videos,
            'indexswipers'=>$indexswipers,
        ]);
    }
    public function about(){
        $directions = Direction::All();
        $aboutpage = Aboutpage::firstOrFail();
        $images = Aboutimage::All();
        return view('about', [
            'directions'=>$directions,
            'page'=>$aboutpage,
            'images'=>$images,
        ]);
    }
    public function blog_inner($id){
        $directions = Direction::All();
        $blog = News::Where('slug', $id)->first();
        return view('blog-inner', [
            'directions'=>$directions,
            'blog'=>$blog,
        ]);
    }
    public function blog(){
        $directions = Direction::All();
        $news = News::paginate(9);
        return view('blog', [
            'directions'=>$directions,
            'news'=>$news,
        ]);
    }
    public function contacts(){
        $directions = Direction::All();
        return view('contacts', [
            'directions'=>$directions,
        ]);
    }
    public function directions_inner($id){
        $directions = Direction::All();
        $direction = Direction::Where('slug',$id)->first();
        // dd($direction);
        $workers = Worker::paginate(8);
        $subdirections = $direction ? $direction->subdirections : collect();
        
        return view('directions-inner', [
            'directions'=>$directions,
            'direction'=>$direction,
            'workers'=>$workers,
            'subdirections'=>$subdirections,
        ]);
    }
    public function directions(){
        $directions = Direction::All();
        return view('directions', [
            'directions'=>$directions,
        ]);
    }
    public function prices(){
        $directions = Direction::All();
        $services = Service::All();
        return view('prices', [
            'directions'=>$directions,
            'services'=>$services,
        ]);
    }
    public function services_inner($id){
        $directions = Direction::All();
        $subdirections = Subdirection::Where('slug', $id)->first();
        
        return view('services-inner', [
            'directions'=>$directions,
            'subdirection'=>$subdirections,
        ]);
    }
    public function specialists_inner($id){
        $directions = Direction::All();
        $worker = Worker::Where('slug', $id)->first();
        return view('specialists-inner', [
            'directions'=>$directions,
            'worker'=>$worker,
        ]);
    }
    public function specialists(){
        $directions = Direction::All();
        $workers = Worker::paginate(8);
        return view('specialists', [
            'workers'=>$workers,
            'directions'=>$directions,
        ]);
    }
}
