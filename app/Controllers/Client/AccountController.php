<?php
namespace App\Controllers\Client;

require_once "./mailer.php";
require_once "./alert.php";

use App\Models\Account;
use App\Controllers\Client\BaseController;

// use Mailer;
// use App\Views\Client;
class AccountController extends BaseController
{
    protected $accountModel;
    public function __construct()
    {
        $this->accountModel = new Account();
    }
    public function logOut()
    {
        if (isset($_POST['btnlogout'])) {
            unset($_SESSION['user']);
            setcookie('logout', true, time() + 1);
            header('Location: ' . route('/'));
        }
    }
    public function logIn()
    {
        $title = "Đăng nhập";
        $this->renderClient('Accounts.logIn', compact('title'));
    }
    public function signUp()
    {
        $title = "Đăng kí";
        $this->renderClient('Accounts.signUp', compact('title'));
    }
    public function ActionSignUp()
    {
        if (isset($_POST['btn_signUp'])) {
            $host = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
            $host .= "://" . $_SERVER['HTTP_HOST'] . "/xuongezcode/confirm";
            $ten = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            if (empty($ten) || empty($email) || empty($pass)) {
                setcookie('error1', true, time() + 1);
                header('Location: ' . route('/signup'));
            } else {
                $user = $this->accountModel->AccountFind("email = '" . $email . "' OR username = '" . $ten . "'");
                if (!empty($user)) {
                    setcookie('error2', true, time() + 1);
                    header('Location: ' . route('/signup'));
                } else {
                    $link = $host . "/" . $email . "/" . $ten . "/" . $pass;
                    $body = '<a href="' . $link . '" class="btn btn-success">Xác nhận đăng kí tài khoản</a>';
                    \Mail\Mailer::sendMail($email, $ten, 'This is the account registration confirmation email', $body);
                    setcookie("success", true, time() + 1);
                    header('Location: ' . route('/signup'));
                }
            }
        }
    }
    public function confirm($email, $username, $pass)
    {
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'role' => 'client',
            'status' => 'active',
            'created_at' => date('Y-m-d'),
            'gender' => NULL,
            'dob' => NULL
        ];
        $this->accountModel->AccountInsert($data);
        echo "Thành công";
        $_SESSION['signUpSucc'] = true;
        header('Location: ' . route('/login'));
    }
    public function ActionLogIn()
    {
        $tendn = $_POST['tendn'];
        if (isset($_POST['btn_signIn'])) {
            if ($tendn == '' || $_POST['password'] == '') {
                $_SESSION['err1'] = true;
                header('Location: ' . route('/login'));
            } else {
                $user = $this->accountModel->AccountFind("username = '$tendn' or email = '$tendn' or tel = '$tendn'");
                if (empty($user)) {
                    setcookie('errU', true, time() + 1);
                    header('Location: ' . route('/login'));
                } else if (password_verify($_POST['password'], $user['password'])) {
                    if ($user['status'] == 'inactive') {
                        setcookie('locked', true, time() + 1);
                        header('Location: ' . route('/login'));
                    } else {
                        $_SESSION['user'] = $user;
                        echo "Đăng nhập thành công";
                        setcookie('login', true, time() + 1);
                        header('Location: ' . route('/'));
                    }
                } else {
                    setcookie('errP', true, time() + 1);
                    header('Location: ' . route('/login'));
                }
            }
        }
    }
    public function forgot()
    {
        $header = $title = "Quên mật khẩu";
        $this->renderClient('Accounts.forgot', compact('title', 'header'));
    }
    public function sendMailForGot()
    {
        if (isset($_POST['btn_send'])) {
            $host = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
            $host .= "://" . $_SERVER['HTTP_HOST'] . "/xuongezcode/updatePass";
            $email = $_POST['email'];
            $account = $this->accountModel->AccountFind("email = '$email' ");
            if (!isset($account['email'])) {
                setcookie('errEmail', true, time() + 1);
                header('Location: ' . route('/forgot'));
            } else {
                $token = rand(1000, 9999);
                $verfy = password_hash($token, PASSWORD_DEFAULT);

                $body = '<span style="font-size:langer">Mã xác nhận của bạn là: <b>' . $token . '</b></span>';

                \Mail\Mailer::sendMail($account['email'], $account['username'], 'Verification', $body);

                $link = $host . '/' . $account['id'] . '&verfy=' . $verfy;
                $_SESSION['sendSucces'] = true;
                $this->renderClient('Accounts.forgot', compact('link'));
            }
        }
    }
    public function updatePass($idUser)
    {
        $header = $title = "Cập nhật mật khẩu";
        $this->renderClient('Accounts.updatePass', compact('title', 'header'));
    }
    public function actionUpdatePass($idUser)
    {
        $verfy = $_GET['verfy'];
        if (isset($_POST['btn_update'])) {
            $token = $_POST['token'];
            if (password_verify($token, $verfy)) {
                $data = [
                    'password' => password_hash($_POST['pass'], PASSWORD_DEFAULT)
                ];
                $this->accountModel->AccountUpdate($idUser, $data);
                $_SESSION['updatePass'] = true;
                header('Location: ' . route('/login'));
            } else {
                $_SESSION['errToken'] = true;
                header('Location: ' . route('/login'));
            }
        }
    }
    public function changePass()
    {
        $title = $header = "Thay đổi mật khẩu";
        $this->renderClient('Accounts.changePass', compact('title', 'header'));
    }
    public function editPass()
    {
        $account = $this->accountModel->AccountFind("id = " . $_SESSION['user']['id']);
        $id = $account['id'];
        if (isset($_POST['btn-changePass'])) {
            $pass = $_POST['pass'];
            if (password_verify($pass, $account['password'])) {
                $data = [
                    'password' => password_hash($_POST['newPass'], PASSWORD_DEFAULT),
                    'update_at' => date('Y-m-d')
                ];
                $this->accountModel->AccountUpdate($id, $data);
                setcookie('successChange', true, time() + 1);
                header('Location: ' . route('/infoAccount'));
            } else {
                setcookie('errChange', true, time() + 1);
                header('Location: ' . route('/changePass'));
            }
        }
    }
    public function infoAccount()
    {
        $header = $title = "Thông tin tài khoản";
        $infoUser = $this->accountModel->AccountFind('id = ' . $_SESSION['user']['id']);
        $this->renderClient('Accounts.infoAccount', compact('infoUser', 'title', 'header'));
    }
    public function editInfo()
    {
        $header = $title = "Chỉnh sửa thông tin";
        $infoUser = $this->accountModel->AccountFind('id = ' . $_SESSION['user']['id']);
        $this->renderClient('Accounts.editInfo', compact('infoUser', 'title', 'header'));
    }
    public function updateInfo()
    {
        $account = $this->accountModel->AccountFind('id = ' . $_SESSION['user']['id']);
        if (isset($_POST['btn-editInfo'])) {
            $img = $_FILES['avatar'];
            $imgPath = $account['avatar'];

            if ($img['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "Public/Uploads/";
                $targetPath = $targetDirectory . basename($img['name']);

                if (move_uploaded_file($img['tmp_name'], $targetPath)) {
                    $_SESSION['user']['avatar'] = $imgPath = basename($img['name']);
                }
            }
            $data = [
                'username' => $_POST['username'],
                'fullname' => $_POST['fullname'],
                'gender' => $_POST['gender'],
                'avatar' => $imgPath,
                'dob' => $_POST['dob'],
                'tel' => $_POST['tel'],
                'address' => $_POST['address'],
                'update_at' => date('Y-m-d')
            ];
        }
        $this -> accountModel -> AccountUpdate($_SESSION['user']['id'],$data);
        setcookie('editInfo', true, time() + 1);
        header('Location: ' . route('/infoAccount'));
    }
}

?>