<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to users', array('action' => 'index')); ?></p>
<h1>Edit User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('full_name');
echo $this->Form->input('email');
echo $this->Form->end('Save User');
?>
