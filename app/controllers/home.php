<?php



namespace Controller;

class Home {
    public function get() {
      // if ($_SESSION["loggedin"]=="true") {
      //       header("location: /feed");
      //   } else {
      //       echo \View\Loader::make()->render("templates/home.twig");
      //   }
       echo \View\Loader::make()->render("templates/home.twig");
    }
}
