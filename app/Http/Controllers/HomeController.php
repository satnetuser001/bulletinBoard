<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bbs;

class HomeController extends Controller
{
    private const BBS_VALIDATOR_RULS = ['title'=>'required|max:50',
                                      'content'=> 'required',
                                      'price'=>'required|numeric'];

    private const BBS_VALIDATOR_MESSAGES = ['price.required'=>'Раздавать товары бесплатно нельзя',
                                            'required' => 'Заполни это поле',
                                            'max'=>'значение не должно быть длиннее :max символов',
                                            'numeric'=>'Введи число'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    //страница-форма добавления объявления
    public function addPage()
    {
        return view('addPage');
    }

    //добавление в базу данных объявления(из страница-форма добавления объявления)
    public function addToDB(Request $request)
    {
        //валидация данных в $request
        $validated = $request->validate(self::BBS_VALIDATOR_RULS, self::BBS_VALIDATOR_MESSAGES);
        Auth::user()->bbs()->create(['title' => $validated['title'],
                                    'content' => $validated['content'],
                                    'price' => $validated['price']]);
        return redirect()->route('home');
    }

    //страница-форма редактирования объявления
    public function editPage(Bbs $bbs)
    {
        return view('editPage', ['bbs' => $bbs]);
    }

    //обновить в базе данных объявление(из страница-форма редактиролвания объявления)
    public function updateTupleDB(Request $request, Bbs $bbs)
    {
        //валидация данных в $request
        $validated = $request->validate(self::BBS_VALIDATOR_RULS, self::BBS_VALIDATOR_MESSAGES);
        //fill - массовое присвоение стр.70
        $bbs->fill(['title' => $validated['title'],
                        'content' => $validated['content'],
                        'price' => $validated['price']]);
        $bbs->save();
        return redirect()->route('home');
    }

    //страница-форма удаления объявления
    public function deletePage(Bbs $bbs)
    {
        return view('deletePage', ['bbs' => $bbs]);
    }

    //удалить в базе данных объявление(из страницы-формы удаления объявления)
    public function deleteTupleDB(Bbs $bbs)
    {
        $bbs->delete();
        return redirect()->route('home');
    }
}
