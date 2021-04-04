
<form>
	<table>
		<tr>
		<td  width="10%">제목 : </td>
			<td><input type="text" placeholder="제목 입력 필수" id="title" size="24" required novalidate></td>
			</tr>
			<tr>
			<td>내용 : </td>
			<td>
				<textarea id="content" rows="5" cols="60" required></textarea>
			</td>
		</tr>
		<tr>
		
		</tr>
		<tr>
		<td colspan="2" align="center">
			<button id="btn-write" >등록</button>
			<button type="reset">초기화</button>
			<button type="button" onclick="history.back()">돌아가기</button>
		</td>
		</tr>
	</table>
</form>