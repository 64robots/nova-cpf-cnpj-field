<?php

namespace R64\NovaCpfCnpjField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-cpf-field', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-cpf-field', __DIR__.'/../dist/css/field.css');
            Nova::script('nova-cnpj-field', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-cnpj-field', __DIR__.'/../dist/css/field.css');
        });

        Validator::extend('cpf', function ($attribute, $value, $parameters, $validator) {
            if (!$value) {
                return true;
            }
            return MyValidator::check_cpf($value);
        }, 'Invalid Cpf');

        Validator::extend('cnpj', function ($attribute, $value, $parameters, $validator) {
            if (!$value) {
                return true;
            }
            return MyValidator::check_cnpj($value);
        }, 'Invalid Cnpj');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
