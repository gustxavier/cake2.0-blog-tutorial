<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to users', array('action' => 'index')); ?></p>
<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('full_name');
echo $this->Form->input('email', array('type' => 'email'));
echo $this->Form->end('Save User');
?>