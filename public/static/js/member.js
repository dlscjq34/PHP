
$(function() {	//ready

	$("#btn-join").click(function() { join() }); //회원가입
	




	//회원가입/////////////////////////////////////////////////////
	function join() {
		
		let data= {
			memberId: $("#memberId").val(),
			pswd: $("#pswd").val(),
			memberName: $("#memberName").val(),
			addr: $("#addr").val(),
			tel: $("#tel").val()
		}
		
		// // 아이디 입력체크
		// if(data.memberId.length < 5) {
		// 	alert("아이디를 5자리 이상 입력하세요");
	    //   	return false;
		// }
		// // 비밀번호 입력체크
		// else if(data.pswd.length < 5) {
		// 	alert("비밀번호 5자리 이상 입력하세요");
	    //   	return false;
		// }
		// // 기타 빈칸체크
		// else if(data.memberName == "" || data.addr == "" || data.tel == "") {
		// 	alert("빈칸을 입력하세요");
	    //   	return false;
		// }
		
		//회원 가입 처리
		$.ajax({
			type: "post",
			url: "Board/public/join_pro",
			data: {data: JSON.stringify(data)},//js를 json 문자열로
			// dataType: "json"// 서버에서 응답 줄때 json을 javascript로 변경	
		})
		.done(function(result) {
			alert(result);
			console.log(result);
			
		}) 
		.fail(function(request, error) {
			alert("code : "+request.status+"\n"+"message : "+request.responseText+"\n"+"error : "+error);
			console.log("code : "+request.status+"\n"+"message : "+request.responseText+"\n"+"error : "+error);
		});//ajax
		
	};//회원가입
	
	
	
	
});//ready
