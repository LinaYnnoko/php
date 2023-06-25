<?php

namespace App\Http\Controllers\Ajax;

use App\Animal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AddAnimalController extends Controller
{
    public function Verify(Request $request)
    {
        $data = $request->all();

        $valid = Validator::make($request->all(), [
            'name' => ['alpha', 'required', 'max:30'],
            'description' => ['alpha', 'required', 'max:500'],
            'age' => ['integer', 'min:0'],
            'type' => ['required'],
            'gender' => ['required'],
            'city' => ['required'],
            'color' => ['required'],
            'photo' => ['required']
        ]);

//        dd($valid->errors());

        if ($valid->errors()->isEmpty()) {

            $file = $request->file('photo');
            $upload_folder = 'public/images';
            $filename = $file->getClientOriginalName();

            Storage::putFileAs($upload_folder, $file, $filename);
            //storage/images/image.jpg

            $newAnimal = Animal::create([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'age' => $data['age'],
                'description' => $data['description'],
                'photo_link' => 'storage/images/' . $filename,
                'type' => $data['type'],
                'color' => $data['color'],
                'city' => $data['city'],
            ]);

            return json_encode(['result'=>true]);

            /*
            $table->string('name');
            $table->boolean('gender');
            $table->unsignedInteger('age');
            $table->text('description');
            $table->string('photo_link')->nullable();
            $table->bigInteger('type')->unsigned();
            $table->bigInteger('color')->unsigned();
            $table->bigInteger('city')->unsigned();*/
        }
        else return json_encode(['result'=>false,  'errors'=>$valid->errors()]);
    }
}
