<h1>Cake Test</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($tests as $test): ?>
    <tr>
        <td><?php echo $test['Test']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($test['Test']['title'],
array('controller' => 'tests', 'action' => 'view', $test['Test']['id'])); ?>
        </td>
        <td><?php echo $test['Test']['text']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($test); ?>
</table>