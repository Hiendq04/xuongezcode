<?php 
    use Phroute\Phroute\RouteCollector;

    use App\Controllers\Client as ControllersClient;
    use App\Controllers\Admin as ControllersAdmin;

    $router = new RouteCollector();
    
    $url = isset($_GET['url']) ? $_GET['url'] : '/';
    $router->get('/', [ControllersClient\HomeController::class,'list']); 
    $router->get('/signup', [ControllersClient\AccountController::class,'signUp']);
    $router->post('/signup', [ControllersClient\AccountController::class,'ActionSignUp']);
    $router->get('/login', [ControllersClient\AccountController::class,'logIn']);
    $router->post('/login', [ControllersClient\AccountController::class,'ActionLogIn']);
    $router->any('/logOut', [ControllersClient\AccountController::class,'logOut']);
    $router->get('/confirm/{email}/{username}/{pass}', [ControllersClient\AccountController::class,'confirm']);
    $router->get('/forgot', [ControllersClient\AccountController::class,'forgot']);
    $router->post('/forgot', [ControllersClient\AccountController::class,'sendMailForGot']);
    $router->get('/updatePass/{idUser}', [ControllersClient\AccountController::class,'updatePass']);
    $router->post('/updatePass/{idUser}', [ControllersClient\AccountController::class,'actionUpdatePass']);
    $router->get('/changePass', [ControllersClient\AccountController::class,'changePass']);
    $router->post('/changePass', [ControllersClient\AccountController::class,'editPass']);
    $router->get('/infoAccount', [ControllersClient\AccountController::class,'infoAccount']);
    $router->get('/editInfo', [ControllersClient\AccountController::class,'editInfo']);
    $router->post('/editInfo', [ControllersClient\AccountController::class,'updateInfo']);
    
    $router->get('/category/{idCat}', [ControllersClient\CourseController::class,'Course_Cat']);
    // $router->get('/courses', [ControllersClient\CourseController::class,'list']); 
    // $router->get('/courses/{course_id}/edit', [ControllersClient\CourseController::class,'find']);
    // $router->get('/listCourses', function(){
    //     echo "list";
    // }); 
    
    $router->group(['before'=>'auth','prefix'=>'admin'],function($router){
        $router->get('/',[ControllersAdmin\HomeController::class,'home']);
        $router->group(['prefix'=>'/category'],function($router){
            $router->get('/list',[ControllersAdmin\CategoryController::class,'list']);
            $router->get('/add',[ControllersAdmin\CategoryController::class,'add']);
            $router->post('/add',[ControllersAdmin\CategoryController::class,'addCat']);
            $router->get('/info/{idCat}',[ControllersAdmin\CategoryController::class,'info']);
            $router->post('/info/{idCat}',[ControllersAdmin\CategoryController::class,'update']);
        });
        $router->group(['prefix'=>'/course'],function($router){
            $router->get('/list',[ControllersAdmin\CourseController::class,'list']);
        });
        $router->group(['prefix'=>'/accounts'],function($router){
            $router->get('/list',[ControllersAdmin\AccountController::class,'list']);
            $router->any('/list',[ControllersAdmin\AccountController::class,'list']);
            $router->any('/delete/{idAcc}',[ControllersAdmin\AccountController::class,'delete']);
            $router->get('/add',[ControllersAdmin\AccountController::class,'add']);
            $router->post('/add',[ControllersAdmin\AccountController::class,'actionAdd']);
            $router->get('/info/{idAcc}',[ControllersAdmin\AccountController::class,'info']);
            $router->get('/edit/{idAcc}',[ControllersAdmin\AccountController::class,'edit']);
            $router->post('/edit/{idAcc}',[ControllersAdmin\AccountController::class,'update']);
        });
        $router -> group(['prefix'=>'/comments'],function($router){
            $router -> get('/list',[ControllersAdmin\CommentController::class,'list']);
            $router -> any('/list',[ControllersAdmin\CommentController::class,'list']);
            $router -> any('/delete/{idCom}',[ControllersAdmin\CommentController::class,'delete']);
        });
        $router -> group(['prefix'=>'/rating'],function($router){
            $router -> get('/list',[ControllersAdmin\RateController::class,'list']);
            $router -> any('/list',[ControllersAdmin\RateController::class,'list']);
            $router -> any('/delete/{idRating}',[ControllersAdmin\RateController::class,'delete']);
        });
        // $router->get('/course',[App\Controllers\Client\CourseController::class,'listCourse']);
    });


    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);  
?>