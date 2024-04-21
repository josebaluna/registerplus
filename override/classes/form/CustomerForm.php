<?php

class CustomerForm extends CustomerFormCore
{
    protected function validateFieldsLengths()
    {
        $this->validateFieldLength('email', 255, $this->getEmailMaxLengthViolationMessage());
        $this->validateFieldLength('firstname', 512, $this->getFirstNameMaxLengthViolationMessage());
        $this->validateFieldLength('lastname', 512, $this->getLastNameMaxLengthViolationMessage());
    }

    protected function getFirstNameMaxLengthViolationMessage()
    {
        return $this->translator->trans(
            'The %1$s field is too long (%2$d chars max).',
            ['first name', 512],
            'Shop.Notifications.Error'
        );
    }

    protected function getLastNameMaxLengthViolationMessage()
    {
        return $this->translator->trans(
            'The %1$s field is too long (%2$d chars max).',
            ['last name', 512],
            'Shop.Notifications.Error'
        );
    }
}