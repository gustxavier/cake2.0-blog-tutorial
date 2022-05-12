<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to Posts', array('action' => 'index')); ?></p>
<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>