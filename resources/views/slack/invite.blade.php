@extends('layouts.app')

@section('content')
    @if (!isset($result))
    <div class="container" style="margin-top: 10%">
        <div class="row slack-invite text-center">
            <div class="col-xs-12">
                <div class="row">
                    <h1 class="col-xs-12">Invite</h1>
                    <p class="lead sans-serif">Join <a href="https://codecanada.slack.com">codecanada</a> on Slack.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form method="POST" action="{!! url('/invite') !!}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name">
                                </div>
                                <div class="col-xs-6 form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <input type="email" class="form-control" placeholder="E-Mail" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 checkbox">
                                    <label>
                                        <input type="checkbox" name="mailing_list" value="1">
                                        Join Our Mailing List
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-center form-group">
                                    <input type="submit" class="form-control btn btn-success" value="Join">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container" style="margin-top: 10%">
        <div class="row slack-invite text-center">
            <div class="col-xs-12">
                <h1>Thank You!</h1>
                <p class="lead">Be on the lookout for an e-mail follow up to create your Slack account for our team!</p>
            </div>
        </div>
    </div>
    @endif
@endsection
