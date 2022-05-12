<?php
App::uses('User', 'Model');
/**
 * Class Post
 */
class User extends AppModel
{
    public $validate = array(
        'full_name' => array(
            'rule' => 'notBlank',
        ),
        'email' => array(
            'rule' => 'notBlank',
        ),
    );
}