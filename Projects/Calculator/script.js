button.onclick = function() {
  let value = document.getElementById("area").value;
  let arr = value.split(' ');
  let a = +arr[0];
  let b = +arr[1];
  let result = a + b;
  if (result) {
    document.getElementById("log").innerHTML += `${a} + ${b} = ${result}<br>`;
  } else {
    document.getElementById("log").innerHTML += "Error<br>";
  }
}
