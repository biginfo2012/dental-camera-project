<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const SUCCESS = 'success';
    const ERROR = 'error';

    const ERR_INVALID_UNKNOWN = 'ERR_INVALID_UNKNOWN';
    const ERR_INVALID_USER_EMAIL = 'ERR_INVALID_USER_EMAIL';
    const ERR_INVALID_PASSWORD  = 'ERR_INVALID_PASSWORD';
    const ERR_INVALID_SHIFT_ID  = 'ERR_INVALID_SHIFT_ID';
    const ERR_INVALID_ALT_DATE  = 'ERR_INVALID_ALT_DATE';
    const ERR_INVALID_BREAK_TIME  = 'ERR_INVALID_BREAK_TIME';
    const ERR_INVALID_SHIFT_LIST  = 'ERR_INVALID_SHIFT_LIST';
    const ERR_INVALID_BREAK_S_TIME  = 'ERR_INVALID_BREAK_S_TIME';
    const ERR_INVALID_NIGHT_BREAK_S_TIME  = 'ERR_INVALID_NIGHT_BREAK_S_TIME';
    const ERR_INVALID_NIGHT_BREAK_TIME  = 'ERR_INVALID_NIGHT_BREAK_TIME';
    const ERR_INVALID_ARRIVE_TIME  = 'ERR_INVALID_ARRIVE_TIME';
    const ERR_INVALID_LEAVE_TIME  = 'ERR_INVALID_LEAVE_TIME';
}
