<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements NewsletterInterface
{
    public function __construct(protected ApiClient $client, protected string $foo){

    }
    public function subscribe(string $email, string $list = null){
        $list ??= config('services.mailchimp.lists.subscribers');
        return $this->client->lists->addListMember($list,[
            'email_address'=>$email,
            'status'=>'subscribed'
        ]);
    }

}
