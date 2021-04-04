
$(function() {	//ready

	$("#btn-write").click(function() { write() }); //회원가입
	
		
	//글 쓰기/////////////////////////////////////////////////////
	function write() {
		let data= {
			title: $("#title").val(),
			content: $("#content").val(),
		}

		//글 쓰기 처리
		$.ajax({
			type: "post",
			url: "Board/public/write_pro",
			data: {data: JSON.stringify(data)},//js를 json 문자열로
			// dataType: "json"// 서버에서 응답 줄때 json을 javascript로 변경	
		})
		.done(function(result) {
			if(result) {
				alert("등록 성공 = "+result);
				location.replace("Board/public/board");
			}
			else {
				alert("등록 실패 = "+result);
			}
		}) 
		.fail(function(request, error) {
			alert("code : "+request.status+"\n"+"message : "+request.responseText+"\n"+"error : "+error);
			console.log("code : "+request.status+"\n"+"message : "+request.responseText+"\n"+"error : "+error);
		});//ajax
	}
		

		
	
	
	

	
});//ready
