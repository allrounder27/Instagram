<?php

namespace Controller;


class Profile {
  public function get() {
    $userid = $_SESSION["userid"];
    echo \View\Loader::make()->render("templates/profile.twig", array(
      "profile" =>\Model\Profile::profile($userid),
      "myposts" =>\Model\Feed::myposts($userid),
    ));  }

}
