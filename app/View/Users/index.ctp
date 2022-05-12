<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to posts', '/', array('action' => 'index')); ?></p>
<hr />
<br />
<p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>
<?php
if ($users):
?>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
    <th>Created</th>
  </tr>

  <!-- Here's where we loop through our $posts array, printing out post info -->

  <?php
	foreach ($users as $user): ?>
  <tr>
    <td><?php echo $user['User']['id']; ?></td>
    <td>
      <?php
				echo $this->Html->link(
						$user['User']['full_name'],
						array('action' => 'view', $user['User']['id'])
				);
			?>
    </td>
    <td>
      <?php echo $user['User']['email']; ?>
    </td>
    <td>
      <?php
				echo $this->Form->postLink(
						'Delete',
						array('action' => 'delete', $user['User']['id']),
						array('confirm' => 'Are you sure?')
				);
			?>
      <?php
				echo $this->Html->link(
						'Edit', array('action' => 'edit', $user['User']['id'])
				);
			?>
    </td>
    <td>
      <?php echo $user['User']['created']; ?>
    </td>
  </tr>
  <?php
	endforeach;
else:
	?>
  <p>NO ONE USER FOUND</p>
  <?php
endif;
?>

</table>