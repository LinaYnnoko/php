<?php

namespace App\Http\Controllers\Ajax;

use App\Animal;
use App\Favorites;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Array_;
use function React\Promise\all;

class AjaxAnimalController extends Controller
{
    public function Filter(Request $request){
        $data=$request->all();
        $where=[];
        if ($data['type']!=-1) array_push($where, ['type',$data['type']]);
        if ($data['city']!=-1) array_push($where, ['city',$data['city']]);
        if ($data['gender']!=-1) array_push($where, ['gender',$data['gender']]);

//        return json_encode(['animals'=>$where]);

        $sort='ASC';
        if ($data['sort_type']==1) $sort='DESC';

        if (count($where)!=0)
            $oleg=Animal::where($where)->orderBy('id',$sort)->get();
        else $oleg=Animal::all()->orderBy('id',$sort);


        return json_encode(['result'=>count($oleg), 'animals'=>$oleg]);
    }

    public function AddFavorites(Request $request){
        $data=$request->all();
        session_start();
        $id=$_SESSION['id'];

        $where=[
            ['idUser', $id],
            ['idAnimal',$data['idAnimal']]
        ];

        $res=Favorites::where($where)->get();

        if ($res->isEmpty())
        $fav=Favorites::create([
            'idUser'=>$id,
            'idAnimal'=>$data['idAnimal']
        ]);
        else{
            Favorites::where($where)->delete();
            return json_encode(['result'=>false]);
        }

        return json_encode(['result'=>true]);
    }

    public function Delete(Request $request){
        try {
            $data=$request->all();
            Animal::find($data['delId'])->delete();
            return json_encode(['result'=>true, 'animals'=>Animal::all()]);
        }
        catch (\Exception $ex){
            return json_encode(['result'=>$ex]);
        }
    }

    public function Info(Request $request){
        session_start();
            $data=$request->all();
            $animal=Animal::find($data['id']);
            $color=$animal->belongsTo(\App\Color::class, 'color')->get()[0]->color;
            $city=$animal->belongsTo(\App\City::class, 'city')->get()[0]->city;
            $type=$animal->belongsTo(\App\Type::class, 'type')->get()[0]->type;
            $photo_link=url($animal->photo_link);
            $hasfav=!\App\Favorites::where([
                ['idUser', $_SESSION['id']],
                ['idAnimal',$animal->id]
            ])->get()->isEmpty();

            return json_encode(['result'=>true,
                'info'=>[
                    'id'=>$animal->id,
                    'name'=>$animal->name,
                    'gender'=>$animal->gender,
                    'decription'=>$animal->description,
                    'color'=>$color,
                    'city'=>$city,
                    'type'=>$type,
                    'photo_link'=>$photo_link,
                    'fav'=>$hasfav
                ]]);
    }
}
