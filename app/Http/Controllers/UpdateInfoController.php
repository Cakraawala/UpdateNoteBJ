<?php

namespace App\Http\Controllers;

use App\Models\Features;
use App\Models\Update;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator ;

class UpdateInfoController extends Controller
{
      //Construct Model
      public function __construct(Update $ups,Features $fts)
      {
          $this->updates = $ups;
          $this->features = $fts;
      }

      //Get all data history with pagination
      public function index(){
          $updates = $this->updates->with('features')->orderBy('id', 'desc')->simplePaginate(5);
          return response()->json(['List All update' => $updates]);
      }


      //Get Update terbaru / recent
      public function getrecentup(){
          try{
              $parent = $this->updates->with('features')->orderBy('id', 'desc')->firstOrFail();
              // $pid = $this->updates->first();
            //   $features = Features::where('note_id', '=', $parent->id)->get();
              return response()->json(['List updates recent' => $parent] ,300);
          }catch (ModelNotFoundException){
              return response()->json(['List update recent' => [], 'Error' => '404', 'Message' => 'Item not found or not created yet!'], 404 );
          }
      }

      //Store with feature
      public function store(Request $request)
      {
          $this->validate($request, [
              'title' => ['required', 'string'],
              'version' => ['required', 'string'],
              'features' => ['required', 'array'],
              'features.*' => ['required', 'string , max:244']
              ]);

              $note = update::create([
              'title' => $request->title,
              'version' => $request->version
              ]);

              foreach ($request->features as $feat) {
              Features::create([
              'feature' => $feat,
              'note_id' => $note->id
              ]);
              }

              return $this->getrecentup();
        }
      //
      //Destroy delete data by id
      public function destroy($id){
          try{
              $data = $this->updates->findOrFail($id);
              $data->delete();
              return response()->json([
                  'Message' => 'Data Successfully deleted'
              ], 300);
          } catch (ModelNotFoundException) {
              return response()->json(['Error' => '404','Message' => 'Item not found or not created yet!'], 404);
          }
      }
      //Get update by id (untuk testing)
      public function getupdate($id) {
          try{
              $parent = $this->updates->findOrFail($id);
              $features = Features::where('note_id', '=', $id)->get();
              return response()->json(['List updates by id' => $parent , 'All features by id' => $features ], 300);
          }catch (ModelNotFoundException){
              return response()->json(['Error' => '404', 'Message' => 'Item not found or not created yet!'], 404 );
          }
      }
}
