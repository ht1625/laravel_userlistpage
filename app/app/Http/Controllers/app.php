<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\users;

use DB;

class app extends Controller
{
    public $back_data=null;
    public function newUser(){
        return view('new_user',['user'=>null]);
    }

    public function show_table(){  

        $data=users::sortable()->paginate(5); 
        return view('homepage',['data'=>$data]);
    }

    public function create_user(Request $datalar){
        $form=$datalar->post();
        users::insert([
            'first_name' => $form['fname'],
            'last_name' => $form['lname'],
            'birth_place' => $form['birthPlace'],
            'birth_date' => $form['birthDate']
        ]);
        return $this->show_table();
    }

    public function get_table(){ //datayı alıp homepage e gidiyor
       return $this->show_table();
    }

    public function delete_user($sid){
        users::where('id', $sid)->delete();
        return $this->show_table();
    }

    public function edit_user($sid){
        $user=users::where('id', $sid)->first();
        return view('new_user',['user'=>$user]);
    }

    public function do_edit(Request $data){
        $form=$data->post();
        users::where('id', $form['id'])
              ->update([
                'first_name' => $form['fname'],
                'last_name' => $form['lname'],
                'birth_place' => $form['birthPlace'],
                'birth_date' => $form['birthDate']
               ]);
        return $this->show_table();      
    }  
    
    public function search(Request $request){
        $data=users::where([['first_name','like','%'.$request->query('fname').'%'],
            ['id','like','%'.$request->query('sid').'%'],
            ['last_name','like','%'.$request->query('lname').'%'],
            ['birth_place','like','%'.$request->query('birthp').'%'],
            ['birth_date','like','%'.$request->query('birthd').'%'],
        ])->sortable()->paginate(5)->withQueryString();  
        return view('homepage',['data'=>$data]);
    }
}

