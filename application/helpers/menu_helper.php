<?php
function allControllers()
{
    return [
        'vendor', 'businessfield', 'dashboard'
    ];
}

function menus()
{
    return [
        "dashboard" => [
            "menu" => 'Dashboard', 
            'icon' => "ti-dashboard", 
            'child' => [
                ["menu" => 'Revenue', "url" => "dashboard/revenue"], 
                ["menu" => 'Salesman', "url" => "dashboard/salesman"], 
            ]
        ],
        "vendor" => [
            "menu" => 'Vendor', 
            'icon' => "mdi mdi-monitor-dashboard", 
            "url" => "vendor"
        ],
        "businessfield" => [
            "menu" => 'Business Fields', 
            'icon' => "mdi mdi-monitor-dashboard", 
            'child' => [
                ["menu" => 'List', "url" => "businessfield"], // << if has child
                ["menu" => 'Create', "url" => "businessfield/create"], 
            ]
        ],
        "usermanagament" => [
            "menu" => 'User Managament', 
            'icon' => "ti-user", 
            'child' => [
                ["menu" => 'All User', "url" => "usermanagament"], // << if has child
                ["menu" => 'Create User', "url" => "usermanagament/create"], 
            ]
        ],
    ];
}
function roles()
{
    return [
		0 => ['vendor', 'businessfield', 'dashboard', 'usermanagament'],
		1 => ['vendor', 'dashboard'],
		2 => ['businessfield', 'dashboard'],
		3 => ['dashboard'],
	];
}
function forbidden()
{
    show_error("You're not allowed to access this page", 403, "Forbidden page");
}
