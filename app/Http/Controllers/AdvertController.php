<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Http\Requests\FindAdverts;
use App\Http\Requests\StoreAdvert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdvertController extends CategoryController
{
    public function __construct()
    {
        $this->middleware('auth')->only(['addAdvert','editAdvert','deleteAdvert']);
    }

    public function getAdvert($id)
    {
        return Advert::find($id);
    }

    public static function getAdverts()
    {
        return DB::table('adverts')->select('*');
    }

    public function showAdvert($id)
    {
        return view('adverts.show',[
            'advert' => $this->getAdvert($id),
            'title' => '- znalezione ogłoszenia'
        ]);
    }

    public function findAdverts(FindAdverts $request)
    {
        $phrase = $request->input('phrase');
        $description_search = $request->input('description_search');
        $category = $request->input('category');
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');

        $adverts = $this->getAdverts();

        if($phrase!=null)
        {
            $adverts->where('title','like','%'.$phrase.'%');

            if($description_search!=null)
                $adverts->orWhere('description','like','%'.$phrase.'%');
        }

        if($category!=null) $adverts->where('category_id','=',$category);
        if($price_min!=null) $adverts->where('price','>=',$price_min);
        if($price_max!=null) $adverts->where('price','<=',$price_max);

        $adverts = $adverts->get();

        return view('adverts.list',[
            'adverts' => $adverts,
            'options' => false,
            'footer' => 'Liczba znalezionych ogłoszeń:',
            'title' => '- znalezione ogłoszenia'
        ]);
    }

    public function deleteAdvert($id)
    {
        $advert = $this->getAdvert($id);

        for($i=1;$i<=8;$i++)
        {
            if ($advert['photo' . $i] != null)
                Storage::disk('public')->delete($advert['photo' . $i]);
        }

        Advert::destroy($id);

        return redirect('/myAccount/myAdverts/');
    }

    public function searchAdverts()
    {
        $categories = $this->getCategories();

        return view('adverts.search',[
            'categories'=>$categories,
            'title'=>'- strona główna'
        ]);
    }

    public function editAdvert($id)
    {
        $categories = $this->getCategories();

        $advert = $this->getAdvert($id);

        return view('adverts.form',[
            'advert' => $advert,
            'categories' => $categories,
            'submit_value' => 'Zapisz zmiany',
            'title' => '- edycja ogłoszenia'
        ]);
    }

    public function addAdvert()
    {
        $categories = $this->getCategories();

        return view('adverts.form',[
            'categories' => $categories,
            'submit_value' => 'Dodaj ogłoszenie',
            'title'=>'- dodawanie ogłoszenia'
        ]);
    }

    public function storeAdvert(StoreAdvert $request)
    {
        $advert = null;

        $id = $request->input('id');

        if($id == null) $advert = new Advert();
        else $advert = $this->getAdvert($id);

        $advert->title = $request->input('title');
        $advert->category_id = $request->input('category_id');
        $advert->price = $request->input('price');
        $advert->description = $request->input('description');

        for($i=1;$i<=8;$i++)
        {
            $photo_name = $request->input('photo_name'.$i);
            $photo = $request->file('preview_photo'.$i);

            if($advert['photo'.$i] != $photo_name)
                Storage::disk('public')->delete($advert['photo'.$i]);

            if($photo!=null && $photo_name!=null)
            {
                $extension = $photo->getClientOriginalExtension();
                Storage::disk('public')->put($photo->getFilename() . '.' . $extension, File::get($photo));
                $advert['photo'.$i] = $photo->getFilename().'.'.$extension;
            }
            else if($photo_name == null)
                $advert['photo' . $i] = null;
        }

        $advert->updated_at = date('Y-m-d H:i:s');

        $advert->save();

        return $advert->id;
    }
}
