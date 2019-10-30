function sign() {
  document.getElementById('Error').setAttribute("hidden", null);

  console.log(document.form1.firstName.value);
  console.log(document.form1.lastName.value);
  console.log(document.form1.phoneNumber.value);
  console.log(document.form1.emailAdress.value);

  console.log(document.getElementById('checkboxElem').checked);

  var firstName = document.form1.firstName.value;
  var lastName = document.form1.lastName.value;
  var phoneNumber = document.form1.phoneNumber.value;
  var emailAdress = document.form1.emailAdress.value;

  if(checkInput() && document.getElementById('checkboxElem').checked)
  {
    window.location.href= 'http://frocle.ddns.net/petition/save.php?first=' + firstName + '&last=' + lastName + '&phone=' + phoneNumber + '&email=' + emailAdress + '';

    //window.open("http://frocle.ddns.net/petition/save.php?first=Simon&last=RS&phone=+436766693393&email=simon@gmail.com");
  }
  else
  {
    document.getElementById('Error').removeAttribute("hidden");
  }
}

function calc () {
  if(document.getElementById('checkboxElem').checked)
  {document.getElementsByClassName('submit').removeAttribute("disabled");}
  else
  {document.getElementsByClassName('submit').setAttribute('disabled', null);}
}

function checkInput () {
  var result = 0;
  var temp;

  temp = document.form1.firstName.value;
  if(Boolean(temp))
    {result += 1;}

  temp = document.form1.lastName.value
  if(Boolean(temp))
    {result += 1;}

  temp = document.form1.phoneNumber.value
  if(Boolean(temp))
    result += 1;

  temp = document.form1.emailAdress.value
  if(Boolean(temp))
    result += 1;

  if(result == 4)
  {return true}
  else
  {return false}
}
