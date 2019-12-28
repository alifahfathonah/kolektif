<?php

function breadcrumbs($route)
{
    if ($route==null) {
        return false;
    }
    $segments = explode('/', $route);
    foreach ($segments as $key => $value) {
        $url = base_url($value);
        $value = ucfirst($value);
        $activeClass = null;
        if ($key==count($segments)-1) {
            $url='javascript:void(0)';
            $activeClass = 'active';
        }
        else{
            $value = '<a href="'.$url.'">'.$value.'</a>';
        }
        $items[] = '<li class="breadcrumb-item '.$activeClass.'">'.$value.'</li>';
    }
    $item = implode("\n",$items);
    echo 
    '<ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="'.base_url().'">Home</a></li>
        '.$item.'
    </ol>';
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
        "sales" => [
            "menu" => 'Sales', 
            'icon' => "ti-shopping-cart", 
            "child" => [
                ["menu" => 'Customer', "url" => "customer/index"], 
                ["menu" => 'Sale Order', "url" => "saleorder/index"],
                ["menu" => 'Product List', "url" => "sales/productlist"], 
            ]
        ],
        "purchasing" => [
            "menu" => 'Purchasing', 
            'icon' => "ti-shopping-cart", 
            "child" => [
                ["menu" => 'Vendor List', "url" => "vendor/index"], 
                ["menu" => 'Purchase Orders', "url" => "purchaseorder/index"], 
            ]
        ],
        "finance" => [
            "menu" => 'Finance', 
            'icon' => "ti-money", 
            "child" => [
                ["menu" => 'Product List', "url" => "finance/index"], 
            ]
        ],
        "werehouse" => [
            "menu" => 'Werehouse', 
            'icon' => "ti-briefcase", 
            "child" => [
                ["menu" => 'Product List', "url" => "product/index"], 
            ]
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
            'icon' => "ti-settings", 
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
		0 => ['sales','finance','purchasing', 'businessfield', 'dashboard', 'usermanagament', 'customer', 'product', 'werehouse'],
		1 => ['purchasing'],
		2 => ['product'],
		3 => ['dashboard'],
	];
}
function allRoutes()
{
    return  [
        "all" => [
            "businessfield/index", 
            "customer/index", 
            "dashboard/index", 
            "kwitansi/index", 
            "payment/index", 
            "poline/index", 
            "product/index", 
            "product/create", 
            "product/edit", 
            "product/delete", 
            "purchaseorder/index", 
            "saleorder/index", 
            "soline/index", 
            "uom/index", 
            "usermanagament/index", 
            "usermanagament/create", 
            "usermanagament/edit", 
            "usermanagament/setting", 
            "vendor/index", 
            "vendor/create", 
            "vendor/edit", 
            "vendor/delete" 
        ],
        "werehouse" => [
            "dashboard/index", 
            "product/index", 
            "product/create", 
            "product/edit", 
            "product/delete", 
        ],
        "purchasing" => [
            "dashboard/index", 
            "vendor/index", 
            "vendor/create", 
            "vendor/edit", 
            "vendor/delete" 
        ],
        "sales" => [
            "dashboard/index", 
            "product/index", 
        ],
        "finance" => [
            "dashboard/index", 
            "product/index", 
            "product/edit", 
        ]
     ];
}
function allControllers()
{
    return [
        "businessfield" => [
            "index"
        ],
        "customer" => [
            'index'
        ],
        "dashboard" => [
            'index'
        ],
        "kwitansi" => [
            "index"
        ],
        "payment" => [
            'index'
        ],
        "poline" => [
            'index'
        ],
        "product" => [
            'index', 'create', 'edit', 'delete'
        ],
        "purchaseorder" => [
            'index'
        ],
        "saleorder" => [
            'index'
        ],
        "soline" => [
            'index'
        ],
        "uom" => [
            'index'
        ],
        "usermanagament" => [
            'index', 'create', 'edit', 'setting'
        ],
        "users",
        "vendor" => [
            'index', 'create', 'edit', 'delete'
        ],
    ];
    // cheetsheet pemalas

    // core/controller
    
    // $class = new ReflectionClass($this);
    // $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
    // foreach ($methods as $key => $value) {
    //     $arr[] = $value->name;
    // }
    // d($arr);
    // exit;

    // helper

    // $dirs = scandir(__DIR__.'\..\controllers');
    // foreach ($dirs as $key => $value) {
    //     if (strstr($value, '.php')) {
    //         $className = str_replace('.php', '', $value);
    //         $controllerId = strtolower($className);
    //         $class[] = $controllerId;
    //     };
    // }   
    // return $class;
}
function forbidden()
{
    show_error("You're not allowed to access this page", 403, "Forbidden page");
}
function bad_request()
{
    show_error("Your request method is not allowed", 405, "Method not allowed");
}
