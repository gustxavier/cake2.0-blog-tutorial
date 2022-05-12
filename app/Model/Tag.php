<?php
App::uses('Tag', 'Model');
/**
 * Class Post
 */
class Tag extends AppModel
{
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
        ),
    );
}