<h1>Blog posts</h1>
<ul>
  <li><?php echo $this->Html->link('Users', '/users', array('action' => 'index')); ?></li>
  <li><?php echo $this->Html->link('Categories', '/categories', array('action' => 'index')); ?></li>
  <li><?php echo $this->Html->link('Tags', '/tags', array('action' => 'index')); ?></li>
</ul>
<br />
<hr />
<br />
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Actions</th>
    <th>Created</th>
  </tr>

  <!-- Here's where we loop through our $posts array, printing out post info -->

  <?php foreach ($posts as $post): ?>
  <tr>
    <td><?php echo $post['Post']['id']; ?></td>
    <td>
      <?php
				echo $this->Html->link(
						$post['Post']['title'],
						array('action' => 'view', $post['Post']['id'])
				);
			?>
    </td>
    <td>
      <?php
				echo $this->Form->postLink(
						'Delete',
						array('action' => 'delete', $post['Post']['id']),
						array('confirm' => 'Are you sure?')
				);
			?>
      <?php
				echo $this->Html->link(
						'Edit', array('action' => 'edit', $post['Post']['id'])
				);
			?>
    </td>
    <td>
      <?php echo $post['Post']['created']; ?>
    </td>
  </tr>
  <?php endforeach; ?>

</table>
