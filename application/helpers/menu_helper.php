<?php
function menus()
{
    return [
        "vendor" => [
            "menu" => 'Vendor', 
            'icon' => "mdi mdi-monitor-dashboard", 
            "url" => base_url()."vendor"
        ],
        "bfield" => [
            "menu" => 'Business Fields', 
            'icon' => "mdi mdi-monitor-dashboard", 
            "url" => base_url()."businessfield",
            // 'child' => [
            //     ["menu" => 'Vendor', "url" => base_url()."businessfield"],  << if has child
            // ]
        ],
    ];
}
function roles()
{
    return [
		['vendor', 'bfield'],
		['vendor'],
		['bfield'],
	];
}
