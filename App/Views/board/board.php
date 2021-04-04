<a href="Board/public/write">글쓰기</a>
 
<table border="1">
	<thead>
		<tr align="center">
			<th>글번호</th> 
			<th>작성자</th>
			<th>제목</th>
			<th>작성일</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($contents as $row) {
	?>
		<tr align="center"> 
			<td><?=  $row['id'] ?></td>
			<td><?=  $row['title'] ?></td>
			<td><?=  $row['content'] ?></td>
			<td><?= date_format($row['regdate'], 'yy/m/d H:i:s') ?></td>
		</tr>
	<?php 
	}
	?>
	</tbody>
</table>
<hr>
<?php
$i=$startIndex;
if ($startIndex > 1) {
?>
	<a href="Board/public/board?nowIndex=<?= $i-5; ?>">
<?php	
}
?>
		prev</a>

<?php
for ($i; $i <= $endIndex; $i++) { 
?>
	<a href="Board/public/board?nowIndex=<?= $i; ?>"><?= $i; ?></a>
<?php
}
if ($endIndex < $totalIndex) {
?>
	<a href="Board/public/board?nowIndex=<?= $i; ?>">
<?php
}
?>	
		next</a>