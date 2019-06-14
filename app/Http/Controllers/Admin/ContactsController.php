<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Config;
use DB;

class ContactsController extends Controller {

	public function getContacts()
    {
        $id = 1;
        $contact = Contact::find($id);
        return view('admin.pages.contact', compact('contact'));
    }


    public function updateContacts(Request $request)
    {

        $id = 1;
        $contact = Contact::find($id);

        $contact->english()->update([
            'address' => $request->address_en,
            'post' => $request->post_en,
            'work_time' => $request->work_time_en
        ]);

        $contact->arabic()->update([
            'address' => $request->address_ar,
            'post' => $request->post_ar,
            'work_time' => $request->work_time_ar
        ]);

        $contact->phone = $request->phone;
        $contact->fax = $request->fax;
        $contact->website = $request->website;
        $contact->email = $request->email;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->youtube = $request->youtube;
        $contact->linkedin = $request->linkedin;
        $contact->instagram = $request->instagram;
        $contact->google = $request->google;
        $contact->map = $request->map;

        if ($contact->save()){
            if (Config::get('app.locale') == 'en'){
                return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
            }else{
                return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
            }
            
        }
        if (Config::get('app.locale') == 'en'){
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
        
    }
}
