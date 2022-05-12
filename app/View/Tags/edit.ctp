<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to tags', array('action' => 'index')); ?></p>
<h1>Edit Tag</h1>
<?php
echo $this->Form->create('Tag');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('title');
echo $this->Form->end('Save Tag');
?>