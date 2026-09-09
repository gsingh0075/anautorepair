<?php

namespace App\Controllers;

use App\Models\AdminUserModel;
use App\Models\FormInquiryModel;

class Admin extends BaseController
{
    public function login()
    {
        $session = session();

        if ($session->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }

        if ($this->request->is('post')) {
            $username = trim((string) $this->request->getPost('username'));
            $password = (string) $this->request->getPost('password');

            $userModel = model(AdminUserModel::class);
            $user      = $userModel->findByUsername($username);

            if ($user && password_verify($password, (string) $user['password_hash'])) {
                $session->set([
                    'admin_logged_in' => true,
                    'admin_username'  => $user['username'],
                    'admin_user_id'   => $user['id'],
                ]);

                return redirect()->to('/admin');
            }

            $session->setFlashdata('error', 'Invalid username or password.');

            return redirect()->to('/admin/login');
        }

        return view('admin/login', [
            'title' => 'Admin Login',
            'error' => $session->getFlashdata('error'),
        ]);
    }

    public function logout()
    {
        $session = session();
        $session->remove(['admin_logged_in', 'admin_username', 'admin_user_id']);
        $session->setFlashdata('success', 'You have been logged out.');

        return redirect()->to('/admin/login');
    }

    public function index()
    {
        $year     = (int) ($this->request->getGet('year') ?? date('Y'));
        $monthRaw = $this->request->getGet('month');
        $month    = $monthRaw === null || $monthRaw === '' ? (int) date('n') : (int) $monthRaw;

        if ($year < 2000 || $year > ((int) date('Y') + 1)) {
            $year = (int) date('Y');
        }
        if ($month < 1 || $month > 12) {
            $month = (int) date('n');
        }

        if ((string) $this->request->getGet('clear') === '1') {
            $year  = (int) date('Y');
            $month = (int) date('n');
        }

        $model     = model(FormInquiryModel::class);
        $inquiries = $model->findFiltered($year, $month);
        $years     = range((int) date('Y'), max(2024, (int) date('Y') - 5));

        return view('admin/layout', [
            'title'         => 'Inquiries',
            'adminUsername' => session('admin_username') ?? 'admin',
            'content'       => view('admin/inquiries/index', [
                'inquiries'  => $inquiries,
                'filterYear' => $year,
                'filterMonth'=> $month,
                'years'      => $years,
            ]),
        ]);
    }

    public function show(string $id)
    {
        $model   = model(FormInquiryModel::class);
        $inquiry = $model->find((int) $id);

        if (! $inquiry) {
            return redirect()->to('/admin')->with('error', 'Inquiry not found.');
        }

        return view('admin/layout', [
            'title'         => 'Inquiry Detail',
            'adminUsername' => session('admin_username') ?? 'admin',
            'content'       => view('admin/inquiries/show', [
                'inquiry' => $inquiry,
            ]),
        ]);
    }
}
