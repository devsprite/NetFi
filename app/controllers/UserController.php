<?php

class UserController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getIndex(){

        $dateMiseJour = Fiche::select('date')->first();
        return View::make('user.login')->with(array('dateMiseJour'=>$dateMiseJour));
    }

    public function postIndex()
    {
        $dateMiseJour = Fiche::select('date')->first();
        $inputs = Input::all();

        $rules = array(
            'nom'       =>  'alpha_num|between:3,30|required',
            'password'  =>  'required|min:6|max:64'
        );
        $validation = Validator::make($inputs, $rules);
        if ($validation->fails()) {
            Session::flash('message','Veuillez corriger les erreurs !');
            Session::flash('class','alert alert-warning');
            return Redirect::to('users/login')->withinput()->with(array('dateMiseJour'=>$dateMiseJour))->witherrors($validation);
        }else{
            if(Auth::attempt(array('nom'=>Input::get('nom'),'password'=>Input::get('password')) )){
                Session::flash('message','Login réussi !');
                Session::flash('class','alert alert-success');
                return Redirect::to('/')->with(array('dateMiseJour'=>$dateMiseJour));
            }else{
                Session::flash('message','Erreur de login !');
                Session::flash('class','alert alert-danger');
                return Redirect::to('users/login')->with(array('dateMiseJour'=>$dateMiseJour));
            }
        }
    }

    public function anyLogin()
    {
        //
    }

    public function getRegister(){

        $dateMiseJour = Fiche::select('date')->first();
        return View::make('user.register')->with(array('dateMiseJour'=>$dateMiseJour));
    }

    public function postRegister(){
        $dateMiseJour = Fiche::select('date')->first();
        $inputs = Input::all();

        $rules = array(
            'nom'       =>  'alpha_num|between:3,30|required',
            'email'     =>  'email|required|max:100|unique:users',
            'password'  =>  'confirmed|required|min:6|max:64'
        );
        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()) {
            Session::flash('message','Veuillez corriger les erreurs !');
            Session::flash('class','alert alert-warning');
            return Redirect::to('users/login/register')->withinput()->with(array('dateMiseJour'=>$dateMiseJour))->witherrors($validation);
        }else{
            $user = User::create(array(
                'nom'       =>    e(Input::get('nom')),
                'email'     =>    e(Input::get('email')),
                'password'  =>    Hash::make(Input::get('password'))
                ));

            Session::flash('message','Enregistrement réussi !');
            Session::flash('class','alert alert-success');
            return Redirect::to('users/login')->with(array('dateMiseJour'=>$dateMiseJour));
        }
    }

}