<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Utilities\Validation;

class ContactController
{
    private $contactModel;
    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function add()
    {
        global $request;
        $data['alreadyExists'] = false;

        # check if the contact number is already exists
        $count = $this->contactModel->count(['mobile' => $request->input('mobile')]);
        if ($count) {
            $data['alreadyExists'] = true;
            viewDie('contact.add-result', $data);
        }

        if (!Validation::isValidEmail($request->input('email'))) {
            $data = ['success' => false, 'message' => 'invalid email address', 'alreadyExists' => false];
            viewDie('contact.add-result', $data);
        }

        # create new contact
        $contactId = $this->contactModel->create([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email')
        ]);
        $data['contactId'] = $contactId;
        $data['success'] = true;
        $data['message'] = "Contact with ID: $contactId Created Successfully";

        view('contact.add-result', $data);
    }

    public function delete()
    {
        global $request;
        $id = $request->getRouteParam('id');
        $data['deletedCount'] = $this->contactModel->delete(['id'=>$id]);
        view('contact.delete-result', $data);

    }
}
