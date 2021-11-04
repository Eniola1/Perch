<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    public function formSubmit(Request $req)
    {
        $username = $req->input('name');
        $password = $req->input('password');

        //$users  = DB::select('select * from customers where username = :name and password = :pass', ['name' => $username, 'pass' => $password]);

        $user  = DB::select('select * from customers where username = :name and password = :pass', ['name' => $username, 'pass' => $password]);

        $admin = DB::select('select * from admin where username = :name and password = :pass', ['name' => $username, 'pass' => $password]);

        $user = count($user); $admin = count($admin);

        if($admin == 0 && $user == 1)
        {
            echo "<script>window.open('customers?name=$username', '_self')</script>";
        }

        if($admin == 1 && $user == 0)
        {
            echo "<script>window.open('admin?name=$username', '_self')</script>";
        }

        if($admin == 1 && $user == 1)
        {
            echo "<script>window.open('verify?name=$username', '_self')</script>";
        }

        if($admin == 0 && $user == 0)
        {
            echo "Invalid username and password.";
        }

        //return view("check", compact("user", "admin", "username")); //This basically works like require, it adds another page to the present one.
        //unlike php when collecting arrays from database, u have to return view to a blade page and collect it from there, although it still end up on the parent page.

        //url synthax can also be used to link pages to a different page entirely.
    }

    public function admin(Request $req)
    {
        $username = $req->input('name');

        echo "
            <h1> Welcome $username <h1>

            <h2> Choose an action</h2>
    
            <ul>
            <li><a href='Ausers?name=$username'>Create a user</a></li>
            <li><a href='Aservice?name=$username'>Create a service</a></li>
            <li><a href='Aappointment?name=$username'>View all appointment booked by customers</a></li>
            </ul>
        ";
    }

    public function customers(request $req)
    {
        $username = $req->input('name');

        echo "
            <h1> Welcome $username <h1>

            <h2> Choose an action</h2>

            <ul>
            <li><a href='appointment?name=$username'>Book an appointment</a></li>
            <li><a href='services?name=$username'>View all booked services</a></li>
            </ul>
        ";
    }

    public function Ausers(request $req)
    {
        $username = $req->input('name');

        return view("vuser", compact("username"));
    }

    public function create_user(request $req)
    {
        $admin = $req->input('admin');
        $username = $req->input('username');
        $password = $req->input('password');

        $image = $req->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destination = public_path('/images');
        $image->move($destination, $name);
        
        $db = DB::table('customers')->insert([
            'username'=>$username,
            'password'=>$password,
            'image'=> $name
        ]);
    }

    public function Aservice(request $req)
    {
        $username = $req->input('name');
 
        return view("vservice", compact("username"));
    }
    
    public function create_service(request $req)
    {
        $admin = $req->input('admin');
        $sname = $req->input('service');
        $price = $req->input('price');

        $image = $req->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destination = public_path('/images');
        $image->move($destination, $name);
        
        $db = DB::table('service')->insert([
            'Admin'=>$admin,
            'name'=>$sname,
            'image'=> $name,
            'price'=>$price
        ]);
    }

    public function Aappointment(request $req)
    {
        $username = $req->input('name');

        $apps = DB::table('appointment')->join('service', 'service.id', 'appointment.service_id')->get();

        return view("vappointment", compact("apps"));
    }

    public function appointment(request $req)
    {
        $username = $req->input('name');

        $users  = DB::select('select * from service');

        return view("appointment", compact("users", "username"));
    }

    public function Apnt(request $req)
    {
        $username = $req->input('name');

        $id = $req->input('id');

        $users = DB::table('appointment')    
        ->insert([
            'service_id'=>$id,
            'username'=>$username,
            'images'=>''
        ]);

        return view("bappointment", compact("users", "username"));
    }

    public function services(request $req)
    {
        $username = $req->input('name');

        $users = DB::table('service')
        ->where('appointment.username', $username)
        ->join('appointment', 'appointment.service_id', 'service.id')
        ->get();

        return view("bkd_appointment", compact("users"));
    }
}
