<?php

namespace App;

class Response 
{
    const HTTP_SUCCESS = 200;
    const HTTP_SUCCESS_POST = 201;
    const HTTP_SUCCESS_NO_RETURN = 204;
    const HTTP_FORBIDDEN = 403; 
    const HTTP_NOT_FOUND = 404;
    const HTTP_NOT_PROCESSABLE = 422;

    const SUCCESS = 'Success';
    const FAIL = 'Failure';

    const TRUE = 1;
    const FALSE = 0;

    const MALE = 1;
    const FEMALE = 2;
    const MALE_STRING = "MALE";
    const FEMALE_STRING = "FEMALE";

    const IS_REQUIRED = 'is required';
    const IS_A_STRING = 'must be a string';
    const IS_A_NUMBER = 'must be a number';
    const IS_AN_EMAIL = 'must be an email';

    const SUCCESSFULLY_GET_GENERAL_PURPOSE = 'Successfully get general purpose';
    const SUCCESSFULLY_CREATED_GENERAL_PURPOSE = 'Successfully created general purpose';
    const SUCCESSFULLY_UPDATED_GENERAL_PURPOSE = 'Successfully updated general purpose';
    const SUCCESSFULLY_DELETED_GENERAL_PURPOSE = 'Successfully deleted general purpose';

    const INVALID_CREDENTIAL = 'Invalid Credentials';
    const SUCCESSFULLY_LOGGED_IN = 'Successfully Logged In';
    const SUCCESSFULLY_CREATED_USER = 'Successfully Created User';
    const INCORRECT_LOGIN_INPUT = 'Please input email';
    const USER_NOT_FOUND = 'User not found';
}