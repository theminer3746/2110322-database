<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getEditPage(Request $request, $id)
    {
        $materials = DB::table('products_has_meterials_relation')
            ->join('materials', 'products_has_meterials_relation.material_id', '=', 'materials.material_id')
            ->where('product_id', $id)
            ->select(['materials.name', 'materials.material_id', 'products_has_meterials_relation.amount', 'products_has_meterials_relation.product_id'])
            ->get();

        $existingMaterials = DB::table('products_has_meterials_relation')
            ->join('materials', 'products_has_meterials_relation.material_id', '=', 'materials.material_id')
            ->where('product_id', $id)
            ->pluck('materials.material_id');
        
        //dd($existingMaterials);

        $product = DB::table('products')
            ->where('product_id', $id)
            ->first();

        // $newMaterials = DB::table('materials')
        //     ->join('products_has_meterials_relation', 'products_has_meterials_relation.material_id', '=', 'materials.material_id', 'left outer')
        //     ->get();

        // var_dump($materials);

        $allMaterials = DB::table('materials')
            ->whereNotIn('material_id', $existingMaterials)
            ->get();

        // dd($existingMaterials, $allMaterials);

        return view('product_edit')
            ->with('materials', $materials)
            ->with('product', $product)
            ->with('allMaterials', $allMaterials);
    }

    public function edit(Request $request, $id)
    {
        $materialIds = [];

        foreach($request->all() as $key => $amount){
            if(preg_match("/^material_([0-9]+)/", $key, $materialId)){
                if($amount == 0){
                    DB::table('products_has_meterials_relation')
                        ->where('product_id', $id)
                        ->where('material_id', $materialId[1])
                        ->delete();
                }else{
                    DB::table('products_has_meterials_relation')
                        ->where('product_id', $id)
                        ->where('material_id', $materialId[1])
                        ->update([
                            'amount' => $amount
                        ]);
                }
            }
        }

        if(!is_null($request->input('new_material_amount')) && $request->input('new_material_amount') != 0){
            DB::table('products_has_meterials_relation')
                ->insert([
                    'product_id' => $id,
                    'material_id' => $request->input('new_material_id'),
                    'amount' => $request->input('new_material_amount'),
                ]);
        }

        return redirect()->back();
    }
}
