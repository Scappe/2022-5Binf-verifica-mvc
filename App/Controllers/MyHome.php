<?php

namespace App\Controllers;

use \Core\View;
//use \App\Models\User;
//use \App\Views\Home\crews;
use \App\Models\modelCrew;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class MyHome extends \Core\Controller //il nome della classe deve obbligatoriamente essere uguale al nome del file (il controller)
{

    

    /**
     * Show the index page
     *
     * @return void
     */


    public function mycrewsAction() { // azione myCrews (il Action è fisso) è stata richiamata dalla root dell index.php
        $crews = modelCrew::getAll();
        
        //echo json_encode($crews);
        View::renderTemplate('Home/crews.html',['crews' => $crews]);
    }

    /*
    public function indexAction()
    {
        View::renderTemplate('Home/index.html');
    }

    public function indexWithIdAction()
    {
        $id = $this->route_params["id"];
        View::renderTemplate('Home/index_id.html',['id' => $id]);
    }

    public function usersAction() {
        $users = User::getAll();
        View::renderTemplate('Home/users.html',['users' => $users]);
    }



    public function usersJsonAction() {
        $users = User::getAll();
        echo json_encode($users);
    }

    public function usersWithIdAction() {
        $id = $this->route_params["id"];
        $user = User::getUser($id);
        View::renderTemplate('Home/user.html',['user' => $user]);
    }
    public function usersWithIdJsonAction() {
        $id = $this->route_params["id"];
        $users = User::getUser($id);
        echo json_encode($users);
    }

    public function usersJs() {
        View::renderTemplate('Home/users_js.html');
    }

*/

}
