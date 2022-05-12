<?php
App::uses('Category', 'Model');
/**
 * Class Post
 */
class Category extends AppModel
{
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
        ),
    );
}