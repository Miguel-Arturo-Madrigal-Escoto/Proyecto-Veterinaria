<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait AlertController
{

    public function __alert__(string $type, string $message){
        switch ($type) {
            case 'success':
                notyf()
                    ->position('x', 'center')
                    ->position('y', 'top')
                    ->addSuccess($message);
                break;

            case 'info':
                notyf()
                    ->position('x', 'center')
                    ->position('y', 'top')
                    ->addInfo($message);
                break;

            case 'warning':
                notyf()
                    ->position('x', 'center')
                    ->position('y', 'top')
                    ->addWarning($message);
                break;

            case 'error':
                notyf()
                    ->position('x', 'center')
                    ->position('y', 'top')
                    ->addError($message);
                break;

            default:
                # code...
                break;
        }
    }


}
