<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLoginPage;

/**
 * @property Form $form
 */
class Login extends BaseLoginPage
{
    public function mount(): void
    {
        parent::mount();

        if (env('DEMO_MODE')) {
            $this->form->fill([
                'email' => 'admin@example.com',
                'password' => 'password',
                'remember' => true,
            ]);
        }
    }
}
