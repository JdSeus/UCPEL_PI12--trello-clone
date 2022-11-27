<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper;
use App\Models\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class EditProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $r)
    {

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        if(!isset($client)) {
            abort(403);
        }

        return view('app.edit-profile', compact('client'));
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

        $editProfileValidator = Validator::make(request()->all(), 
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
            ],
            [
                'name.required' => 'O campo Nome é necessário!',
                'email.required' => 'O campo E-mail é necessário!'
            ]
        );

        if ($editProfileValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($editProfileValidator, $errors);
            return redirect()->route('edit-profile', compact('client'))->withErrors($errors);
        }

        if ($r->hasFile('image')) {
            if ($r->file('image')->isValid()) {
                $nameForPicture = new \DateTime();
                $nameForPicture = $nameForPicture->getTimestamp();

                $myPictureAbsolutePath = Helper::UploadImageFromFileAsVoyagerViaModelSlugUsingName($r->file('image'), 'clients', ''.$nameForPicture);

                if ((isset($myPictureAbsolutePath)) && (empty($myPictureAbsolutePath) == false)) {
                    if (isset($client->profile_picture)) {
                        Helper::removeProfilePicture($client->profile_picture);
                    }
                    $client->profile_picture = $myPictureAbsolutePath;
                    $messages->add('change_profile_picture_succes', 'Imagem de perfil trocada com sucesso.');
                } else {
                    $errors->add('change_profile_picture_error', 'Não foi possível trocar a imagem de perfil.');
                }
                $client->save();
            }
        }

        $changeName = false;
        $changeEmail = false;
        $changeEmailAux = 0;

        if($client->name != ''.$r->name) {
            $changeName = true;
        }

        if($client->email != ''.$r->email) {
            $changeEmailAux = $changeEmailAux + 1;
        }

        if($changeEmailAux == 1) {
            $auxClient = Client::where('email', $r->email)->first();

            if(isset($auxClient)) {
                $errors->add('email.unique:clients', 'Este E-mail já está sendo utilizado!');
            } else {
                $changeEmailAux = $changeEmailAux + 1;
            }
        }

        if($changeEmailAux == 2) {
            $changeEmail = true;
        }

        if($changeName) {
            $client->name = ''.$r->name;
        }
        if($changeEmail) {
            $client->email = ''.$r->email;
        }

        if($changeName || $changeEmail) {
            $client->save();
        }

        if($changeName) {
            $messages->add('change_name_success', 'Nome trocado com sucesso.');
        }
        if($changeEmail) {
            $messages->add('change_email_success', 'Email trocado com sucesso.');
        }

        return redirect()->route('edit-profile')->with('messages', $messages)->withErrors($errors);

    }
}
