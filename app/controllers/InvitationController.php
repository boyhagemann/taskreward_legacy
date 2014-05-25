<?php

class InvitationController extends \BaseController {

     public function create()
     {
        return View::make('invitation.create');         
     }
     
     public function store()
     {
         $result = UserRepository::createInvitationFromText(Input::get('emails'), Sentry::getUser());
         
         Event::fire('invitation.stored', array($result, Sentry::getUser()));
         
         return Redirect::route('invitation.create')->withResult($result);
     }
}
