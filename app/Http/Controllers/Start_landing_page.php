<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use Artisan;
use Illuminate\Http\Request;
use Validator, Input, Redirect, Session, Storage;

use Notification;
use Mail;

use App\Notifications\MyFirstNotification;

use App\Http\Requests;
use App\Models\Properties;
use App\Models\InvitationHistory;

class Start_landing_page extends Controller
{
    public function index()
    {
        return view('pages.landing_page');    
    }

    public function about(){
        return view('pages.contact');
    }

    public function properties(){
        return view('pages.properties');
    }

    public function courses(){
        return view('pages.courses');
    }

    public function profit(){
        return view('pages.profit');
    }
    
    public function general_search_2(Request $request){   
        $name = $request->name;
        $data['t_data']=$name;
        var_dump($data); die();
        //return redirect('/home');
        return view('pages.home');
    }

    public function clearCache() {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('route:cache');
        $exitCode = Artisan::call('cache:clear');
        // return what you want
    }

    public function sendNotification()
    {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('eg9397314@gmail.com', 'Tutorials Point')->subject
              ('Laravel HTML Testing Mail');
           $message->from('linodeBp17@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
        // $to_email = "eg9397314@gmail.com";
        // $subject = "Simple Email Test via PHP";
        // $body = "Hi,nn This is test email send by PHP Script";
        // $headers = "From: linodeBp17@gmail.com";
        
        // if (mail($to_email, $subject, $body, $headers)) {
        //     dd("Email successfully sent to $to_email...");
        // } else {
        //     dd("Email sending failed...");
        // }
        // $user = User::first();
        // $details = [

        //     'greeting' => 'Hi Artisan',

        //     'body' => 'This is my first notification from ItSolutionStuff.com',

        //     'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',

        //     'actionText' => 'View My Site',

        //     'actionURL' => url('/'),

        //     'order_id' => 101

        // ];
        // Notification::send($user, new MyFirstNotification($details));
        // dd('done');
    }

    public function buyInvitation(Request $request){
        $repeat = InvitationHistory::where('bride', $request->bride_name)
                                    ->where('groom', $request->groom_name)
                                    ->where('marriage_date', $request->marriage_date)
                                    ->get();
        $randomPass = $request->bride_name.'*'.rand(0, 1000);
        // $data = array('name'=>"Virat Gandhi");
        // Mail::send('mail', $data, function($message) {
        //     $message->to('linodeBp17@gmail.com', 'Tutorials Point')->subject
        //        ('Laravel HTML Testing Mail');
        //     $message->from('eg9397314@gmail.com','Virat Gandhi');
        //  });
        //  echo "HTML Email Sent. Check your inbox.";
        if(count($repeat) == 0){
            $brideName = $request->bride_name.'_'.$request->marriage_date.'.'.$request->file()['bride_picture']->getClientOriginalExtension();
            $groomName = $request->groom_name.'_'.$request->marriage_date.'.'.$request->file()['groom_picture']->getClientOriginalExtension();
            $brideFilePath = $request->file()['bride_picture']->storeAs('', $brideName, 'base_uploads');
            $groomFilePath = $request->file()['groom_picture']->storeAs('', $groomName, 'base_uploads');
            $request->file()['bride_picture']->storeAs('', $brideName, 'public_uploads');
            $request->file()['groom_picture']->storeAs('', $groomName, 'public_uploads');
            $history = new InvitationHistory;
            $history->bride = $request->bride_name;
            $history->groom = $request->groom_name;
            $history->marriage_date = $request->marriage_date;
            $history->bride_img = 'uploads/'.$brideFilePath;
            $history->groom_img = 'uploads/'.$groomFilePath;
            $history->message_guest = $request->message_guest;
            $history->template_url = $request->template_url;
            $history->sender_email = $request->sender_email;
            $history->password = $randomPass;
            $history->save();
            $dataId = InvitationHistory::where('bride', $request->bride_name)
                                        ->where('groom', $request->groom_name)
                                        ->where('marriage_date', $request->marriage_date)
                                        ->value('id');
        }else{
            $brideName = $request->bride_name.'_'.$request->marriage_date.'.'.$request->file()['bride_picture']->getClientOriginalExtension();
            $groomName = $request->groom_name.'_'.$request->marriage_date.'.'.$request->file()['groom_picture']->getClientOriginalExtension();
            $brideFilePath = $request->file()['bride_picture']->storeAs('', $brideName, 'base_uploads');
            $groomFilePath = $request->file()['groom_picture']->storeAs('', $groomName, 'base_uploads');
            $request->file()['bride_picture']->storeAs('', $brideName, 'public_uploads');
            $request->file()['groom_picture']->storeAs('', $groomName, 'public_uploads');
            $history = InvitationHistory::where('bride', $request->bride_name)
                                        ->where('groom', $request->groom_name)
                                        ->where('marriage_date', $request->marriage_date)
                                        ->update(['template_url' => $request->template_url,
                                                    'sender_email' => $request->sender_email,
                                                    'password' => $randomPass]);
            $dataId = $repeat[0]->id;
        }
        return redirect('/buyInvitation/'.$dataId.'');
    }

    public function viewInvitationPage(Request $request, $id){
        $data = InvitationHistory::where('id', $id)
                                    ->get();

        return view('pages.buyInvitation', [
            'price' => 100,
            'dataId' => $data[0]->id,
            'bride_name' => $data[0]->bride,
            'groom_name' => $data[0]->groom,
            'marriage_date' => $data[0]->marriage_date,
            'bride_img' => $data[0]->bride_img,
            'groom_img' => $data[0]->groom_img,
            'message_guest' => $data[0]->message_guest,
            'template_url' => $data[0]->template_url,
        ]);    
    }

    public function viewGeneratePage(Request $request, $id){
        $data = InvitationHistory::where('id', $id)
                                    ->get();
        if($data[0]->payStatus == 1){
            $generate_link = $_SERVER["HTTP_HOST"].'/personal_page/'.$data[0]->id.'/'.$data[0]->bride.'&'.$data[0]->groom;
            $admin_link = $_SERVER["HTTP_HOST"].'/admin_dashboard/'.$data[0]->id.'/'.$data[0]->bride.'&'.$data[0]->groom;
            return view('pages.page_generate', [
                'dataId' => $data[0]->id,
                'bride_name' => $data[0]->bride,
                'groom_name' => $data[0]->groom,
                'link' => $generate_link,
                'admin_link' => $admin_link,
            ]);
        }
        else{
            $data['title'] = '404';
            $data['name'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);
        }
    }

    public function viewPersonalpage(Request $request, $id, $name){
        $data = InvitationHistory::where('id', $id)
                                    ->get();
        if($data[0]->payStatus == 1){
            return view('pages.personal_page', [
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

