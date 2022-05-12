<?php
App::uses('Comment', 'Model');
/**
 * Class Comment
 */
class Comment extends AppModel
{
    public $validate = array(
        'body' => array(
            'rule' => 'notBlank',
        ),
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
        ),
    );
}