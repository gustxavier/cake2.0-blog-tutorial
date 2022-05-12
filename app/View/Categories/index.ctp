<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to posts', '/', array('action' => 'index')); ?></p>
<hr />
<br />
<p><?php echo $this->Html->link('Add Category', array('action' => 'add')); ?></p>
<?php
if ($categories):
?>
<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Action</th>
    <th>Created</th>
  </tr>

  <!-- Here's where we loop through our $posts array, printing out post info -->

  <?php
	foreach ($categories as $category): ?>
  <tr>
    <td><?php echo $category['Category']['id']; ?></td>
    <td>
      <?php
				echo $this->Html->link(
						$category['Category']['title'],
						array('action' => 'view', $category['Category']['id'])
				);
			?>
    </td>
    <td>
      <?php
				echo $this->Form->postLink(
						'Delete',
						array('action' => 'delete', $category['Category']['id']),
						array('confirm' => 'Are you sure?')
				);
			?>
      <?php
				echo $this->Html->link(
						'Edit', array('action' => 'edit', $category['Category']['id'])
				);
			?>
    </td>
    <td>
      <?php echo $category['Category']['created']; ?>
    </td>
  </tr>
  <?php
	endforeach;
else:
	?>
  <p>NO ONE CATEGORY FOUND</p>
  <?php
endif;
?>

</table>
