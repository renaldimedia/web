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