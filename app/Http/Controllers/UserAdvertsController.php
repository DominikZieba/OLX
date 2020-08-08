<?php

namespace App\Http\Controllers;

use App\UserAdvert;
use App\Http\Requests\StoreAdvert;
use Illuminate\Support\Facades\DB;

class UserAdvertsController extends Controller
{
    private UserController $userController;
    private AdvertController $advertController;

    public function __construct()
    {
        $this->middleware('auth');

        $this->userController = new UserController();
        $this->advertController = new AdvertController();
    }

    public function getUserAdverts()
    {
        $user = $this->userController->getUser();

        return DB::table('adverts')
            ->join('user_adverts','adverts.id','=','user_adverts.advert_id')
            ->select('adverts.*')
            ->where('user_id','=',$user->id)
            ->get();
    }

    public function listUserAdverts()
    {
        $adverts = $this->getUserAdverts();

        return view('adverts.list',[
            'adverts' => $adverts,
            'options' => true,
            'footer' => 'Liczba ogłoszeń:',
            'title' => '- twoje ogłoszenia'
        ]);
    }

    public function storeUserAdvert(StoreAdvert $request)
    {
        $advert_id = $this->advertController->storeAdvert($request);

        if($request->input('id') == null)
        {
            $user = $this->userController->getUser();

            $userAdvert = new UserAdvert();
            $userAdvert->advert_id = $advert_id;
            $userAdvert->user_id = $user->id;
            $userAdvert->save();
        }

        return redirect('/myAccount/myAdverts/');
    }

    public function deleteUserAdverts()
    {
        $adverts = $this->getUserAdverts();

        foreach ($adverts as $advert)
        {
            $this->advertController->deleteAdvert($advert->id);
        }

        $this->userController->deleteUser();

        return redirect('/');
    }
}
