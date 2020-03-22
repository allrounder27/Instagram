<?php

namespace Controller;

class Profile
{
    public function get()
    {
        if ($_SESSION["loggedin"]) {
            $userid = $_SESSION["userid"];
            echo \View\Loader::make()->render("templates/profile.twig", array(
        "profile" =>\Model\Profile::profile($userid),
        "myposts" =>\Model\Feed::myposts($userid),
      ));
        } else {
            echo "You are not logged in!";
        }
    }
}
