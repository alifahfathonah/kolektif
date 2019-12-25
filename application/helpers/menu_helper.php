<?php
function menus()
{
    return [
        "dashboard" => [
            "menu" => 'Dashboard', 
            'icon' => "mdi mdi-monitor-dashboard", 
            "url" => base_url()."dashboard"
        ],
        "vendor" => [
            "menu" => 'Vendor', 
            'icon' => "mdi mdi-monitor-dashboard", 
            "url" => base_url()."vendor"
        ],
        "businessfield" => [
            "menu" => 'Business Fields', 
            'icon' => "mdi mdi-monitor-dashboard", 
            "url" => base_url()."businessfield",
            'child' => [
                ["menu" => 'List', "url" => base_url()."businessfield"], // << if has child
                ["menu" => 'Create', "url" => base_url()."businessfield/create"], 
            ]
        ],
    ];
}
function roles()
{
    return [
		['vendor', 'businessfield', 'dashboard'],
		['vendor', 'dashboard'],
		['businessfield', 'dashboard'],
	];
}
function forbidden()
{
    show_error("You're not allowed to access this page", 403, "Forbidden page");
}
