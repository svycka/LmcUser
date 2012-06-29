<?php

namespace ZfcUser\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements
    UserControllerOptionsInterface,
    UserServiceOptionsInterface
{
    /**
     * @var bool
     */
    protected $useRedirectParameterIfPresent = false;

    /**
     * @var int
     */
    protected $loginFormTimeout = 300;

    /**
     * @var int
     */
    protected $userFormTimeout = 300;

    /**
     * @var bool
     */
    protected $loginAfterRegistration = true;

    /**
     * @var array
     */
    protected $authIdentityFields = array( 'email' );

    /**
     * @var string
     */
    protected $userEntityClass = 'ZfcUser\Entity\User';

    /**
     * @var bool
     */
    protected $enableRegistration = true;

    /**
     * @var bool
     */
    protected $enableUsername = false;

    /**
     * @var bool
     */
    protected $enableDisplayName = false;

    /**
     * @var bool
     */
    protected $useRegistrationFormCaptcha = false;

    /**
     * @var int
     */
    protected $passwordCost = 14;

    /**
     * @var array
     */
    protected $formCaptchaOptions;

    /**
     * set use redirect param if present
     *
     * @param bool $useRedirectParameterIfPresent
     * @return ModuleOptions
     */
    public function setUseRedirectParameterIfPresent($useRedirectParameterIfPresent)
    {
        $this->useRedirectParameterIfPresent = $useRedirectParameterIfPresent;
        return $this;
    }

    /**
     * get use redirect param if present
     *
     * @return bool
     */
    public function getUseRedirectParameterIfPresent()
    {
        return $this->useRedirectParameterIfPresent;
    }

    /**
     * set enable user registration
     *
     * @param bool $enableRegistration
     * @return ModuleOptions
     */
    public function setEnableRegistration($enableRegistration)
    {
        $this->enableRegistration = $enableRegistration;
        return $this;
    }

    /**
     * get enable user registration
     *
     * @return bool
     */
    public function getEnableRegistration()
    {
        return $this->enableRegistration;
    }

    /**
     * set login form timeout
     *
     * @param int $loginFormTimeout
     * @return ModuleOptions
     */
    public function setLoginFormTimeout($loginFormTimeout)
    {
        $this->loginFormTimeout = $loginFormTimeout;
        return $this;
    }

    /**
     * get login form timeout in seconds
     *
     * @return int
     */
    public function getLoginFormTimeout()
    {
        return $this->loginFormTimeout;
    }

    /**
     * set user form timeout in seconds
     *
     * @param int $userFormTimeout
     * @return ModuleOptions
     */
    public function setUserFormTimeout($userFormTimeout)
    {
        $this->userFormTimeout = $userFormTimeout;
        return $this;
    }

    /**
     * get user form timeout in seconds
     *
     * @return int
     */
    public function getUserFormTimeout()
    {
        return $this->userFormTimeout;
    }

    /**
     * set login after registration
     *
     * @param bool $loginAfterRegistration
     * @return ModuleOptions
     */
    public function setLoginAfterRegistration($loginAfterRegistration)
    {
        $this->loginAfterRegistration = $loginAfterRegistration;
        return $this;
    }

    /**
     * get login after registration
     *
     * @return bool
     */
    public function getLoginAfterRegistration()
    {
        return $this->loginAfterRegistration;
    }

    /**
     * set auth identity fields
     *
     * @param array $authIdentityFields
     * @return ModuleOptions
     */
    public function setAuthIdentityFields($authIdentityFields)
    {
        $this->authIdentityFields = $authIdentityFields;
        return $this;
    }

    /**
     * get auth identity fields
     *
     * @return array
     */
    public function getAuthIdentityFields()
    {
        return $this->authIdentityFields;
    }

    /**
     * set enable username
     *
     * @param bool $flag
     * @return ModuleOptions
     */
    public function setEnableUsername($flag)
    {
        $this->enableUsername = (bool) $flag;
        return $this;
    }

    /**
     * get enable username
     *
     * @return bool
     */
    public function getEnableUsername()
    {
        return $this->enableUsername;
    }

    /**
     * set enable display name
     *
     * @param bool $flag
     * @return ModuleOptions
     */
    public function setEnableDisplayName($flag)
    {
        $this->enableDisplayName = (bool) $flag;
        return $this;
    }

    /**
     * get enable display name
     *
     * @return bool
     */
    public function getEnableDisplayName()
    {
        return $this->enableDisplayName;
    }

    /**
     * set use a captcha in registration form
     *
     * @param bool $useRegistrationFormCaptcha
     * @return ModuleOptions
     */
    public function setUseRegistrationFormCaptcha($useRegistrationFormCaptcha)
    {
        $this->useRegistrationFormCaptcha = $useRegistrationFormCaptcha;
        return $this;
    }

    /**
     * get use a captcha in registration form
     *
     * @return bool
     */
    public function getUseRegistrationFormCaptcha()
    {
        return $this->useRegistrationFormCaptcha;
    }

    /**
     * set user entity class name
     *
     * @param string $userEntityClass
     * @return ModuleOptions
     */
    public function setUserEntityClass($userEntityClass)
    {
        $this->userEntityClass = $userEntityClass;
        return $this;
    }

    /**
     * get user entity class name
     *
     * @return string
     */
    public function getUserEntityClass()
    {
        return $this->userEntityClass;
    }

    /**
     * set password cost
     *
     * @param int $passwordCost
     * @return ModuleOptions
     */
    public function setPasswordCost($passwordCost)
    {
        $this->passwordCost = $passwordCost;
        return $this;
    }

    /**
     * get password cost
     *
     * @return int
     */
    public function getPasswordCost()
    {
        return $this->passwordCost;
    }

    /**
     * set form CAPTCHA options
     *
     * @param array $formCaptchaOptions
     * @return ModuleOptions
     */
    public function setFormCaptchaOptions($formCaptchaOptions)
    {
        $thsi->formCaptchaOptions = $formCaptchaOptions;
        return $this;
    }

    /**
     * get form CAPTCHA options
     *
     * @return array
     */
    public function getFormCaptchaOptions()
    {
        return $this->formCaptchaOptions;
    }
}
