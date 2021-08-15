<?php

namespace App\Http\Controllers;

use App\ItemPackage;
use Illuminate\Http\Request;

class ItemPackageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $package)
    {
        for($i=0; $i<count($request->item); $i++)
            {
                $item_package = new ItemPackage();
                $item_package->package_id = $package->id;
                $item_package->name = $request->item[$i];
                $item_package->save();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemPackage  $itemPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package)
    {   
        $this->destroy($package->id);
        $this->store($request, $package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemPackage  $itemPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = ItemPackage::where('package_id', $id)->delete();
    }
}
