
function possible(){
  var du = document.userinput;
  var id= document.getElementByID('inputID');

  if(!id){
    alert('아이디를 입력해주세요.');
    du.id.focus();
    return false;
  }
  var url="check_id2.php?id="+id;
  window.open(url,'','width=450, height=300, left=500');
}
