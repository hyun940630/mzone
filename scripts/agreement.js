// 입력란에 제대로 된 데이터가 들어가 있는지 확인하고 UI박스에 빨간색 파란색을 띄워주는 함수.
function joinExceptionHandling(id, pw, pw_check, name, sex, email, select_email, tel, cardinalNumber) {

  // 입력란 오류가 있는지 없는지 판단하는 변수. false가 되어야 오류가 없는 것.
  var flag = false;

  if(id.value == "") {
    $('#id').css('border', 'solid 1px #cc3d3d');
    $('#id').attr('placeholder', ' 필수 입력란 입니다. 아이디를 입력해 주세요.');
    flag = true;
  } else {
    $('#id').css('border', 'solid 1px #aaaaaa');
  }

  if(pw.value == "") {
    $('#pw').css('border', 'solid 1px #cc3d3d');
    $('#pw').attr('placeholder', ' 필수 입력란 입니다. 비밀번호를 입력해 주세요.');
    flag = true;
  } else {
    $('#pw').css('border', 'solid 1px #aaaaaa');
  }

  if(pw_check.value == "") {
    $('#pw_check').css('border', 'solid 1px #cc3d3d');
    $('#pw_check').attr('placeholder', ' 필수 입력란 입니다. 비밀번호를 한번 더 입력해 주세요.');
    flag = true
  } else {
    $('#pw_check').css('border', 'solid 1px #aaaaaa');
  }

  if(name.value == "") {
    $('#name').css('border', 'solid 1px #cc3d3d');
    $('#name').attr('placeholder', ' 필수 입력란 입니다. 이름을 입력해 주세요.');
    flag = true;
  } else {
    $('#name').css('border', 'solid 1px #aaaaaa');
  }

  if(tel.value == "") {
    $('#tel').css('border', 'solid 1px #cc3d3d');
    $('#tel').attr('placeholder', ' 필수 입력란 입니다. 전화번호을 입력해 주세요.');
    flag = true;
  } else {
    $('#tel').css('border', 'solid 1px #aaaaaa');
  }

  return flag;
}

function join() {
  // 가입하기 버튼을 누렀을 때 해당 ACTION 태그에 연결되어있는 PHP문서에 본 문서의 내용들을 전달한다.
	// 본 함수는 예외처리적 역할도 주로 한다.
  var id = document.getElementById("id");
  var pw = document.getElementById("pw");
  var pw_check = document.getElementById("pw_check");
  var name = document.getElementById("name");
  var sex = document.getElementById("sex");
  var email = document.getElementById("email");
  var select_email = document.getElementById("select_email");
  var tel = document.getElementById("tel");
  var cardinalNumber = document.getElementById("carinalNumber");

  var flag = joinExceptionHandling(id, pw, pw_check, name, sex, email, select_email, tel, cardinalNumber);

  if(flag == true) {
    alert("필수 입력란을 채워주세요.")
    return;
  } else if(flag_idCheck == false) {
    alert("중복확인이 필요합니다.");
    id.focus();
    return;
  } if(pw.value != pw_check.value) {
    alert("비밀번호를 일치시켜주세요.")
    pw.focus();
    return;
  }



  // if(tel.value == "") {
  //   alert("\n 전화번호를 입력하세요");
  //   tel.focus();
  //   return;
  // }
  //
  // if(cardinalNumber.value == "") {
  //   alert("\n 기수를 입력하세요");
  //   cardinalNumber.focus();
  //   return;
  // }

  document.entry.submit();
  return false;
}

// 중복확인이 완료된 상태에서 다시 아이디를 입력할 경우 중복확인 플래그를 리셋하는 함수.
function flagIdCheckReset() {
  flag_idCheck = false;

  var idCheckDispaly = document.getElementById("idCheckDisplay");
  idCheckDisplay.innerHTML = "";

}

$(document).ready(function () {
  idCheckButtonHover();
  sexButtonHover();
  joinButtonHover();
});

function joinButtonHover() {
  $('#join_btn').hover(function () {
    $(this).css('color', '#6799ff');
    $(this).css('border', 'solid 1px #6799ff');
  }, function () {
    $(this).css('color', '#ffffff');
    $(this).css('border', 'solid 1px #ffffff');
  });
}

// 중복확인 버튼 Hover 함수
function idCheckButtonHover() {
  $('#id_check').hover(function () {
    $(this).css('color', '#6799ff');
    $(this).css('border', 'solid 1px #6799ff');
  }, function () {
    $(this).css('color', '#aaaaaa');
    $(this).css('border', 'solid 1px #aaaaaa');
  });
}

// 성별 버튼 Hover 함수
function sexButtonHover() {
  // 성별 버튼 눌렀을 때 글씨체 색깔이 변하는 함수.
  $('#male').hover(function () {
      $(this).css('color', '#6799ff');
      $(this).css('border', 'solid 1px #6799ff');
  }, function () {
      $(this).css('color', '#aaaaaa');
      $(this).css('border', 'solid 1px #aaaaaa');
  });

  $('#female').hover(function () {
      $(this).css('color', '#6799ff');
      $(this).css('border', 'solid 1px #6799ff');
  }, function () {
      $(this).css('color', '#aaaaaa');
      $(this).css('border', 'solid 1px #aaaaaa');
  });
}

// 전역변수 선언.
male_flag = false;
female_flag = false;

function sexButtonClick( param ) {
  //남, 여 버튼을 클릭했을 때 버튼 색상 유지. 클릭된 상태 유지.
  var sex = document.getElementById('sex');

  if(male_flag == false && female_flag == false) {
    // 한번도 성별 버튼을 선택하지 않았을 때
    if( param == "남" ) {
      // 남자 버튼을 클릭했을 경우.
      $('#male').css('border', 'solid 1px #6799ff');
      male_flag = true;
      sex.value = "남";

    } else {
      // 여
      $('#female').css('border', 'solid 1px #6799ff');
      female_flag = true;
      sex.value = "여";
    }

  } else if ( male_flag == true ) {
    // 남성 버튼이 클릭되어 있는 경우.
    $('#male').css('border', 'solid 1px #aaaaaa');
    $('#female').css('border', 'solid 1px #6799ff');
    male_flag = false; female_flag = true;
    sex.value = "여";
  } else if ( female_flag == true) {
    // 여성 버튼이 클릭되어 있는 경우.
    $('#male').css('border', 'solid 1px #6799ff');
    $('#female').css('border', 'solid 1px #aaaaaa');
    male_flag = true; female_flag = false;
    sex.value = "남";
  }
}

$(document).ready(function () {
  pwMatchDisplayInnerHTML();
});

function pwMatchDisplayInnerHTML() {
  var isEqualPWMSG = document.getElementById('pwMatchDisplay');

  if(document.entry.pw_check.value == "") {
    isEqualPWMSG.innerHTML = "<p></p>";
  } else if(document.entry.pw.value == document.entry.pw_check.value) {
    isEqualPWMSG.innerHTML = "<p class='positive'>일치합니다.</p>";
  } else {
    isEqualPWMSG.innerHTML = "<p class='negative'>불일치합니다.</p>";
  }

  setTimeout("pwMatchDisplayInnerHTML()", 500);
}
