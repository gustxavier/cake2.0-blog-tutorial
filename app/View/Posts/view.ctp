<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to Posts', array('action' => 'index')); ?></p>
<h1><?php echo h($post['Post']['title']); ?></h1>
<br />
<p><?php echo $this->Html->link('Comments', '/comments', array('action' => 'index')); ?></p>
<br />
<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>
