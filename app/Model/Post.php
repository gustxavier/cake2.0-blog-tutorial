<?php
App::uses('Post', 'Model');
/**
 * Class Post
 */
class Post extends AppModel
{
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
        ),
        'body' => array(
            'rule' => 'notBlank',
        ),
    );
}