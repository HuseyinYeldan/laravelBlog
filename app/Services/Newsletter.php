<?php

namespace App\Services;

class Newsletter{

    public function subscribe(string $email, string $list=null){
        $list ??=config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list,[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function client(){
        $mailchimp = new \MailchimpMarketing\ApiClient();

        request()->validate([
            'email' => 'required|email|min:6|max:128'
        ]);
    
        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
    }

}