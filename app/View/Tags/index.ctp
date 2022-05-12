<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Back to posts', '/', array('action' => 'index')); ?></p>
<hr />
<br />
<p><?php echo $this->Html->link('Add Tag', array('action' => 'add')); ?></p>
<?php
if ($tags):
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
	foreach ($tags as $tag): ?>
  <tr>
    <td><?php echo $tag['Tag']['id']; ?></td>
    <td>
      <?php
				echo $this->Html->link(
						$tag['Tag']['title'],
						array('action' => 'view', $tag['Tag']['id'])
				);
			?>
    </td>
    <td>
      <?php
				echo $this->Form->postLink(
						'Delete',
						array('action' => 'delete', $tag['Tag']['id']),
						array('confirm' => 'Are you sure?')
				);
			?>
      <?php
				echo $this->Html->link(
						'Edit', array('action' => 'edit', $tag['Tag']['id'])
				);
			?>
    </td>
    <td>
      <?php echo $tag['Tag']['created']; ?>
    </td>
  </tr>
  <?php
	endforeach;
else:
	?>
  <p>NO ONE TAG FOUND</p>
  <?php
endif;
?>

</table>
