<?php
    require_once 'config.php';

    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && !isset($_SESSION['id']) )   {

        require_once 'common.php';
        require_once 'authFunction.php';

        $dbh    = connectDB();

        if ( !validateLogin( $_POST['loginId'], $_POST['password'] ) ) {

            $mess = 'loginIDまたはpasswordが入力されんていません';

        }

        if ( login( $dbh, $_POST['loginId'], $_POST['password'] ) ){

            header("Location: / ");
            exit;

        } else {

            $mess = 'loginIDまたはpasswordが異なります';

        }

    } else if ( isset($_SESSION['id']) ) {

        header("Location: / ");
        exit;

    }

    require_once    'template_login.php';
?>
