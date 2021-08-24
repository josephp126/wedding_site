<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\InvitationHistory;


class AdminController extends Controller
{
    public function propertiesList(Request $request){
        return view('pages.admin.properties_list');
    }

    public function propertiesCreate(Request $request){
        return view('pages.admin.properties_create');
    }

    public function userList(Request $request){
        return view('pages.admin.user_list');
    }

    public function createProperty(Request $request){
        // $request->validate([
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg|max:2048'
        // ]);
        $files = [];
        $propertyModel = new Properties;
        foreach($request->file() as $file){
            array_push($files, $file);
        }
        if($request->file()) {
            if(count($files) >= 2){
                $mainFileName = time().'.'.$files[0]->getClientOriginalExtension();
                $nextFileName = (time()+1).'.'.$files[1]->getClientOriginalExtension();
                $mainFilePath = $files[0]->storeAs('', $mainFileName, 'public_uploads');
                $nextFilePath = $files[1]->storeAs('', $nextFileName, 'public_uploads');
            } else if(count($files) == 1){
                $mainFileName = time().'.'.$files[0]->getClientOriginalExtension();
                $nextFileName = time().'.'.$sfiles[0]->getClientOriginalExtension();
                $mainFilePath = $files[0]->storeAs('', $mainFileName, 'public_uploads');
                $nextFilePath = $mainFilePath;
            }
            $propertyModel->city = $request->city;
            $propertyModel->state = $request->state;
            $propertyModel->zipCode = $request->zipCode;
            $propertyModel->bedroom = $request->bedroom;
            $propertyModel->bath = $request->bath;
            $propertyModel->wifi = $request->wifi;
            $propertyModel->ac = $request->ac;
            $propertyModel->kitchen = $request->kitchen;
            $propertyModel->airbnb = $request->airbnb;
            $propertyModel->next_image = $nextFilePath;
            $propertyModel->main_image = $mainFilePath;
            $propertyModel->save();

            return back()
                    ->with('success','File has been uploaded.')
                    ->with('file', $mainFileName);
        }
    }

    public function viewAdminDashboardpage(Request $request, $id, $name){
        $data = InvitationHistory::where('id', $id)
                                    ->get();
        if($data[0]->payStatus == 1){
            return view('pages.admin.admin_dashboard_login', [
                'dataId' => $data[0]->id,
            ]); 
        }else{
            $data['title'] = '404';
            $data['name'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);
        }
           
    }

    public function adminLogin(Request $request){
        $history = InvitationHistory::where('sender_email', $request->email)
                                    ->where('password', $request->password)
                                    ->get();
        
        if(count($history) == 0){
            return redirect()->back();
        }else{
            return redirect('/dashboard/'.$history[0]->id.'');
        }
    }
    public function mainDashboard(Request $request, $id){
        $data = InvitationHistory::where('id', $id)
                                    ->get();
        if($data[0]->payStatus == 1){
            return view('pages.admin.main_dashboard', [
                'dataId' => $data[0]->id,
                'bride_name' => $data[0]->bride,
                'groom_name' => $data[0]->groom,
                'marriage_date' => $data[0]->marriage_date,
                'bride_img' => $data[0]->bride_img,
                'groom_img' => $data[0]->groom_img,
                'message_guest' => $data[0]->message_guest,
                'template_url' => $data[0]->template_url,
            ]);
        }else{
            $data['title'] = '404';
            $data['name'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);
        }
    }
}