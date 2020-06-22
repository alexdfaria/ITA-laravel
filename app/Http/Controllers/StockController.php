<?php

namespace App\Http\Controllers;

use App\Warehouse;
use App\Meal;
use Response;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    
    // Optimistic Locking
    public static function updateStock($meal_id, $value)
    {
      if(\Auth::check()){
      $fromQuery = DB::table('meals')->where('ITEM_ID', $meal_id)->first();

      if ($fromQuery->warehouse_id == 'NULL') {
        throw new InvalidWarehouseException();
      }
    
      do {
        if ($fromQuery->stock < $value) {
          throw new InsufficientStockException();
        }
        $updated = DB::table('meals')
                ->where('ITEM_ID', $meal_id)
                ->where('updated_at', '=', $fromQuery->updated_at)
                ->update(['stock' => $fromQuery->stock - $value]);

      } while (! $updated);
    
    }
}

public function updateStockGeral($meal_id, $value){
  try {
    $stock = StockController::updateStock($meal_id, $value);
    return redirect()->route('table');
} catch (InvalidWarehouseException $e) {
    return Response::json(['error' => 'Warehouse Not Found'], 404);
} catch (InsufficientStockException $e) {
    return Response::json(['error' => 'Insufficient Stock'], 406);
}
}



}