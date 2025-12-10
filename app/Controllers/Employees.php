<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;

class Employees extends BaseController
{
    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    private function requireLogin()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->send();
        }
    }

    /* --------------------------------------------------------
       LIST EMPLOYEES
    --------------------------------------------------------- */
    public function index()
    {
        $this->requireLogin();

        $data['employees'] = $this->employeeModel->findAll();

        return view('employees/index', $data);
    }

    /* --------------------------------------------------------
       ADD EMPLOYEE (FORM)
    --------------------------------------------------------- */
    public function create()
    {
        $this->requireLogin();

        return view('employees/create');
    }

    /* --------------------------------------------------------
       STORE EMPLOYEE (FORM SUBMIT)
    --------------------------------------------------------- */
    public function store()
    {
        $this->requireLogin();

        $fileName = null;
        $file = $this->request->getFile('picture');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Guaranteed correct upload path for CI4
            $uploadPath = FCPATH . 'uploads';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $fileName = $file->getRandomName();
            $file->move($uploadPath, $fileName);
        }

        $this->employeeModel->save([
            'name'        => $this->request->getPost('name'),
            'address'     => $this->request->getPost('address'),
            'designation' => $this->request->getPost('designation'),
            'salary'      => $this->request->getPost('salary'),
            'picture'     => $fileName
        ]);

        return redirect()->to('/employees');
    }

    /* --------------------------------------------------------
       EDIT EMPLOYEE (FORM)
    --------------------------------------------------------- */
    public function edit($id = null)
    {
        $this->requireLogin();

        $employee = $this->employeeModel->find($id);

        if (!$employee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Employee not found");
        }

        return view('employees/edit', ['employee' => $employee]);
    }

    /* --------------------------------------------------------
       UPDATE EMPLOYEE (FORM SUBMIT)
    --------------------------------------------------------- */
    public function update($id = null)
    {
        $this->requireLogin();

        $employee = $this->employeeModel->find($id);

        if (!$employee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Employee not found");
        }

        $fileName = $employee['picture']; // Keep old picture unless new is uploaded
        $file = $this->request->getFile('picture');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $uploadPath = FCPATH . 'uploads';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $fileName = $file->getRandomName();
            $file->move($uploadPath, $fileName);
        }

        $this->employeeModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'address'     => $this->request->getPost('address'),
            'designation' => $this->request->getPost('designation'),
            'salary'      => $this->request->getPost('salary'),
            'picture'     => $fileName
        ]);

        return redirect()->to('/employees');
    }

    /* --------------------------------------------------------
       DELETE EMPLOYEE
    --------------------------------------------------------- */
    public function delete($id = null)
    {
        $this->requireLogin();

        $this->employeeModel->delete($id);

        return redirect()->to('/employees');
    }
}
