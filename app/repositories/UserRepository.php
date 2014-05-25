<?php

use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * 
     * @param string $text
     * @param User $parent
     * @return Collection
     */
    public static function createInvitationFromText($text, User $parent)
    {
        $result = array();
        
        foreach(explode(PHP_EOL, $text) as $email) {
            
            try {
                static::createInvitation($email, $parent);
                $result[$email] = array(
                    'success' => true,
                    'message' => sprintf('Invitation sent to %s', $email)
                );
            }
            catch(Exception $e) {
                $result[$email] = array(
                    'success' => false,
                    'message' => $e->getMessage()
                );
            }
            
        }
        
        return new Collection($result);
    }
        
    /**
     * 
     * @param string $email
     * @param User $parent
     * @throws Exception
     */
    public static function createInvitation($email, User $parent)
    {     
        $v = Validator::make(compact('email'), array('email' => 'email'));
        
        if($v->fails()) {
            throw new Exception(sprintf('%s is not a valid email', $email));            
        }
        
        if(User::where('email', $email)->first()) {
            throw new Exception(sprintf('User with email %s already exists', $email));
        }
        
        // Generate a random password
        $password = Str::random(8);
        
        // Create the user
        $user = Sentry::createUser(array(
            'email' => $email,
            'password' => $password,
            'activated' => false,
            'parent_user_id' => $parent->id,
        ));
        
        Event::fire('user.invite', array($user, $password));
    }

}