<?php

namespace App\Http\Controllers\Ajax\NewPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\Models\Client;

class NewPasswordController extends Controller
{

    public function index(Request $r)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        if(!isset($client)) {
            abort(403);
        }

        return view('app.ajax.new-password.edit', compact('client'));

    }

    public function post(Request $r)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        if(!isset($client)) {
            abort(403);
        }

        $errors = new MessageBag();
        $messages = new MessageBag();

        $newPasswordValidator = Validator::make(request()->all(), [
            'password' => ['string', 'min:8', 'required'],
            'password_confirmation' => ['string', 'min:8', 'required', 'same:password'],
        ]);

        if ($newPasswordValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($newPasswordValidator, $errors);
            return view('app.ajax.new-password.edit', compact('client'))->withErrors($errors);
        } else {
            $client->password = Hash::make($r->password);
            $client->save();
            $messages->add('change_password_success', 'Senha trocada com sucesso.');
            $r->session()->flash('messages', $messages);
        }

        $route = route('edit-profile');

        return response($route, 303);

    }

}