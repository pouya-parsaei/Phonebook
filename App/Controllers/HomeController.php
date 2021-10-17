<?php

namespace App\Controllers;

use App\Models\Contact;

class HomeController
{
    private $contactModel;
    public function __construct()
    {
        $this->contactModel = new Contact();
    }
    public function index()
    {
        global $request;
        $where = ['ORDER' => ['id' => 'DESC']];
        $searchKeyboard = $request->input('search');
        if (!is_null($searchKeyboard)) {
            $where['OR'] = [
                'name[~]' => $searchKeyboard,
                'mobile[~]' => $searchKeyboard,
                'email[~]' => $searchKeyboard
            ];
        }
        $contacts = $this->contactModel->get('*', $where);
        $data = [
            'contacts' => $contacts,
            'searchKeyboard' => $searchKeyboard,
            'totalContact' => $this->contactModel->count([]),
            'pageSize' => $this->contactModel->getPageSize()
        ];
        view('home.index', $data);
    }
}
