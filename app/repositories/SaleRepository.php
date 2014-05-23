<?php

class SaleRepository
{
    /**
     * 
     * @param Token $token
     */
    public static function createFromToken(Token $token)
    {
        static::createFromAccount($token->account, $token, $token->task->value * 0.91);
    }
        
    /**
     * 
     * @param Account $account
     * @param float $value
     */
    public static function createFromAccount(Account $account, Token $token, $value)
    {        
        Sale::create(array(
            'account_id' => $account->id,
            'token_id' => $token->id,
            'value' => round($value, 2),      
            'currency' => $token->task->currency,
        ));
                
        if($account->parent) {
            static::createFromAccount($account->parent, $token, $value * 0.09);
        }
    }

}