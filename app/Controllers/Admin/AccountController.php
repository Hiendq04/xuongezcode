<?php
namespace App\Controllers\Admin;

use App\Models\Account;
use App\Controllers\Admin\BaseController;

class AccountController extends BaseController
{
    protected $accountModel;
    public function __construct()
    {
        $this->accountModel = new Account();
    }

    public function list()
    {
        $accounts = $this->accountModel->AccountAll();
        $title = $header = "Danh sách tài khoản";
        if (isset($_POST['btn-deletes-a'])) {
            $btn = array_pop($_POST);
            foreach ($_POST as $id) {
                $this->accountModel->AccountDelete($id);
                setcookie('deletes',true,time()+1);
                header('Location: ' . routeAdmin('/accounts/list'));
            }
        }
        if (isset($_POST['btn-lock-a'])) {
            $btn = array_pop($_POST);
            foreach ($_POST as $id) {
                $data = [
                    'status' => 'inactive',
                ];
                $this->accountModel->AccountUpdate('' . $id, $data);
                setcookie('lock',true,time()+1);
                header('Location: ' . routeAdmin('/accounts/list'));
            }
        }
        if (isset($_POST['btn-unlock-a'])) {
            $btn = array_pop($_POST);
            foreach ($_POST as $id) {
                $data = [
                    'status' => 'active',
                ];
                $this->accountModel->AccountUpdate('' . $id, $data);
                setcookie('unlock',true,time()+1);
                header('Location: ' . routeAdmin('/accounts/list'));
            }
        }
        if (isset($_POST['btn-search'])) {
            $keyword = $_POST['keyword'];
            $accounts = $this->accountModel->AccountAll(['*'], "username like '%" . $keyword . "%' OR email like '%" . $keyword . "%' ");
        }
        $this->renderAdmin('Account.list', compact('accounts', 'title', 'header'));
    }

    public function delete($idAcc)
    {
        $this->accountModel->AccountDelete($idAcc);
        // setcookie('delete',true,time()+1);
        $_SESSION['delete'] = true;
        header('Location: ' . routeAdmin('/accounts/list'));
    }

    public function add()
    {
        $title = $header = "Thêm mới tài khoản";
        $this->renderAdmin('Account.add', compact('title', 'header'));
    }
    public function actionAdd()
    {
        if (isset($_POST['btn_add-acc'])) {
            $img = $_FILES['avatar'];
            $imgPath = NULL;
            if ($img['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "Public/Uploads/";
                $targetPath = $targetDirectory . basename($img['name']);

                if (move_uploaded_file($img['tmp_name'], $targetPath)) {
                    $imgPath = basename($img['name']);
                }
            }
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role' => ($_POST['role'] == 'admin') ? $_POST['role'] : 'client',
                'created_at' => date('Y-m-d'),
                'fullname' => $_POST['fullname'],
                'gender' => ($_POST['gender'] != '' && (isset($_POST['gender']))) ? $_POST['gender'] : NULL,
                'dob' => ($_POST['dob'] != '0000-00-00' && $_POST['dob'] != '') ? $_POST['dob'] : NULL,
                'tel' => $_POST['tel'],
                'address' => $_POST['address'],
                'avatar' => $imgPath
            ];
            if ($data['username']!=''&&$data['email']!=''&&$data['password']!=''&&$data['role']!='') {
                $this->accountModel->AccountInsert($data);
                $_SESSION['success'] = true;
                header('Location: ' . routeAdmin('/accounts/add'));
            } else {
                $_SESSION['err1'] = true;
                header('Location: ' . routeAdmin('/accounts/add'));
            }
        }


    }
    public function info($idAcc)
    {
        $account = $this->accountModel->AccountFind('id = ' . $idAcc);
        $title = $header = "Thông tin tài khoản";
        $this->renderAdmin('Account.info', compact('account', 'title', 'header'));
    }
    public function edit($idAcc)
    {
        $account = $this->accountModel->AccountFind('id = ' . $idAcc);
        $title = "Cập nhật thông tin";
        $header = "Cập nhật thông tin tài khoản";
        $this->renderAdmin('Account.update', compact('account', 'title', 'header'));
    }
    public function update($idAcc)
    {
        if (isset($_POST['btn_update-acc'])) {
            $data = [
                'username' => $_POST['username'],
                'fullname' => $_POST['fullname'],
                'email' => $_POST['email'],
                'tel' => $_POST['tel'],
                'dob' => (isset($_POST['dob']) && $_POST['dob'] != '0000-00-00') ? $_POST['dob'] : NULL,
                'gender' => (isset($_POST['gender']) && $_POST['gender'] != '') ? $_POST['gender'] : NULL,
                'address' => $_POST['address'],
                'role' => $_POST['role'],
                'status' => $_POST['status'],
                'update_at' => date('Y-m-d')
            ];
            $this->accountModel->AccountUpdate($idAcc, $data);
            $_SESSION['updateSucc'] = true;
            header('Location: ' . routeAdmin('/accounts/info/'.$idAcc));
        }
    }
}
?>