<?php
namespace App\Controllers;

class LoginController extends BaseController{

	private $user;
    private $session;

	public function __construct(){
		$this->user = 	new \App\Models\user();
		$this->session = \Config\Services::session();
	}
	public function login(){
		return view("login");
	}
	public function proses_login(){
		$username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        $user = $this->user
        ->where("username",$username)
        ->first();

        if($user){
        	if(password_verify($password, $user->password)){
        		$session_data = ([
        			"user_id" => $user->user_id,
        			"user_nama" => $user->nama,
        		]);
        		session()->set($session_data);
        		return redirect()->to(base_url('/'));

        }else{
        	$this->session->setFlashdata("pesan","password salah");
        	return redirect()->to(base_url("login"));
        }
    	}else{
    		$this->session->setFlashdata("pesan","akun tidak ada, registrasi terlebih dahulu!");
        	return redirect()->to(base_url("login"));	
    	}
	}

}