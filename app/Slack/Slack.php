<?php

namespace App\Slack;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * Temporary Slack API composite.
 */
class Slack
{
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

    /**
     * Slack constructor.
     *
     * @param $token
     * @param $team
     * @param $email
     */
    public function __construct($token, $team, $email)
    {
        $this->http = new Client();
        $this->token = $token;
        $this->team = $team;
        $this->url = "https://{$team}.slack.com/api";
        $this->email = $email;
    }

    /**
     * Set e-mail.
     *
     * @param $email
     *
     * @return $this
     */
    public function email($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set optional first name.
     *
     * @param $firstName
     *
     * @return $this
     */
    public function firstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set optional last name.
     *
     * @param $lastName
     *
     * @return $this
     */
    public function lastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Set team, which should've been set in the constructor anyway.
     *
     * @param $teamName
     *
     * @return $this
     */
    public function team($teamName)
    {
        $this->team = (string) $teamName;

        return $this;
    }

    /**
     * Build API endpoint.
     *
     * @param $uri
     *
     * @return string
     */
    protected function url($uri)
    {
        $uri = preg_replace('/^\s*\/+/', '', $uri);

        return $this->url . '/' . $uri;
    }

    /**
     * Perform Invite action.
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function invite()
    {
        $params = [];
        $user = ['email', 'firstName', 'lastName'];
        foreach ($user as $property) {
            if (!empty($this->{$property})) {
                $params[$property] = $this->{$property};
            }
        }

        // Merged in to separate data from API information... not necessary, really
        $params = array_merge($params, [
            't'     => time(), // optional, originally written as a cache buster for GET API calls
            'token' => $this->token,
        ]);

        dd($params);

        $response = $this->http->request('POST', $this->url('users.admin.invite'), [
            RequestOptions::FORM_PARAMS => $params,
        ]);

        return $response;
    }
}
