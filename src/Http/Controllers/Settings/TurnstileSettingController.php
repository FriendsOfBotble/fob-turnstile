<?php

namespace FriendsOfBotble\Turnstile\Http\Controllers\Settings;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Setting\Http\Controllers\SettingController;
use FriendsOfBotble\Turnstile\Forms\Settings\TurnstileSettingForm;
use FriendsOfBotble\Turnstile\Http\Requests\Settings\TurnstileSettingRequest;

class TurnstileSettingController extends SettingController
{
    public function edit(): string
    {
        return TurnstileSettingForm::create()->renderForm();
    }

    public function update(TurnstileSettingRequest $request): BaseHttpResponse
    {
        return $this->performUpdate($request->validated());
    }
}
