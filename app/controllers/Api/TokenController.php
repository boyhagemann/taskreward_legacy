<?php namespace Api;

use Token, Validator, Input, Event;

class TokenController extends \BaseController {

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Token $token
	 * @return Response
	 */
	public function update(Token $token)
	{        
        $v = Validator::make(Input::all(), array(
            'status' => 'required|in:accepted',
        ));
        
        if($v->fails()) {
            return array(
                'success' => false,
                'messages' => $v->errors()->all(),
            );
        }
        
        $token->status = Input::get('status');
        $token->save();
        
        Event::fire('api.token.update', array($token, Input::all()));
                
        return array(
            'success' => true,
            'messages' => array('Token successfully updated'),
        );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
