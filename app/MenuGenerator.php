<?php

namespace App;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class MenuGenerator
{
    protected $menu;

    public function AddLink($label, $href, $icon, $parent = null)
    {
        if (isset($parent)) {
            $sub_menu = [
                'active' => false,
                'icon' => $icon,
                'href' => $href,
                'label' => $label,
            ];
            $this->menu[$parent]['sub_menu'][$label] = [
                'active' => false,
                'icon' => $icon,
                'href' => $href,
                'label' => $label
            ];
        } else {
            $this->menu[$label] = [
                'active' => false,
                'icon' => $icon,
                'href' => $href,
                'label' => $label,
                'sub_menu' => []
            ];
        }
    }

    public function Prepare()
    {
        foreach ($this->menu as $key => $item) {
            if ($item['href'] == Request::url()) {
                $this->menu[$key]['active'] = true;
            }

            if (count($item['sub_menu'])) {
                foreach ($item['sub_menu'] as $subKey => $subItem) {
                    if ($subItem['href'] == Request::url()) {
                        $this->menu[$key]['active'] = true;
                        $this->menu[$key]['sub_menu'][$subKey]['active'] = true;
                    }
                }
            }
        }
        return $this->menu;
    }
}