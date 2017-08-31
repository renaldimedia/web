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
                 $menu_html .= '<a id="menu'.$element['id_menu'].'" href="'.base_url().$element['link'].'" class="dropdown-toggle" data-toggle="'.$class1.'" role="button" aria-expanded="false"><i class=""'.$element['class'].'>'.$element['nama_menu'].' </a>';
             }
             else {
                 $menu_html .= '<li>';
                 $menu_html .= '<a id="menu'.$element['id_menu'].'" href="' .base_url().$element['link'] . '"><i class="'.$element['class'].'"> </i> '.$element['nama_menu'] . '</a>';
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
<!-- Navigasi pinggir -->
            <div id="sidenav" class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php
                $query = "
                            SELECT m.* 
                            FROM menu AS m
                            WHERE is_root = 1
                            ORDER BY m.id_menu	
                        ";
                            $items = $this->db->query($query)->result_array();
                            echo bootstrap_menu($items);
                            ?>
                    <!--li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Posting Baru</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Materi Kuliah</a>
                    </li>
                     <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Penelitian</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Curhat</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Profil</a>
                            </li>
                            <li>
                                <a href="#">Ganti Password</a>
                            </li>
                        </ul>
                    </li-->
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>