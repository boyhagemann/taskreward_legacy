<?php

class SaleRepository
{
    /**
     * 
     * @param Token $token
     */
    public static function createFromToken(Token $token)
    {
        static::createFromUser($token->user, $token, $token->task->value * 0.91);
    }
        
    /**
     * 
     * @param User $user
     * @param float $value
     */
    public static function createFromUser(User $user, Token $token, $value)
    {        
        Sale::create(array(
            'user_id' => $user->id,
            'token_id' => $token->id,
            'value' => round($value, 2),      
            'currency' => $token->task->currency,
        ));
                
        if($user->parent) {
            static::createFromUser($user->parent, $token, $value * 0.09);
        }
    }

}