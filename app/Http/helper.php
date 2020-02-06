<?php

if (!function_exists('aurl')) {
    function aurl($url = null)
    {
        return url('admin/' . $url);
    }
}
if (!function_exists('v')) {
    function v($url = null)
    {
        return url('v/' . $url);
    }
}

if (!function_exists('sett')) {
    function sett()
    {
        return \App\Model\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('lang')) {
    function lang()
    {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            return sett()->main_lang;
        }
    }
}


if (!function_exists('dirction')) {
    function dirction()
    {
        if (session()->has('lang')) {
            if (session('lang') == 'ar') {
                return 'rtl';
            } else {
                return 'ltr';
            }
        } else {
            return 'rtl';
        }
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}

/*********validation helper function************/

if (!function_exists('v_image')) {
    function v_image($ext=null)
    {
        if ($ext === null){
            return 'image|mimes:jpg,jpeg,png,gif';
        }else{
            return 'image|mimes:'.$ext;
        }
    }
}

/*********validation helper function************/

if (!function_exists('responses'))
{
    function responses($status=null, $messages=null,$data=null)
    {
       return ['status' => $status,  'messages' => $messages, 'data'=>$data];

    }
}

/********* Get Main Departments ************/

function mainDepartment()
{
    $departments = App\Model\DepartmentProducts::where('parent','0')->get(['ar_name','id','parent']);
    return $departments;
}

/********* Get Sub Departments ************/

function subDepartment($id)
{
    $departments = App\Model\DepartmentProducts::where('parent',$id)->get(['ar_name','id','parent']);
    return $departments;
}

/********* Get Countries With Cities ************/

function getCountry()
{
    $countries = App\Model\Country::whereNull('parent')->with('city')->get(['country_name_ar','id','parent']);
    return $countries;
}

/********* Get MainDepartments With SubDepartments ************/

function getDept()
{
    $countries = App\Model\DepartmentProducts::where('parent','0')->with('department')->get(['ar_name','id','parent']);
    return $countries;
}

/********* Get SubDepartment From First Departments ************/

function getFirstDepartment()
{
    $departments = App\Model\DepartmentProducts::where('parent','0')->with('department')->first(['ar_name','id','parent']);
    return $departments;
}


/********* Explode Full Url ************/

function getUrl()
{
    $url = url()->full();
    $url = explode('/products/',$url);
     return substr($url['1'], 1) ?? '';
}


/********* Favourite ************/

function getFavourite($id)
{
    if(auth()->check()){
        $favourite = App\Model\Favourite::where('user_id',auth()->id())->where('product_id',$id)->first();
        if($favourite){
            return "favorite";
        }else{
            return "favorite_border";
        }
    }else{
        return "favorite_border";
    }
    return $departments;
}

/********* Get IP User ************/
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

/********* Get Visitor Count ************/
function visitorCount()
{
    $visitor = App\Model\Visitor::count();
    return $visitor+1725784 ?? "0";
}

/********* Get Users Count ************/
function UserCount()
{
    $user = App\User::count();
    return $user+12955 ?? "0";
}

/********* Get Products Count ************/
function productCount()
{
    $products = App\Model\Products::count();
    return $products+2569 ?? "0";
}

/********* Limit Function ************/
function limit($value, $limit = 200, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }

    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
}
