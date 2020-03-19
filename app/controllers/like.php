<?php

namespace Controller;

class Like {
    public function post()
    {
      $imageid = $_POST["imageid"];
      \Model\Post::like($imageid);
          }

    }
