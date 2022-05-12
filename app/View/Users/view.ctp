<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to users', array('action' => 'index')); ?></p>
<h1>Nome: <?php echo h($user['User']['full_name']); ?></h1>
<h1>Email: <?php echo h($user['User']['email']); ?></h1>
<br />
<p><small>Created: <?php echo $user['User']['created']; ?></small></p>