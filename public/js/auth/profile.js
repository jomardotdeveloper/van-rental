function update_password(){
	let new_password = isAlphanumericWithOthers(document.getElementById('new_password').value) ? document.getElementById('new_password').value : displayError('New Password');
	let confirm_password = isAlphanumericWithOthers(document.getElementById('confirm_password').value) ? document.getElementById('confirm_password').value : displayError('Confirm Password');

	if(new_password !== confirm_password){
		Swal.fire({
			icon:'error',
			title:'Password Error',
			text:'Password Mismatch'
		})

		document.getElementById('new_password').classList.add('border-danger');
		document.getElementById('confirm_password').classList.add('border-danger');
	}else{
		document.getElementById('new_password').classList.remove('border-danger');
		document.getElementById('confirm_password').classList.remove('border-danger');
		document.getElementById('new_password').classList.add('border-success');
		document.getElementById('confirm_password').classList.add('border-success');
		

		document.getElementById('submit_profile').click();
	}
}

function isAlphanumericWithOthers(string) {
  for (var i = 0; i < string.length; i++) {
    var character = string[i];
    if (
      !(
        (character >= 'a' && character <= 'z') ||
        (character >= 'A' && character <= 'Z') ||
        (character >= '0' && character <= '9') ||
        character === '-' ||
        character === '@' ||
        character === '(' || 
        character === ')' ||
        character === '!'
      )
    ) {
      return false;
    }
  }
  return true;
}

function displayError(value){
  Swal.fire({
    icon:'error',
    title:value + ' ERROR',
    text:`The input can only contain letters (both uppercase and lowercase), numbers, spaces and characters such as ()@!`
  })

  throw new Error(value + ' ERROR');
}