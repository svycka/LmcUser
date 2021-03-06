<?php

declare(strict_types=1);

namespace LmcUser;

use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ModuleManager\Feature\ControllerPluginProviderInterface;
use Laminas\ModuleManager\Feature\ControllerProviderInterface;
use Laminas\ModuleManager\Feature\ServiceProviderInterface;
use LmcUser\Authentication\Adapter\Db;

/**
 * Class Module
 */
class Module implements
    ControllerProviderInterface,
    ControllerPluginProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    public const LMC_USER_SESSION_STORAGE_NAMESPACE = 'LmcUserNamespace';
    
    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'lmcUserAuthentication' => \LmcUser\Factory\Controller\Plugin\LmcUserAuthentication::class,
            ),
        );
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'lmcuser' => \LmcUser\Factory\Controller\UserControllerFactory::class,
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'lmcUserDisplayName' => \LmcUser\Factory\View\Helper\LmcUserDisplayName::class,
                'lmcUserIdentity' => \LmcUser\Factory\View\Helper\LmcUserIdentity::class,
                'lmcUserLoginWidget' => \LmcUser\Factory\View\Helper\LmcUserLoginWidget::class,
            ),
        );

    }

    public function getServiceConfig()
    {
        return [
            'aliases' => [
                'lmcuser_laminas_db_adapter' => \Laminas\Db\Adapter\Adapter::class,
                'lmcuser_register_form_hydrator' => 'lmcuser_user_hydrator',
                'lmcuser_base_hydrator' => ClassMethodsHydrator::class
            ],
            'invokables' => [
            ],
            'factories' => [
                'lmcuser_redirect_callback' => \LmcUser\Factory\Controller\RedirectCallbackFactory::class,
                'lmcuser_module_options' => \LmcUser\Factory\Options\ModuleOptions::class,
                'LmcUser\Authentication\Adapter\AdapterChain' => \LmcUser\Authentication\Adapter\AdapterChainServiceFactory::class,

                // We alias this one because it's LmcUser's instance of
                // Laminas\Authentication\AuthenticationService. We don't want to
                // hog the FQCN service alias for a Laminas\* class.
                'lmcuser_auth_service' => \LmcUser\Factory\AuthenticationService::class,

                'lmcuser_user_hydrator' => \LmcUser\Factory\UserHydrator::class,
                'lmcuser_user_mapper' => \LmcUser\Factory\Mapper\User::class,

                'lmcuser_login_form' => \LmcUser\Factory\Form\Login::class,
                'lmcuser_register_form' => \LmcUser\Factory\Form\Register::class,
                'lmcuser_change_password_form' => \LmcUser\Factory\Form\ChangePassword::class,
                'lmcuser_change_email_form' => \LmcUser\Factory\Form\ChangeEmail::class,

                Db::class                                 => \LmcUser\Factory\Authentication\Adapter\DbFactory::class,
                \LmcUser\Authentication\Storage\Db::class => \LmcUser\Factory\Authentication\Storage\DbFactory::class,

                'lmcuser_user_service' => \LmcUser\Factory\Service\UserFactory::class,
            ],
        ];
    }
}
