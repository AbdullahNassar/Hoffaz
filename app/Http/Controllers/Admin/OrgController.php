<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Org;
use App\Doc;
use Config;
use DB;

class OrgController extends Controller
{
    public function getIndex() {
        $id = 1;
    	$org = Org::find($id);

        return view('admin.pages.org', compact('org'));
    }

    public function postEdit(Request $request) {
    	
        $id = 1;
        $org = Org::find($id);

        $org->name = $request->name;
        $org->address = $request->address;
        $org->business_registration = $request->business_registration;
        $org->tax_card = $request->tax_card;
        $org->phone = $request->phone;
        $org->fax = $request->fax;
        $org->email = $request->email;
        $org->website = $request->website;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $org->logo = $imageName;
        }
        

        if ($org->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

}
