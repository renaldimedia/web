 <?php

 function bootstrap_menu($array,$class1 = "dropdown",$induk_menu = 0,$parents = array())
 {
     if($induk_menu==0)
     {
         foreach ($array as $element) {
             if (($element['induk_menu'] != 0) && !in_array($element['induk_menu'],$parents)) {
                 $parents[] = $element['induk_menu'];
             }
         }
     }
     $menu_html = '';
     foreach($array as $element)
     {
         if($element['induk_menu']==$induk_menu)
         {
             if(in_array($element['id_menu'],$parents))
             {
                 $menu_html .= '<li class="'.$class1.'">';
                 $menu_html .= '<a href="'.base_url().$element['link'].'" class="dropdown-toggle" data-toggle="'.$class1.'" role="button" aria-expanded="false">'.$element['nama_menu'].' </a>';
             }
             else {
                 $menu_html .= '<li>';
                 $menu_html .= '<a href="' .base_url().$element['link'] . '">' . $element['nama_menu'] . '</a>';
             }
             if(in_array($element['id_menu'],$parents))
             {
                 $menu_html .= '<ul class="dropdown-menu" role="menu">';
                 $menu_html .= bootstrap_menu($array, "dropdown-submenu" , $element['id_menu'], $parents);
                 $menu_html .= '</ul>';
             }
             $menu_html .= '</li>';
         }
         
     }
     return $menu_html;
 }
 
    ?>
 <!-- NAVBAR Static navbar -->
    
    <nav class="navbar navbar-defaut navbar-static-top">
        <div class="container">
            <!--nav header-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar" style="background-color: #fff"></span>
            <span class="icon-bar" style="background-color: #fff"></span>
            <span class="icon-bar" style="background-color: #fff"></span>
          </button>
                <a class="navbar-brand" href="#">LOGO WEB</a>
            </div>
            <!--link navigasi-->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-default">
                    <?php
                        $query = "
                            SELECT m.* 
                            FROM menu AS m
                            WHERE is_root = 0
                            ORDER BY m.id_menu	
                        ";
                            $items = $this->db->query($query)->result_array();
                            
                            echo bootstrap_menu($items);
                            ?>
                </ul>
                <!--link dengan dropdown selesai-->

                <!-- Nav untuk admin (optional) >
                <ul class="nav navbar-nav navbar-default navbar-right">
                    <li class="dropdown multi-level">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu">
                            <li>
                                <a href="#">Logout</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Password</a>
                            </li>
                        </ul>
                    </li>
                </ul-->
                <!-- Nav untuk admin end -->

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <!-- NAVBAR Static navbar end -->
   