<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SettingController extends Controller
{
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.pages.setting.edit', ['setting' => $setting, 'id' => $id]);
    }


    public function update(Request $request, $id){
        $request->validate([
            'sign_up_credit'=>'required',
            'referral_get_credit'=>'required',
            'paypal_con_rate'=>'required',
            'paypal_id'=>'required',
            'paypal_secret'=>'required',
            'ssl_id'=>'required',
            'ssl_secret'=>'required',
            'sending_email_address'=>'required',
            'admin_email_address'=>'required',
        ]);
        $setting = Setting::find($id);
        if($setting->paypal_id != $request->input('paypal_id')) {
            $this->updateEnvValue('PAYPAL_ID='.env('PAYPAL_ID'), 'PAYPAL_ID='.$request->input('paypal_id'));
        }
        if($setting->paypal_secret != $request->input('paypal_secret')) {
            $this->updateEnvValue('PAYPAL_SECRET='.env('PAYPAL_SECRET'), 'PAYPAL_SECRET='.$request->input('paypal_secret'));
        }
        if($setting->ssl_id != $request->input('ssl_id')) {
            $this->updateEnvValue('SSL_ID='.env('SSL_ID'), 'SSL_ID='.$request->input('ssl_id'));
        }
        if($setting->ssl_secret != $request->input('ssl_secret')) {
            $this->updateEnvValue('SSL_SECRET='.env('SSL_SECRET'), 'SSL_SECRET='.$request->input('ssl_secret'));
        }
        if($setting->sending_email_address != $request->input('sending_email_address')) {

            $this->updateEnvValue('SEND_MAIL_ADDRESS='.env('SEND_MAIL_ADDRESS'), 'SEND_MAIL_ADDRESS='.$request->input('sending_email_address'));
        }
        if($setting->admin_email_address != $request->input('admin_email_address')) {
            $this->updateEnvValue('ADMIN_MAIL_ADDRESS='.env('ADMIN_MAIL_ADDRESS'), 'ADMIN_MAIL_ADDRESS='.$request->input('admin_email_address'));
        }

        $setting->update($request->all());


        return redirect('/admin/dashboard')
            ->with(['type'=>'success','message'=>'Setting Updated Successfully']);
    }

    private function updateEnvValue($keyValue, $newKeyValue) {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace($keyValue, $newKeyValue, file_get_contents($path)
            ));
        }
    }
}
