<?php

namespace App;

class Response
{
    const HTTP_SUCCESS = 200;
    const HTTP_SUCCESS_POST = 201;
    const HTTP_SUCCESS_NO_RETURN = 204;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_CONFLICT = 409;
    const HTTP_NOT_PROCESSABLE = 422;

    const SUCCESS = 'Success';
    const FAIL = 'Failure';

    const TRUE = 1;
    const FALSE = 0;

    const SUPER_ADMIN = 0;
    const ADMIN = 1;
    const USER = 2;

    const MALE = 1;
    const FEMALE = 2;
    const MALE_STRING = "MALE";
    const FEMALE_STRING = "FEMALE";

    const IS_REQUIRED = 'is required';
    const IS_A_STRING = 'must be a string';
    const IS_A_NUMBER = 'must be a number';
    const IS_AN_EMAIL = 'must be an email';

    const SUCCESSFULLY_GET_ALL_EVENTS = 'Successfully get all events';
    const SUCCESSFULLY_GET_EVENT = 'Successfully get event';
    const SUCCESSFULLY_CREATED_EVENT = 'Successfully created event';
    const SUCCESSFULLY_UPDATED_EVENT = 'Successfully updated event';
    const SUCCESSFULLY_DELETED_EVENT = 'Successfully deleted event';

    const INVALID_CREDENTIAL = 'Invalid Credentials';
    const INVALID_EMAIL = 'Email already exists';
    const SUCCESSFULLY_LOGGED_IN = 'Successfully Logged In';
    const SUCCESSFULLY_REGISTERED_USER = 'Successfully Registered User';
    const SUCCESSFULLY_REGISTERED_USER_FINGER_PRINT = 'Successfully Registered User finger print';
    const INCORRECT_LOGIN_INPUT = 'Please input email';
    const USER_NOT_FOUND = 'User not found';
    const SUCCESSFULLY_GET_ALL_USERS = 'Successfully get all users';
    const SUCCESSFULLY_GET_USER = 'Successfully get all user';
    const SUCCESSFULLY_GET_USER_FINGER_PRINT = 'Successfully get user finger print';
    const INVALID_SR_CODE = 'SR code already exists';
    const SUCCESSFULLY_GET_ALL_USER_FINGER_PRINTS = 'Successfully get all user finger prints';

    const SUCCESSFULLY_GET_ALL_EVENT_USERS = 'Successfully get all event users';
    const SUCCESSFULLY_CREATED_EVENT_USERS = 'Successfully created event user/s';
    const SUCCESSFULLY_UPDATED_EVENT_USER = 'Successfully updated event user';
    const SUCCESSFULLY_DELETED_EVENT_USER = 'Successfully deleted event user';
    const SUCCESSFULLY_GET_ALL_EVENTS_BY_STATUS = 'Successfully get all events by status';

    const SUCCESSFULLY_GET_ALL_LOGS = 'Successfully get all logs';
    const SUCCESSFULLY_GET_LOG = 'Successfully get log';
    const SUCCESSFULLY_CREATED_LOG = 'Successfully created log';
    const LOG_NOT_FOUND = 'Log not found';

    const EVENT = 1;
    const GENERAL_PURPOSE = 2;
}