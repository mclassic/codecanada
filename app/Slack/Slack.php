<?php

namespace App\Slack;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Slack
{
    /** @var string API endpoint base URL */
    const ENDPOINT = 'https://slack.com/api';

    /** @var Client Http Client */
    protected $http;
    /** @var  string API token */
    protected $token;
    /** @var  string */
    protected $email;
    /** @var  string */
    protected $firstName;
    /** @var  string */
    protected $lastName;
    /** @var  string */
    protected $team;
    /** @var  string API endpoint */
    protected $url;

    public function __construct($token, $team, $email)
    {
        $this->http = new Client();
        $this->token = $token;
        $this->team = $team;
        $this->url = "https://{$team}.slack.com/api";
        $this->email = $email;
    }

    public function email($email)
    {
        $this->email = $email;

        return $this;
    }

    public function firstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function lastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function team($teamName)
    {
        $this->team = (string) $teamName;

        return $this;
    }

    public function url($uri)
    {
        $uri = preg_replace('/^\s*\//', '', $uri);

        return $this->url . '/' . $uri;
    }

    public function invite()
    {
        $params = [
            'email' => $this->email,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName
        ];

        $params = array_merge($params, [
            't'     => time(),
            'token' => $this->token,
        ]);

        $response = $this->http->request('POST', $this->url('users.admin.invite'), [
            RequestOptions::FORM_PARAMS => $params
        ]);

        return $response;
    }
}
