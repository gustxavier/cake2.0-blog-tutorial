<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to categories', array('action' => 'index')); ?></p>
<h1>Add Category</h1>
<?php
echo $this->Form->create('Category');
echo $this->Form->input('title');
echo $this->Form->end('Save Category');
?>